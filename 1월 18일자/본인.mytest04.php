<?php
		//
		// DB 쿼리문 사용
	$connect = mysqli_connect("localhost","root","12345") or die("접속에 실패했습니다.");
	//mysql에 접속
	$db_con = mysqli_select_db($connect,"r_db");
	//use r_db;
	if(!$db_con){
		echo("r_db 데이터베이스가 존재하지 않습니다.<br>");
		exit;
	}
	
	/*
	$sql = "select * from mem "; //1
	$sql = $sql."where sex = 'M'"; //2
	$result = mysqli_query($connect,$sql); 

	if(!$result){
		echo("<br> 실패");
		exit;
	}
	
	$rnum = mysqli_num_rows($result);
	echo "<br>리턴된 남자 레코드 수 : ".$rnum;
	
	
	$sql = "select * from mem "; //1
	$sql = $sql."where sex = 'W'"; //2
	$result = mysqli_query($connect,$sql); 

	if(!$result){
		echo("<br> 실패");
		exit;
	}
	
	
	$rnum = mysqli_num_rows($result);
	echo "<br>리턴된 여자 레코드 수 : ".$rnum;
	*/
	
	mysqli_close($connect);
?>