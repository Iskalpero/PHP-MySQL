<?php
$h=170; //키
$w=63; //몸무게
$a=($h-100)*0.9;

echo("키: $h<br>");
echo("몸무게:$w<br>");

if($w>$a){ 
  echo ("다이어트 하세요!!!<br>");
} else {
  echo ("정상입니다.<br>");
}
	
?>