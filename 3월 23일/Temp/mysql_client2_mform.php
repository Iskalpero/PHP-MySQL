<?php
    $connect = mysqli_connect("localhost","root","12345");
    $db_con = mysqli_select_db($connect,"r_db");
    $mid=$_GET['mid'];
    $sql = "select * from client where id='$mid'";
    $result = mysqli_query($connect, $sql);
    $fields = mysqli_num_fields($result);
		
		$row = mysqli_fetch_array($result);
		
		//echo "$row[name]";
		$name=$row['name'];
		$id=$row['id'];
		$email=$row['email'];
		$sex=$row['sex'];
		$point=$row['point'];
		$grade=$row['grade'];
?>
<h2> mysqli_client2_form</h2>
<form action="mysql_client2_update.php" method="post">
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
		<td bgcolor=lightblue align=center><input type="text" name="name" size="10" autofocus value="<?=$name;?>"></td>
		<td bgcolor=lightblue align=center><input type="text" name="id" size="10"  value="<?=$id;?>"></td>
		<td bgcolor=lightblue align=center><input type="text" name="email" size="10" value="<?=$email;?>"></td>
		<td bgcolor=lightblue align=center><input type="text" name="sex" size="10" value="<?=$sex;?>"></td>
		<td bgcolor=lightblue align=center><input type="text" name="point" size="10" value="<?=$point;?>"></td>
		<td bgcolor=lightblue align=center><input type="text" name="grade" size="10" value="<?=$grade;?>"></td>
		<td bgcolor=lightblue align=center><input type="submit" value="저장"></td>
		<td bgcolor=lightblue align=center><input type="hidden" name="id_o" size="10" readonly value="<?=$id;?>"></td>
	</tr>
</table>
</form>