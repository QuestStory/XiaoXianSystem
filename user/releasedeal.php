<?php
	session_start();
	Header("Cache-Control: must-revalidate");
	include_once("conn.php");
	if ($link->connect_error){
		die("连接失败：".$link->connect_error);
	}
	
	$goods_id=random_id();					//随机生成闲置id
	$student_id=$_SESSION["student_id"];	//使用SESSION获取当前登录用户id
	$name=$_POST["name"];					//获取表单传值“闲置名称”
	$type=$_POST["type"];					//获取表单传值“闲置类型”
	$keyword=$_POST["keyword"];				//获取表单传值“关键词”
	$price=$_POST["price"];					//获取表单传值“价格”
	$describe=$_POST["describe"];			//获取表单传值“闲置描述”
	$contact=$_POST["contact"];	
	$photo=file_upload();					//图片相对地址
	
	
	
	
	// echo $goods_id."\t";
	// echo $student_id."\t";
	// echo $name."\t";
	// echo $type."\t";
	// echo $keyword."\t";
	// echo $price."\t";
	// echo $describe."\t";
	// echo $photo."\t";
		
	/* 
	 *goods_id生成
	 */
	function random_id(){
		$chars='abcdefghijklmnopqrstuvwxyz';
		date_default_timezone_set('PRC');
		$time=date('YmdHis', time());//格式(年月日时分秒)
		$random=substr(str_shuffle($chars),-6,6);//在$chars中抽取一个6位的随机字符串
		$string=$time.$random;//组和成新的字符串
		return $string;
	}
	
	/* 
	 *上传文件检查 
	 */
	function file_check(){ 
		$size=0;
		foreach($_FILES['file']['size'] as $value){
			$size+=$value;
		}
		if($size>0){
			for($i=0;$i<4;$i++){
				if(($_FILES['file']['size'][$i]!=0)){
					if($_FILES["file"]["size"][$i]>1024*1024*5){
					echo "<script>alert('上传的文件中有超过限制大小的文件');history.go(-1);</script>";
					die();
				}else{
					if(($_FILES["file"]["type"][$i] == "image/gif")||($_FILES["file"]["type"][$i] == "image/jpeg")||($_FILES["file"]["type"][$i] == "image/jpg")||($_FILES["file"]["type"][$i] == "image/png")){
						
					} else{
							echo "<script>alert('你上传的图片中有不合法的文件');history.go(-1);</script>";
							die();
						}
					}
				}
			}
			return true;
		}else{
			echo "<script>alert('你没有上传图片');history.go(-1);</script>";
			die();
		}
	}
	
	/* 
	 *文件上传处理
	 */
	function file_upload(){
		if(file_check()){//判断是否上传文件
			for($i=0;$i<4;$i++){
				if($_FILES['file']['size'][$i]!=0){
					$filename="../file/".$_SESSION["student_id"].random_id().'.'.substr(strrchr($_FILES["file"]["name"][$i],'.'),1);
					move_uploaded_file($_FILES["file"]["tmp_name"][$i],$filename);
					if(!isset($url)){
						$url=$filename;
					}else{
						$url=$url.'&'.$filename;
					}
				}
			}
		}else{
			echo "你没有上传文件";
		}
		return $url;
	}
	
	/* 
	 *保持信息到数据库
	 */
	$sql="insert into goods(`goods_id`,`student_id`,`name`,`type`,`keyword`,`price`,`describe`,`photo`,`contact`)
	values('$goods_id','$student_id','$name','$type','$keyword','$price','$describe','$photo','$contact')";
	echo $sql;
	if(mysqli_query($link,$sql)){
	    echo "<script>alert('发布成功');document.location ='detail.php?goods_id=".$goods_id."'</script>";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
?>