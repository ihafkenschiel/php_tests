<?php
error_reporting(-1);
ini_set('display_errors', 'On');

$max = 135555;
    $arr = range(1,$max,5);
    $arr2 = range(1,$max,2);
    $arr = array_merge($arr,$arr2); 

$tests = array(
	array(9,3,9,3,9,7,9),
	$arr
	);
	

foreach ($tests as $test) {
	echo "======Test=======<br>";
	//var_dump($test); echo "<br>";
	$time = -microtime(true); 
	echo "<br>Solution:<br>P=".solution($test)."<br>";
	$time += microtime(true); 
	echo " in ".$time."s<br><br>";
}


function solution($A) {
    $res2 = array();
    foreach($A as $key=>$val) {
    	if (!isset($res2[$val])) {
    		$res2[$val] = 0;
    	}
        $res2[$val]++;
		//var_dump($res2);
		//echo "<br>";
    }
	
	foreach($res2 as $key=>$val) {
		if ($val % 2 != 0) { // if it is not evenly matched
			return $key;
		}
	}
	return 0;
}

?>