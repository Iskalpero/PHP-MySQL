<?php
/*
 항공요금 계산
 목적지요금_나이별($a): 제주도 
 (1.성인:30,000 , 2.소아:20,000  , 3.유아:10,000 )
   나이---------
   1.성인 13세이상
   2.소아 2세~12세
   3.유아 2세미만 
 -------------
 좌석등급($b): (A:100%요금, B:90%요금, C:80%요금)
   요금($money)
   변수 $a: 숫자형
   변수 $b: 문자형("A", "B", "C") 
   변수 $money: 숫자형 
 */
$a=9; // 나이
$b="C"; //좌석등급  A, B, C
$money=0; // 요금
$c=""; 
 if($a >= 13){
	//성인일때 처리할 부분
    $money=30000;
    $c="성인";	
 } else if($a >= 2 and $a <= 12) {
	//소아일때 처리할 부분
	$money=20000;
	$c="소아";
 } else { 
    //유아일때 처리할 부분  
	$money=10000;
	$c="유아";
	}
 echo " {$a}세($c)의 비행기 요금은 {$money}원입니다.<br>";
 
 if($b=="A"){
	  $money = $money * 1; // $money *= 1;
 }else if($b=="B"){
	  $money = $money * 0.9; // $money *= 0.9;
 }else { 
      $money = $money * 0.8; // $money *= 0.8;
 }
 echo " {$a}세 {$b}좌석 ($c)의 비행기 요금은 {$money}원입니다.<br>";
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
?>