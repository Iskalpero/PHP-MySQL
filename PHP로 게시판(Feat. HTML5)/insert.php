<?php

	$connect = mysqli_connect("localhost", "root" , "12345") or die("연결 실패");
	mysqli_select_db($connect, "iothome");
	
	$id=$_POST['id'];
	$passwd=$_POST['passwd'];
	$name=$_POST['name'];
	$sex=$_POST['sex'];
	$phone1=$_POST['phone1'];
	$phone2=$_POST['phone2'];
	$phone3=$_POST['phone3'];
	$address=$_POST['address'];
	
	$tel = $phone1."-".$phone2."-".$phone3;
	
	//$connect = mysqli_connect("localhost", "root" , "12345") or die("연결 실패");
	//mysqli_select_db($connect, "iothome");
	
	
	
	$sql = "INSERT INTO member (id, passwd, name, sex, tel, address) VALUES ('$id', '$passwd', '$name', '$sex', '$tel', '$address')";
	//"INSERT INTO `member` (`    id`, `    passwd`, `    name`, `    sex`, `    tel`, `    address`) VALUES ('$id', '$passwd', '$name', '$sex', '$tel', '$address')";
	$result = mysqli_query($connect, $sql);
	
	if (!$result){
		echo("오류 발생.");
		exit;
	} 	
	else{
		echo("등록에 성공하였습니다.");
	}
	
	
	mysqli_close($connect);
	
	
?>