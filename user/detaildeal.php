<?php session_start();
	include_once("conn.php");
	date_default_timezone_set('PRC');
	if ($link->connect_error){
		die("连接失败：".$link->connect_error);
	}
	
	
	if(isset($_GET['goods_id'])){//删除闲置信息
		if($_GET["dustbin"]==1){
			$student_id=$_SESSION['student_id'];
			$goods_id=$_GET['goods_id'];
			$sql="delete from goods where student_id='".$student_id."' and goods_id='".$goods_id."'";
			$result=mysqli_query($link,$sql);
			if($result){
				$sql="delete from collection where goods_id='".$goods_id."'";
				$result=mysqli_query($link,$sql);//同时删除所有收藏该闲置物品的记录
				if($result){
					echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
				}
			}else{
				echo "<script>alert('删除失败');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
			}
		}
		if($_GET["point"]==1){
			$collector_id=$_SESSION['student_id'];
			$goods_id=$_GET['goods_id'];
			$sql="delete from collection where collector_id='".$collector_id."' and goods_id='".$goods_id."'";
			$result=mysqli_query($link,$sql);
			if($result){
				echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
			}else{
				echo "<script>alert('取消收藏失败');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
			}
		}
		if($_GET["point"]==2){
			$collector_id=$_SESSION['student_id'];
			$goods_id=$_GET['goods_id'];
			$collect_time=date('Y-m-d H:i:s', time());//格式(年月日时分秒)
			$sql="insert into collection(`collector_id`,`goods_id`,`collect_time`) 
			values('$collector_id','$goods_id','$collect_time')";
			$result=mysqli_query($link,$sql);
			if($result){
			    echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
			} else {
			    echo "<script>alert('收藏失败');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
			}
		}
	}
	
	/*
	 *favorites_id生成
	 */
	function random_id(){ 
		$chars='abcdefghijklmnopqrstuvwxyz';
		$time=date('YmdHis', time());//格式(年月日时分秒)
		$random=substr(str_shuffle($chars),-6,6);//在$chars中抽取一个6位的随机字符串
		$string=$time.$random;//组和成新的字符串
		return $string;
	}
?>