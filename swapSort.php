<?php
error_reporting(-1);
ini_set('display_errors', 'On');


	$max = 100001;
    $arr = range(1,$max,1);
	//$random = rand(0,$max-1);

$tests = array(
	array(1,5,3,3,7),
	array(1,3,5,3,4),
	array(1,3,5),
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
	$N = count($A);
	
	$outOfPlace = -1;
	
	// search if any element is out of place - break at first for efficiency
	for ($i=0; $i<($N-2); $i++) {
		if ($A[$i] > $A[$i+1]) {
			$outOfPlace = $i;
			
			//echo "<br>i: ".$A[$outOfPlace];
			break;
		}
	}
	
	
	
	if ($outOfPlace == -1) {
		return true; //already sorted - quit for efficiency
	} else {
		$minVal = $A[$outOfPlace];
		$minJ = $outOfPlace+1;
		 
		for ($j=($N-1); $j>=($outOfPlace+1); $j--) { // find smallest A[j] beginning at end
			if ($A[$j] < $minVal) {
				$minJ = $j;
				$minVal = $A[$j];
			}
		}
		
		//echo "<br>i: ".$A[$outOfPlace];
		//echo "<br>minJ: ".$minVal;
		
		//make the swap
		$A[$minJ] = $A[$outOfPlace];
		$A[$outOfPlace] = $minVal;
	}
	//printArray($A);
	
	//iterate one last time to check if sorted;
	for ($k=0; $k<($N-1); $k++) {
			
		//echo "<br>k: ".$k.", result: ".($A[$k] > $A[$k+1]);
		//echo "<br>k: ".$A[$k].", k+1: ".$A[$k+1];
		
		if ($A[$k] > $A[$k+1]) {
			return false;
		}
	}
	return true; //sorted!
	
}

?>