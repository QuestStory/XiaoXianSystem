<?php session_start();
	include_once("conn.php");
	if ($link->connect_error){
		die("连接失败：".$link->connect_error);
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <title>详情</title>
    <link rel="stylesheet" href="../css/userdetail.css">
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
		<?php
			if(isset($_GET['goods_id'])){
				$sql="select *,goods.name as name from goods left join user on goods.student_id=user.student_id where goods_id="."'".$_GET['goods_id']."'";
				$result= mysqli_query($link,$sql);
				$rows=mysqli_fetch_object($result);
			}
		?>
		<div id="picture">
			<?php
				$array=explode('&',$rows->photo,4);
				foreach($array as $key=>$value){
					echo "<img src=$value>";
				}
			?>
		</div>
		<div id="info">
			<ul>
				<li id="name"><?php echo $rows->name ;?></li>
				<li id="from"><label>来自：</label><span><?php echo $rows->major.$rows->class."的";?></span><b><?=$rows->nickname?></b></li>
				<li id="describe"><label>描述：</label><pre><?php  echo $rows->describe;?></pre></li>
				<li id="price"><label>价格：</label><span><?php echo $rows->price ;?></span></li>
				<li id="type"><label>分类：</label><span><?php echo $rows->type ;?></span></li>
				<li id="point">
					<a onclick="tips()"><span>想 要</span></a>
					<script>
						function tips(){
							<?php
								echo "alert('ta提供的联系方式如下：".$rows->contact."')";
							?>
						}
					</script>
					<?php
						$sql2="select * from collection where collector_id='".$_SESSION['student_id']."' and goods_id='".$_GET['goods_id']."'";
						$result2=mysqli_query($link,$sql2);
						$rows2=mysqli_num_rows($result2);
						if($rows2==1){
							echo "<a href='detaildeal.php?point=1&goods_id=".$_GET['goods_id']."'><span>已 收 藏</span></a>";
						}else{
							echo "<a href='detaildeal.php?point=2&goods_id=".$_GET['goods_id']."'><span>收 藏</span></a>";
						}
					?>
				</li>
			</ul>
		</div>
	</div>
	<div id="bottom">
		
	</div>
</body>
</html>