<?php
	session_start();
    $userid = $_SESSION['userid'];
   
    $page = $_GET['page'];
   
   $scale = 5;   // 한 화면에 표시되는 글 수

   include "../dbcon.php";
   
   
   $sql = "select * from down_board where chk = 0";
   //chk = 0 인걸 추출해냄
   $result = mysqli_query($connect, $sql);
   $num = mysqli_num_rows($result);
   $count = 0;
   if($result){
	//chk = 0 존재 시 for문으로 group_num으로 체크
	   for($i = 0; $i<$num ; $i++){
		   mysqli_data_seek($result, $i);
		   $row = mysqli_fetch_array($result);
		   //seek후 한줄을 읽어온 후,
		   $group_num_chk = "select * from down_board where group_num = $row[group_num]";
		   //group_num 중복확인.
		   $group_result = mysqli_query($connect, $group_num_chk);
		   if(1<mysqli_num_rows($group_result)){
			   //본인 제외 답글이 존재 시 
			    $save_group = $row['group_num'];
				//chk = 0인 것의 group_num이 존재 시 
				for($j = 0; $j<mysqli_num_rows($group_result); $j++){
					mysqli_data_seek($group_result,$j);
					$row_chk = mysqli_fetch_array($group_result);
					//해당 조건에 chk를 검사해 모든 글이 chk=0인지 확인.
					if($row_chk['chk'] == 0 )
						$count++;
				}
				if($count == mysqli_num_rows($group_result)){
					$sql = "delete from down_board where group_num = $save_group";
					mysqli_query($connect, $sql);
					$count = 0;
				}
					
		   }			   
	   }
	   
   }
   

   $sql = "select * from down_board order by group_num desc, ord asc";
   $result = mysqli_query($connect, $sql);
	$total_record = mysqli_num_rows($result);
  // 전체 페이지 수($total_page) 계산 
   if ($total_record % $scale == 0)    
         // $total_record를 $scale로 나눈 나머지 계산 
      $total_page = floor($total_record/$scale);     
         // 나머지가 0일 때 
   else
      $total_page = floor($total_record/$scale) + 1; 
        // 나머지가 0이 아닐 때
 
   if (!$page)                 // 페이지번호($page)가 0 일 때
       $page = 1;              // 페이지 번호를 1로 초기화
 
   $start = ($page - 1) * $scale;      
      // 표시할 페이지($page)에 따라 $start 계산  

   $number = $total_record - $start;
?>
<!DOCTYPE HTML>
<html lang="ko">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
		<title>X</title>
		<link rel="stylesheet" type="text/css" href="../css/reset.css">
		<link rel="stylesheet" type="text/css" href="../css/download.css">
		<link rel="shortcut icon" href="images/favicon/favicon.ico">
		<link rel="apple-touch-icon-precomposed" href="images/icon/flat-design-touch.png">
		<script src="js/jquery.min.js"></script>
		<script src="js/flat.min.js"></script>
	</head>
	<body>
		<div id="wrap">
			<section class="content_section">
				<h1> 자료실 </h1>
				<div class="content_row_1">
					<table class="board_table">
						<caption>문의사항 게시판</caption>
						<thead>
							<tr>
								<th>번호</th>
								<th>제목</th>
								<th>파일</th>
								<th>글쓴이</th>
								<th>작성일</th>
								<th>조회수</th>
							</tr>
						</thead>
						<tbody>
						<?php
							for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
							{
								  // 가져올 레코드로 위치(포인터) 이동  
								  mysqli_data_seek($result, $i);       
									 // 하나의 레코드 가져오기
								  $row = mysqli_fetch_array($result);       

								  $day = substr($row['regist_day'], 0, 10);

								  $sql = "select * from down_ripple where parent = '$row[num]'";

								  $result2 = mysqli_query($connect, $sql);
								  $num_ripple = mysqli_num_rows($result2);

								  $space = "";

								  for ($j=0; $j<$row['depth']; $j++)
									 $space = "&nbsp;&nbsp;".$space;
     
								 echo "
										<tr>
										  <td>$number</td>
										  <td> $space
										  ";
										  if ($row['depth']>0)
											 echo "<img src='img/reply_head.gif' border=0>";
										  else
											echo "<img src='img/record_id.gif' border=0>";
										  
										  if($row['chk'] == 0){
											  	  echo "&nbsp;$row[subject]";											  
										  }
										  else{
											  echo "<a href='view.php?num=$row[num]&page=$page'>
													 &nbsp;$row[subject]";
										  }
										   if ($num_ripple) 
											   echo "<font color=blue>[$num_ripple]</font>";
										  echo "</a></td>";

										  if ($row['filename'])
											 echo "<td><img src='img/file.gif' border=0></td>";
										  else
											 echo "<td></td>";

										  echo "
											  <td>$row[name] </td>
											  <td>$day</td>
											  <td>$row[hit]</td>
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
					<div class="write_box">
						<a href="./write_form.php">글 쓰기</a>
					</div>
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
							  echo "<a href='list.php?page=$i'>$i</a>";
						   }      
					   }
					?>
					<span class="list_next_btn">문의사항 다음 버튼</span>					
				</div>
			</section>
		</div>
	</body>
</html>