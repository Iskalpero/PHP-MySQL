<?php
  session_start();
	unset($_SESSION['userid']);
  //Header("Location:index.php"); 
?>
<script>
window.alert("로그아웃 되었습니다.");
top.location.href = "http://127.0.0.1/iothome/index.php";
</script>