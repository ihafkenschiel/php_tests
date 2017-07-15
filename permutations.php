<?php
error_reporting(-1);
ini_set('display_errors', 'On');


$test = array(2,1,3,3);

echo solution($test);

function printArray($A) {
	echo "<pre>";
	print_r($A);
	echo "</pre>";
}



function has_dupes($array){
 $dupe_array = array();
 
 foreach ($array as $value) {
    if(isset($dupe_array[$value]))
        $dupe_array[$value] += 1;
    else
        $dupe_array[$value] = 1;
	}
	foreach ($dupe_array as $n) {
	    if($n > 1)
	        return true;
	}
	return false;
}

function solution($A) {
    if ( empty($A) || has_dupes($A) || max($A) >= (count($A)+1) ) { //O(n)
        return 0;
    }
    return 1;    
}



?>