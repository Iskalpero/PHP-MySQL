<?php
// MySQL 서버 접속
$connect = mysqli_connect("localhost","root","12345") or die("접속이 안되요!");
echo " MySQL 서버 접속성공!!!<br>";

// MySQL 사용할 데이터베이스 선택
$db_con = mysqli_select_db($connect, "r_db");
if(!$db_con)
 { 
    echo "DB 선택 실패!!!"; 
 } else {
	echo "DB 선택 성공!!!"; 	
 }	 

// SQL 문장 실행 1. 
//   MySQL 서버가 실행할 SQL 문자열 조립 => $sql 변수에 저장
 $sql = "select * from mem ";
 $sql = $sql."where sex='M'";
 
// MySQL 서버에게 SQL문장 실행을 요청하고 결과값 리턴받음
 $result = mysqli_query($connect, $sql);
 
 if(!$result){
	 echo("<br>SQL 문장 실행 실패!!!");
	 exit;
 } else {
     echo("<br>SQL 문장 실행 성공!!!");
 }
 
 $rnum =  mysqli_num_rows ($result );
 echo "<br> 리턴된 남자회원 레코드수: ".$rnum."개";
//  SQL 문장 실행 2. 끝

// SQL 문장 실행 2. 
//   MySQL 서버가 실행할 SQL 문자열 조립 => $sql 변수에 저장
 $sql = "select * from mem ";
 $sql = $sql."where sex='W'";
 
// MySQL 서버에게 SQL문장 실행을 요청하고 결과값 리턴받음
 $result = mysqli_query($connect, $sql);
 
 if(!$result){
	 echo("<br>SQL 문장 실행 실패!!!");
	 exit;
 } else {
     echo("<br>SQL 문장 실행 성공!!!");
 }
 
 $rnum =  mysqli_num_rows ($result );
 echo "<br> 리턴된 여자회원 레코드수: ".$rnum."개";
//  SQL 문장 실행 2. 끝
 
mysqli_close($connect);
?>



