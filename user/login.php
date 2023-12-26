<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>登录</title>
		<link rel="stylesheet" href="../css/userlogin.css">
	</head>
	<body>
		<div id="box">
			<div id="content">
				<h1>欢迎来到校小闲</h1> <!-- 用户端登录页面 -->
				<form action="logindeal.php" method="post">
					<input type="text" name="user" placeholder="账户" />
					<input type="password" name="pass" placeholder="密码" />
					<input type="submit" value="登录" />
				</form>
				<div>
					<button><a href="register.php">注册</a></button>
					<button onclick="tips()">忘记密码</button>
				</div>
			</div>
		</div>
		<script>
			function tips(){
				alert("请带上校园卡或学生证前往15栋605管理员办公室，申请重置密码");
			}
		</script>
	</body>
</html>
