<?php
	if(!(isset($_REQUEST['username'])&&(!empty($_REQUEST['username'])))){
		echo "<script>alert('username不能为空');window.location.href='login.php'</script>";
	}
	if(!(isset($_REQUEST['password'])&&(!empty($_REQUEST['password'])))){
		echo "<script>alert('password不能为空');window.location.href='login.php'</script>";
	}
	$usernam=$_REQUEST['username'];
	$passwor=$_REQUEST['password'];   //$_POST['password'];	
	$method =$_REQUEST['method'];
	$conn = new SQLite3('math.db');
	if(strcmp($method,'register')==0)
	{
		$flag=0;
		$name = $conn->query("select * from User where username='$usernam'");
		while(!!$row=$name->fetchArray())
		{
			$flag=1;
		}
		if($flag==0)
		{
			$conn->exec("insert into User values('$usernam','$passwor')");
		}
		echo $flag;
	}
	else if(strcmp($method,'loginnow')==0)
	{
		$flag=0;
		$name = $conn->query("select * from User where username='$usernam'");
		while(!!$row=$name->fetchArray())
		{
			if(strcmp($passwor,$row['password'])==0)
			{
				$flag=1;
			}
			else
			{
				$flag=2;
			}
		}
		echo $flag;
	}
	$conn->close();
?>