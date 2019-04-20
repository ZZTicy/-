<?php
	
	$myfile = fopen("file2.txt", "w") or die("Unable to open file!");
	$sql = "select * from EQUATIONS";
	$ret = $db->query($sql);
    while($value = $ret->fetchArray(SQLITE3_ASSOC) ){ 	
		$txt = $value['E_CONTENT'];
		fwrite($myfile, $txt."\r\n");
	}
	fclose($myfile);
?>