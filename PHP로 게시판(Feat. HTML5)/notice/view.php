﻿<?php
    session_start();
   $content = $_POST['content'];
   $username = $_SESSION['username'];
   $userid = $_SESSION['userid'];
   $num = $_GET['num'];
?>
<html>
<head>
<title>:: PHP 프로그래밍 입문에 오신것을 환영합니다~~ :: </title>
<link rel="stylesheet" href="../style.css" type="text/css">
</head>
  <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <table border=0 cellspacing=0 cellpdding=0 width='776' align='center'>
        <tr>
          <td colspan="5" height=25><img src="img/notice_title.gif"></td>
        </tr>
        <tr>
          <td background="img/bbs_bg.gif">
          <img border="0" src="img/blank.gif" width="1" height="3"></td>
        </tr>
        <tr>
          <td height=10></td>
        </tr>
        <tr height=1 bgcolor=#5AB2C8><td></td></tr>

<?php
   include "../dbcon.php";

   $sql = "select * from notice_board where num=$num";

   //$result = mysql_query($sql, $connect);
   $result = mysqli_query($connect, $sql);
   $row = mysqli_fetch_array($result);
  
   $day = substr($row['regist_day'], 0, 10);
 
   $content = str_replace("\n", "<br>", $row['content']);
   $content = str_replace(" ", "&nbsp;", $content);
   $subject = str_replace(" ", "&nbsp;", $row['subject']);

   $hit = $row['hit'];
   $hit++;

   $sql = "update notice_board set hit=$hit where num=$num";
   //mysql_query($sql, $connect);
   mysqli_query($connect, $sql);
?>

        <tr bgcolor="#D2EAF0" height=35>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $subject ?></td>
        </tr>
        <tr height=1 bgcolor=#5AB2C8> <td></td> </tr>
        <tr> 
          <td>
    <table width=100% border=0 cellspacing=0 cellpadding=0 class=txt>
        <tr height=5 ><td colspan=2></td></tr>
        <tr>
          <td width=20></td>
          <td><b>글쓴이 : <?php echo $row['name'] ?></b>&nbsp;&nbsp; 
          </td>
        </tr>
        <tr height=5 ><td colspan=2></td></tr>
        <tr height=1 bgcolor=#5AB2C8> <td colspan=2></td></tr>
        <tr height=5 ><td colspan=2></td></tr>
        <tr>
          <td width=5></td>
          <td> <?php echo $content ?></td></tr>
        <tr><td colspan=2 align=right> <?php echo $day ?>&nbsp;&nbsp;&nbsp;</td></tr>
        <tr height=5 ><td colspan=2></td></tr>
    </table>
          </td>
        </tr>
                  
        <tr height=1 bgcolor=#5AB2C8><td></td></tr>
        <tr>
          <td>
<?php
    $sql = "select * from notice_ripple where parent=$num order by num desc";
    //$result = mysql_query($sql, $connect);
	$result = mysqli_query($connect, $sql);
    $num_ripple = mysqli_num_rows($result);

    if($num_ripple)
    {
        while ( $row = mysqli_fetch_array($result) ) 
        {
           $ripple_day = $row['regist_day'];
           $ripple_day = substr($ripple_day, 5, 5);

           $ripple_content = str_replace("\n", "<br>", $row['content']); 
           $ripple_content = str_replace(" ", "&nbsp;", $ripple_content); 
           $ripple_ip = $row['ip'];
           $ripple_num = $row['num'];
           $ripple_id = $row['id'];
           $ripple_name = $row['name'];

     echo "
      <table width=100% cellpadding=0>
        <tr height=20>
          <td width=10% align=center>&nbsp;이름:$ripple_name&nbsp; </td>
          <td width=80% align=left>&nbsp;내용:$ripple_content</td>
          <td width=10% align=left>&nbsp;작성일자:$ripple_day&nbsp;
          ";
        if ($userid == $ripple_id or $userid=="asdf")
       {
         echo "
               <a href='delete_ripple.php?num=$num&ripple_num=$ripple_num'>삭제</a>
              ";
       }
         echo "
          </td>
         </tr>
         <tr height=1 bgcolor=#5AB2C8>
          <td colspan=3></td>
         </tr>
    </table>
             ";
       }
   }

    mysqli_close($connect);
?>
          </td>
        </tr>

    </table>

<?php
      echo "
       <form method=post action='insert_ripple.php?num=$num'>
        <table align=center border=0 cellspacing=0 cellpadding=0 width=766>
          <tr><td colspan=2>&nbsp;&nbsp;&nbsp;&nbsp;이름  : $username</td></tr> 
          <tr height=5><td colspan=2> </td></tr>
          <tr><td><textarea style='font-size:9pt;border:1px solid' name='content'
                 style=background-image:url('img/bbs_text_line.gif'); cols=110 rows=4
                 wrap=virtual></textarea></td>
              <td align=right><input type=image src='img/regist.gif'></td>
          </tr>

          <tr height=5><td colspan=2> </td></tr>
       </table>
      </form>
          ";
?>
    <table align=center border=0 cellspacing=0 cellpadding=0 width=766>
        <tr height=10>
          <td></td>
        </tr>

        <tr>
          <td align=center>
<?php
  if ($userid == "asdf")
  {
      echo "
          <a href='modify_form.php?num=$num&page=$page'>
                           <img src='img/i_edit.gif' border=0></a>
		  &nbsp;
          <a href='delete.php?num=$num&page=$page'>
                           <img src='img/i_del.gif' border=0></a>
		  &nbsp;
           ";
  }
?>
          <a href="list.php?page=<?php echo $page ?>"><img src='img/i_list.gif' border=0>
          </a></td>
        </tr>
    </table>
  </body>
</html>