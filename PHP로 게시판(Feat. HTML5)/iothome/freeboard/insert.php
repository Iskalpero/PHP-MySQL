<?php

 $name=$_POST['name'];
 $passwd=$_POST['passwd'];
 $subject=$_POST['subject'];
 $content=$_POST['content'];
 
   /* 이전화면에서 이름이 입력되지 않았으면 
      "이름을 입력하세요" 메시지 출력*/
   if(!$name) {
     echo("
	   <script>
	     window.alert('이름을 입력하세요.')
	     history.go(-1)
	   </script>
	 ");
	 exit;
   }
   
   if(!$passwd) {
     echo("
	   <script>
	     window.alert('비밀번호를 입력하세요.')
	     history.go(-1)
	   </script>
	 ");
	 exit;
   }
   
   if(!$subject) {
     echo("
	   <script>
	     window.alert('제목을 입력하세요.')
	     history.go(-1)
	   </script>
	 ");
	 exit;
   }
   
   if(!$content) {
     echo("
	   <script>
	     window.alert('내용을 입력하세요.')
	     history.go(-1)
	   </script>
	 ");
	 exit;
   }
   
   include "../dbconn.php";       // dconn.php 파일을 불러옴

    $regist_day = date("Y-m-d (H:i)");  
   // 현재의 '년-월-일-시-분'을 저장
   //$ip = $REMOTE_ADDR;         // 방문자의 IP 주소를 저장
   $ip = $_SERVER['REMOTE_ADDR'];

   $sql = "insert into freeboard(name, passwd, subject, 
           content, regist_day, hit, ip) ";
   $sql .= "values('$name', '$passwd', '$subject', '$content', 
                   '$regist_day', 0, '$ip')";      
   // 레코드 삽입 명령
   
   //mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
   mysqli_query($connect,$sql);
  
	 //mysql_close();                // DB 연결 끊기
   mysqli_close($connect);   
   Header("Location:list.php");  // list.php 로 이동합니다.
?>

   
