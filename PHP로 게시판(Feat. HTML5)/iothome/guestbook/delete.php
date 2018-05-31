<?php
include "../dbconn.php";
$num=$_GET['num'];
$page=$_GET['page'];
$passwd=$_POST['passwd'];

$sql= "select passwd from guestbook where num=$num";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_array($result);

if($passwd==$row['passwd']){
	$sql= "delete from guestbook where num=$num";
	$result = mysqli_query($connect,$sql);
	header("Location:guestbook.php?page=$page");
} else {
	echo ("<script>
	         window.alert('비밀번호 오류');
					 history.go(-1);
				 </script>
				 ");
}
?>