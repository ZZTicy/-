<?php
	
	$myfile = fopen("answer2.txt", "r");
	$i = 1;
	while(!feof($myfile))
	{
		$z1 = round(floatval(fgets($myfile)),2);
		echo $z1;
		$sql = "UPDATE EQUATIONS SET E_Z = $z1 where E_ID = $i";
		$i++;
		$ret = $db->query($sql);
	}
	fclose($myfile);
?>