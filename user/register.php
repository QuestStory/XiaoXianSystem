<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>注册</title>
		<link rel="stylesheet" href="../css/userregister.css">
	</head>
	<body>
		<div id="container">
			<div id="imgInfo">
				<img style="width:400px;height: 400px; border-radius: 12px" src="../img/register1.png">
			</div>
			<div id="userInfo">
				<form action="registerdeal.php" id="table" method="post">
					<input type="text" name="studentid" placeholder="学号">
					<input type="text" name="name" placeholder="姓名">
					<select name="sex" class="select" required="required">
						<option value="" disabled selected>请选择性别</option>
						<option value="0">女</option>
						<option value="1">男</option>
					</select>
					<select name="college" class="select" required="required">
						<option value="" disabled selected>请选择学院</option>
						<option value="人工智能与大数据学院">人工智能与大数据学院</option>
						<option value="电子与物联网学院">电子与物联网学院</option>
						<option value="智能制造与汽车学院">智能制造与汽车学院</option>
						<option value="财经管理学院">财经管理学院</option>
						<option value="通信工程学院">通信工程学院</option>
						<option value="数字媒体学院">数字媒体学院</option>
						<option value="建筑与材料学院">建筑与材料学院</option>
						<option value="智慧健康学院">智慧健康学院</option>
					</select>
					<select name="major" class="select" required="required">
						<option value="" disabled selected>请选择专业</option>
						<option value="软件技术">软件技术</option>
						<option value="信息安全与管理">信息安全与管理</option>
						<option value="大数据技术与应用">大数据技术与应用</option>
						<option value="云计算技术与应用">云计算技术与应用</option>
						<option value="移动互联网技术">移动互联网技术</option>
						<option value="移动应用开发">移动应用开发</option>
						<option value="计算机网络技术">计算机网络技术</option>
						<option value="软件与信息服务">软件与信息服务</option>
						<option value="电子信息工程技术">电子信息工程技术</option>
						<option value="应用电子技术">应用电子技术</option>
						<option value="物联网应用技术">物联网应用技术</option>
						<option value="物联网工程技术">物联网工程技术</option>
						<option value="微电子技术">微电子技术</option>
						<option value="光电显示技术">光电显示技术</option>
						<option value="电子产品营销与服务">电子产品营销与服务</option>
						<option value="机电一体化技术">机电一体化技术</option>
						<option value="智能控制技术">智能控制技术</option>
						<option value="工业机器人技术">工业机器人技术</option>
						<option value="电气自动化技术">电气自动化技术</option>
						<option value="汽车制造与装配技术">汽车制造与装配技术</option>
						<option value="新能源汽车技术">新能源汽车技术</option>
						<option value="机械设计与制造">机械设计与制造</option>
						<option value="无人机应用技术">无人机应用技术</option>
						<option value="财务管理">财务管理</option>
						<option value="会计信息管理">会计信息管理</option>
						<option value="电子商务">电子商务</option>
						<option value="市场营销">市场营销</option>
						<option value="国际经济与贸易">国际经济与贸易</option>
						<option value="物流信息技术">物流信息技术</option>
						<option value="物流管理">物流管理</option>
						<option value="通信技术">通信技术</option>
						<option value="移动通信技术">移动通信技术</option>
						<option value="通信系统运行管理">通信系统运行管理</option>
						<option value="城市轨道交通通信信号技术">城市轨道交通通信信号技术</option>
						<option value="广告设计与制造">广告设计与制造</option>
						<option value="环境艺术设计">环境艺术设计</option>
						<option value="影视动画">影视动画</option>
						<option value="数字媒体应用技术">数字媒体应用技术</option>
						<option value="虚拟现实应用技术">虚拟现实应用技术</option>
						<option value="材料工程技术">材料工程技术</option>
						<option value="建筑智能化工程技术">建筑智能化工程技术</option>
						<option value="工程造价">工程造价</option>
						<option value="建设项目信息化管理">建设项目信息化管理</option>
						<option value="旅游管理">旅游管理</option>
						<option value="酒店管理">酒店管理</option>
						<option value="嵌入式技术与应用">嵌入式技术与应用</option>
						<option value="康复辅助器具技术">康复辅助器具技术</option>
						<option value="医疗设备应用技术">医疗设备应用技术</option>
					</select>
					<select name="grade" class="select" required="required">
						<option value="" disabled selected>请选择年级</option>
						<option value="2019级">2019级</option>
						<option value="2020级">2020级</option>
						<option value="2021级">2021级</option>
						<option value="2022级">2022级</option>
					</select>
					<select name="class" class="select" required="required">
						<option value="" disabled selected>请选择班级</option>
						<option value="1901班">1901班</option>
						<option value="1902班">1902班</option>
						<option value="1903班">1903班</option>
						<option value="1904班">1904班</option>
						<option value="1905班">1905班</option>
						<option value="1906班">1906班</option>
						<option value="1907班">1907班</option>
						<option value="1908班">1908班</option>
						<option value="1909班">1909班</option>
						<option value="1910班">1910班</option>
						<option value="2001班">2001班</option>
						<option value="2002班">2002班</option>
						<option value="2003班">2003班</option>
						<option value="2004班">2004班</option>
						<option value="2005班">2005班</option>
						<option value="2006班">2006班</option>
						<option value="2007班">2007班</option>
						<option value="2008班">2008班</option>
						<option value="2009班">2009班</option>
						<option value="2010班">2010班</option>
						<option value="2101班">2101班</option>
						<option value="2102班">2102班</option>
						<option value="2103班">2103班</option>
						<option value="2104班">2104班</option>
						<option value="2105班">2105班</option>
						<option value="2106班">2106班</option>
						<option value="2107班">2107班</option>
						<option value="2108班">2108班</option>
						<option value="2109班">2109班</option>
						<option value="2110班">2110班</option>
						<option value="2201班">2201班</option>
						<option value="2202班">2202班</option>
						<option value="2203班">2203班</option>
						<option value="2204班">2204班</option>
						<option value="2205班">2205班</option>
						<option value="2206班">2206班</option>
						<option value="2207班">2207班</option>
						<option value="2208班">2208班</option>
						<option value="2209班">2209班</option>
						<option value="2210班">2210班</option>
					</select>
					<input type="password" name="pass" placeholder="密码">
					<input type="password" name="Dopass" placeholder="确认密码">
					<input type="submit" class="btn" value="注册">
					<input type="reset" class="btn" value="重置">
				</form>
			</div>
		</div>
	</body>
</html>
