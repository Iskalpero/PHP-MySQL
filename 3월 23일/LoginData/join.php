<h2> 가입</h2>
<form action="join_processing.php" method="post">
<table width= 800 border=1 cellpadding=10>
	<tr>
		<td bgcolor=lightblue align=center>아이디</td>
		<td bgcolor=lightblue align=center>비밀번호</td>
	</tr>
	<tr>
		<form action="join_processing.php" method="post">
			<td bgcolor=lightblue align=center><input type="text" name="id" size="10" required autofocus></td>
			<td bgcolor=lightblue align=center><input type="password" name="pw" size="10" required></td>
			<td bgcolor=lightblue align=center><input type="submit" value="저장"></td>
		</form>
	</tr>
</table>
</form>