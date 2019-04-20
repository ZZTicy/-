<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>小学五年级出题器</title>

    <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/login-register.js" type="text/javascript"></script>
	<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/style.css">
	<link href="css/login-register.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="form row">
            <div class="form-horizontal col-md-offset-3" id="login_form">
                <h3 class="form-title">小学五年级出题器</h3>
				<form id="form1" name="form1" method="post" action="test1.php">
                <div class="col-md-9">
                    <div class="form-group">
                        <i class="fa fa-user fa-lg"></i>
                        <input class="form-control required" type="text" placeholder="请输入账号" id="username1" name="username1" autofocus="autofocus" maxlength="20"/>
                    </div>
                    <div class="form-group">
                            <i class="fa fa-lock fa-lg"></i>
                            <input class="form-control required" type="password" placeholder="请输入密码" id="password1" name="password1" maxlength="8"/>
                    </div>
                    <div class="form-group">
                        <label class="checkbox">
                            <input type="checkbox" name="remember" value="1"/>记住我
                        </label>
                    </div>
                    <div class="form-group col-md-offset-9">
                        <button type="button" class="btn btn-success pull-left" onclick="openRegisterModal();">注册</button>
						<button type="submit" class="btn btn-success pull-right" name="submit">登录</button>
                    </div>
					
					<div class="modal fade login" id="loginModal">
					  <div class="modal-dialog login animated">
						  <div class="modal-content">
							 <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">注册</h4>
							</div>
							<div class="modal-body">  
								<div class="box">
									 <div class="content">
										
										<div class="error"></div>
										<div class="form loginBox">
											<form method="post" action="/login" accept-charset="UTF-8">
											<input id="email" class="form-control" type="text" placeholder="请输入账号" name="email">
											<input id="password" class="form-control" type="password" placeholder="请输入密码" name="password">
											<input class="btn btn-default btn-login" type="button" value="Login" onclick="loginAjax()">
											</form>
										</div>
									 </div>
								</div>
								<div class="box">
									<div class="content registerBox" style="display:none;">
									 <div class="form" style="width:95%;">
										<form id="form2" name="form2" method="post" action="test2.php" accept-charset="UTF-8">
										<input id="username2" class="form-control" type="text" placeholder="请输入账号" name="username2">
										<input id="password2" class="form-control" type="password" placeholder="请输入密码" name="password2">
										<input id="password3" class="form-control" type="password" placeholder="重复输入密码" name="password3">
										<button type="submit" class="btn btn-default btn-register" type="button">注册账户</button>
										</form>
										</div>
									</div>
								</div>
								
							</div>
					  </div>
				  </div>
				<script type="text/javascript">
					jQuery(function($){
						$(document).on('click','#login1',function(){
							var username = $("#username1").val();//取框中的用户名
							var password = $("#password1").val();//取框中的用户名
							var method = 'loginnow';//取框中的用户名
							$.ajax({
								type:"post", 
								url :"connect_sqlite.php", 
								data:"&username="+username+"&password="+password+"&method="+method,
								datatype:"int",
								success:function(result){
									var a=result;
									if(a==1)
									{
										alert("您还未注册,点击左下角进行注册");
										window.open("add.php");
									}
									else if(a==2)
									{
										alert("您的密码输入有误");
									}
									else if(a==0)
									{
										
									}
								}
							});
						});
						$(document).on('click','#login2',function(){
							var username = $("#username2").val();//取框中的用户名
							var password2 = $("#password2").val();//取框中的用户名
							var password3 = $("#password3").val();//取框中的用户名
							var method = 'register';//取框中的用户名
							if(password2==password3)
							{
								$.ajax({
									type:"post", 
									url :"connect_sqlite.php", 
									data:"&username="+username+"&password="+password2+"&method="+method,
									success: function(result){
										if(result==0)
											alert("注册成功，赶快去登录吧！");
										else
											alert("您已注册，赶快去登录吧！");
									}
								});
							}
							else
							{
								alert("重复密码不一致");
							}
						});
					});
				</script>  
                </div>
            </div>
				</form>
		</div>
    </div>
	
</body>
</html>