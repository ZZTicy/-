<?php
	
	$myfile = fopen("answer.txt", "r");
	$i = 1;
	while(!feof($myfile))
	{
		$z1 = round(floatval(fgets($myfile)),2);
		echo $z1;
		$sql = "UPDATE FOURHYBRID SET FH_Z = $z1 where FH_ID = $i";
		$i++;
		$ret = $db->query($sql);
	}
	fclose($myfile);
?>