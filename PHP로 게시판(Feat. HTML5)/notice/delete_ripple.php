<?php
      include "../dbcon.php";
		
	 $ripple_num = $_GET['ripple_num'];
	 $num = $_GET['num'];
		
		
      $sql = "delete from notice_ripple where num = $ripple_num";
      //mysql_query($sql, $connect);
	  mysqli_query($connect, $sql);
      Header("Location:view.php?num=$num");
      mysql_close();
?>


