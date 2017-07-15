<?php
error_reporting(-1);
ini_set('display_errors', 'On');


$tests = array(
	array(1,3,6,4,1,2),
	array(1),
	array(1,3,-6,4,-1,2)
	,array(3,−2147483648,1,2,2147483647,4)
);

foreach($tests as $test) {
	echo solution($test)."<br>";
}


function printArray($A) {
	echo "<pre>";
	print_r($A);
	echo "</pre>";
}

function countsort($arr, $n, $place) {
        $i = 0;
		
		$range = 10; //for integers
		$freq = array_pad(array(), $range, 0);
		
        $output = array();
		
        for($i=0;$i<$n;$i++)
                $freq[($arr[$i]/$place)%$range]++;
        for($i=1;$i<$range;$i++)
                $freq[$i]+=$freq[$i-1];
        for($i=$n-1;$i>=0;$i--)
        {
                $output[$freq[($arr[$i]/$place)%$range]-1]=$arr[$i];
                $freq[($arr[$i]/$place)%$range]--;
        }
        for($i=0;$i<$n;$i++)
                $arr[$i]=$output[$i];
		
		//printArray($output);
		return $output;
}

function radixsort($arr, $n, $maxx) {
        $mul=1;
        while($maxx)
        {
                $arr = countsort($arr,$n,$mul);
                $mul*=10;
                $maxx/=10;
        }
		
		return $arr;
}


function solutionOld($A) {
	$min_array = array();
	
	$min_array = radixsort($A, count($A), max($A));
	
	//$min_array = array_unique($min_array);
	
	printArray($min_array);
	
	if (count($min_array) == 1) {
		if ($min_array[0] == 1) {
			return 2;
		}
		return 1;
	}
	
	$last = 0;
	for ($i=0; $i<count($min_array); $i++) {
		//echo $min_array[$i];
		if ($min_array[$i] > ($last+1)) {
			return $last+1;
		}
		$last = $min_array[$i];
	}
	return 0;
	
}

function solution($A) {
	sort($A);
	//printArray($A);
	
	$N = count($A);
	$max = $A[$N-1];
	//echo "max: ".$max."<br>";
	
	$minPos = 1;
	
	for ($i=0; $i<$N; $i++) { //loop through sorted array
		//echo $A[$i].", ".$minPos."<br>";
		if ($A[$i] > 0) {
			if ($A[$i] == $minPos) {
				$minPos++;
			}
			if ($A[$i] > $minPos) {
				return $minPos;
			}
			
		}
		
	}
	
	return $minPos;
}





?>