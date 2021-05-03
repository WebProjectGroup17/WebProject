<?php
//start session
session_start();
//import mysql file
include('../mysql.php');

//处理分页信息
$page = empty($_GET['page'])?1:$_GET['page'];
$recordcount = mysqli_num_rows(query("select * from goods"));
$pages = ceil($recordcount/12.0);
if($page<=0) $page = 1;
if($page>$pages) $page = $pages;

//check login
if(empty($_SESSION['adminid']))
{
	header("location:login.php");
	exit();
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/css.css" />
	<title>Commodity management</title>
</head>
<body>
<?php include("header.php"); ?>
	<div class="admin_container">
	<p><a href="goodsadd.php" class="oper">Add Products</a></p>
	<table class="table" cellpadding="0" cellspacing="0" border="0">
		<tr>
			<th align="center" width="10%">Img</th>
			<th align="center" width="50%">Title</th>
			<th align="center" width="10%">Category</th>
			<th align="center" width="10%">User</th>
			<th align="center" width="15%">price</th>
			<th align="center"> </th>
		</tr>
	<?php
	//check latest product
	$sql = 'select goods.*,cate.title as cname,user.username as uname from goods left join cate on cate.id = goods.catid  left join user on user.id = goods.uid order by id desc limit '.(($page-1)*12).',12';
	//execute sql
	$res = query($sql);
	while($r = mysqli_fetch_array($res)){
	?>

		<tr>
			<td><img src="../img/<?php echo $r['image']; ?>" width="40" height="40"/></td>
			<td><?php echo $r['goodsName']; ?></td>
			<td><?php echo $r['cname']; ?></td>
			<td><?php echo $r['uname']; ?></td>
			<td align="center">$<?php echo $r['price']; ?></td>
			<td align="center">
				<a href="goodsedit.php?id=<?php echo $r['id']; ?>">Edit</a>
				<a href="goodsdel.php?id=<?php echo $r['id']; ?>">Del</a>
			</td>
		</tr>

	<?php } ?>
	</table>
	<div class="pager">
		<a href="?page=<?php echo $page-1; ?>">Prev</a>&nbsp;
		<a href="?page=<?php echo $page+1; ?>">Next</a>
	</div> 
</div>
</body>
</html>