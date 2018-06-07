<?php
   session_start();

   include "../dbcon.php";
   
   $num = $_GET['num'];
   $page = $_GET['page'];
   $passwd = $_POST['passwd'];
   
   $sql = "select passwd from freeboard where num=$num";
   $result = mysqli_query($connect , $sql);
   
   $row = mysqli_fetch_array($result); // 해당 레코드 가져옴 

   // $passwd : 사용자가 passwd_form.php 화면에서 입력한 값 
   // $row[passwd] : DB에 들어있는 값 
   if ($passwd != $row['passwd'] and $userid != "asdf")   
  // 관리자가 아니고 비밀번호가 틀리면
   {
      echo("
           <script>
             window.alert('비밀번호가 틀립니다.')
             history.go(-1)
           </script>
          ");
      exit;
   }
   else
   {
      $sql = "delete from freeboard where num = $num";
      //mysqli_query($sql, $connect);
	  mysqli_query($connect, $sql);
	
      mysqli_close($connect);
      Header("Location:board.php?page=$page");
   }

?>


