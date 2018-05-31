<?php
	
	session_start();
	
	$userid = $_SESSION['userid'];
	$username = $_POST['name'];
	$password = $_POST['passwd'];
	$sex = $_POST['sex'];
	$address = $_POST['address'];
	$phone1 = $_POST['phone1'];
	$phone2 = $_POST['phone2'];
	$phone3 = $_POST['phone3'];
	
	include "dbcon.php";
	
	$tel = $phone1."-".$phone2."-".$phone3;
	
		
	$sql = "update member set name = '$username', passwd = '$password', sex = '$sex', address = '$address' , tel = '$tel' where id = '$userid'";
	
	$result = mysqli_query($connect, $sql);
				
	if (!$result){
		echo("오류 발생.");
		exit;
	} 	
	else{
		echo("갱신에 성공하였습니다.");
	}
	
	
	mysqli_close($connect);
	
	Header("Location:callanderex.php");
	
?>