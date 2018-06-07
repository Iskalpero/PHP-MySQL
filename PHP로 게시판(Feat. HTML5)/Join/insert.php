<?php

	$connect = mysqli_connect("localhost", "root" , "12345") or die("연결 실패");
	mysqli_select_db($connect, "iothome");
	
	$id=$_POST['id'];
	$passwd=$_POST['passwd'];
	$name=$_POST['name'];
	$sex=$_POST['sex'];
	$phone1=$_POST['phone1'];
	$phone2=$_POST['phone2'];
	$phone3=$_POST['phone3'];
	$address=$_POST['address'];
	$id2 = $_POST['id2'];
	$chk_passwd= $_POST['chk_passwd'];
	
	$tel = $phone1."-".$phone2."-".$phone3;
	
	//$connect = mysqli_connect("localhost", "root" , "12345") or die("연결 실패");
	//mysqli_select_db($connect, "iothome");
	

	if($id2 != 1){
		echo"
			<script>
				alert('중복체크를 해주세요');
				history.go(-1);
			</script>
			";
		exit;	
	}
	
	if($password != $chk_passwd){
		echo"
			<script>
				alert('비밀번호와 비밀번호재확인이 일치하지 않습니다.');
				history.go(-1);
			</script>
			";
		exit;	
		
	}	
	
	$sql = "INSERT INTO member (id, passwd, name, sex, tel, address) VALUES ('$id', '$passwd', '$name', '$sex', '$tel', '$address')";
	//"INSERT INTO `member` (`    id`, `    passwd`, `    name`, `    sex`, `    tel`, `    address`) VALUES ('$id', '$passwd', '$name', '$sex', '$tel', '$address')";
	$result = mysqli_query($connect, $sql);
	
	if (!$result){
		echo("오류 발생.");
		mysqli_close($connect);
		exit;
	} 	
	else{
		mysqli_close($connect);
		echo "
			<script>
				alert('회원가입이 완료되었습니다. 로그인해주세요.');
				top.location.href = 'http://192.168.0.11/Board_Test/index.php';
			</script>
		";
	}
	
	
	
	
	
?>