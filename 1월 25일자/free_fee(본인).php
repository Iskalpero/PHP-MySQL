<?php
	
	//$age = 17;
	//$day = "주간";
	//$pay = -1;
	//echo("이름을 입력해주세요 : ")
	//$name = sscanf(
	
	
	// 할의욕있음 php에 입력하는 거 알아내서 이거 MySQL데이터하고 연동시켜서
	// MySQL에 신상정보가 저장되어 있다고 가정하고, 이름을 묻고 이에 답변하면
	// 요금이 나오게 하는방식?으로 해보는거
	/*
	
	일단 html태그를 이용해서 생성하나 해노은다음 이름값을 받아 이걸 sql문으로 select * from
		(정보테이블) where 이름이 입력한 이름과 일치하는 값을 받아내서
		
	(조건, 입력받는 이름들은, 해당 테이블내에 존재하는 이름과 레코드 갯수에 한정한다.)
	
	*/
	
	
	
	$link = mysqli_connect("127.0.0.12", "root", "12345", "r_db");
	//use r_db;까지 접근함

	if (!$link) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	} //저 4개의 조건 중 한개라도 부적합시 나오는 에러문구 처리
	
	if(!$db_con){
		echo("r_db 데이터베이스가 존재하지 않습니다.<br>");
		exit;
	}
	echo("r_db 데이터베이스 선택 완료<br>");	

	<form method="get">
		이름 : <input type = "text" /></br>
		<input type="submit" value="검색" />
	</form>
	

	/*
	 밑에 내용은 주어진 예제를 실습해본 것이고 위에 문구는 본인이 응용해본 것	
	*/
	
	
	if($day = "주간"){
		if($age >= 18)
			$pay = 20000;
		else if($age < 18 && $age >=7)
			$pay = 15000;
		else if($age <7 && $age >= 0)
			$pay = 0;
		else{
			echo(" 오류 발생 <br> ");
			exit;
		}
		echo("지불할 비용은 ".$pay. "입니다.<br>");
		
	}
	else if($day = "야간"){
		if($age >= 18)
			$pay = 150000;
		else if($age < 18 && $age >=7)
			$pay = 10000;
		else if($age <7 && $age >= 0)
			$pay = 0;
		else{
			echo(" 오류 발생 <br> ");
			exit;
		}
		echo("지불할 비용은 ".$pay. "입니다.<br>");
		
	}
	else
		echo("오류 발생<br>");
	
	mysqli_close($link);
	/*
	 13이상 / 2~13 / 2미만
	 (3만) 		(2만)	(1만)
	 등급 A(100) B(90) C(80) 퍼센트임
	 
	 
	*/
	
?>