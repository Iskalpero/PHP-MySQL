<!doctype html>
<html lang="ko">
	<head>
		<meta charset="utf-8">
		<title>guestbook.php</title>
	</head>
	<body>
	<h1>*방명록*</h1>
		 <form name="guestbook_form" action="./insert.php" method="post">
				<table width="100%" border="1">
				  <tr>
					  <th>*이름</th>
						<td>
						   <input type="text" size="10" maxlength="10" name="name" required autofocus placeholder="입력해주세요" >
						</td>
					</tr>
					<tr>
					  <th>*비밀번호</th>
						<td>
						   <input type="password" size="10" maxlength="10" name="passwd" required  placeholder="입력해주세요" >
						</td>
					</tr>
					<tr>
					  <th>*방목록글</th>
						<td>
						   <textarea name="content" cols="125" rows="15" required  placeholder="입력해주세요"></textarea>
						</td>
					</tr>
					<tr>
					  <th>처리</th>
						<td>
						   <input type="submit" value="저장하기">
							 <input type="reset" value="다시작성">
						</td>
					</tr>
				</table>
		 </form>
<?php
echo "<h1>방명록 내용</h1>";
$scale = 5; // 한 화면(페이지)에 표시(출려)되는 글(레코드) 수
include "../dbconn.php";
$sql = "select * from guestbook order by num desc";
$result = mysqli_query($connect,$sql);
$total_record = mysqli_num_rows($result);
//echo "<br>저장된 총 레코드 수:".$total_record;
if($total_record%$scale==0){
	$total_page= floor($total_record/$scale);
} else {
  $total_page= floor($total_record/$scale)+1;
}
//echo "<br>총 페이지 수:".$total_page;
$page = $_GET['page']; 
if(!$page){  //페이지번호 $page가 0일때
   $page=1;  //페이지번호를 1로 초기화(최초1회 실행)
}
if($page==1){
$prev_page=1;
} else {
$prev_page=$page-1;
}

if($page==$total_page){
$next_page=$total_page;
} else {
$next_page=$page+1;
}

$start = ($page-1)*$scale; // 해당 페이지에 출력할 레코드의 시작 번호 
for($i=$start;$i<$start+$scale && $i<$total_record;$i++){
	mysqli_data_seek($result, $i); // 레코드 포인터 이동
	$row = mysqli_fetch_array($result); // 레코드 가져오기
	$content = str_replace("\n","<br>",$row['content']);
	echo "<hr>";
	echo "[$row[num]] $row[name] $row[regist_day] $row[ip]";
	echo "&nbsp;&nbsp;[<a href='passwd_form.php?num=$row[num]&page=$page'>삭제</a>]";
  echo "<hr>";
	echo "$content";
	echo "<hr>";
	}
	echo "<a href='guestbook.php?page=1'>[처음]</a>";
	echo "<a href='guestbook.php?page=$prev_page'>[이전]</a>";
for($i=1;$i<=$total_page;$i++){
	if($page == $i)	{
		 echo "<b>[$i]</b>";
	} else {
	   echo "<a href='guestbook.php?page=$i'>[$i]</a>";
	}
}
echo "<a href='guestbook.php?page=$next_page'>[다음]</a>";
echo "<a href='guestbook.php?page=$total_page'>[끝]</a>";
?>		 
	</body>
</html>
