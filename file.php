<?php
	
	$myfile = fopen("file.txt", "w") or die("Unable to open file!");
	$sql = "select * from FOURHYBRID";
	$ret = $db->query($sql);
    while($value = $ret->fetchArray(SQLITE3_ASSOC) ){ 	
		$txt = $value['FH_CONTENT'];
		fwrite($myfile, $txt."=\r\n");
	}
	fclose($myfile);
?>