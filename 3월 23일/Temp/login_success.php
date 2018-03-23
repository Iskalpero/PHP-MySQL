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
			
			$id = $_POST['name'];
			$pw = $_POST['pw'];
			
			$sql = "Select * from logindb where id='$id'";
			$result = mysqli_query($connect, $sql);
			$show = mysqli_fetch_array($result);
			if ($id != $show['id']){
				echo("존재하지 않는 ID입니다.");;
				exit;
			} 	
			else{
				if($pw != $show['password']){
					echo("비밀번호가 틀립니다.");
					exit;
				}
				else{
					echo("로그인에 성공하였습니다.");
				}
			}
			mysqli_close($connect);
		?>
		
	</body>

</html>
