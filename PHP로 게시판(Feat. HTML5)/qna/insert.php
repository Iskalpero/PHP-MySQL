﻿<?php
   session_start();
   $userid = $_SESSION['userid'];
   $username = $_SESSION['username'];
   $subject = $_POST['subject'];
   $content = $_POST['content'];
   $num = $_GET['num'];
   $page = $_GET['page'];
	
   if(!$userid) {  
     echo("
	   <script>
	     window.alert('로그인 후 사용하세요.')
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
   } // id / 제목 / 내용 유무 체크 
    
   include "../dbcon.php";

   $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
   $ip = $_SERVER['REMOTE_ADDR'];         // 방문자의 IP 주소를 저장

   if (!$num) // $num 이 (if)이면 원글, 1(else)이면 댓글
   
   {    // 답변을 할떄는 원글의 num값을 가져옴.
       // 
      $depth = 0;   // depth, ord 를 0으로 초기화(not null)
      $ord = 0; 

      // 레코드 삽입(group_num 제외)
      $sql = "insert into qna_board(depth, ord, id, name, subject,";
      $sql .= "content, regist_day, hit, ip) ";
      $sql .= "values($depth, $ord, '$userid', '$username', '$subject',";
      $sql .= "'$content', '$regist_day', 0, '$ip')";    
      //mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
	  mysqli_query($connect, $sql);

      // 최근 auto_increment 필드(num) 값 가져오기
      $sql = "select last_insert_id()"; 
      //$result = mysql_query($sql, $connect);
	  $result = mysqli_query($connect, $sql);
      $row = mysqli_fetch_array($result);
      $auto_num = $row[0]; 

      // group_num 값 업데이트 
      $sql = "update qna_board set group_num = $auto_num where num=$auto_num";
      //mysql_query($sql, $connect);
	  mysqli_query($connect, $sql);
   }
    else // 
   {
      // 부모 글 가져오기
      $sql = "select * from qna_board where num = $num";
      //$result = mysql_query($sql, $connect);
	  $result = mysqli_query($connect, $sql);
      $row = mysqli_fetch_array($result);

      // 부모 글로 부터 group_num, depth, ord 값 설정
      $group_num = $row[group_num];
      $depth = $row[depth] + 1;
      $ord = $row[ord] + 1;

      // 해당 그룹에서 ord 가 부모글의 ord($row[ord]) 보다 큰 경우엔
      // ord 값 1 증가 시킴
      $sql = "update qna_board set ord = ord + 1 where group_num = $row[group_num] 
              and ord > $row[ord]";
      //mysql_query($sql, $connect);  
	  mysqli_query($connect, $sql);

      // 레코드 삽입
      $sql = "insert into qna_board(group_num, depth, ord, id, name, subject,";
      $sql .= "content, regist_day, hit, ip) ";
      $sql .= "values($group_num, $depth, $ord, '$userid', '$username', '$subject',";
      $sql .= "'$content', '$regist_day', 0, '$ip')";    

      //mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
	  mysqli_query($connect, $sql);

   }
      mysqli_close($connect);                // DB 연결 끊기
   
      Header("Location:list.php?page=$page");  // list.php 로 이동합니다.
?>

   
