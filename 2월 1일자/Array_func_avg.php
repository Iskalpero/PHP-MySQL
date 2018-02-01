<?php

	$score = array(80, 90, 90, 99, 78);
	
	$sum = 0;
	
	for($a=0; $a<5; $a++)
		$sum += $score[$a];
	
	
	$avg = $sum/5;
	
	echo(" 과목 점수 : ");
	
	for($a=0; $a<5; $a++){
		echo("$score[$a] ");		
	}
	
	echo("<br>");
	echo("합계 : $sum, 	평균 : $avg <br>");


?>