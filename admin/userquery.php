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
		<link rel="stylesheet" href="../css/adminuserquery.css">
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
				<form action="userquery.php">
					<select name="choice" required="required">
						<option disabled selected >请选择搜索条件</option>
						<option value="1" <?php if(isset($_GET['choice'])&&$_GET['choice']==1) echo "selected";?>>名字</option>
						<option value="2" <?php if(isset($_GET['choice'])&&$_GET['choice']==2) echo "selected";?>>学号</option>
						<option value="3" <?php if(isset($_GET['choice'])&&$_GET['choice']==3) echo "selected";?>>学院</option>
						<option value="4" <?php if(isset($_GET['choice'])&&$_GET['choice']==4) echo "selected";?>>专业</option>
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
							<th>学号</th>
							<th>姓名</th>
							<th>性别</th>
							<th>学院</th>
							<th>专业</th>
							<th>班级</th>
							<th>操作</th>
						</tr>
						<?php
							$startpage=1;//首页
							$pagesize=10;//每页行数
							if(!(isset($_GET['choice'])&&isset($_GET['content'])&&(!$_GET['choice']=='')&&(!$_GET['content']==''))){
								$sql="select * from user";
							}else{
								switch(($_GET['choice'])){
									case 1:$sql="select * from user where name like '%".$_GET['content']."%'";break;
									case 2:$sql="select * from user where student_id like '%".$_GET['content']."%'";break;
								 	case 3:$sql="select * from user where college like '%".$_GET['content']."%'";break;
							 		case 4:$sql="select * from user where major like '%".$_GET['content']."%'";break;
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
								$sqllist="select * from user limit ".($page-1)*$pagesize.",".$pagesize;
							}else{
								switch(($_GET['choice'])){
									case 1:$sqllist="select * from user where name like '%".$_GET['content']."%' limit ".($page-1)*$pagesize.",".$pagesize;break;
									case 2:$sqllist="select * from user where student_id like '%".$_GET['content']."%' limit ".($page-1)*$pagesize.",".$pagesize;break;
									case 3:$sqllist="select * from user where college like '%".$_GET['content']."%' limit ".($page-1)*$pagesize.",".$pagesize;break;
									case 4:$sqllist="select * from user where major like '%".$_GET['content']."%' limit ".($page-1)*$pagesize.",".$pagesize;break;
								}
							}
							$resultlist=mysqli_query($link,$sqllist);
							$i=$page*$pagesize-$pagesize;
							while($rows=mysqli_fetch_object($resultlist)){
								$i=$i+1;
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $rows->student_id; ?></td>
							<td><?php echo $rows->name; ?></td>
							<td><?php if($rows->sex==0) echo "女";else echo "男"; ?></td>
							<td><?php echo $rows->college; ?></td>
							<td><?php echo $rows->major;?></td>
							<td><?php echo $rows->major.$rows->class;?></td>
							<td>
								<button><a id="reset" href="userquerydeal.php?point=1&student_id=<?=$rows->student_id;?>">重置密码</a></button>
								<button><a id="reset" href="userquerydeal.php?point=2">编辑</a></button>
							</td>
						</tr>
						<?php } ?>
					</table>
				</div>
				<div id="datapage">
					<form action="userquery.php">
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
	</body>
</html>