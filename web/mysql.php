<?php
function query($sql){
   	error_reporting(0);
	// have to modify according your localhost username and password
	$conn = mysqli_connect('127.0.0.1','root','','db') or die('数据连接失败');
    mysqli_query($conn,'SET NAMES UTF8') or die('字符集错误');
	return mysqli_query($conn,$sql);
}