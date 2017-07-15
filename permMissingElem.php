<?php
error_reporting(-1);
ini_set('display_errors', 'On');


	$max = 100001;
    $arr = range(1,$max,1);
	$random = rand(0,$max-1);
	unset($arr[$random]);

$tests = array(
	array(2,3,1,5),
	array(),
	array(2),
	array(1,3),
	array(1,2,4),
	array(2,1,3,5),
	array(2,1,3,4),
	array(2,4,3,5)
	);
	

foreach ($tests as $test) {
	echo "======Test=======<br>";
	printArray($test); echo "<br>";
	$time = -microtime(true); 
	echo "<br>Solution:<br>P=".solution($test)."<br>";
	$time += microtime(true); 
	echo " in ".$time."s<br><br>";
}

function printArray($A) {
	echo "<pre>";
	print_r($A);
	echo "</pre>";
}


function solution($A) {
    $complete = range(1,count($A)+1);
	printArray($complete);
	
    $missing = array_diff($complete,$A);
	
	if (!empty($missing)) {
		return array_pop($missing);
	}
	
	return 1;
}

?>