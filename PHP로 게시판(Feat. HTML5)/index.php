<?php
	session_start();
	
?>
<!doctype html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<link href= "./css/index_style.css", rel = "stylesheet" type="text/css">
		<title> Index </title>	
	</head>
	
	<body>
		<div id = "container">
			<nav id = "top">
				<section id = "main">
					<a href = "./index.php"><img src = "./images/main_02.gif"></a>
				</section>
			</nav>
			<section id = "menu">
				<ul>
					<?php
						if($_SESSION['userid']){
						// userid가 세션에 존재할 경우. 여기서 if는 php분이므로 저렇게 열닫한다. 로그인 -> 로그아웃 변경
					?>
					<li>
						<a href="./logout.php" target="main">로그아웃</a>
						<ul>
							<li><a href="./join/mjoin.php" target="main">정보수정</a></li>
							<li><a href="#">예시</a></li>
							<li><a href="#">예시</a></li>
						</ul>
					</li>
					<?php
						}else{
					?>
						<li>
							<a href="./login.html" target="main">로그인</a>
							<ul>
								<li><a href="./join/join.php" target="main">회원가입</a></li>
							</ul>
						</li>
					<?php
						}
					?>
					
					<li>
						<a href="./freeboard/board.php" target="main">커뮤니티</a>
						<ul>
							<li><a href="./freeboard/board.php" target="main">자유게시판</a></li>
							<li><a href="./guestbook/guestbook.php" target="main">방명록</a></li>
							<li><a href="./download/list.php" target="main">자료실</a></li>
						</ul>
					</li>
					<li>
						<a href="./notice/list.php" target="main">공지사항</a>
						<ul>
							<li><a href="#">예시</a></li>
							<li><a href="#">예시</a></li>
							<li><a href="#">예시</a></li>
						</ul>
					</li>
					<li>
						<a href="./qna/list.php" target="main">FAQ</a>
						<ul>
							<li><a href="#">예시</a></li>
							<li><a href="#">예시</a></li>
							<li><a href="#">예시</a></li>
						</ul>
					</li>
					<li>
						<a href="./survey/survey.php" target="main">설문조사</a>
						<ul>
							<li><a href="#">예시</a></li>
							<li><a href="#">예시</a></li>
							<li><a href="#">예시</a></li>
						</ul>
					</li>
					<li>
						<a href="./Ap/index.html" target="main">프로그래밍 능력</a>
						<ul>
							<li><a href="#">예시</a></li>
							<li><a href="#">예시</a></li>
							<li><a href="#">예시</a></li>
						</ul>
					</li>
				</ul>			
			</section>
			<section>
				<iframe src="./iframe_main.html" target="main" name="main">
				</iframe>
				
			</section>
		</div>
	</body>
</html>