<?php
	session_start();
	include_once("conn.php");
	if ($link->connect_error){
		die("连接失败：".$link->connect_error);
	}
	
	if(isset($_POST["destroy"])){	//注销session
		session_destroy();
		echo "<script>document.location ='login.php'</script>";
	}
	
	if(isset($_POST["nickname"])){		//修改昵称
		$sql="update user set nickname='".$_POST["nickname"]."' where student_id=".$_SESSION["student_id"];
		$result = mysqli_query($link, $sql);
		if($result){
			$_SESSION["nickname"]=$_POST["nickname"];
			echo "<script>alert('修改成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
		}else{
			echo "<script>alert('修改失败');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
		}
	}
	
	if(isset($_POST["pass"])){		//修改密码
		$encryption=md5(md5($_POST["pass"]).md5($_SESSION["student_id"]));
		$sql="update user set password='".$encryption."' where student_id=".$_SESSION["student_id"];
		$result = mysqli_query($link, $sql);
		if($result){
			$_SESSION["pass"]=$_POST["pass"];
			echo "<script>alert('修改成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
		}
	}
	if(isset($_POST["sex"])){		//修改性别
		$sql="update user set sex='".$_POST["sex"]."' where student_id=".$_SESSION["student_id"];
		$result = mysqli_query($link, $sql);
		if($result){
			$_SESSION["sex"]=$_POST["sex"];
			echo "<script>alert('修改成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
		}
	}
	if(isset($_POST["sign"])){		//修改个性签名
		$sql="update user set sign='".$_POST["sign"]."' where student_id=".$_SESSION["student_id"];
		$result = mysqli_query($link, $sql);
		if($result){
			$_SESSION["sign"]=$_POST["sign"];
			echo "<script>alert('修改成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
		}
	}
?>