<?php
//began session
session_start();
//importing mySql
include('../mysql.php');

//user's info
$page = empty($_GET['page'])?1:$_GET['page'];
$recordcount = mysqli_num_rows(query("select * from user where isAdmin = 0"));
$pages = ceil($recordcount/12.0);
if($page<=0) $page = 1;
if($page>$pages) $page = $pages;

//Determine whether to log in
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
	<title>资讯管理</title>
</head>
<body>
<?php include("header.php"); ?>
	<div class="admin_container">
	<table class="table" cellpadding="0" cellspacing="0" border="0">
		<tr>
			<th align="center" width="60%">Username</th>
			<th align="center" width="25%">Password</th>
			<th align="center"> </th>
		</tr>
	<?php
	//check latest product
	$sql = 'select * from user where isAdmin = 0 order by id desc limit '.(($page-1)*12).',12';
	//execute sql
	$res = query($sql);
	while($r = mysqli_fetch_array($res)){
	?>

		<tr>
			<td><?php echo $r['username']; ?></td>
			<td align="center"><?php echo $r['password']; ?></td>
			<td align="center">
				<a href="usersdel.php?id=<?php echo $r['id']; ?>">Del</a>
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