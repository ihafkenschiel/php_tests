<?php

error_reporting(-1);
ini_set('display_errors', 'On');

$arr = range(1,99999,7);
$tests = array(
	array(),
	$arr
	);
	
$i = 999;
//for ($i=0; $i<9; $i++) {
	foreach($tests as $arr) {
		echo "======Test=".$i."======<br>";
		//printArray($arr);
		$time = -microtime(true); 
		echo "<br>Solution:<br>";
		$result = solution($arr, $i);
		//printArray($result);
		$time += microtime(true); 
		echo "<br> in ".$time."s<br><br>";
	}

function printArray($A) {
	echo "<pre>";
	print_r($A);
	echo "</pre>";
}

function solution($A, $K) {
	if (!empty($A)) {
		for ($i=1; $i<=$K; $i++) {
			$last = array_pop($A);
			array_unshift($A, $last);
		}
	}
	    
	return $A;	
}

?>