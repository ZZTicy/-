<?php
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
?>
<!doctype html>
<html lang="ch">
<head>
<title>主页</title>
<link href="css/style_grid.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/component.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet" />
<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<style>
header {
    background-color: pink;
    color: #fff;
    padding: 10px;
    text-align: right;
}
</style>
</head>
<body>
	<header>
		<div class="container">
            <div class="row">
                <div class="col-md-12">
					<button id="bt1" class="btn btn-success dropdown-toggle btn-sm" type="button"><a href="insert.php">生成新题库</a></button>
					<input id ="but" class="btn btn-success dropdown-toggle btn-sm" type="button" value="隐藏答案" onclick="doHide();"/>
                </div>

            </div>
        </div>
	</header>
	
	<div class="containter col-xs-6 col-md-offset-3">
		<form id="form3" name="form3" method="post" action="test3.php">
		<table class="table table-hover">
			<thead>
			<tr>
				<th>题目类型</th>
				<th>题目内容</th>
				<th>答案</th>
			</tr>
			</thead>
			<tbody>
			<?php
				$i = rand(1,50);
				$sql = "select * from DECIMALMULTIPLICATION where DM_ID = '$i'";
				$ret = $db->query($sql);
                while($value = $ret->fetchArray(SQLITE3_ASSOC) ){ 				
                ?>
			<tr>
				<td>小数乘法</td>
				<td><?php print $value['DM_CONTENT'];?></td>
				<td><div id="divTest1"><?php print $value['DM_Z'];?></div></td>	
			</tr>
			<?php
                }
            ?>
			<?php
				$i = rand(1,50);
				$sql = "select * from DECIMALMULTIPLICATION where DM_ID = '$i'";
				$ret = $db->query($sql);
                while($value = $ret->fetchArray(SQLITE3_ASSOC) ){ 				
                ?>
			<tr>
				<td>小数乘法</td>
				<td><?php print $value['DM_CONTENT'];?></td>
				<td><div id="divTest6"><?php print $value['DM_Z'];?></div></td>	
			</tr>
			<?php
                }
            ?>
			<?php
				$i = rand(1,50);
				$sql = "select * from DECIMALDIVISION where DD_ID = '$i'";

				$ret = $db->query($sql);
                while($value = $ret->fetchArray(SQLITE3_ASSOC) ){ 				
                ?>
			<tr>
				<td>小数除法</td>
				<td><?php print $value['DD_CONTENT'];?></td>
				<td><div id="divTest2"><?php print $value['DD_Z'];?></div></td>
			</tr>
			<?php
                }
            ?>
			<?php
				$i = rand(1,50);
				$sql = "select * from DECIMALDIVISION where DD_ID = '$i'";

				$ret = $db->query($sql);
                while($value = $ret->fetchArray(SQLITE3_ASSOC) ){ 				
                ?>
			<tr>
				<td>小数除法</td>
				<td><?php print $value['DD_CONTENT'];?></td>
				<td><div id="divTest7"><?php print $value['DD_Z'];?></div></td>
			</tr>
			<?php
                }
            ?>
			<?php
				$i = rand(1,50);
				$sql = "select * from SIMPLIFIEDCALCULATION where SC_ID = '$i'";

				$ret = $db->query($sql);
                while($value = $ret->fetchArray(SQLITE3_ASSOC) ){ 				
                ?>
			<tr>
				<td>简算题</td>
				<td><?php print $value['SC_CONTENT'];?></td>
				<td><div id="divTest3"><?php print $value['SC_Z'];?></div></td>
			</tr>
			<?php
                }
            ?>
			<?php
				$i = rand(1,50);
				$sql = "select * from SIMPLIFIEDCALCULATION where SC_ID = '$i'";

				$ret = $db->query($sql);
                while($value = $ret->fetchArray(SQLITE3_ASSOC) ){ 				
                ?>
			<tr>
				<td>简算题</td>
				<td><?php print $value['SC_CONTENT'];?></td>
				<td><div id="divTest8"><?php print $value['SC_Z'];?></div></td>
			</tr>
			<?php
                }
            ?>
			<?php
				$i = rand(1,50);
				$sql = "select * from FOURHYBRID where FH_ID = '$i'";

				$ret = $db->query($sql);
                while($value = $ret->fetchArray(SQLITE3_ASSOC) ){ 				
                ?>
			<tr>
				<td>四则运算</td>
				<td><?php print $value['FH_CONTENT'];?></td>
				<td><div id="divTest4"><?php print $value['FH_Z'];?></div></td>
			</tr>
			<?php
                }
            ?>
			<?php
				$i = rand(1,50);
				$sql = "select * from FOURHYBRID where FH_ID = '$i'";

				$ret = $db->query($sql);
                while($value = $ret->fetchArray(SQLITE3_ASSOC) ){ 				
                ?>
			<tr>
				<td>四则运算</td>
				<td><?php print $value['FH_CONTENT'];?></td>
				<td><div id="divTest9"><?php print $value['FH_Z'];?></div></td>
			</tr>
			<?php
                }
            ?>
			
			<tr>
			<?php
				$i = rand(1,100);
				$sql = "select * from EQUATIONS where E_ID = '$i'";

				$ret = $db->query($sql);
                while($value = $ret->fetchArray(SQLITE3_ASSOC) ){ 				
                ?>
				<td>解方程</td>
				<td><?php print $value['E_CONTENT'];?></td>
				<td><div id="divTest5"><?php print $value['E_Z'];?></div></td>
			</tr>
			<?php
                }
            ?>
			<?php
				$i = rand(1,100);
				$sql = "select * from EQUATIONS where E_ID = '$i'";

				$ret = $db->query($sql);
                while($value = $ret->fetchArray(SQLITE3_ASSOC) ){ 				
                ?>
				<td>解方程</td>
				<td><?php print $value['E_CONTENT'];?></td>
				<td><div id="divTest10"><?php print $value['E_Z'];?></div></td>
			</tr>
			<?php
                }
            ?>
			</tbody>
		</table>
		</form>
	</div>
	<script>
		function doHide(){
          var oDiv = document.getElementById("divTest1");
          var oButton = document.getElementById("but")
          if (oDiv.style.display == "none"){
            oDiv.style.display = "block";
            oButton.value = "隐藏答案"
          }else {
            oDiv.style.display = "none";
            oButton.value = "显示答案"
          }
		  var oDiv = document.getElementById("divTest2");
          var oButton = document.getElementById("but")
          if (oDiv.style.display == "none"){
            oDiv.style.display = "block";
            oButton.value = "隐藏答案"
          }else {
            oDiv.style.display = "none";
            oButton.value = "显示答案"
          }
		  var oDiv = document.getElementById("divTest3");
          var oButton = document.getElementById("but")
          if (oDiv.style.display == "none"){
            oDiv.style.display = "block";
            oButton.value = "隐藏答案"
          }else {
            oDiv.style.display = "none";
            oButton.value = "显示答案"
          }
		  var oDiv = document.getElementById("divTest4");
          var oButton = document.getElementById("but")
          if (oDiv.style.display == "none"){
            oDiv.style.display = "block";
            oButton.value = "隐藏答案"
          }else {
            oDiv.style.display = "none";
            oButton.value = "显示答案"
          }
		  var oDiv = document.getElementById("divTest5");
          var oButton = document.getElementById("but")
          if (oDiv.style.display == "none"){
            oDiv.style.display = "block";
            oButton.value = "隐藏答案"
          }else {
            oDiv.style.display = "none";
            oButton.value = "显示答案"
          }
		  var oDiv = document.getElementById("divTest6");
          var oButton = document.getElementById("but")
          if (oDiv.style.display == "none"){
            oDiv.style.display = "block";
            oButton.value = "隐藏答案"
          }else {
            oDiv.style.display = "none";
            oButton.value = "显示答案"
          }
		  var oDiv = document.getElementById("divTest7");
          var oButton = document.getElementById("but")
          if (oDiv.style.display == "none"){
            oDiv.style.display = "block";
            oButton.value = "隐藏答案"
          }else {
            oDiv.style.display = "none";
            oButton.value = "显示答案"
          }
		  var oDiv = document.getElementById("divTest8");
          var oButton = document.getElementById("but")
          if (oDiv.style.display == "none"){
            oDiv.style.display = "block";
            oButton.value = "隐藏答案"
          }else {
            oDiv.style.display = "none";
            oButton.value = "显示答案"
          }
		  var oDiv = document.getElementById("divTest9");
          var oButton = document.getElementById("but")
          if (oDiv.style.display == "none"){
            oDiv.style.display = "block";
            oButton.value = "隐藏答案"
          }else {
            oDiv.style.display = "none";
            oButton.value = "显示答案"
          }
		  var oDiv = document.getElementById("divTest10");
          var oButton = document.getElementById("but")
          if (oDiv.style.display == "none"){
            oDiv.style.display = "block";
            oButton.value = "隐藏答案"
          }else {
            oDiv.style.display = "none";
            oButton.value = "显示答案"
          }
        }
	</script>
</body>
</html>