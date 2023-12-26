<?php session_start();
	if(!isset($_SESSION["student_id"])||$_SESSION["student_id"]==""){
		echo "<script>alert('你还没有登录,请先登录');document.location ='login.php'</script>";
	}
	include_once("conn.php");
	if ($link->connect_error){
		die("连接失败：".$link->connect_error);
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <title>首页</title>
    <link rel="stylesheet" href="../css/userindex.css">
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
	
	<div id="search">
		<form action="index.php#search">
			<select name="term" required="required">
				<option disabled selected >请选择搜索条件</option>
				<option value="1" <?php if(isset($_GET['term'])&&$_GET['term']==1) echo "selected";?>>名称</option>
				<option value="2" <?php if(isset($_GET['term'])&&$_GET['term']==2) echo "selected";?>>关键词</option>
				<option value="3" <?php if(isset($_GET['term'])&&$_GET['term']==3) echo "selected";?>>分类</option>
				<option value="4" <?php if(isset($_GET['term'])&&$_GET['term']==4) echo "selected";?>>卖家id</option>
			</select>
			<input name="node" id="input1" type="text" placeholder="请输入查询内容" value="<?php if(isset($_GET['node'])&&$_GET['node']!='') echo $_GET['node'];?>"/>
			<input id="input2" type="submit" value="搜索" />
		</form>
	</div>
	
	<div id="content">
		<div id="content-left">
			<li>闲置分类</li>
			<li><a href="index.php?term=5#search">数码</a></li>
			<li><a href="index.php?term=6#search">书籍</a></li>
			<li><a href="index.php?term=7#search">服饰</a></li>
			<li><a href="index.php?term=8#search">箱包</a></li>
			<li><a href="index.php?term=9#search">生活用品</a></li>
			<li><a href="index.php?term=10#search">个人DIY</a></li>
		</div>
		<div id="content-right">
			<ul>
				<?php
					$startpage=1;//首页
					$pagesize=8;//每页行数
					if(!isset($_GET['term'])){
						$_GET['term']=5;
					}
					switch($_GET['term']){
						case 1:$sql="select * from goods where name like '%".$_GET['node']."%'";break;
						case 2:$sql="select * from goods where keyword like '%".$_GET['node']."%'";break;
						case 3:$sql="select * from goods where type like '%".$_GET['node']."%'";break;
						case 4:$sql="select * from goods where student_id like '%".$_GET['node']."%'";break;
						case 5:$sql="select * from goods where type like '%数码%'";break;
						case 6:$sql="select * from goods where type like '%书籍%'";break;
						case 7:$sql="select * from goods where type like '%服饰%'";break;
						case 8:$sql="select * from goods where type like '%箱包%'";break;
						case 9:$sql="select * from goods where type like '%生活用品%'";break;
						case 10:$sql="select * from goods where type like '%个人DIY%'";break;
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
						case 1:$sqllist="select * from goods where name like '%".$_GET['node']."%' limit ".($page-1)*$pagesize.",".$pagesize;break;
						case 2:$sqllist="select * from goods where keyword like '%".$_GET['node']."%' limit ".($page-1)*$pagesize.",".$pagesize;break;
						case 3:$sqllist="select * from goods where type like '%".$_GET['node']."%' limit ".($page-1)*$pagesize.",".$pagesize;break;
						case 4:$sqllist="select * from goods where student_id like '%".$_GET['node']."%' limit ".($page-1)*$pagesize.",".$pagesize;break;
						case 5:$sqllist="select * from goods where type like '%数码%' limit ".($page-1)*$pagesize.",".$pagesize;break;
						case 6:$sqllist="select * from goods where type like '%书籍%' limit ".($page-1)*$pagesize.",".$pagesize;break;
						case 7:$sqllist="select * from goods where type like '%服饰%' limit ".($page-1)*$pagesize.",".$pagesize;break;
						case 8:$sqllist="select * from goods where type like '%箱包%' limit ".($page-1)*$pagesize.",".$pagesize;break;
						case 9:$sqllist="select * from goods where type like '%生活用品%' limit ".($page-1)*$pagesize.",".$pagesize;break;
						case 10:$sqllist="select * from goods where type like '%个人DIY%' limit ".($page-1)*$pagesize.",".$pagesize;break;
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
				</li>
				<?php } ?>
			</ul>
		</div>
		<div id="content-foot">
			<form action="#search">
				<input type="hidden" name="term" value="<?php if(isset($_GET['term'])) echo $_GET['term'];?>">
				<input type="hidden" name="node" value="<?php if(isset($_GET['node'])) echo $_GET['node'];?>">
				<?php
					for($n=1;$n<=$endpage;$n++){
						echo "<input type='submit' name='pagenum' value='".$n."'/>";
					}
				?>
			</form>
		</div>
	</div>
	
	<div id="bottom">
		
	</div>
</body>
</html>