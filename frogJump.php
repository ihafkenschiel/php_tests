<?php
error_reporting(-1);
ini_set('display_errors', 'On');

/// ------ Test Conditions -------////


$testArrays = array(
		array(),
		array(1),
		generateTestArray(rand(1,5)),
		generateTestArray(rand(1,5)),
		generateTestArray(rand(1,10))
		/*, generateTestArray(rand(1,100)),
		generateTestArray(rand(1,1000)),
		generateTestArray(rand(1,10000)),
		generateTestArray(rand(1,100000))*/
	);

/// ---------- Run Tests -----------////

foreach($testArrays as $curTest) {
	$size = count($curTest);
	
	$X = 1;
	if ($size > 0) {
		//$X = rand(1,max($curTest));
		$max = max($curTest);
		//$X = $max;	// can always cross
		
		$X = rand($max, $max*2); // Half the time it will be impossible to cross
	}
	printVar('X',$X);
	if ($size <= 20) {
		printArray($curTest);
	}
	$time = -microtime(true); 
	echo "Solution: ".solution($X, $curTest) ;
	$time += microtime(true); 
	echo "<br> [".number_format((float)$time, 3, '.', '')."s]<br><br>";
	echo "---------------------------<br><br>";
}


/// ---------- Debug Helpers -----------////

function printArray($A) {
	echo "<pre>";
	print_r($A);
	echo "</pre>";
}

function printVar($name, $var) {
	echo $name.": ".$var."<br>";
}


/// ---- Test Condition Helpers -----///

function generateRandArray($max) {
	$numbers = range(1, $max);
    shuffle($numbers);
	return $numbers;
}

function generateTestArray($max) {
	$split = rand(1,$max-1);
	//printVar('split',$split);
	$rand1 = generateRandArray($split);
	$rand2 = generateRandArray($max-$split);
	//printVar('max-split',$max-$split);
	return array_merge($rand1, $rand2);
}




/// ----------- SOLUTION ------------ ////

function solution($X, $A) {
	$max = 0;
	$N = count($A);
	if ($N > 0) {
		$max = max($A);	
		
		// check if it is impossible to cross
		if ($max < $X) {
			return -1;
		}
	}
	
	//printArray($A);
	
    $path = array_fill( 0, $max, -1); // A[1->X] = 0;
    
    for ($i=0; $i<count($A); $i++) {
    	$val = $A[$i];
		//printVar('val',$val);
		if ($path[$val-1] == -1) {
			$path[$val-1] = $i;
		}
		//printArray($path);
    }
	
	printArray($path);
	
	foreach($path as $step) {
		if ($step == -1) { // look for any gaps
			return -1;
		}
	}
	
	if (count($path) > 0) {
		return max($path);
	}
    return -1;
}
?>