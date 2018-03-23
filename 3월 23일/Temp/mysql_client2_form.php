<h2> mysqli_client2_form</h2>
<form action="mysql_client2_forminput.php" method="post">
<table width= 800 border=1 cellpadding=10>
<tr>
<td bgcolor=lightblue align=center>이름</td>
<td bgcolor=lightblue align=center>아이디</td>
<td bgcolor=lightblue align=center>이메일</td>
<td bgcolor=lightblue align=center>성별</td>
<td bgcolor=lightblue align=center>포인트</td>
<td bgcolor=lightblue align=center>등급</td>
<td bgcolor=lightblue align=center>처리</td>
</tr>
<tr>
<td bgcolor=lightblue align=center><input type="text" name="name" size="10" autofocus></td>
<td bgcolor=lightblue align=center><input type="text" name="id" size="10" required></td>
<td bgcolor=lightblue align=center><input type="text" name="email" size="10"></td>
<td bgcolor=lightblue align=center><input type="text" name="sex" size="10"></td>
<td bgcolor=lightblue align=center><input type="text" name="point" size="10"></td>
<td bgcolor=lightblue align=center><input type="text" name="grade" size="10"></td>
<td bgcolor=lightblue align=center><input type="submit" value="저장"></td>
</tr>
</table>
</form>