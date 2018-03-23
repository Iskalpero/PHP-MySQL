<?php
$connect = mysqli_connect("localhost","root","12345") or die("접속이 안되요!");
$db_con = mysqli_select_db($connect, "iot_db"); /* 1. 여기 수정  */
$sql = "select no, title, user, hit from board "; /* 2. 여기 수정 */
$result = mysqli_query($connect, $sql);
$fnum =  mysqli_num_fields ($result );
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
mysqli_close($connect);
?>



