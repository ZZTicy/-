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
      	echo "okokokok";
   	}
	if(!(isset($_POST['username2'])&&(!empty($_POST['username2'])))){
		echo "<script>alert('账号不能为空');window.location.href='index.php'</script>";
	}
	if(!(isset($_POST['password2'])&&(!empty($_POST['password2'])))){
		echo "<script>alert('密码不能为空');window.location.href='index.php'</script>";
	}
	if(!(isset($_POST['password3'])&&(!empty($_POST['password3'])))){
		echo "<script>alert('重复密码不能为空');window.location.href='index.php'</script>";
	}
	if(strcmp($_POST['password2'],$_POST['password3'])!=0){
		echo "<script>alert('重复密码与先前密码不一致');window.location.href='index.php'</script>";
	}
	$username2=$_POST['username2'];
	$password2=$_POST['password2'];
	$sql =<<<EOF
    	insert into USER(username,password) values ('$username2','$password2');
EOF;
	$ret = $db->query($sql);
   	if(!$ret){
     	echo $db->lastErrorMsg();
     	echo "<script>alert('注册用户失败');window.location.href='inde.php'</script>";
   	} else {
      	
      	echo "<script>alert('注册用户成功');window.location.href='index.php'</script>";
      	
   	}
?>
	