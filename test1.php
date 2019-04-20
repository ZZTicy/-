<?php
	
	if(!(isset($_POST['username1'])&&(!empty($_POST['username1'])))){
		echo "<script>alert('username不能为空');window.location.href='index.php'</script>";
	}
	if(!(isset($_POST['password1'])&&(!empty($_POST['password1'])))){
		echo "<script>alert('password不能为空');window.location.href='index.php'</script>";
	}
	$username=$_POST['username1'];
	$password=$_POST['password1'];
	$conn = new SQLite3('math.db');
	$name = $conn->query("select * from USER where USERNAME='$username'");
	while(!!$row=$name->fetchArray()){
		if(strcmp($password,$row['PASSWORD'])==0){
			echo "<script>window.location.href='add.php'</script>";
		}else{
			echo "<script>alert('密码错误');window.location.href='index.php'</script>";
		}
	}
	echo "<script>alert('账号未注册，请返回注册');window.location.href='index.php'</script>";
	$conn->close();
	
?>