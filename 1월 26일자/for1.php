<?php
/*
for(1.초기식;2.조건식;3.증감식)
{
  4.조건식이 참일때 실행될 명령;	
}
실행순서 
1->2(참)->4->3->2(참)->4->3->2(거짓:반복끝)
*/
for($i=1;$i<=10;$i++)
{
  echo $i."<br>";	
}	
?>