<?php
   include "../dbcon.php";
   
   $singer = $_GET['singer'];
   
   $sql = "update survey set $singer = $singer + 1";
   //mysql_query($sql, $connect);
   mysqli_query($connect, $sql);
   mysqli_close($connect);

   Header("location:result.php");
?>

