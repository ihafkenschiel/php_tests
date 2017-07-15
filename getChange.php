<?php
error_reporting(-1);
ini_set('display_errors', 'On');



printArray(getChange(5, 0.99));
printArray(getChange(3.14, 1.99));
echo 'should return [0,1,1,0,0,1]<br>';
printArray(getChange(4, 3.14));
echo 'should return [1,0,1,1,1,0]<br>';
printArray(getChange(0.45, 0.34));
echo 'should return [1,0,1,0,0,0]<br>';

/*
 * getChange(3.14, 1.99) should return [0,1,1,0,0,1]
getChange(4, 3.14) should return [1,0,1,1,1,0]
getChange(0.45, 0.34) should return [1,0,1,0,0,0]
 * */


function printArray($A) {
	echo "<pre>";
	print_r($A);
	echo "</pre>";
}


// eg. getChange(5, 0.99) should return [1,0,0,0,0,4] = 1c, 5c, 10c, 25c, 50c, and $1
function getChange($m, $p) { //money, price
	echo 'Change: '.($m - $p).'<br>';

	$change_pennies = ($m - $p)*100;
	$change = array(0, 0, 0, 0, 0, 0);

	$change[5] = intdiv($change_pennies, 100); //dollars
	$change_pennies -= $change[5]*100; 
	
	$change[4] = intdiv($change_pennies, 50); //50c
	$change_pennies -= $change[4]*50; 
	
	$change[3] = intdiv($change_pennies, 25); //25
	$change_pennies -= $change[3]*25; 
	
	$change[2] = intdiv($change_pennies, 10); //10
	$change_pennies -= $change[2]*10; 
	
	$change[1] = intdiv($change_pennies, 5); //5c
	$change_pennies -= $change[1]*5; 
	
	$change[0] = round($change_pennies); //1c

	return $change;
} 

?>