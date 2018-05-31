<?php
  session_start();
  $connect = mysqli_connect("localhost","root","12345");
    mysqli_select_db($connect,"iothome");
 
 $id=$_POST['id'];
 $passwd=$_POST['passwd'];
 
    $sql = " select * from member ";
    $sql = $sql." where id='$id' and passwd='$passwd' ";
    $result=mysqli_query($connect,$sql);
		$rnum = mysqli_num_rows($result);
		// echo " $rnum <br>";
   
    if (!$rnum) {
						echo("로그인 실패!!"); 
						Header("Location:login_form.html"); 
						exit;
				/*
           echo(" 
                    <script> 
                       window.alert('로그인실패!!!.'); 
                        history.go(-1); 
                    </script> 
               "); 
          exit;
         */ 				
    } 
    else 
    {
        echo("로그인 성공!!"); 
				$_SESSION['userid']=$id;
    }
    
    mysqli_close($connect);
		
  // Header("Location:index.php"); 
?>
<script>
window.alert("로그인 되었습니다.");
top.location.href = "http://127.0.0.1/iothome/index.php";
</script>