<?php
  session_start();

   $scale = 5;   // 한 화면에 표시되는 글 수
	
   $search = $_POST['search'];	
   $find = $_POST['find'];
   
   if(!$find){
	   $find = $_GET['find'];
	   $search = $_GET['search'];
   }
   else{
	   $search = $_POST['search'];
   } 
   
   
   $userid = $_SESSION['userid'];
   $page = $_GET['page'];
   
   include "../dbcon.php";
   
  $sql = "select * from notice_board where $find like '%$search%'
           order by num desc";
   
   $result = mysqli_query($connect, $sql);
   $total_record = mysqli_num_rows($result);
   
    if ($total_record % $scale == 0)     // $total_record를 $scale로 나눈 나머지 계산 
      $total_page = floor($total_record/$scale);     // 나머지가 0일 때 
   else
      $total_page = floor($total_record/$scale) + 1; // 나머지가 0이 아닐 때
 
   if (!$page)                 // 페이지번호($page)가 0 일 때
       $page = 1;              // 페이지 번호를 1로 초기화
 
   $start = ($page - 1) * $scale;      // 표시할 페이지($page)에 따라 $start 계산  

   $number = $total_record - $start;

?>
<!DOCTYPE HTML>
<html lang="ko">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
		<title>X</title>
		<link rel="stylesheet" type="text/css" href="../css/reset.css">
		<link rel="stylesheet" type="text/css" href="../css/board.css">
		<link rel="shortcut icon" href="images/favicon/favicon.ico">
		<link rel="apple-touch-icon-precomposed" href="images/icon/flat-design-touch.png">
		<script src="js/jquery.min.js"></script>
		<script src="js/flat.min.js"></script>
	</head>
	<body>
		<div id="wrap">
			<section class="content_section">
				<div class="content_row_1">
					<table class="board_table">
						<caption>문의사항 게시판</caption>
						<thead>
							<tr>
								<th>번호</th>
								<th>제목</th>
								<th>작성일</th>
								<th>조회수</th>
								<th>글쓴이</th>
							</tr>
						</thead>
						<tbody>
						<?php
							for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
							{
								 mysqli_data_seek($result, $i);       // 가져올 레코드로 위치(포인터) 이동  
								  $row = mysqli_fetch_array($result);       // 하나의 레코드 가져오기
								  
								  $day = substr($row['regist_day'], 0, 10);

								  $sql = "select * from notice_ripple where parent = '$row[num]'";

								  //$result2 = mysql_query($sql, $connect);
								  $result2 = mysqli_query($connect, $sql);
								  $num_ripple = mysqli_num_rows($result2);
								  // 레코드 화면에 출력하기
     
								 echo "
										<tr>
										  <td>$number</td>
										  <td><img src='img/record_id.gif' border=0>
											  <a href='view.php?num=$row[num]&page=$page'>
													   $row[subject] </a></td>
										  <td>$day</td>
										  <td>$row[hit]</td>
										  <td>$row[name] </td>
										</tr>
										   ";
									$number--;
							} 
						?>
						</tbody>
					</table>
				</div>
				<div class="content_row_2">
					<div class="search_box">
						<form method=post action="search.php">
							<input type="text" size=10 name="search" class="search_window" placeholder="검색어">
							<select class="search_select_list" name = "find">
									  <option value="subject">제목에서</option>
									  <option value="content">본문에서</option>
									  <option value="name">글쓴이에서</option>
							</select>
							<input type="image" src="img/i_search.gif" 
									align=absmiddle border=0>
						</form>
					</div>
				<?php
					if($userid == "asdf"){
						echo " <div class='write_box'>
							<a href='./write_form.php'>글 쓰기</a>
						</div> " ;
					}
				?>
				</div>
				<div class="content_row_3">
					<span class="list_prev_btn">문의사항 이전 버튼</span>
					<?php
					   // 게시판 목록 하단에 페이지 링크 번호 출력
					   for ($i=1; $i<=$total_page; $i++)
					   {
						   if ($page == $i)     
						   {
							  echo "<a href ='#'>$i</a>";
						   }
						   else
						   { 
							  echo "<a href='board.php?page=$i'>$i</a>";
						   }      
					   }
					?>
					<span class="list_next_btn">문의사항 다음 버튼</span>					
				</div>
			</section>
		</div>
	</body>
</html>