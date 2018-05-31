<?php
 //echo "1"; 
 //exit;
 include "../dbconn.php";
 
 echo "<h1>insert.php 페이지 입니다.</h1>"; 
 
 $name=$_POST['name'];
 $passwd=$_POST['passwd'];
 $content=$_POST['content'];
 $regist_day = date("Y-m-d(H:i)");
 $ip = $_SERVER['REMOTE_ADDR'];
 
    $sql = "insert into guestbook (name, passwd, content, regist_day, ip) ";
    $sql = $sql."values ('$name','$passwd','$content','$regist_day','$ip')";
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
		
		// 레코드를 삽입하고 다시 gestbook.php 로 돌아감
   Header("Location:guestbook.php"); 
 ?>