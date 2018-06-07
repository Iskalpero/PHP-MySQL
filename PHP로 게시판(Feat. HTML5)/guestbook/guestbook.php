<!doctype html>

<html lang="ko">
	<head>
		<meta charset="utf-8">
		<link href= "../css/styleGuest.css", rel = "stylesheet" type="text/css">
		<title>방명록</title>	
	</head>
	
	<body>
		<h1> 방 명 록 </h1>
		<form name="guestbook" action="./insert.php" method="post">
			<table width="100%" border="0" id="table_top">
				<tr>
					<th><span style="color:red">*</span>이름</th>
					<td>
						<input type="text" size="10" maxlength="10" required name="name" required autofocus placeholder="아이디 입력">	
					</td>
				</tr>
				<tr>
					<th><span style="color:red">*</span>비밀번호</th>
					<td>
						<input type="password" size="10" maxlength="10" required name="passwd" placeholder="비밀번호는 10자리까지">	
					</td>
				</tr>
				<tr>
					<th>내용</th>
					<td>
						<div >
							<textarea name="content" cols="50" rows="4" width="100%" required placeholder="내용을 입력해 주세요" style="width:100%"></textarea>
					</td>
				</tr>
				<tr>
					<th>처리</th>
					<td>
						<input type="submit" value="등록">
						<input type="reset" value="재작성">
					</td>
				</tr>
			</table>
			<table id="list" >
				<tr>
					<?php
											
						//str_replace(바꿀대상, 바꿀내용, 범위)
						include "../dbcon.php"; // mysql연동과 db선택문을 넣어놓은 php문
						//$connect = mysqli_connect("localhost","root","12345");
						//mysqli_select_db($connect, "iothome");
						//페이징
						
						
						
						$scale = 3; // 페이지당 5개의 글을 보여준다.
						$sql = "select * from guestbook order by num desc";
						$result = mysqli_query($connect, $sql);
						//sql문
						
						$total_num = mysqli_num_rows($result); // 총 글 수를 저장
						if($total_num % $scale ==0) //페이지 수 설정
							$total_page = floor($total_num / $scale);
							
							//floor는 소수점을 날려준다.(반내림) 4.999 = 4, 4.1 = 4 이렇게.
							// floor의 반대개념은 ceil명령어이다.(반올림) 4.1 = 5, 4.999 = 5
						else
							$total_page = floor($total_num / $scale) + 1;
							// 나눠떨어지지 않을 경우 
						
						$page = $_GET['page'];
												
						if(!$_GET['page']) // page값을 받았을 때 아무것도 없으면 기본값 1로 설정
							$page = 1;
						
						if($page ==1)
							$prev_page =1;
						else
							$prev_page = $page-1;
						//페이지가 한 페이지만 있을 경우와 아닐경우 이전 명령어 값 설정
						
						if($page == $total_page)
							$next_page = $total_page;
						else
							$next_page = $page +1;
						//페이지가 한 페이지만 있을 경우와 아닐경우 다음 명령어 값 설정
						
						$start = ( $page -1 ) * $scale;
						// 보는 시작지점 설정 (여기서 선언한 초기값은 0)
						
						for($i = $start; $i < $start + $scale && $i < $total_num; $i++){
						// 총 값보다 같거나 낮고, 
							mysqli_data_seek($result, $i); //i번째까지 포인터 이동.
							// seek가 지정한 포인트는 다음 seek때 유지되는게 아니고
							// 0번째부터 시작하는 reset형식이라고 생각해라.
							// 두번쨰 seek를 할때, 첫번째 한 seek 포인터는 영향을 주지 않는다.
							
							
							$row = mysqli_fetch_array($result); // 한 줄의 레코드 데이터를 가져온다.
							if(!$row['num']){
	
								mysqli_data_seek($result,$i);
							}
							
							$content = str_replace("\n", "<br>" , $row['content']);
							// 기록된 내용에는 php형식이므로 \n으로 줄바꿈이 되어있는데,
							// 이를 html5로 보여주기 때문에 <br>로 바꿔준다.
							$day = $row['regist_day'];
							// 내용 & 작성날짜 
							
							
							echo " <tr height=25>
									<td>
										&nbsp; $row[num] &nbsp;&nbsp;$row[name] &nbsp;&nbsp; $day
									</td> 
								
									<td align=left>
										<a href='passwd_form.php?num=$row[num]'>삭제</a>
									</td>
								   </tr>
							
									<tr height =14 bgcolor=#5AB2C8>
										<td colspan=2></td>
									</tr>
									<tr>
										<td colspan=2>&nbsp;</td>
									</tr>
									<tr>
										<td colspan=2>$content<br></td>
									</tr>
							
									<tr>
										<td colspan=2 align=right> IP Address : $row[ip] </td>
									</tr>
									<tr height =1 bgcolor=#000>
										<td colspan=2></td>
									</tr>
							";
							//화면 출력 html5형식 설정
						}
						
					?> 
						<tr><td colspan=2>&nbsp;</td></tr>
						<tr><td colspan=2 align = center>
						<?php //페이지 출력
							echo "<a href='guestbook.php?page=1'><font color='4c5317'>처음
									</font></a>";
							
							
							
							$page_count = 0;
							
							echo "<a href='guestbook.php?page=$prev_page'><font color='4c5317'>이전
									</font></a>";
						
							
							
							for($i=1; $i<=$total_page; $i++){
									if($page == $i){
										echo "<font color='4C5317'><b>[$i]</b></font> ";
										$page_count++;
										
										//시점 페이지 저장
									}
									// 보고있는 페이지의 경우
									else{
										echo "<a href ='guestbook.php?page=$i'><font color='4C5317'>
												[$i]</font></a> ";
										$page_count++;
									}
									
							}
							
							echo "<a href='guestbook.php?page=$next_page'><font color='4c5317'>다음
									</font></a>";
							
							
							echo "<a href='guestbook.php?page=$total_page'><font color='4c5317'>끝
									</font></a>";
							mysqli_close($connect);
							// <a href='guestbook.php?page=$total_page'>에서 page뒤에 &후 대입할 형식을 넣으면
							// 된다 . ex) 위에문장에서 $total_page&$page=$input.
						?>
				</tr>
			</table>
		</form>	
		
	</body>
	
</html>