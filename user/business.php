 <?php
	session_start();
 	include_once("conn.php");
 	if ($link->connect_error){
 		die("连接失败：".$link->connect_error);
 	}
	// //session_start();
	// Header("Cache-Control: must-revalidate");
	// if(!isset($_SESSION["student_id"])||$_SESSION["student_id"]==""){
	// 	echo "<script>alert('你还没有登录,请先登录');document.location ='login.php'</script>";
	// }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		
	</head>
	<body>
		<div>
			<?php
				$sql="select * from goods where goods_id='".$_GET['goods_id']."'";
				echo $sql;
				$result= mysqli_query($link,$sql);
				$rows=mysqli_fetch_object($result);
			?>
			 <p>ta提供的联系方式</p><span><?php echo $rows->contact?></span>
		</div>
	</body>
</html>
		