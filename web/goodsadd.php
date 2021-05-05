<?php
//begain session
session_start();
if(empty($_SESSION['id']))
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
		echo '<script>alert("Name cannot be empty!");</script>';
	}
	else if(!$price)
	{
		echo '<script>alert("Price cannot be empty!");</script>';
	}
	else if($file['error']>0)
	{
		echo '<script>alert("IMG cannot be empty!");</script>';
	}
	else if(!$desc)
	{
		echo '<script>alert("Introduction cannot be empty!");</script>';
	}
	else
	{
		if($file['error']<=0)
		{
			//Get file name
			$filename = $_FILES["img"]["name"];
			//get file extension
			$ext = pathinfo($filename,PATHINFO_EXTENSION);
			//generating random name
			$filepath = md5(uniqid(mt_rand())).".".$ext;
			//upload
			move_uploaded_file($_FILES["img"]["tmp_name"], "img/".$filepath);
		}
		echo $sql =  "insert into goods(`goodsName`,`price`,`desc`,`image`,`catid`,`uid`,`addTime`) values('".$name."','".$price."','".$desc."','".$filepath."','".$_POST['cate']."','".$_SESSION['id']."','".date("Y-m-d H:i")."')";
		include('mysql.php');
		query($sql);
		echo '<script>alert("Success");location="goods.php";</script>';
	}
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/css.css" />
	<title>Add product</title>
</head>
<body>
<?php include("header.php"); ?>
	<div class="container">
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
						//Check the latest products
						include('mysql.php');
						$sql = 'select * from cate where type = 1 order by id desc ';
						//Execute sql
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
					<textarea name="desc" maxlength="500" required="required" cols="60" rows="10"></textarea>
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