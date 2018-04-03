<?php
	
	session_start();
	// 세션 시작

?>


<table xborder="1" width="90%" align="center">

	<tr><td><img src="images/ban_index.png"></td></tr>
	<tr>
		<td>
			<table xborder="1" width="100%" align="center">
				<tr>
					<td>
						<a href="./callanderex.php" target="main">
						<img src="images/btn_home.png"></a>
					</td>
<?php
	if($_SESSION['userid']){
		// userid가 세션에 존재할 경우. 여기서 if는 php분이므로 저렇게 열닫한다. 로그인 -> 로그아웃 변경
?> 
					<td>
						<a href="./logout.php" target="main">
						<img src="images/btn_logout.png"></a>
					</td>

<?php
	}else{ //userid가 존재하지 않을 경우. 로그인 버튼 유지
?>
					<td>
						<a href="./login_form.html" target="main">
						<img src="images/btn_login.png"></a>
					</td>
					<!--<td>
						<a href="./login_form.html" target="main"><img src="images/btn_login.png"></a>
					</td>-->
<?php			
	} // else문 종료.
?>

<?php
	if($_SESSION['userid']){ // 회원가입 -> 회원정보 변경.
?>
				<td>
					<a href="./member_mfrom.html" target="main">
					<img src="images/btn_modmem.png"></a>
				</td>
<?php
	}else{ // 회원가입 버튼 유지
?>
					<td><a href="./member_form.html" target="main"><img src="images/btn_addmem.png"></a></td>
					
<?php
	} // else문 종료.
?> 
					<td><a href="./guestbook/guestbook.php" target="main"><img src="images/btn_vbook.png"></a></td>
					<td><a href="" target="main"><img src="images/btn_board.png"></a></td>
					<td><a href="" target="main"><img src="images/btn_notice.png"></a></td>
					<td><a href="callanderex.php" target="main"><img src="images/btn_qna.png"></a></td>
					<td><a href="" target="main"><img src="images/btn_dboard.png"></a></td>
					<td><a href="" target="main"><img src="images/btn_qboard.png"></a></td>
				</tr>			
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<!--
			<iframe src="http://jafa.or.kr" target="main" name="main" width="100%" height="400px" frameborder="0">
			-->
			<iframe src="./callanderex.php" target="main" name="main" width="100%" height="400px">
			</iframe>
		</td>
	</tr>


</table>

