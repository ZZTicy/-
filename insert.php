<!DOCTYPE html>
<html lang="en">
	<head>
	<title>生成新题库中</title>
	<style>

	.bg {
       background:url(img/load.gif) no-repeat center;
       background-size:contain;
}
	</style>
	</head>
	<body class="row bg">
	<?php
	set_time_limit(1000);
	class MyDB extends SQLite3
	{
      function __construct()
      {
         $this->open('math.db');
      }
	}
	$db = new MyDB();
	if(!$db){
		echo $db->lastErrorMsg();
	} else {
		echo "";
	}
	
	function randFloat1($min=1, $max=10){
	  return $min + mt_rand()/mt_getrandmax() * ($max-$min);
	}
	function randFloat2($min=10, $max=100){
	  return $min + mt_rand()/mt_getrandmax() * ($max-$min);
	}
	function randFloat3($min=100, $max=1000){
		return $min + mt_rand()/mt_getrandmax() * ($max-$min);
	}
	function randFloat4($min=1, $max=100){
		return $min + mt_rand()/mt_getrandmax() * ($max-$min);
	}
	//先全部删除原有数据
	$sql =<<<EOF
		delete from DECIMALMULTIPLICATION;
		delete from DECIMALDIVISION;
		delete from SIMPLIFIEDCALCULATION;
		delete from FOURHYBRID;
		delete from EQUATIONS;
