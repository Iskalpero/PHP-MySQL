<?php
	
	include "../dbcon.php";
	
	$id = $_GET['userid'];
	
	
	$sql = "select count(*) from member where id = '$id'";
	$result = mysqli_query($connect, $sql);
	$row = mysqli_fetch_array($result);
	
	mysqli_close($connect);
	
?>

<script>

	var row = "<?php echo $row[0] ?>";
		
	if(row == 1){
		 parent.document.getElementById("id2").value="0";
		 parent.alert("이미 사용중인 아이디입니다.");
	}
	else{
		parent.document.getElementById("id2").value="1";
		parent.alert("사용 가능합니다.");
	}
</script>