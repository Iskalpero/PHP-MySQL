<?php

	session_start();
	    
	 $userid = $_SESSION['userid'];

	 
	  include "dbcon.php";
	 
     $sql = "select * from member where id = '$userid'";
      //$result = mysql_query($sql, $connect);
	  $result = mysqli_query($connect, $sql);
   
      $row = mysqli_fetch_array($result);
	  
	  $tel = explode('-',$row['tel']);
	  
	  $phone1 = $tel[0];
	  $phone2 = $tel[1];
	  $phone3 = $tel[2];
	  
	  
	  
?>



<html>
	<head>
		<meta charset="utf-8">
		<title>회원정보 수정</title>
	</head>
	
	
	<body>
		<h1> 정 보 수 정 </h1>
		<form name="member_form" action="./update.php" method="post">
			<table width="100%" border="1">
				<tr>
					<th><span style="color:red">*</span>아이디</th>
					<td>
						<input type="text" size="12" maxlength="12" name="id" required value = <?php echo $userid ?> disabled>
					</td>
				</tr>
				<tr>
					<th><span style="color:red">*</span>비밀번호</th>
					<td>
						<input type="password" size="10" maxlength="10" required name="passwd" value = <?php echo $row['passwd'] ?>
                   						placeholder="비밀번호는 10자리까지">	
					</td>
				</tr>
				<tr>
					<th><span style="color:red">*</span>비밀번호 확인</th>
					<td>
						<input type="password" size="10" maxlength="10" required name="passwd_confirm" value = <?php echo $row['passwd'] ?>
						placeholder="비밀번호 재입력">	
					</td>
				</tr>
				<tr>
					<th><span style="color:red">*</span>이름</th>
					<td>
						<input type="text" size="20" maxlength="20" required name="name" value = <?php echo $row['name'] ?> >	
					</td>
				</tr>
				<tr>
					<th><span style="color:red">*</span>성별</th>
					<td>
						<?php
							if($row['sex'] == 'M'){
								?>
								<input type = radio name=sex value="M" checked>남
								<input type = radio name=sex value="W">여
						<?php
							}
							else{
						?>
							<input type = radio name=sex value="M">남
							<input type = radio name=sex value="W" checked>여
						<?php
							}
						?>
					</td>
				</tr>
				<tr>
					<th>휴대전화</th>
					<td>
						<?php 
							if($phone1 == '010'){
						?>
							<select name="phone1">
								<option disabled >선택</option>
								<option selected>010</option>
								<option >011</option>
								<option >017</option>
								<option >018</option>
							</select>
						<?php
							}
							else if($phone1 = '011'){
						?>
							<select name="phone1">
								<option disabled >선택</option>
								<option >010</option>
								<option selected>011</option>
								<option >017</option>
								<option >018</option>
							</select>
						<?php
							}
							else if($phone1 = '017'){
						?>
							<select name="phone1">
								<option disabled >선택</option>
								<option >010</option>
								<option >011</option>
								<option selected>017</option>
								<option >018</option>
							</select>
						<?php
							}
							else{
						?>
							<select name="phone1">
								<option disabled >선택</option>
								<option >010</option>
								<option >011</option>
								<option >017</option>
								<option selected>018</option>
							</select>
						<?php
							}
						?>
						- <input type="number" step="1" size="4" maxlength="4" minlength="3" name="phone2" value = <?php echo $phone2 ?> >
						- <input type="number" size="4" max="9999" min="0"  name="phone3" value = <?php echo $phone3 ?> >
						<!-- 숫자만 입력시키기 위해서는 type="number"와 step="1"(숫자 간격명령어) 설정이 필요하다. 이유는 모른다. -->
						<!-- 4자리수로 하려면 max & min으로 범위를 조절하면 된다. ex) min=0; max=9999;-->
					</td>
		<!-- 여기서 휴대번호에 숫자만 입력되도록 해야된다는 자바스크립트 써야됨-->
				</tr>
				<tr>
					<th>주소</th>
					<td>
						<input type="text" size="50" maxlength="90" name="address" value = "<?php echo $row['address'] ?>" >
					</td>
				</tr>
				<tr>
					<th>처리</th>
					<td>
						<input type="submit" value="수정완료">
						<input type="reset" value="재작성">
					</td>
				</tr>
			</table>
		</form>	
	</body>
<?php
	mysqli_close($connect);
?>
</html>