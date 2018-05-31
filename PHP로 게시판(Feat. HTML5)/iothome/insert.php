<?php
  $connect = mysqli_connect("localhost","root","12345");
    mysqli_select_db($connect,"iothome");
 
 echo "<h1>insert.php 페이지 입니다.</h1>"; 
 
 $id=$_POST['id'];
 $passwd=$_POST['passwd'];
 $name=$_POST['name'];
 $sex=$_POST['sex'];
 $phone1=$_POST['phone1'];
 $phone2=$_POST['phone2'];
 $phone3=$_POST['phone3'];
 $address=$_POST['address'];
 
 $tel = $phone1."-".$phone2."-".$phone3;

    $sql = "insert into member (id, passwd, name, sex, tel, address) ";
    $sql = $sql."values ('$id', '$passwd', '$name', '$sex', '$tel', '$address')";
    $result=mysqli_query($connect,$sql);
		

    if (!$result) {
        echo("레코드 삽입 실패!!");
        exit;
    } 
    else 
    {
        echo("레코드 삽입 성공!!");
    }

    mysqli_close($connect);
		
		// 레코드를 삽입하고 다시 mysql_client2_array.php 로 돌아감
   Header("Location:login_form.html"); 
 ?>