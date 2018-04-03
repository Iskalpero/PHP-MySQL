<?php
  $connect = mysqli_connect("localhost","root","12345");
    mysqli_select_db($connect,"iothome");
 
 $id=$_POST['id'];
 $passwd=$_POST['passwd'];
 
    $sql = "select * from member ";
    $sql = $sql."where id='$id' and passwd='$passwd' ";
    $result=mysqli_query($connect,$sql);
		$rnum = mysqli_num_rows($result);
		

    if ($rnum) {
        echo("로그인 성공!!");   
    } 
    else 
    {
       echo("로그인 실패!!");  
    }

    mysqli_close($connect);
		
		// 레코드를 삽입하고 다시 mysql_client2_array.php 로 돌아감
   //Header("Location:login_form.html"); 
?>