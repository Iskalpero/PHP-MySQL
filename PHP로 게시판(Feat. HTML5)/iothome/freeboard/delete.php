<?php
   session_start();

   include "../dbconn.php";
   
	 $num=$_GET['num'];
   $page=$_GET['page'];
   $passwd=$_POST['passwd'];	 
  
   $sql = "select passwd from freeboard where num=$num";
   //$result = mysql_query($sql, $connect);
	 $result =mysqli_query($connect,$sql);
   $row = mysqli_fetch_array($result); // 해당 레코드 가져옴 

   // $passwd : 사용자가 passwd_form.php 화면에서 입력한 값 
   // $row[passwd] : DB에 들어있는 값 
	 $userid=$_SESSION['userid'];
   if ($passwd != $row['passwd'] and $userid != "admin1234")   
  // 관리자가 아니고 비밀번호가 틀리면
   {
		  // echo "관리자가 아니거나 비밀번호가 틀렸습니다.!";
     
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
      //mysql_query($sql, $connect);
        mysqli_query($connect,$sql);
				
      mysqli_close($connect);
      Header("Location:list.php?page=$page");
   }

?>


