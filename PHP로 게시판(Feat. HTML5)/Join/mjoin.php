<?php
	session_start();
	    
	 $userid = $_SESSION['userid'];

	 
	  include "./dbcon.php";
	 
     $sql = "select * from member where id = '$userid'";
      //$result = mysql_query($sql, $connect);
	  $result = mysqli_query($connect, $sql);
   
      $row = mysqli_fetch_array($result);
	  
	  $tel = explode('-',$row['tel']);
	  
	  $phone1 = $tel[0];
	  $phone2 = $tel[1];
	  $phone3 = $tel[2];
	  
	  
	
	
?>

<!DOCTYPE html>
<html lang="ko">

<head>
	<title>회원정보수정</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/style.css" rel='stylesheet' type='text/css' media="all">
</head>

<body>
	<h1 class="header-w3ls">회원정보수정</h1>
		
		<div class="art-bothside">
		<div class="Up-sign-form text-center">
		<h2> 변경</h2>
		<p>회원정보를 수정해 주세요</p>
		</div>
		<form action="./update.php" method="post">
			<div class="mid-cls">
				<div class="art-left-w3ls">
							<div class="form-left-to-w3l">
								<p>아이디</p>
								<input type="text" name="id" placeholder="이름" required="" value = "<?php echo $userid ?>" disabled>
							</div>
							<div class="form-right-w3ls ">
								<p>비밀번호</p>
								<input type="password" name="passwd" placeholder="비밀번호" id="password" value = <?php echo $row['passwd']?> required="">
							</div>
							<div class="form-right-w3ls ">
								<p>비밀번호 재확인</p>
								<input type="password" placeholder="비밀번호 재확인" id="chk_passwd" name = "chk_passwd" value = <?php echo $row['passwd'] ?> required>
							</div>
							<div>
								<button type="reset">재입력</button>
							</div>
				</div>
				<div class="art-right-w3ls">
					
						<div class="main">
							<div class="form-left-to-w3l">
								<p>이름</p>
								<input type="text" name="name" placeholder="이름" value = <?php echo $row['name'] ?> required="">
							</div>
							<div class="form-left-w3l">
								<p>성별</p>
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
								
								
							</div>
							<div class="form-right-w3ls ">
								<p>핸드폰</p>
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
							</div>
							<div class="form-right-w3ls ">
								<p>주소입력</p>
								<input type="text" placeholder="주소입력" name="address" value = <?php echo $row['address'] ?>>
							</div>
							<div class="btnn">
								<button type="submit">정보수정</button><br>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</form>
		
		
		</body>
		</html>