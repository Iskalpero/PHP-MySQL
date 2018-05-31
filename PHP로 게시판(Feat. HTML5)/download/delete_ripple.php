<?php
   include "../dbcon.php";
    
   $ripple_num = $_GET['ripple_num'];
   $num = $_GET['num'];
	
   $sql = "delete from down_ripple where num = $ripple_num";
   mysqli_query($connect, $sql);
   Header("Location:view.php?num=$num");
   mysqli_close($connect);
?>


