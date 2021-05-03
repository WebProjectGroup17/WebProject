<?php
//开启session
session_start();
//引用mysql文件
include('mysql.php');

$kw = $_GET["kw"];
$page = empty($_GET['page'])?1:$_GET['page'];
$recordcount = mysqli_num_rows(query("select * from goods where goodsName like '%".$kw."%'"));
$pages = ceil($recordcount/12.0);
if($page<=0) $page = 1;
if($page>$pages) $page = $pages;
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/css.css" />
	<title>Products</title>
</head>
<body>
<?php include("header.php"); ?>
	<div class="container">
	<div class="title">Search > <?php echo $kw; ?></div>
	<div class="c">
	<?php
	//check latest product
	$sql = "select * from goods where goodsName like '%".$kw."%' order by id desc limit ".(($page-1)*12).",12";
	// run sql
	$res = query($sql);
	while($r = mysqli_fetch_array($res)){
	?>
	<a class="b" href="goodsdetail.php?id=<?php echo $r['id'] ; ?>">
		<img src="img/<?php echo $r['image'] ; ?>" />
		<div class="t"><?php echo $r['goodsName'] ; ?></div>
	</a>
	<?php } ?>
	</div>
	<div class="pager">
		<a href="?kw=<?php echo $kw; ?>&page=<?php echo $page-1; ?>">Prev</a>&nbsp;
		<a href="?kw=<?php echo $kw; ?>&page=<?php echo $page+1; ?>">Next</a>
	</div> 
</div>
</body>
</html>