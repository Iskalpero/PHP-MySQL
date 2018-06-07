<?php
	
	session_start();

   $connect = mysqli_connect("localhost","root","12345");
    mysqli_select_db($connect,"iothome");
 
	 $id=$_POST['id'];
	 $passwd=$_POST['passwd'];
	 
 
    $sql = "select * from member ";
    $sql = $sql."where id='$id'";
    $result=mysqli_query($connect,$sql);
	$show = mysqli_fetch_array($result);
	
	if ($id != $show['id']){
				echo "
					<script>
						alert(\"존재하지 않는 ID입니다.\");
						window.location.replace('login_form.html');
					  </script>";
				exit;
	} 	
	else{		
			/*
			echo $show['passwd']."<br>";
			echo $passwd;
			*/
			if($passwd != $show['passwd']){
				echo"<script>
						alert(\"비밀번호가 일치하지 않습니다.\");
						window.location.replace('login_form.html');
					</script>";
				exit;
			}
			else{
				$name = $show['name'];
				$_SESSION['userid'] = $id;
				$_SESSION['username'] = $name;
			}
	}

    mysqli_close($connect);
		
	// 레코드를 삽입하고 다시 mysql_client2_array.php 로 돌아감
   //Header("Location:login_form.html"); 
?>
<script>
	alert("<?php echo $id; ?> 님, 로그인 되었습니다.");
	top.location.href = 'http://127.0.0.11/exphp/iothome/index.php';
</script>



