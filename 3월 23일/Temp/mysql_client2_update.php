<?php
    /* update record */
        
	  $connect = mysqli_connect("localhost","root","12345");
		mysqli_select_db($connect,"r_db");
    
		
    $get_name=$_POST['name'];
	$get_id=$_POST['id'];
	$get_email=$_POST['email'];
	$get_sex=$_POST['sex'];
	$get_point=$_POST['point'];
	$get_grade=$_POST['grade'];
	$get_hidden=$_POST['id_o'];
	if($get_hidden == $get_id){
		$sql = "update client set name = '$get_name',
								email = '$get_email',
								sex = '$get_sex',
								point = '$get_point',
								grade = '$get_grade'
								where id = '$get_id'";
		$result= mysqli_query($connect,$sql);
	}
	else{
		$sql = "update client set name = '$get_name',
								email = '$get_email',
								id = '$get_id',
								sex = '$get_sex',
								point = '$get_point',
								grade = '$get_grade'
								where id = '$get_hidden'";
		$result= mysqli_query($connect,$sql);
	}

    if (!$result) {
        echo("레코드 갱신 실패!!");
        exit;
    } 
    else 
    {
        echo("레코드 갱신 성공!!");
    }

    mysqli_close($connect);
		
// 레코드를 삭제하고 다시 mysql_client2_array.php 로 돌아감
   Header("Location:mysql_client2_array.php"); 
?>