<?php
   session_start();
   
	$userid = $_SESSION['userid'];
	$num = $_GET['num'];
	$page = $_GET['page'];
	
   include "../dbcon.php";
   
   $sql = "select * from down_board where num = $num";   
   $result = mysqli_query($connect, $sql);
   $row = mysqli_fetch_array($result);

   // 관리자나 글 쓴 사람만이 삭제 가능
   if ($userid != "asdf" and $userid != $row[id])  
   {
      echo("
	   <script>
             window.alert('삭제 권한이 없습니다.')
             history.go(-1)
	   </script>
           ");
      exit;
   }
   else
   {
      if ($row['filename'])
      {
         unlink("data/$row[filename]"); // 파일삭제
      }
	  $sql_reply_check = "select * from down_board where group_num = $num && num != $num";
	  $result_reply_check = mysqli_query($connect, $sql);
	  $reply_check = mysqli_fetch_array($result_reply_check);
	  if($reply_check){
		  $sql = "update down_board set subject = '삭제된 원글입니다.', id =null, name =null, content =null, filename =null, ip = null, chk = 0 where num = $num";
		  mysqli_query($connect, $sql);
	  }
	  else{
		$sql = "delete from down_board where num = $num";
		mysqli_query($connect, $sql);
	  }
   }

   mysqli_close($connect);

   Header("Location:list.php?page=$page");
?>

