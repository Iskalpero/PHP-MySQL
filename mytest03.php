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
	echo("r_db 데이터베이스 선택 완료<br>");	
	/*
	$sql = "create table client("; //1
	$sql = $sql."name char(12) not null, "; //2
	$sql = $sql."id char(12) not null, "; //3
	$sql = $sql."email char(40))"; //4
	// -> 지금 $sql은 1+2+3+4의 문장이다
	// create table client(
	//		name char(12) not null,
	//		id char(12) not null,
	//		email char(40)
	//		) 와 같다.
	$result = mysqli_query($connect,$sql); 

	if(!$result){
		echo("client 테이블 생성에 실패했거나, 이미 동일한 이름의 테이블이 존재");
		exit;
	}
	echo("테이블 생성 성공");
	*/
	//다른사람이 보고 빠르게 알 수 있도록 짜야함	
	$sql = "Insert into client(name,id,email) values('이경희','khlee','뚝배기')";
	$result = mysqli_query($connect, $sql);
	
	if(!$result){
		echo("<br>삽입하는데 문제 발생");
		exit;
	}
	echo("<br>삽입 성공");
	
	
	
	mysqli_close($connect);
	// 쿼리문을 사용해 Mysql에 테이블을 넣음.
?>