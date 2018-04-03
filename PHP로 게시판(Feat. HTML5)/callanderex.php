<?php
	print "<h1>".date("F")."</h1>";
	// F : 금달을 영어로 출력
	print "Today:".date("Y/m/d");
	// Y/m/d = xx년/x월/x일
	print "<br>";
	
	$arrayweek = array("Sun","Mon","Tue","Wed","The","Fri","Sat");
	// c에서 1차원 배열 array라고 생각하면 된다.
	
	print "<table border=1><tr>";
	//php이므로 이런형식으로 html5 테이블 선언 및 설정
	foreach($arrayweek as $value){
		//forreach($배열명 as $value) 
		//forreach에는 두 가지 기법이 있다.(배열에서만 가능)
		// 위처럼 $arrayweek = 지정할 대상 배열 , $value = 원소
		// 
		print "<th>".$value. "</th>";
	}
	
	print "</tr><tr>";
	//첫줄 설정 완료(월-일)

 


	for($i=0;$i<date("t");$i++){
		//금달 일수(date("t"))
		$week_number = date("w", mktime(0,0,0, date("n"), $i+1, date("Y")));
		//
			if($i==0){
				print "<tr>";
				space_cell($week_number);
			}
			elseif($week_number == 0){
				print "<tr>";
			}
	
		print "<td>".($i+1)."</td>";
	 
		if($i+1==date("t")){ // 현재주/다음주 구분
			space_cell(6-$week_number);
			//이달의 마지막 일일 경우
			print "</tr>";
		}
		elseif($week_number == 6){
			print "</tr>";
			//일요일 ($week_number==6)일 경우 다음 줄로
		}
	}
	print "</table>";


	function space_cell($count){

		if($count!=0){
			for($i=0;$i<$count;$i++){
				print "<td></td>";
			}
		}
	}
?>