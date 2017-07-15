<?php

error_reporting(-1); // show error messages

$N = 1041;


echo "n:".$N."<br>";
$bin = decbin($N);
echo "bin: ".$bin."<br>";

echo "Result: ".getMaxBinaryGap($N);

function getMaxBinaryGap($N) {
	
	while ($N > 0 && ($N & 1) == 0) { // shift until we get 1 on the right
		$N = $N >> 1;
		echo "shifted: ".decbin($N)."<br>";
		$rightbit =  $N & 1;
		echo $rightbit."<br>";
	}
	$N = $N >> 1; //popoff the 1 on the right
	
	$count = $maxCount = 0;
	
	while ($N > 0 ) {
		while (($N & 1) == 0) { // shift until we get 1 on the right
			$N = $N >> 1;
			echo "shifted: ".decbin($N)."<br>";
			$rightbit =  $N & 1;
			echo $rightbit."<br>";
			$count++;
		}
		echo "count = ".$count."<br>";
		if ($count > $maxCount) { //update max count
			$maxCount = $count;
		}
		$count = 0; //reset
		$N = $N >> 1; //popoff the 1 on the right, and go again
	}
	
	
	
	return $maxCount;
}

?>