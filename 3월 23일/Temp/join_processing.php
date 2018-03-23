<!doctype html>

<html>

	<head>
		<meta charset="utf-8">
		<title> 로그인 성공여부 </title>
	</head>
	
	
	<body>
		<?php
			
			$connect = mysqli_connect("localhost", "root" , "12345") or die("연결 실패");
			mysqli_select_db($connect, "login");
			
			$id = $_POST['id'];
			$pw = $_POST['pw'];
			
			$sql = "select id from logindb where id='$id'";
			$result = mysqli_query($connect, $sql);
			
			$sql = "insert into logindb (id, password) values ('$id', '$pw')";
			$result = mysqli_query($connect, $sql);
			if (!$result){
				echo("존재하지 않는 ID입니다.");
				exit;
			} 	
			else{
				echo("등록에 성공하였습니다.");
			}
			mysqli_close($connect);
		?>
		
	</body>

</html>