EOF;
	$ret = $db->query($sql);
    $db->close();
	class MyDB1 extends SQLite3
	{
      function __construct()
      {
         $this->open('math.db');
      }
	}
	$db = new MyDB1();
	if(!$db){
		echo $db->lastErrorMsg();
	} else {
		echo "";
	}    
	//两位数乘法
	for($i=0; $i<100; $i++){
	  $x1 = round(randFloat2(),1);
	  $y1 = round(randFloat2(),2);
	  $s = strval($x1).'*'.strval($y1);
	  $z1 = round($x1*$y1,2);
	  $sql = "INSERT INTO DECIMALMULTIPLICATION (DM_CONTENT,DM_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	//两位数除法
	for($i=0; $i<100; $i++){
	  $x1 = round(randFloat1(),3);
	  $y1 = round(randFloat1(),1);
	  $x2 = round(randFloat3(),3);
	  $y2 = round(randFloat2(),2);
	  $s1 = strval($x2).'/'.strval($y2);
	  $s2 = strval($x1).'/'.strval($y1);
	  $z1 = round($x2/$y2,2);
	  $z1 = round($x1/$y1,2);
	  $sql =<<<EOF
		INSERT INTO DECIMALDIVISION (DD_CONTENT,DD_Z) VALUES ('$s1','$z1');
		INSERT INTO DECIMALDIVISION (DD_CONTENT,DD_Z) VALUES ('$s2','$z1');
EOF;
	  $ret = $db->exec($sql);
	}
	//简算-两位数乘法（使用分配率）
	for($i=0; $i<5; $i++){
	  $x1 = round((rand(100,1000))/100,0)*100 + 1;
	  $y1 = rand(10,100);
	  $s = strval($x1).'*'.strval($y1);
	  $z1 = $x1*$y1;
	  $sql = "INSERT INTO SIMPLIFIEDCALCULATION (SC_CONTENT,SC_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	//简算-两位数乘法（使用分配率）
	for($i=0; $i<5; $i++){
	  $x1 = round((rand(100,1000))/100,0)*100 - 1;
	  $y1 = rand(1,100);
	  $s = strval($x1).'*'.strval($y1);
	  $z1 = $x1*$y1;
	  $sql = "INSERT INTO SIMPLIFIEDCALCULATION (SC_CONTENT,SC_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	//简算-两位数乘法
	for($i=0; $i<5; $i++){
	  $x1 = rand(1,100)+0.25;
	  $y1 = rand(1,10);
	  $s = strval($x1).'*'.strval($y1);
	  $z1 = $x1*$y1;
	  $sql = "INSERT INTO SIMPLIFIEDCALCULATION (SC_CONTENT,SC_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	//简算-两位数乘法
	for($i=0; $i<5; $i++){
	  $x1 = rand(1,100)-0.25;
	  $y1 = rand(1,10);
	  $s = strval($x1).'*'.strval($y1);
	  $z1 = $x1*$y1;
	  $sql = "INSERT INTO SIMPLIFIEDCALCULATION (SC_CONTENT,SC_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	//简算-两位数乘法
	for($i=0; $i<5; $i++){
	  $x1 = round(randFloat1(),2);
	  $y1 = $x1/100;
	  $s = strval($x1).'*'.'0.99'.'+'.strval($y1);
	  $z1 = $x1;
	  $sql = "INSERT INTO SIMPLIFIEDCALCULATION (SC_CONTENT,SC_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	//简算-两位数乘法
	for($i=0; $i<5; $i++){
	  $x1 = round(randFloat1(),2);
	  $y1 = $x1/1000;
	  $s = strval($x1).'*'.'1.001'.'-'.strval($y1);
	  $z1 = $x1;
	  $sql = "INSERT INTO SIMPLIFIEDCALCULATION (SC_CONTENT,SC_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	//简算-两位数乘法
	for($i=0; $i<5; $i++){
	  $x1 = round(randFloat1(),2);
	  $x2 = round(randFloat1(),2);
	  $y1 = 10-$x2;
	  $s = strval($x1).'*'.strval($x2).'+'.strval($x1).'*'.strval($y1);
	  $z = $x1*10;
	  $sql = "INSERT INTO SIMPLIFIEDCALCULATION (SC_CONTENT,SC_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	//简算-两位数乘法
	for($i=0; $i<5; $i++){
	  $x1 = round(randFloat2(),2);
	  $x2 = round(randFloat2(),2);
	  $y1 = 100-$x2;
	  $s = strval($x1).'*'.strval($x2).'+'.strval($x1).'*'.strval($y1);
	  $z = $x1*100;
	  $sql = "INSERT INTO SIMPLIFIEDCALCULATION (SC_CONTENT,SC_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	//简算-两位数乘法
	for($i=0; $i<5; $i++){
	  $x1 = round(randFloat1(),2);
	  $s = '2.5'.'*'.strval($x1).'*'.'8';
	  $z1 = $x1*2.5*8;
	  $sql = "INSERT INTO SIMPLIFIEDCALCULATION (SC_CONTENT,SC_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	//简算-两位数乘法
	for($i=0; $i<5; $i++){
	  $x1 = round(randFloat1(),2);
	  $s = '0.25'.'*'.strval($x1).'*'.'80';
	  $z1 = $x1*0.25*80;
	  $sql = "INSERT INTO SIMPLIFIEDCALCULATION (SC_CONTENT,SC_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	//简算-两位数乘法
	for($i=0; $i<5; $i++){
	  $x1 = round(randFloat1(),2);
	  $s = '2.5'.'*'.strval($x1).'*'.'0.04';
	  $z1 = $x1*2.5*0.04;
	  $sql = "INSERT INTO SIMPLIFIEDCALCULATION (SC_CONTENT,SC_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	//简算-两位数乘法
	for($i=0; $i<5; $i++){
	  $x1 = round((rand(100,1000))/100,0)*100 + 25;
	  $y1 = round(randFloat1(),3);
	  $s = strval($x1).'*'.'8'.'*'.strval($y1);
	  $z1 = $x1*8*$y1;
	  $sql = "INSERT INTO SIMPLIFIEDCALCULATION (SC_CONTENT,SC_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	//简算
	for($i=0; $i<5; $i++){
	  $y1 = round(randFloat2(),3);
	  $s = strval($y1).'/'.'8'.'/'.'1.25';
	  $z1 = $y1/8*1.25;
	  $sql = "INSERT INTO SIMPLIFIEDCALCULATION (SC_CONTENT,SC_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	//四则运算-不含括号
	for($i=0; $i<20; $i++){
	  $x1 = rand(0,100);
	  $x2 = round(randFloat2(),3);
	  $x3 = rand(0,100);
	  $cars=array("+","-","*","/");
	  $j = rand(0,3);
	  $k = rand(0,3);
	  $s = strval($x1).$cars[$j].strval($x2).$cars[$k].strval($x3);
	  $z1 = 0;//答案暂且为0
	  $sql = "INSERT INTO FOURHYBRID (FH_CONTENT,FH_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	//四则运算-含括号在前
	for($i=0; $i<20; $i++){
	  $x1 = round(randFloat1(),3);
	  $x2 = rand(10,100);
	  $x3 = rand(0,100);
	  $cars=array("+","-","*","/");
	  $j = rand(0,3);
	  $k = rand(0,3);
	  $s = '('.strval($x1).$cars[$j].strval($x2).')'.$cars[$k].strval($x3); 
	  $z1 = 0;//答案暂且为0
	  $sql = "INSERT INTO FOURHYBRID (FH_CONTENT,FH_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	//四则运算-含括号在前
	for($i=0; $i<20; $i++){
	  $x1 = rand(10,100);
	  $x2 = rand(0,100);
	  $x3 = rand(0,10);
	  $cars=array("+","-","*","/");
	  $j = rand(0,3);
	  $k = rand(0,3);
	  $s = '('.strval($x1).$cars[$j].strval($x2).')'.$cars[$k].strval($x3); 
	  $z1 = 0;//答案暂且为0
	  $sql = "INSERT INTO FOURHYBRID (FH_CONTENT,FH_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	//四则运算-含括号在前
	for($i=0; $i<20; $i++){
	  $x1 = rand(0,100);round(randFloat4(),2);
	  $x2 = rand(10,100);round(randFloat2(),2);
	  $x3 = rand(0,10);round(randFloat1(),2);
	  $cars=array("+","-","*","/");
	  $j = rand(0,3);
	  $k = rand(0,3);
	  $s = strval($x1).$cars[$j].'('.strval($x2).$cars[$k].strval($x3).')'; 
	  $z1 = 0;//答案暂且为0
	  $sql = "INSERT INTO FOURHYBRID (FH_CONTENT,FH_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	//解方程-左二右一一个x  2x-5=10  3x+10=32
	for($i=0; $i<20; $i++){
	  $x1 = rand(1,10);
	  $x2 = rand(10,20);
	  $x3 = rand(1,10);
	  $cars=array("+","-");
	  $j = rand(0,1);
	  $s = strval($x1).'x'.$cars[$j].strval($x3).'='.strval($x2);
	  $z1 = 0;//答案暂且为0
	  $sql = "INSERT INTO EQUATIONS (E_CONTENT,E_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	//解方程-左二右一一个x  59-2x=10  10+3x=32
	for($i=0; $i<20; $i++){
	  $x1 = rand(1,10);
	  $x2 = rand(10,100);
	  $x3 = rand(1,10);
	  $cars=array("+","-");
	  $j = rand(0,1);
	  $s = strval($x1).$cars[$j].strval($x3).'x'.'='.strval($x2);
	  $z1 = 0;//答案暂且为0
	  $sql = "INSERT INTO EQUATIONS (E_CONTENT,E_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	//解方程-左二右一两个x  3x+5.7*4x=58
	for($i=0; $i<20; $i++){
	  $x1 = rand(10,20);
	  $x2 = rand(1,10);
	  $x3 = rand(0,10);
	  $x4 = rand(10,100);
	  $cars=array("+","-");
	  $j = rand(0,1);
	  $k = rand(0,1);
	  $s = strval($x1).'x'.$cars[$j].strval($x3).$cars[$k].strval($x2).'x'.'='.strval($x4);
	  $z1 = 0;//答案暂且为0
	  $sql = "INSERT INTO EQUATIONS (E_CONTENT,E_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	//解方程-左一右二  3x=100-x
	for($i=0; $i<20; $i++){
	  $x1 = rand(1,10);
	  $x2 = rand(10,100);
	  $x3 = rand(1,10);
	  $s = strval($x1).'x'.'='.strval($x2).'-'.strval($x3).'x';
	  $z1 = 0;//答案暂且为0
	  $sql = "INSERT INTO EQUATIONS (E_CONTENT,E_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	//解方程-左二右二  3x+34=100-x
	for($i=0; $i<20; $i++){
	  $x1 = rand(1,10);
	  $x2 = rand(1,50);
	  $x3 = rand(50,200);
	  $x4 = rand(1,10);
	  $s = strval($x1).'x'.'+'.strval($x2).'='.strval($x3).'-'.strval($x4).'x';
	  $z1 = 0;//答案暂且为0
	  $sql = "INSERT INTO EQUATIONS (E_CONTENT,E_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	//解方程-左二右二  3x+17x=145+4x
	for($i=0; $i<20; $i++){
	  $x1 = rand(1,10);
	  $x2 = rand(1,20);
	  $x3 = rand(50,200);
	  $x4 = rand(1,10);
	  $s = strval($x1).'x'.'+'.strval($x2).'x'.'='.strval($x3).'-'.strval($x4).'x';
	  $z1 = 0;//答案暂且为0
	  $sql = "INSERT INTO EQUATIONS (E_CONTENT,E_Z) VALUES ('$s','$z1')";
	  $ret = $db->exec($sql);
	}
	$db->close();
	class MyDB2 extends SQLite3
	{
      function __construct()
      {
         $this->open('math.db');
      }
	}
	$db = new MyDB2();
	if(!$db){
		echo $db->lastErrorMsg();
	} else {
		echo "";
	}
	//题目写入文档
	$myfile = fopen("file.txt", "w") or die("Unable to open file!");
	$sql = "select * from FOURHYBRID";
	$ret = $db->query($sql);
    while($value = $ret->fetchArray(SQLITE3_ASSOC) ){ 	
		$txt = $value['FH_CONTENT'];
		fwrite($myfile, $txt."=\r\n");
	}
	fclose($myfile);
	$db->close();
	//答案写入文档
	//passthru("Arithmetic",$status);
	//exec('Arithmetic',$output, $status);
	$output = shell_exec('Arithmetic');
	class MyDB3 extends SQLite3
	{
      function __construct()
      {
         $this->open('math.db');
      }
	}
	$db = new MyDB3();
	if(!$db){
		echo $db->lastErrorMsg();
	} else {
		echo "";
	}
	//读取文档中的答案写入数据库
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
	$db->close();
	class MyDB4 extends SQLite3
	{
      function __construct()
      {
         $this->open('math.db');
      }
	}
	$db = new MyDB4();
	if(!$db){
		echo $db->lastErrorMsg();
	} else {
		echo "";
	}
	//题目写入文档
	$myfile = fopen("file2.txt", "w") or die("Unable to open file!");
	$sql = "select * from EQUATIONS";
	$ret = $db->query($sql);
    while($value = $ret->fetchArray(SQLITE3_ASSOC) ){ 	
		$txt = $value['E_CONTENT'];
		fwrite($myfile, $txt."\r\n");
	}
	fclose($myfile);
	//答案写入文档
	//passthru("22",$status);
	//exec('22',$output, $status);
	$output = shell_exec('22');
	$db->close();
	class MyDB5 extends SQLite3
	{
      function __construct()
      {
         $this->open('math.db');
      }
	}
	$db = new MyDB5();
	if(!$db){
		echo $db->lastErrorMsg();
	} else {
		echo "";
	}
	//读取文档中的答案写入数据库
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
	$db->close();
	//echo "<script>alert('题目呢');</script>";
	echo "<script>alert('重置题库成功');window.location.href='add.php'</script>";
?>
	</body>
</html>

