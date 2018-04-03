<!doctype html>

<html>

	<head>
		<meta charset="utf-8">
		<title> 로그인 성공여부 </title>
	</head>
	
	<!--
		3/23 로그인 php서버와 연동해서 회원가입(등록) / 로그인 검증 가능
		3/26 alert기능을 이용해서 출력 / 로그인 페이지로 돌아가기 (진행중)
		http://hammer.tistory.com/entry/MYSQL-%EC%BB%AC%EB%9F%BC-%EC%9E%90%EB%8F%99%EC%A6%9D%EA%B0%80-%EC%86%8D%EC%84%B1-%EB%B3%80%EA%B2%BD-%EB%B0%8F-%EC%B6%94%EA%B0%80-%EC%B4%88%EA%B8%B0%ED%99%94-%EC%BF%BC%EB%A6%AC
		sql 관련.
	-->
	<body>
		<?php
			// alert으로 팝업창으로 메시지를 출력시킬 수 있고,
			// window.location.replace(경로)를 통해 php는 페이지 이동이 가능하다.
			$connect = mysqli_connect("localhost", "root" , "12345") or die("연결 실패");
			mysqli_select_db($connect, "login");
			
			$id = $_POST['name'];
			$pw = $_POST['pw'];
			
			$sql = "Select * from logindb where id='$id'";
			$result = mysqli_query($connect, $sql);
			$show = mysqli_fetch_array($result);
			if ($id != $show['id']){
				echo "<script>
						alert(\"존재하지 않는 ID입니다.\");
						window.location.replace('login.html');
					  </script>";
				exit;
			} 	
			else{
				if($pw != $show['password']){
					echo"<script>
							alert(\"존재하지 않는 비밀번호입니다.\");
							window.location.replace('login.html');
						</script>";
					exit;
				}
				else{/*로그인에 성공할 경우 쿠키 생성*/
					echo"<script>
							alert(\"환영합니다. $id. 님.\");
							//setcookie($id,$pw,time()+360);
							window.location.replace('http://won5072.dothome.co.kr');
						</script>";
				}
			}
			mysqli_close($connect);
		?>
		
	</body>

</html>
