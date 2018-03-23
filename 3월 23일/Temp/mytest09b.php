<?php
// MySQL 서버 접속
$connect = mysqli_connect("localhost","root","12345") or die("접속이 안되요!");
//echo " MySQL 서버 접속성공!!!<br>";

// MySQL 사용할 데이터베이스 선택
$db_con = mysqli_select_db($connect, "iot_db"); /* 1. 여기 수정  */
if(!$db_con)
 { 
    echo "DB 선택 실패!!!"; 
 } else {
	//echo "DB 선택 성공!!!"; 	
 }	 

// SQL 문장 실행 1. 
//   MySQL 서버가 실행할 SQL 문자열 조립 => $sql 변수에 저장
 $sql = "select no, title, user, hit from board "; /* 2. 여기 수정 */
// MySQL 서버에게 SQL문장 실행을 요청하고 결과값 리턴받음
 $result = mysqli_query($connect, $sql);
 if(!$result){
	 echo("<br>SQL 문장 실행 실패!!!");
	 exit;
 } else { /*echo("<br>SQL 문장 실행 성공!!!"); */ }
 /*
 $rnum =  mysqli_num_rows ($result );
 echo "<br> 리턴된 회원 레코드수: ".$rnum."개";
 */
 $fnum =  mysqli_num_fields ($result );
 //echo "<br> 테이블이 가지고있는 필드수: ".$fnum."개";
 echo "<table width=800 border=1 cellpadding=10> ";
 echo "<tr>";
 echo "<td>번호</td><td>글제목</td><td>작성자</td><td>조회수</td>"; /* 3. 여기 수정 */
 echo "</tr>";
 while($row=mysqli_fetch_row($result))
 {
	 echo "<tr>";
	 for($i=0;$i<$fnum;$i++)
	 { echo "<td>$row[$i]</td>"; }
     echo "</tr>";  
 } 
 echo "</table>"; 
//  SQL 문장 실행 1. 끝
mysqli_close($connect);
?>



