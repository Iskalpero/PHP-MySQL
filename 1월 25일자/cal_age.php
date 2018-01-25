<?php
//오늘 날짜
$now_year=2018; $now_month=1; $now_day=25;
//생년_월_일
$birth_year=2000; $birth_month=1; $birth_day=24;
if($birth_month < $now_month){
  $age=now_year-$birth_year;	
}
else if($birth_month == $now_month)
{
	if($birth_day <= $now_day){
		$age=$now_year-$birth_year;
	} else {
	    $age=$now_year-$birth_year-1;
	}		
} else {
	$age=$now_year-$birth_year-1;
}
echo "오늘의 날짜 : $now_year 년 $now_month 월 $now_day 일<br>";
echo "<br>";
echo "당신은 $birth_year 년 $birth_month 월 $birth_day 일생 이므로<br>";
echo "정확한 만나이는 $age 살 입니다.<br>";
?>