<?php
   session_start();

   include "../dbcon.php";
   
   $num = $_GET['num'];
   $userid = $_SESSION['userid'];
   
   
   $sql = "select id from qna_board where num = $num";   
   //$result = mysql_query($sql, $connect);
   $result = mysqli_query($connect, $sql);

   $row = mysqli_fetch_array($result);

   if ($userid != "asdf" and $userid != $row[id])   // 비밀번호가 맞으면 
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
      $sql = "delete from qna_board where num = $num";
      //mysql_query($sql, $connect);
	  mysqli_query($connect, $sql);
   }

   mysqli_close($connect);

   Header("Location:list.php?page=$page");
?>

