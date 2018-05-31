<?php
   session_start();

   $num = $_GET['num'];
   $page = $_GET['page'];
   
   $userid = $_SESSION['userid'];
   
   
   if ($userid == "asdf")  
   {
      include "../dbcon.php";

      $sql = "delete from notice_board where num = $num";
      //mysql_query($sql, $connect);
	  mysqli_query($connect, $sql);
      mysqli_close($connect);
   }

   Header("Location:list.php?page=$page");
?>

