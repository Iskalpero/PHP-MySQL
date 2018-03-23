<?php
    /* insert record */
        
	  $connect = mysqli_connect("localhost","root","12345");
    mysqli_select_db($connect,"r_db");
   
	  $name=$_POST['name'];
		$id=$_POST['id'];
		$email=$_POST['email'];
		$sex=$_POST['sex'];
		$point=$_POST['point'];
		$grade=$_POST['grade'];
		
     
    $sql = "insert into client values";
    $sql = $sql."('$name', '$id', '$email', '$sex', $point, '$grade')";
    $result=mysqli_query($connect,$sql);
		

    if (!$result) {
        echo("레코드 삽입 실패!!");
        exit;
    } 
    else 
    {
        echo("레코드 삽입 성공!!");
    }

    mysqli_close($connect);
		
		// 레코드를 삽입하고 다시 mysql_client2_array.php 로 돌아감
   Header("Location:mysql_client2_array.php"); 
?>