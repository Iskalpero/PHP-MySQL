<?php
	
	/*
	$link = mysqli_connect("127.0.0.12","root","12345","r_db");
	//mysqli_connect함수에서 들어가는건(ip주소,mysql 아이디, mysql 비번, 사용할 DB, 포트(선택));
	
	if (!$link) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
		//mysql에 root계정으로 접속함과 동시에 use r_db까지 한번에 접근함
	}
	//PHP_EOL = c언어에서 \n을 의미 (ex printf("\n");)
	echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
	echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;
	
	
	
	
	
	
	mysqli_close($link);
	*/
	
	$connect = mysqli_connect("localhost","root","12345");
	$dbname = mysqli_create_db("Sample","$connect");
	
	if(!$dbname){
		echo("오류");
		exit;
	}
	
	echo("DB 생성 완료");
	mysqli_close($connect);
	
	
	// 위에방식이 한문장에 접속하는 방식이라면 밑에방식은 단계별 접속.
	
	
	
	
	
	
	/*
	$connect = mysqli_connect("localhost","root","12345") or die("접속에 실패했습니다.");
	//mysql에 접속
	$db_con = mysqli_select_db($connect,"r_db");
	//use r_db;
	if(!$db_con){
		echo("r_db 데이터베이스가 존재하지 않습니다.<br>");
		exit;
	}
	echo("r_db 데이터베이스 선택 완료<br>");		
	
	mysqli_close($connect);
	*/
	
?>
	