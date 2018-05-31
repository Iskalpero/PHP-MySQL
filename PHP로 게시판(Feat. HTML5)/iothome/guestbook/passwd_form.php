<?php
$num=$_GET['num'];
$page=$_GET['page'];
?>
<form fname="passform" action="delete.php?num=<?=$num;?>&page=<?=$page;?>" method="post">
 <input type="password" size="10" required name="passwd" autofocus>
 <!--
 <input type="hidden" name="page" value="<?=$page;?>"">
 -->
 <input type="submit" value="확인">
 <input type="reset" value="초기화">
 <input type="button" value="삭제취소" onclick="history.back();"
</form>