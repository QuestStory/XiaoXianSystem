<?php
	/*数据库连接配置*/
	$host='127.0.0.1';
	$user='root';
	$password='123456';
	$dbName='xiaoxiansystem';
	$link=new mysqli($host,$user,$password,$dbName);
	mysqli_query($link,"set names utf8");
?>