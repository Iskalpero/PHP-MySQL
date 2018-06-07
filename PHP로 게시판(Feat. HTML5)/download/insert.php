<?php
   session_start();
   
   if($_SERVER['CONTENT_LENGTH'] && !$_FILES && !$_POST  ){
	  echo("
	   <script>
	     window.alert
             ('업로드 파일 사이즈가 지정된 용량(2M)을 초과합니다.');
	     history.go(-1)
	   </script>
           ");
         exit;
   }
   
   
   $userid = $_SESSION['userid'];
   $username = $_SESSION['username'];
   $subject = $_POST['subject'];
   $content = $_POST['content'];
   
   
   $num = $_GET['num'];
   $page = $_GET['page'];
  
  if(!$userid) {
      echo("
	   <script>
	     window.alert('로그인 후 사용하세요.')
	     history.go(-1)
	   </script>
	   ");	
      exit;
   }
  
  
    // 업로드 대상 파일의 정보를 출력 , 저장경로 지정 설정.
		if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
			echo "파일명 : ".$_FILES['upfile']['name']."<br>";
			echo "파일크기 : ".$_FILES['upfile']['size']."<br>";
			echo "파일의 MIME Type : ".$_FILES['upfile']['type']."<br>";
			echo "임시 저장 파일명 : ".$_FILES['upfile']['tmp_name']."<br>"; // 파일체크
			
		   $upfile = $_FILES['upfile']['tmp_name']; // 임시파일명
		   $upfile_name = $_FILES['upfile']['name']; // 실제 파일명
		   $upfile_size = $_FILES['upfile']['size']; // 파일크기.
			
			
			$save_dir = "data/";
			$dest = $save_dir.$_FILES["upfile"]["name"];
			/*
			if(!move_uploaded_file($_FILES["upfile"]["tmp_name"], $dest)){
				die("파일을 지정한 디렉토리에 저장하는데 실패.");
			}
			
			echo "성공";
			*/
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
   
   include "../dbcon.php";

   $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
   $ip = $_SERVER['REMOTE_ADDR'];         // 방문자의 IP 주소를 저장
	
	

   if($upfile_name) 
   {
      if ( file_exists($dest) ){
        echo("
	   <script>
	     window.alert('선택한 파일과 동일한 이름이 존재합니다.');
	     history.go(-1)
	   </script>
	   ");
         exit;
      }
		/*
      if( !$upfile) {
         echo("
	   <script>
	     window.alert
             ('업로드 파일 사이즈가 지정된 용량(2M)을 초과합니다.');
	     history.go(-1)
	   </script>
           ");
         exit;
      }*/

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
   }

   if (!$num) 
   {
      $depth = 0;   // depth, ord 를 0으로 초기화
      $ord = 0;

     // 레코드 삽입 명령
      $sql = "insert into down_board
              (depth, ord, id, name, subject,";
      $sql .= "content, regist_day, hit, ip, filename, filesize, chk) ";
      $sql .= "values($depth, $ord, '$userid', '$username', 
                      '$subject',";
      $sql .= "'$content', '$regist_day', 0, '$ip', '$upfile_name', 
               '$filesize', 1 )";    
      mysqli_query($connect, $sql);  // $sql 에 저장된 명령 실행

      // 최근 auto_increment 필드(num) 값 가져오기
      $sql = "select last_insert_id()"; 
      $result = mysqli_query($connect, $sql);
      $row = mysqli_fetch_array($result);
      $auto_num = $row[0]; 
 
      // group_num 값 업데이트 
      $sql = "update down_board set group_num = $auto_num 
              where num=$auto_num";
      mysqli_query($connect, $sql);
   }
   else
   {
      // 부모 글 가져오기
      $sql = "select * from down_board where num = $num";
      $result = mysqli_query($connect, $sql);
      $row = mysqli_fetch_array($result);

      // 부모 글로 부터 group_num, depth, ord 값 설정
      $group_num = $row['group_num'];
      $depth = $row['depth'] + 1;
      $ord = $row['ord'] + 1;

      $sql = "update down_board set ord = ord + 1
             where group_num = $row[group_num] and ord > $row[ord]";
      mysqli_query($connect, $sql);  

      $sql = "insert into down_board(group_num, depth, ord, id, name,
              subject,";
      $sql .= "content, regist_day, hit, ip, filename, filesize, chk) ";
      $sql .= "values($group_num, $depth, $ord, '$userid', '$username',
                      '$subject',";
      $sql .= "'$content', '$regist_day', 0, '$ip', '$upfile_name','$filesize', 1)";

      mysqli_query($connect, $sql);  // $sql 에 저장된 명령 실행
   }
   mysqli_close($connect);                // DB 연결 끊기
   
   Header("Location:list.php?page=$page");  // list.php 로 이동합니다.
?>