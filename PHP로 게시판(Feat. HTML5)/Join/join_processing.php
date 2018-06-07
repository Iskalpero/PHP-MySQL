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
			$id_check = mysqli_fetch_array($result);
			//중복값이 존재하면 한 줄을 읽어올 것이다. 이걸로 판정때린다.
			if($id_check['id'] == $id){
				echo "<script>
						alert(\"중복되는 ID입니다.\");
						window.location.replace('join.php');
					  </script>";
				exit;
			}
			else{
				$sql = "insert into logindb (id, password) values ('$id', '$pw')";
				$result = mysqli_query($connect, $sql);
				if (!$result){
					echo("오류 발생.");
					exit;
				} 	
				else{
					echo("등록에 성공하였습니다.");
				}
			}
			mysqli_close($connect);
		?>
		
	</body>

</html>
