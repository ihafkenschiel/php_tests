<?php

// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";


$tests = array(
	array(-1, 3, -4, 5, 1, -6, 2, 1),
	array(-2147483648, -2147483647, -2147483646, 0, -2147483648, -2147483647, -2147483646),
	array(500, 1, -2, -1, 2),
	array(2, -1, -2, 1, 500).
	array(),
	array(100),
	array(-1, 0),
	array(0, -1),
	array(1, 0),
	array(0, 1),
	array(-1, -1, 1),
	array(-1, 0, 0)
	);
	

foreach ($tests as $test) {
	echo "======Test=======<br>";
	var_dump($test); echo "<br>";
	echo "<br>Solution:<br>P=".solution($test)."<br><br>";
}


function solution($A) {
    // write your code in PHP7.0
    
    if (empty($A)) {
		return 0; // zero case as described in spec
	}
    $N = count($A);
	
    
    $prefix = 0;
    $suffix = array_sum($A); // sum of all values in A
	if ($suffix == 0) {
    	return 0; // zero case as described in spec
    }
	
	$A = array_reverse($A); // reversing array O(n) so that we can pop O(1) instead of shift O(n) inside the traversal loop O(n)
	
	$AP = 0;
    
    for ($P=0; $P<$N; $P++) {
    	
		$prefix += $AP; // add A[P-1] to prefix, before incrementing $AP to A[P]
		
		echo "<br>P:".$P."<br>";

		$AP = array_pop($A); // current value
		echo "AP:".$AP."<br>";
		
		$suffix -= $AP;
		
   		echo "prefix:".$prefix."<br>".
   		"suffix:".$suffix."<br>";
        
        if ($prefix == $suffix) {
        	echo "Match!<br>";
            return $P;
        }

        //echo "<br>";

    }
    
    return -1;
}

?>