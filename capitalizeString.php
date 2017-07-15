<?php
error_reporting(-1);
ini_set('display_errors', 'On');


echo "\"".capitalizeString("hello.how are you today? great! i'm fine too.")."\"";

function printArray($A) {
	echo "<pre>";
	print_r($A);
	echo "</pre>";
}

function capitalizeString($str) {
	$new_str = str_split($str);
	
	$punc = array(".", "?", "!", ";", ":", ",");
	$term_punc = array(".", "?", "!", ";");
	$end = count($new_str)-1;
	
	foreach($new_str as $key=>$val) {
		if ($key == 0 && !ctype_upper($val)) {
			$new_str[$key] = strtoupper($val);  //capitalize first letter
		}
		if ($key != $end && in_array($val, $punc) && $new_str[($key+1)] != ' ') { // punctuation symbol
			array_splice( $new_str, $key+1, 0, array(' ') ); // splice in at position 3
		}
		if ($key != $end && in_array($val, $term_punc)  && $new_str[($key+1)]) {
			$new_str[$key] = strtoupper($val);  //capitalize first letter of next word
		}
	}
	
	$new_str2 = implode("", $new_str);
	$new_str2 = explode(" ", $new_str2);
	foreach($new_str as $key=>$val) {
		
		//
	}
	printArray($new_str2);
	
	
	//printArray($new_str);
	return implode("", $new_str);
} 

?>