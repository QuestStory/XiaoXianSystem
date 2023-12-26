<?php session_start();
	include_once("conn.php");
	if ($link->connect_error){
		die("连接失败：".$link->connect_error);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="../css/admingoodsquery.css">
	</head>
	<body>
		<div id="top">
			<h1>校小闲后台管理系统</h1>
		</div>
		<div id="navigation">
			<div id="admin">
				<h3>管理员: <?=$_SESSION["mangername"]?></h3>
			</div>
			<div id="link">
				<div id="menu">
					<p>闲置管理</p>
					<ul>
						<li><a href="goodsquery.php">闲置列表</a></li>
						<li><a href="#">举报处理</a></li>
					</ul>
				</div>
				<div id="menu">
					<p>用户管理</p>
					<ul>
						<li><a href="userquery.php">用户列表</a></li>
						<li><a href="#">黑名单</a></li>
					</ul>
				</div>
				<div id="menu">
					<p>订单管理</p>
					<ul>
						<li><a href="#">订单记录</a></li>
						<li><a href="#">订单统计</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="content">
			<div id="search">
				<form action="goodsquery.php">
					<select name="choice" required="required">
						<option disabled selected >请选择搜索条件</option>
						<option value="1" <?php if(isset($_GET['choice'])&&$_GET['choice']==1) echo "selected";?>>闲置名称</option>
						<option value="2" <?php if(isset($_GET['choice'])&&$_GET['choice']==2) echo "selected";?>>闲置分类</option>
						<option value="3" <?php if(isset($_GET['choice'])&&$_GET['choice']==3) echo "selected";?>>关键词</option>
						<option value="4" <?php if(isset($_GET['choice'])&&$_GET['choice']==4) echo "selected";?>>闲置id</option>
						<option value="5" <?php if(isset($_GET['choice'])&&$_GET['choice']==5) echo "selected";?>>发布者id</option>
					</select>
					<input name="content" id="input1" type="text" placeholder="请输入查询内容" value="<?php if(isset($_GET['content'])) echo $_GET['content'];?>"/>
					<input id="input2" type="submit" value="搜索" />
				</form>
			</div>
			<div id="data">
				<div id="datalist">
					<table>
						<tr>
							<th>序号</th>
							<th>闲置id</th>
							<th>闲置名称</th>
							<th>发布者</th>
							<th>分类</th>
							<th>关键词</th>
							<th>操作</th>
						</tr>
						<?php
							$startpage=1;//首页
							$pagesize=10;//每页行数
							if(!(isset($_GET['choice'])&&isset($_GET['content'])&&(!$_GET['choice']=='')&&(!$_GET['content']==''))){
								$sql="select * from goods";
							}else{
								switch(($_GET['choice'])){
									case 1:$sql="select * from goods where name like '%".$_GET['content']."%'";break;
									case 2:$sql="select * from goods where type like '%".$_GET['content']."%'";break;
									case 3:$sql="select * from goods where keyword like '%".$_GET['content']."%'";break;
									case 4:$sql="select * from goods where goods_id like '%".$_GET['content']."%'";break;
									case 5:$sql="select * from goods where student_id like '%".$_GET['content']."%'";break;
								}
							}
							$result=mysqli_query($link,$sql);
							$datasize=mysqli_num_rows($result);
							$endpage=ceil($datasize/$pagesize);
							if(isset($_GET['pagenum'])){
								$page=$_GET['pagenum'];
							}else{
								$page=$startpage;
							}
							if(!(isset($_GET['choice'])&&isset($_GET['content'])&&(!$_GET['choice']=='')&&(!$_GET['content']==''))){
								$sqllist="select * from goods limit ".($page-1)*$pagesize.",".$pagesize;
							}else{
								switch(($_GET['choice'])){
									case 1:$sqllist="select * from goods where name like '%".$_GET['content']."%' limit ".($page-1)*$pagesize.",".$pagesize;break;
									case 2:$sqllist="select * from goods where type like '%".$_GET['content']."%' limit ".($page-1)*$pagesize.",".$pagesize;break;
									case 3:$sqllist="select * from goods where keyword like '%".$_GET['content']."%' limit ".($page-1)*$pagesize.",".$pagesize;break;
									case 4:$sqllist="select * from goods where goods_id like '%".$_GET['content']."%' limit ".($page-1)*$pagesize.",".$pagesize;break;
									case 5:$sqllist="select * from goods where student_id like '%".$_GET['content']."%' limit ".($page-1)*$pagesize.",".$pagesize;break;
								}
							}
							$resultlist=mysqli_query($link,$sqllist);
							$i=$page*$pagesize-$pagesize;
							while($rows=mysqli_fetch_object($resultlist)){
								$i=$i+1;
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $rows->goods_id; ?></td>
							<td><?php echo $rows->name; ?></td>
							<td><?php echo $rows->student_id; ?></td>
							<td><?php echo $rows->type; ?></td>
							<td><?php echo $rows->keyword;?></td>
							<td>
								<button><a href="goodsquery.php?popid=<?=$rows->goods_id;?>">查看详情</a></button>
								<button><a href="goodsquery.php">编辑</a></button>
							</td>
						</tr>
						<?php } ?>
					</table>
				</div>
				<div id="datapage">
					<form action="goodsquery.php">
						<input type="hidden" name="choice" value="<?php if(isset($_GET['choice'])&&isset($_GET['content'])) echo $_GET['choice'];?>">
						<input type="hidden" name="content" value="<?php if(isset($_GET['choice'])&&isset($_GET['content'])) echo $_GET['content'];?>">
						<?php
							for($n=1;$n<=$endpage;$n++){
								echo "<input type='submit' name='pagenum' value='".$n."'/>";
							}
						?>
						<script>
							window.location.hash = "#datapage";
						</script>
					</form>
				</div>
			</div>
		</div>
		<div id="popcover"></div>
		<div id="popup">
			<?php
				if(isset($_GET['popid'])&&($_GET['popid']!='')){
					echo "<script type='text/javascript'>
						document.getElementById('popcover').style.display='block';
						document.getElementById('popup').style.display='block';
						document.body.style.setProperty('overflow','hidden');
						</script>";
					$sql="select *,goods.name as name from goods left join user on goods.student_id=user.student_id where goods_id="."'".$_GET['popid']."'";
					$result= mysqli_query($link,$sql);
					$rows=mysqli_fetch_object($result);
				}
			?>
			<div id="poppicture">
				<?php
					$array=explode('&',$rows->photo,4);
					foreach($array as $key=>$value){
						echo "<img src=$value>";
					}
				?>
			</div>
			<div id="popinfo">
				<ul>
					<li id="name"><?php echo $rows->name ;?></li>
					<li id="from"><label>来自：</label><span><?php echo $rows->major.$rows->class."的";?></span><b><?=$rows->nickname?></b></li>
					<li id="describe"><label>描述：</label><pre><?php  echo $rows->describe;?></pre></li>
					<li id="price"><label>价格：</label><span><?php echo $rows->price ;?></span></li>
					<li id="type"><label>分类：</label><span><?php echo $rows->type ;?></span></li>
				</ul>
			</div>
			<div id="popbutton">
				<button type="button" onclick="closepop()">关闭</button>
				<?php
					$_GET['popid']='';
				?>
			</div>
		</div>
		<script type="text/javascript">
			function closepop(){
				document.getElementById("popup").style.display="none";
				document.getElementById("popcover").style.display="none";
				document.body.style.removeProperty("overflow");
			}
		</script>
	</body>
</html>