<?php
    $connect = mysqli_connect("localhost","root","12345");
    $db_con = mysqli_select_db($connect,"r_db");

    $sql = "select * from client;";
    $result = mysqli_query($connect, $sql);

    $fields = mysqli_num_fields($result);
?>
<h2> mysqli_fetch_array() 함수 예제</h2>
<table width= 800 border=1 cellpadding=10>
<tr>
<td bgcolor=lightblue align=center>이름</td>
<td bgcolor=lightblue align=center>아이디</td>
<td bgcolor=lightblue align=center>이메일</td>
<td bgcolor=lightblue align=center>성별</td>
<td bgcolor=lightblue align=center>포인트</td>
<td bgcolor=lightblue align=center>등급</td>
<td bgcolor=lightblue align=center colspan="3">처리</td>

</tr>
<?php
   while ( $row = mysqli_fetch_array($result)) 
   {
      echo("<tr>");

      echo("<td> $row[name] </td>");
      echo("<td> $row[id] </td>");
      echo("<td> $row[email] </td>");
      echo("<td> $row[sex] </td>");
      echo("<td> $row[point] </td>");
      echo("<td> $row[grade] </td>");
			echo("<td bgcolor=white align=center><a href=mysql_client2_del.php?delid=" . "$row[id]" . ">" ."삭제</a></td>");
     	echo("<td bgcolor=white align=center><a href=mysql_client2_mform.php?mid=" . "$row[id]" . ">" ."수정</a></td>");			
      echo("<td bgcolor=white align=center><a href=mysql_client2_form.php" . ">" ."입력</a></td>");	
			echo("</tr>");
   }
   mysqli_close($connect);
?>
</table>