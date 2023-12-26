<?php
	session_start();
	include_once("conn.php");
	if ($link->connect_error){
		die("连接失败：".$link->connect_error);
	}
	
	/* 接受管理员输入的账号密码 */
	$manager = $_POST["manager"];
	$pass = $_POST["pass"];
	
	/* 查询是否存在输入的账号 */
	$sql="select * from manager where manager_id=".$manager;
	$result = mysqli_query($link, $sql);
	$rows=mysqli_num_rows($result);
	
	if($rows==1){	/* 结果集行数为1，账号存在，验证密码 */
		$check=mysqli_fetch_object($result);
		if($check->password==$pass){
			$_SESSION["managerid"]=$check->managerid;
			$_SESSION["mangername"]=$check->name;
			header("location:goodsquery.php");
		}else{	
			echo "<script>alert('密码错误');document.location ='login.html'</script>";
		}
	}else{	/* 结果集函数为0，账号不存在，返回登录界面 */
		echo "<script>alert('该账号不存在');document.location ='login.html'</script>";
	}
?>