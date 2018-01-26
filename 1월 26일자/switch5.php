<?php
/* 월요일, 수요일, 금요일  --> A조 출근조 입니다.
   화요일, 목요일, 토요일  --> B조 출근조 입니다.
   일요일      --> C조 출근조 입니다.
   조건: break 문장을 2번만 사용
*/
$a="일요일"; 
switch($a)
{
	case "월요일":
	case "수요일":
    case "금요일":	
	        echo "A조 출근조 입니다.<br>"; 
	        break;
	case "화요일":
    case "목요일":	
	case "토요일":	
	        echo "B조 출근조 입니다.<br>"; 
	        break;		
	default: echo "C조 출근조 입니다.<br>";
}	
?>