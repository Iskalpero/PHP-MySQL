<?php
/*
 $s 변수의 값에 "R", "B", "Y" 값중 하나를 가질수 있다.
 $s의 값이 R이면--> 빨간불입니다. 멈추세요!
 $s의 값이 B이면--> 파란불입니다. 진행하세요!
 $s의 값이 Y이면--> 노란불입니다. 빨리진행하거나 멈추세요!
 $s의 값이 R, B, Y 값중 하나가 아니면 --> 고장(점멸)입니다.!!
*/

$s="7"; 
switch($s)
{
	case "R": 
			echo "빨간불입니다. 멈추세요!<br>"; 
	        break;
	case "B": 
			echo "파란불입니다. 진행하세요!!<br>"; 
	        break;
	case "Y": 
			echo "노란불입니다. 빨리진행하거나 멈추세요!<br>"; 
	        break;
	default: echo "고장(점멸)입니다.!!<br>";
}	
?>