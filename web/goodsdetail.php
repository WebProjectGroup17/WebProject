<?php
//begain session
session_start();
//Get id
$id = $_GET['id'];
//Query sql statement for all products
$sql = 'select * from goods where id='.$id;
//mysql imorting
include('mysql.php');
//sql query 
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