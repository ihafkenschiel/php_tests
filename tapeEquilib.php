<?php
error_reporting(-1);
ini_set('display_errors', 'On');


	$max = 100001;
    $arr = range(1,$max,1);
	$random = rand(0,$max-1);

$tests = array(
	array(3,1,2,4,3),
	array(1,3),
	array(1,2,4),
	array(2,1,3,5),
	array(2,1,3,4),
	array(2,4,3,5),
	$arr
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
	$sums = array();
	$N = count($A);
	
	$pre = array($A[0]);
	$post = array();
	$post[$N-1] = $A[$N-1];
	
	// Add up left hand sums
    for ($i=1; $i<($N-1); $i++) {
    	if (!isset($pre[$i])) {
    		$pre[$i] = $pre[$i-1] + $A[$i];
    	}
	}
	//printArray($pre);
	
	for ($i=($N-2); $i>0; $i--) {
    	if (!isset($post[$i])) {
    		$post[$i] = $post[$i+1] + $A[$i];
    	}
	}
	//printArray($post);
	
	$min = array();
	for ($i=0; $i<($N-1); $i++) {
		$left = $pre[$i];
		$right = $post[$i+1];
		$absDiff = abs($left - $right);
		//echo "<br>diff: ".$absDiff;
		
		$min []= $absDiff;
	}

	return min($min);
}

?>