<?php
//开启session
session_start();
//获取id
$id = $_GET['id'];
//查询所有电影的sql语句
$sql = 'select * from goods where id='.$id;
//引用mysql文件
include('mysql.php');
//执行sql
$res = query($sql);
$film = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/css.css" />
	<title><?php echo $film['goodsName']; ?></title>
</head>
<body>
<?php include("header.php"); ?>
	<div class="container">
	<div class="dc">
		<img src="img/<?php echo $film['image']; ?>">
		<div class="dr">
			<h2><?php echo $film['goodsName']; ?></h2>
			<div class="text">price: <?php echo $film['price']; ?> 元</div>
			<div class="text">About: <?php echo $film['desc']; ?></div>
		
			<div class="text">
				<a href="index.php">Home</a>
			</div>
		</div>
	</div> 
</div>
</body>
</html>