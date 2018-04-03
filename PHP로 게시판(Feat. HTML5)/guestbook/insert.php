<?php
  include "../dbcon.php";
  
 $name=$_POST['name'];
 $passwd=$_POST['passwd'];
 $content=$_POST['content'];
 $regist_day = date("Y-m-d(H:i)");
 $ip = $_SERVER['REMOTE_ADDR'];
 
   $sql = "insert into guestbook (name, passwd, content, regist_day, ip) 
			values ('$name', '$passwd', '$content', '$regist_day', '$ip') ";

   $result= mysqli_query($connect,$sql) or die("E");
   
	

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
   Header("Location:guestbook.php"); 
 ?>