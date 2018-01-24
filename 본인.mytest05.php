<?php

	$connect = mysqli_connect("localhost","root","12345") or die("접속에 실패했습니다.");
	//mysql에 접속
	$db_con = mysqli_select_db($connect,"r_db");
	//use r_db;
	if(!$db_con){
		echo("r_db 데이터베이스가 존재하지 않습니다.<br>");
		exit;
	}
	
	
	$sql = "select *from mem";
	$result = mysqli_query($connect, $sql);
	
	
	$fnum = mysqli_num_fields($result);
	echo"<br> mem 테이블의 전체 필드 수 : ".$fnum."개";
	
	mysqli_close($connect);
?>