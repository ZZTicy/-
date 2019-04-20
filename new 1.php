<?php
	function randFloat4($min=0, $max=100){
	  return $min + mt_rand()/mt_getrandmax() * ($max-$min);
	}
	function randFloat2($min=10, $max=100){
	  return $min + mt_rand()/mt_getrandmax() * ($max-$min);
	}
	function randFloat1($min=0, $max=10){
	  return $min + mt_rand()/mt_getrandmax() * ($max-$min);
	}
	for($i=0; $i<5; $i++){
	  $x1 = rand(1,10);
	  $x2 = rand(1,20);
	  $x3 = rand(50,200);
	  $x4 = rand(1,10);
	  $s = strval($x1).'x'.'+'.strval($x2).'x'.'='.strval($x3).'-'.strval($x4).'x';
	  echo "$s";
	  echo "\n";
	}
?>