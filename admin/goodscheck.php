<?php /* session_start(); */
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
		<link rel="stylesheet" href="../css/admingoodscheck.css">
	</head>
	<body>
		<div id="top">
			<h1>校小闲后台管理系统</h1>
		</div>
		<div id="navigation">
			<div id="admin">
				<h3>管理员:admin</h3>
			</div>
			<div id="link">
				<div id="menu">
					<p>闲置管理</p>
					<ul>
						<li><a href="#">闲置列表</a></li>
						<li><a href="#">举报处理</a></li>
					</ul>
				</div>
				<div id="menu">
					<p>用户管理</p>
					<ul>
						<li><a href="#">用户查看</a></li>
						<li><a href="#">重置密码</a></li>
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
				<form action="">
					<select name="" required="required">
						<option disabled selected >请选择搜索条件</option>
						<option value="1" <?php if(isset($_GET[''])&&$_GET['']==1) echo "selected";?>>待填写</option>
						<option value="2" <?php if(isset($_GET[''])&&$_GET['']==2) echo "selected";?>>待填写</option>
						<option value="3" <?php if(isset($_GET[''])&&$_GET['']==3) echo "selected";?>>待填写</option>
						<option value="4" <?php if(isset($_GET[''])&&$_GET['']==4) echo "selected";?>>待填写</option>
					</select>
					<input name="" id="input1" type="text" placeholder="请输入查询内容" value="<?php if(isset($_GET[''])) echo $_GET[''];?>"/>
					<input name="" id="input2" type="submit" value="搜索" />
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
							$sql="select * from goods";
							$result=mysqli_query($link,$sql);
							$i=0;
							while($rows=mysqli_fetch_object($result)){
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
								<a id="reset" href="">查看详情</a>
								<a id="reset" href="">编辑</a>
							</td>
						</tr>
						<?php } ?>
					</table>
				</div>
				<div id="datapage">
					
				</div>
			</div>
		</div>
	</body>
</html>