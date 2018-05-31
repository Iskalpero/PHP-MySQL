<?php
   session_start();

   include "../dbcon.php";
   
   $userid = $_SESSION['userid'];
   $subject = $_POST['subject'];
   $content = $_POST['content'];
   $num = $_GET['num'];
   
   $upfile = $_FILES['upfile']['tmp_name'];
   $upfile_name = $_FILES['upfile']['name'];
   $upfile_size = $_FILES['upfile']['size'];

   $sql = "select id from down_board where num = $num";
   $result = mysqli_query($connect, $sql);
   $row = mysqli_fetch_array($result);

   if($userid != "asdf" and $userid != $row[id])   
   // 비밀번호가 맞으면
   {
     echo("
	   <script>
             window.alert('수정 권한이 없습니다.')
             history.go(-1)
	   </script>
          ");
          exit;
   }

   if(!$subject) {
     echo("
	   <script>
	     window.alert('제목을 입력하세요.')
	     history.go(-1)
	   </script>
	 ");
	 exit;
   }
   
   if(!$content) {
     echo("
	   <script>
	     window.alert('내용을 입력하세요.')
	     history.go(-1)
	   </script>
	 ");
	 exit;
   }
   if( !$upfile) {
         echo("
	   <script>
	     window.alert
             ('업로드 파일 사이즈가 지정된 용량(2M)을 초과합니다.');
	     history.go(-1)
	   </script>
           ");
         exit;
      }

      if( strlen($upfile_size) < 7 ) {
         $filesize = sprintf("%0.2f KB", $upfile_size/1000);
      }
      else
      {
         $filesize = sprintf("%0.2f MB", $upfile_size/1000000);
      }

      if( !copy($upfile, "data/$upfile_name") )
      {
         echo("
	   <script>
	     window.alert
             ('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
	     history.go(-1)
	   </script>
           ");
         exit;
      }
         
      if ( !unlink($upfile) ) {
         echo("
	   <script>
	     window.alert('임시파일을 삭제하는데 실패했습니다.');
	     history.go(-1)
	   </script>
           ");
         exit;
      }
   $regist_day = date("Y-m-d (H:i)");  
   // 현재의 '년-월-일-시-분'을 저장
   $ip = $_SERVER['REMOTE_ADDR'];         
   // 방문자의 IP 주소를 저장
   
   $sql = "update down_board set subject='$subject', ";
   $sql .= "content='$content', filename = '$upfile_name', filesize = '$filesize' where num=$num";
   
   mysqli_query($connect, $sql);
   mysqli_close($connect);
   
   Header("Location:list.php?page=$page");  // list.php 로 이동
?>