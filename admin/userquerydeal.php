<?php
	include_once("conn.php");
	if ($link->connect_error){
		die("连接失败：".$link->connect_error);
	}
	
	if(isset($_GET['point'])){	//重置密码
		if($_GET['point']==1){
			$encryption=md5(md5(123456).md5($_GET['student_id']));
			$sql="update user set password='".$encryption."' where student_id=".$_GET['student_id'];
			$result = mysqli_query($link, $sql);
			if($result){
				echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';alert('重置成功');</script>";
			}
		}
	}
?>