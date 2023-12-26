<?php session_start();
	include_once("conn.php");
	if(!isset($_SESSION["student_id"])||$_SESSION["student_id"]==""){
		echo "<script>alert('你还没有登录,请先登录');document.location ='../user/login.php'</script>";
	}
	if ($link->connect_error){
		die("连接失败：".$link->connect_error);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>个人中心</title>
    <link rel="stylesheet" href="../css/userpersonal.css">
</head>
<body>
	<div id="top">
		<div id="logo">
			<img src="../img/logo.png"/>
		</div>
		<div id="link">
			<li id="page"><a href="index.php">首页</a></li>
			<li id="page"><a href="release.php">发布闲置</a></li>
			<li id="page"><a href="personal.php">个人中心</a></li>
		</div>
	</div>
	<div id="content">
		<div id="content-left">
			<div id="show1">
				<div>
					<img src="../img/admin.png" />
					<p>
						<?php
							echo $_SESSION["name"];
							if($_SESSION["sex"]==0){
								echo "<img src='../img/girl.png' />";
							}else{
								echo "<img src='../img/boy.png' />";
							}
						?>
					</p>
				</div>
				<div>
					<p><?=$_SESSION["university"]; ?></p>
					<p><?=$_SESSION["college"]; ?></p>
					<p><?=$_SESSION["major"].$_SESSION["class"]; ?></p>
				</div>
			</div>
			<div id="show2">
				<p>我的签名:
				<em><?=$_SESSION["sign"]; ?></em></p>
			</div>
			<div id="show3">
				<form action="personaldeal.php" method="post">
					<em>&emsp;&emsp;账号:</em>
					<input type="text"     class="input1" value="<?=$_SESSION["student_id"]; ?>" readonly name="destroy" >
					<input type="submit"   class="input3" value="注销"/>
				</form>
				
				<form action="personaldeal.php" method="post">
					<em>&emsp;&emsp;昵称:</em>
					<input type="text"     class="input1" value="<?=$_SESSION["nickname"]; ?>" name="nickname">
					<input type="submit"   class="input3" value="修改"/>
				</form>
				
				<form action="personaldeal.php" method="post">
					<em>&emsp;&emsp;密码:</em>
					<input type="password" class="input1" value="<?=$_SESSION["pass"]; ?>" name="pass">
					<input type="submit"   class="input3" value="修改"/>
				</form>
				
				<form action="personaldeal.php" method="post">
					<em>&emsp;&emsp;性别:</em>
					<select name="sex"     class="input2" required="required">
						<option style="text-align: left;" value="0" <?php if($_SESSION["sex"]==0) echo "selected";?>>女</option>
						<option style="text-align: left;" value="1" <?php if($_SESSION["sex"]==1) echo "selected";?>>男</option>
					</select>
					<input type="submit"   class="input3" value="修改"/>
				</form>
				
				<form action="personaldeal.php" method="post">
					<em>个性签名:</em>
					<input type="text"     class="input1" value="<?=$_SESSION["sign"]; ?>" name="sign" />
					<input type="submit"   class="input3" value="修改"/>
				</form>
			</div>
		</div>
		<div id="content-right">
			<div id="tab">
				<a href="?term=1">我的发布</a>
				<!-- <a href="?term=2">我的想要</a> -->
				<a href="?term=3">我的收藏</a>
			</div>
			<div id="box">
				<ul>
					<?php
						$startpage=1;//首页
						$pagesize=8;//每页行数
						if(!isset($_GET['term'])){
							$_GET['term']=1;
						}
						switch($_GET['term']){
							case 1:$sql="select * from goods where student_id=".$_SESSION['student_id'];break;
							// case 2:$sql="select * from goods where student_id=".$_SESSION['student_id']." and state=2";break;
							case 3:$sql="select * from collection where collector_id=".$_SESSION['student_id'];break;
						}
						
						$result=mysqli_query($link,$sql);
						$datasize=mysqli_num_rows($result);
						$endpage=ceil($datasize/$pagesize);
						if(isset($_GET['pagenum'])){
							$page=$_GET['pagenum'];
						}else{
							$page=$startpage;
						}  
						switch($_GET['term']){
							case 1:$sqllist="select * from goods where student_id=".$_SESSION['student_id']." limit ".($page-1)*$pagesize.",".$pagesize;break;
							// case 2:$sqllist="select * from goods where student_id=".$_SESSION['student_id']." and state=2 limit ".($page-1)*$pagesize.",".$pagesize;break;
							case 3:$sqllist="select * from collection left join goods on collection.goods_id=goods.goods_id where collector_id=".$_SESSION['student_id']." limit ".($page-1)*$pagesize.",".$pagesize;break;
						}
						$resultlist= mysqli_query($link, $sqllist);
						while($rows=mysqli_fetch_object($resultlist)){
					?>
					<li>
						<a href="detail.php?goods_id=<?php echo $rows->goods_id; ?>">
							<div>
								<img src="<?php echo explode('&',$rows->photo,4)[0]; ?>" >
								<p><?php echo $rows->name; ?></p>
							</div>
						</a>
						<?php
							if($_GET['term']==1){
								echo "<a id='dustbin' href='detaildeal.php?dustbin=1&goods_id=".$rows->goods_id."' title='删除'><img src='../img/dustbin.png'></a>";
							}
							if($_GET['term']==3){
								echo "<a id='heart' href='detaildeal.php?point=1&goods_id=".$rows->goods_id."' title='取消收藏'><img src='../img/heart.png'></a>";
							}
						?>
					</li>
					<?php } ?>
				</ul>
			</div>
			<div id="foot">
				<form action="">
					<input type="hidden" name="term" value="<?php if(isset($_GET['term'])) echo $_GET['term'];?>">
					<?php
						for($n=1;$n<=$endpage;$n++){
							echo "<input type='submit' name='pagenum' value='".$n."'/>";
						}
					?>
					<script>
						window.location.hash = "#content";
					</script>
				</form>
			</div>
		</div>
	</div>
	<div id="bottom">
		
	</div>
</body>
</html>