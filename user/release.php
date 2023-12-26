<?php
	session_start();
	Header("Cache-Control: must-revalidate");
	if(!isset($_SESSION["student_id"])||$_SESSION["student_id"]==""){
		echo "<script>alert('你还没有登录,请先登录');document.location ='login.php'</script>";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>发布</title>
		<link rel="stylesheet" href="../css/userrelease.css">
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
			<form action="releasedeal.php" method="post" enctype="multipart/form-data">
				<div id="total">
					<h1>发布闲置</h1>
					<p>最多选择4个文件</p>
				</div>
				<div id="picture">
					<div>
						<input name="file[]" id="file1" type="file" onchange="changepic1(this)"/>
						<img src="" id="show1"/>
					</div>
					<div>
						<input name="file[]" id="file2" type="file" onchange="changepic2(this)"/>
						<img src="" id="show2"/>
					</div>
					<div>
						<input name="file[]" id="file3" type="file" onchange="changepic3(this)"/>
						<img src="" id="show3"/>
					</div>
					<div>
						<input name="file[]" id="file4" type="file" onchange="changepic4(this)"/>
						<img src="" id="show4"/>
					</div>
				</div>
				<div id="node">
					<div id="first">
						<label>名称</label><input name="name" type="text"/>
						<label>分类</label><select name="type" required="required">
							<option value="" disabled selected>请选择分类</option>
							<option value="数码">数码</option>
							<option value="书籍">书籍</option>
							<option value="服饰">服饰</option>
							<option value="箱包">箱包</option>
							<option value="生活用品">生活用品</option>
							<option value="个人DIY">个人DIY</option>
						</select>
						<label>关键词</label><input type="text" name="keyword">
						<label>价格</label><input type="text" name="price"/>
					</div>
					<div id="second">
						<label>描述</label><pre><textarea name="describe"></textarea></pre>
						<label>交易方式</label><pre><textarea name="contact"></textarea></pre>
					</div>
					<div id="third">
						<button type="reset">重置</button>
						<button onclick="Submit">发布</button>
					</div>
				</div>
			</form>
		</div>
		<div id="bottom">
			
		</div>
		<script>
		    function changepic1() {
		        var reads= new FileReader();
		        f=document.getElementById('file1').files[0];
		        reads.readAsDataURL(f);
		        reads.onload=function (e) {
		            document.getElementById('show1').src=this.result;
		        };
		    }
			function changepic2() {
			    var reads= new FileReader();
			    f=document.getElementById('file2').files[0];
			    reads.readAsDataURL(f);
			    reads.onload=function (e) {
			        document.getElementById('show2').src=this.result;
			    };
			}
			function changepic3() {
			    var reads= new FileReader();
			    f=document.getElementById('file3').files[0];
			    reads.readAsDataURL(f);
			    reads.onload=function (e) {
			        document.getElementById('show3').src=this.result;
			    };
			}
			function changepic4() {
			    var reads= new FileReader();
			    f=document.getElementById('file4').files[0];
			    reads.readAsDataURL(f);
			    reads.onload=function (e) {
			        document.getElementById('show4').src=this.result;
			    };
			}
		</script>
	</body>
</html>
