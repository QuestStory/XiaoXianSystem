<?php
	include_once("conn.php");
	if ($link->connect_error){
		die("连接失败：".$link->connect_error);
	}
	
	$stuid = $_POST["studentid"];
	$name = $_POST["name"];
	$sex = $_POST["sex"];
	$college = $_POST["college"];
	$major = $_POST["major"];
	$grade = $_POST["grade"];
	$class = $_POST["class"];
	$password = $_POST["pass"];
	$encryption=md5(md5($password).md5($stuid));
	//首先对用户输入的密码使用MD5加密，在对该用户的id使用MD5加密
	//连接两个加密字符串
	//对连接后的加密字符串再使用MD5加密，最后存入数据库
	$sql="insert into `user` (`student_id`, `name`,`sex`,`password`,`college`,`major`,`grade`,`class`) values ('".$stuid."','".$name."','".$sex."','".$encryption."','".$college."','".$major."','".$grade."','".$class."')";
	$result = mysqli_query($link, $sql);
	if($result){
		echo "<script>alert('注册成功');document.location ='login.php'</script>";
	}else{
		echo "<script>alert('注册失败');document.location ='register.php'</script>";
	}
?>