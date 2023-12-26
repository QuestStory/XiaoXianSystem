<?php
	session_start();
	include_once("conn.php");
	if ($link->connect_error){
		die("连接失败：".$link->connect_error);
	}
	
	/* 对输入的密码加密 */
	$encryption=md5(md5($_POST["pass"]).md5($_POST["user"]));
	
	/* 查询是否存在输入的账号 */
	$sql="select * from user where student_id=".$_POST["user"];
	$result = mysqli_query($link, $sql);
	$rows=mysqli_num_rows($result);
	
	if($rows==1){	/* 结果集行数为1，账号存在，验证密码 */
		$check=mysqli_fetch_object($result);
		if($check->password==$encryption){
			$_SESSION["student_id"]=$check->student_id;
			$_SESSION["name"]=$check->name;
			$_SESSION["nickname"]=$check->nickname;
			$_SESSION["pass"]=$_POST["pass"];
			$_SESSION["sex"]=$check->sex;
			$_SESSION["sign"]=$check->sign;
			$_SESSION["university"]=$check->university;
			$_SESSION["college"]=$check->college;
			$_SESSION["major"]=$check->major;
			$_SESSION["grade"]=$check->grade;
			$_SESSION["class"]=$check->class;
			$_SESSION["contact"]=$check->contact;
			header("location:index.php");
		}else{	
			echo "<script>alert('密码错误');document.location ='login.php'</script>";
		}
	}else{	/* 结果集行数为0，账号不存在，返回登录界面 */
		echo "<script>alert('该账号不存在');document.location ='login.php'</script>";
	}
?>