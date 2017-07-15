<?php

// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

$test = array(-2147483648, -2147483648, -2147483648, 0, -2147483648, -2147483648, -2147483648);

echo "P=".solution($test);

function solution($A) {
    // write your code in PHP7.0
    
    $N = count($A);
    
    $prefix = 0;
    $suffix = array_sum($A); // sum of all values in A
    if ($suffix == null) {
        return -1;
    }
    
    $P = 0;
    
    // Test for P=0
    if ($suffix == 0) {
        return $P;
    } else {
    	$suffix -= $A[0];
    }
    
    for ($P=1; $P<$N; $P++) {
       if ($A[$P-1] != null && $A[$P] != null) {
       		
		
            $prefix += $A[$P-1]; // add A[0] to prefix
			$suffix -= $A[$P];
			
			echo "P:".$P."<br>".
       		"prefix:".$prefix."<br>".
       		"suffix:".$suffix."<br>";
            
            if ($prefix == $suffix) {
            	echo "Match!<br>";
                return $P;
            }
			
			echo "<br>";
        }
    }
    
    return -1;
}

?>