<?php
	$link = mysqli_connect("127.0.0.12", "root", "12345", "r_db");
	//use r_db;까지 접근함

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
} //저 4개의 조건 중 한개라도 부적합시 나오는 에러문구 처리

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_close($link);
?> 
// 