<?php
session_start();
if(empty($_SESSION['adminid']))
{
	header("location:login.php");
	exit();
}
if($_POST)
{
	$name = str_replace('\'','‘',$_POST['name']);
	$price = $_POST['price'];
	$desc = str_replace('\'','‘',$_POST['desc']);
	$file = $_FILES["img"];



	if(!$name)
	{
		echo '<script>alert("名称不允许为空！");</script>';
	}
	else if(!$price)
	{
		echo '<script>alert("price不允许为空！");</script>';
	}
	else if($file['error']>0)
	{
		echo '<script>alert("Img不允许为空！");</script>';
	}
	else if(!$desc)
	{
		echo '<script>alert("介绍不允许为空！");</script>';
	}
	else
	{
		if($file['error']<=0)
		{
			//getting file name
			$filename = $_FILES["img"]["name"];
			//getting file extension
			$ext = pathinfo($filename,PATHINFO_EXTENSION);
			//Randomly generate a new file name
			$filepath = md5(uniqid(mt_rand())).".".$ext;
			//upload
			move_uploaded_file($_FILES["img"]["tmp_name"], "../img/".$filepath);
		}
		echo $sql =  "insert into goods(`goodsName`,`price`,`desc`,`image`,`catid`,`addTime`) values('".$name."','".$price."','".$desc."','".$filepath."','".$_POST['cate']."','".date("Y-m-d H:i")."')";
		include('../mysql.php');
		query($sql);
		echo '<script>alert("添加成功！");location="goods.php";</script>';
	}
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/css.css" />
	<title>Add product</title>
</head>
<body>
<?php include("header.php"); ?>
	<div class="admin_container">
	<form method="post" enctype="multipart/form-data">
		<table class="table" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td colspan="2" align="center"> Add product</td>
			</tr>
			<tr>
				<td align="right">Title</td>
				<td>
					<input name="name" required="required" maxlength="25" type="text"/>
				</td>
			</tr>
			<tr>
				<td align="right">Price</td>
				<td>
					<input name="price" required="required" maxlength="25" type="text"/>
				</td>
			</tr>
			<tr>
				<td align="right">Category</td>
				<td>
				<select name="cate">	
					<?php
						//check latest product
						include('../mysql.php');
						$sql = 'select * from cate where type = 1 order by id desc ';
						//sql execution
						$res = query($sql);
						while($r = mysqli_fetch_array($res)){
							echo '<option value="'.$r['id'].'">'.$r['title'].'</option>';
						}
					?>
				</select>
				</td>
			</tr>

			<tr>
				<td align="right">Imgs</td>
				<td>
					<input name="img" id="img" type="file" />
				</td>
			</tr>
			<tr>
				<td align="right">About</td>
				<td>
					<textarea name="desc" maxlength="500" required="required" cols="80" rows="10"></textarea>
				</td>
			</tr>
			<tr>
				<td align="right"> </td>
				<td>
					<input type="submit" value="Submit" />
				</td>
			</tr>
		</table>
	</form> 
</div>
</body>
</html>