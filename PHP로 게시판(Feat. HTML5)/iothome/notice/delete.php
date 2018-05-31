<?php
   session_start();
   
	 $userid = $_SESSION['userid'];
	 
	 $num = $_GET['num'];
	 $page = $_GET['page'];
	 
   if ($userid == "admin1234")  
   {
      include "../dbconn.php";

      $sql = "delete from notice_board where num = $num";
      mysqli_query($connect,$sql);
      mysqli_close($connect);
   }

   Header("Location:list.php?page=$page");
?>

