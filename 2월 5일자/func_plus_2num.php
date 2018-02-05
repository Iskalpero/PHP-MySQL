<?php
	
	function minus_($a, $b){
		
		
		/*
		echo (round($c,3));
		// round , 반올림함수(보통 사용할떄 round(대상변수,반올림처리할 자릿수)인데
		// 자릿수가 음수면 정수에서 -(우측에서 n번째까지 0), 양수면 소수점을 숫자만큼 처리해줌
		
		
		echo ceil(99.999999999999);
		
		
		ceil(변수명) : 소수점 몇자리든 다음으로 큰 정수로 출력시켜준다.(0.00000000001을 넣으면 1이나옴)
		floor(변수명) : ceil의 반대로 다음으로 작은 정수로 출력시켜준다.(1.9999999999을 넣으면 1이 나옴)
		
		
		echo "<br>";
		echo floor(99.99999999999999);
		//특이점 . 소수점이 매우 길면 자체적으로 올려주는듯하다
		// 소수점 15번쨰부터 자체적으로 올려줌.
		
		
		php는 형식에서 많이 자유로워서
		
		c언어나 자바처럼 int형식은 int로 리턴해야한다 와 같은 법칙을 무시해도 된다.
		하지만 인지만 하고 하는습관은 c언어나 자바처럼 조건에 맞춰 하는것에 길들여져야 한다.	
		
	
		추가 팁
		
		
		SQL문에서 중복된 데이터를 제거하는 구문
		
		DELETE FROM duplicate
		WHERE id not in ( SELECT id from ( SELECT id from duplicate group by phone) as id )
		http://gyuha.tistory.com/309
		https://iwordpower.com/2017/03/how-to-delete-duplicate-records-in-mysql/ 
		*/
		return ($a*$b);
		
	}
	
	
	$alpha = 9999;
	$beta = 70.9999;
	
	echo minus_($alpha,$beta);

?>