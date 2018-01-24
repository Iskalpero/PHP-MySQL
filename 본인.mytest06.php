<?php

	$connect = mysqli_connect("localhost","root","12345") or die("접속에 실패했습니다.");
	//mysql에 접속
	$db_con = mysqli_select_db($connect,"r_db");
	//use r_db;
	if(!$db_con){
		echo("r_db 데이터베이스가 존재하지 않습니다.<br>");
		exit;
	}
	
	
	$sql = "select num,id,name from mem";
	$result = mysqli_query($connect, $sql);
	
	if(!$result){
		echo("실패");
		exit;
	}
		
	$fnum = mysqli_num_fields($result); // 위의 sql문에 언급된 필드수는 3개(num,id,name)이므로 값은 3이나옴.
	
	echo "<table width = 800 border = 1 cellpadding = 10> "; //echo사용 때 (" "); 방식으로해도 됨
	// cellpadding - 테두리와의 간격(칸 안쪽 여백)
	// border = 
	echo "<tr>";
	echo "<td>번호</td><td>아이디</td><td>이름</td>";
	echo "</tr>";
	while($row = mysqli_fetch_row($result)) 
		
	//mysqli_fetch_row : db에서 한 레코드 줄 째로 값들을 가져온 상태. 이 함수내에서 자체적으로 구분시켜주고
	//					 이를 기억해 다음 레코드를 
	{
			echo"<tr>"; //<tr> : table row - 가로줄 생성
			for($i=0; $i < $fnum; $i++)
				// --> for(int i = 0; i< 3; i++)와 같은형식 php쪽에선 변수선언을 할때 공용으로 $를 앞에 붙인다.
				echo"<td> $row[$i] </td>"; // <td> : table data - 셀을 만드는 역할
				//$row[0] = num값, $row[1] = id , $row[2] = 이름의 값을 가져온다 
			echo"</tr>";
	}
	
	
	/*
	//while(
	$row = mysqli_fetch_row($result);//) //
		
	//mysqli_fetch_row : db에서 한 레코드 줄 째로 값들을 가져온 상태. 이 함수내에서 자체적으로 구분시켜주고
	//					 이를 기억해 다음 실행 시 그 다음의 레코드를 가져와 준다.
	{
			echo "<br> 숫자 : ".$row[1];
			echo"<tr>"; //<tr> : table row - 가로줄 생성
			for($i=0; $i < $fnum; $i++)
				// --> for(int i = 0; i< 3; i++)와 같은형식 php쪽에선 변수선언을 할때 공용으로 $를 앞에 붙인다.
				echo"<td> $row[$i] </td>"; // <td> : table data - 셀을 만드는 역할
				//$row[0] = num값, $row[1] = id , $row[2] = 이름의 값을 가져온다 
			echo"</tr>";
	}
	이걸 두 번 실행하면 1,2번째의 레코드가 나온다.
	*/
	
	
	
	echo"</table>";
	
	mysqli_close($connect);
?>
