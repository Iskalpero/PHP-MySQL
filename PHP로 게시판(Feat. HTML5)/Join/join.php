<!DOCTYPE html>
<html lang="ko">

<head>
	<title>회원가입</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Art Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
	/>
	<link href="css/style.css" rel='stylesheet' type='text/css' media="all">
	<script>
		function child(){
			
			document.getElementById("id2").value = 0;
			var chk_id = document.getElementById("id").value; 
			
			if(chk_id == ""){
				alert("아이디를 입력해주세요");
				exit;
			}
			
			ifrm1.location.href="join_chk.php?userid="+chk_id; 
			
		}
	
	</script>
</head>

<body>
	<h1 class="header-w3ls">회원가입</h1>
		
		<div class="art-bothside">
		<div class="Up-sign-form text-center">
		<h2> 등록</h2>
		<p>회원가입에 필요한 정보를 입력해 주세요</p>
		</div>
		<form action="./insert.php" method="post">
			<div class="mid-cls">
				<div class="art-left-w3ls">
							<div class="form-left-to-w3l">
								<p>아이디</p>
								<input type="text" name="id" placeholder="이름" id="id" required="">
								<input type="button" value="중복체크" onclick=child()>
								<input type="hidden" name="id2" id="id2" value="0">
							</div>
							<div class="form-right-w3ls ">
								<p>비밀번호</p>
								<input type="password" name="passwd" placeholder="비밀번호" id="password" required="">
							</div>
							<div class="form-right-w3ls ">
								<p>비밀번호 확인</p>
								<input type="password" placeholder="비밀번호 확안" name = "chk_passwd" id="chk_passwd" required>
							</div>
							<div>
								<button type="reset">재입력</button>
							</div>
				</div>
				<div class="art-right-w3ls">
					
						<div class="main">
							<div class="form-left-to-w3l">
								<p>이름</p>
								<input type="text" name="name" placeholder="이름" required="">
							</div>
							<div class="form-left-w3l">
								<p>성별</p>
								<input type = radio name=sex value="M" checked>남
						        <input type = radio name=sex value="W">여
							</div>
							<div class="form-right-w3ls ">
								<p>핸드폰</p>
									<select name="phone1">
										<option disabled >선택</option>
										<option selected>010</option>
										<option >011</option>
										<option >017</option>
											<option >018</option>
									</select>
								- <input type="number" step="1" size="4" maxlength="4" minlength="3" name="phone2">
								- <input type="number" size="4" max="9999" min="0"  name="phone3">
							</div>
							<div class="form-right-w3ls ">
								<p>주소입력</p>
								<input type="password" placeholder="주소입력" id="address" >
							</div>
							<div class="btnn">
								<button type="submit">회원가입</button><br>
							</div>
							
								<iframe src="" id="ifrm1" scrolling=no frameborder=no width=0 height=0 name="ifrm1">
								</iframe>
							
						</div>	
					</div>
				</div>
			</div>
		</form>
		
		
		</body>
		</html>