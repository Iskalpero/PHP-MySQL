<?php

	session_start();
	
	unset($_SESSION['userid']);
?>

<script>
	window.alert("로그아웃 되었습니다.");
	top.location.href = "http://127.0.0.11/Board_Test/index.php";
</script>