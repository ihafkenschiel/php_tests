<?php

// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";
error_reporting(-1);
ini_set('display_errors', 'On');

$tests = array(
	array(1, -1, 0, 2, 3, 5)
	);
	

foreach ($tests as $test) {
	echo "======Test=======<br>";
	printArray($test); echo "<br>";
	$time = -microtime(true); 
	echo "<br>Solution:<br>P=".solution($test, 3)."<br>";
	$time += microtime(true); 
	echo " in ".$time."s<br><br>";
}

function printArray($A) {
	echo "<pre>";
	print_r($A);
	echo "</pre>";
}
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function countStones($A, $time) {
    $count = 0;
    foreach($A as $key=>$val) {
        if ($val <= $time) {
            $count++;
        }
    }
    return $count;
}

function findStones($A, $time) {
    $stones = array();
    foreach($A as $key=>$val) {
        if ($val <= $time) {
            $stones []= $key;
        }
    }
    return $stones;
}

function solution($A, $D) {
    $N = count($A);
    $maxTime = max($A);
    
    if ($D > $N) {
        return 0; // jump across right away
    }
    $jumpsReq = ceil($N/$D);
    
    for ($time=0; $time<=$maxTime; $time++) {
        $stones = findStones($A, $time);
		$loc = -1;
		foreach ($stones as $stone) {
			if ($stone < ($loc + $D)) {
	            $loc = ($loc + $D);
	        }
		}
		if ($loc >= $N) {
			return $time;
		}
        
    }
    
    
    return -1; //he can never jump across
}


?>