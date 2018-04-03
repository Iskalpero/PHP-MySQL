<script language="javascript">
	function chk(){
		windows.alert("취소");
	}
</script>
<?php
	
	$num = $_GET['num'];
	
?>

<!doctype html>
	<head>
		<meta charset="utf-8">
		<title>빈칸</title>
	</head>
	
	<body>
		<form name ="passform" method="post" action="./delete.php">
			
			<table cellpadding ="0" cellspacing="0" border="0" width="306">
				<tr height=1 bgcolor="#292E5F">
					<td></td> 
				</tr>
				
				<tr height=18>
					<td bgcolor="#CEE3F7">
						
						<font color=003366><b>비밀번호를 입력하세요</b></font>
					</td>
				</tr>
				
				<tr height=1 bgcolor="#292E5F">
					<td> </td>
				</tr>
				
				<tr height=20 bgcolor="#F7F7F2">
					<td></td>
				</tr>
				
				<tr>
					
					<td valign="top" align="center"></td>
					<table cellpadding="0" cellspacing="5" border="0" 
							width="100%" bgcolor="#F7F7F2">
						<tr>
							<td width="80" align="right">
								<font size="-1" face="돋움"> 비밀번호 </font>
								
							</td>
							<td width="170">
								<input type="password" name="passwd"
									size="15" maxlength="10" required>
								<input type="hidden" name ="num" value="<?=$num;?>">
								
								<input type="submit" value="삭제">
								<input type="button" value = "취소" onclick="history.back(-1)";>
							</td>
						</tr>			
					</table>
				</tr>
			</table>
		</form>
	<body>
</html>

<?php
	//<!-- value로 값 전송 <?=은 <? echo를 간략하게 나타낸 것이다.  -->
	// hidden
?>
