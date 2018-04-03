<?php
	
	include "../dbcon.php";
	
	$num = $_POST['num'];
	
	$sql = "select passwd from guestbook where num='$num'";
	$result = mysqli_query($connect, $sql);
	
	$row = mysqli_fetch_array($result);

	$passwd = $_POST['passwd'];
	
	echo "row[passwd]=".$row['passwd']."<br>";

	if($passwd == $row['passwd']){
		
		$sql = "delete from guestbook where num = '$num'";
		$result_del = mysqli_query($connect, $sql);
		
		if(!$result_del){
			echo("<script>
					window.alert('오류 발생.');
					history.go(-1);
					</script>");
		}
		else{
			echo("<script>
					window.alert('삭제 성공');
					history.go(-2);
				</script>");
		}
		
	}
	
	else{
		
		echo ("
				<script>
					window.alert('비밀번호가 틀립니다.');
					history.go(-1)
				</script>
			 ");
		exit;
	}
	// history.go의 기본값은 -1이다.
	mysqli_close($connect);
?>