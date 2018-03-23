<?php
    /* delete record */
        
	  $connect = mysqli_connect("localhost","root","12345");
    mysqli_select_db($connect,"r_db");
    
		
    $delid=$_GET['delid'];   
    $sql = "delete from client where id='$delid'";
    $result=mysqli_query($connect,$sql);
	

    if (!$result) {
        echo("레코드 삭제 실패!!");
        exit;
    } 
    else 
    {
        echo("레코드 삭제 성공!!");
    }

    mysqli_close($connect);
		
// 레코드를 삭제하고 다시 mysql_client2_array.php 로 돌아감
   Header("Location:mysql_client2_array.php"); 
?>