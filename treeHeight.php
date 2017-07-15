<?php
error_reporting(-1);
ini_set('display_errors', 'On');

// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

$testData = array(5, array(3, array(20, null, null), array(21, null, null)), array(10, array(1, null, null), null));

//printArray($testData);
echo solution(arrayToTree($testData));

function printArray($A) {
	echo "<pre>";
	print_r($A);
	echo "</pre>";
}

class Tree {
  var $x = 0;
  var $l = null;
  var $r = null;
}

// Format: (value, left, right)
function arrayToTree($a) {
    if (!empty($a) && !empty($a[0])) {
        $T = new Tree();
        $T->x = $a[0];
        $T->l = arrayToTree($a[1]);
        $T->r = arrayToTree($a[2]);
        return $T;
    }
    return null;
}

function solution($T) {
    // write your code in PHP7.0
    if (!is_object($T) ) {
        return -1;
    }
    //elseif ((is_null($T->l) && is_null($T->r)) {
    //    return 0; //no children
    //}
    
    $heightLeft = -1;
    $heightRight = -1;
    
    if($T->l != null) {
        $heightLeft = solution($T->l);
    }
    if($T->r != null) {
        $heightRight = solution($T->r);
    }
    
    if($heightLeft > $heightRight){
        return $heightLeft+1;
    }
    else{
        return $heightRight+1;
    }
    
    return -1; //empty
}



?>