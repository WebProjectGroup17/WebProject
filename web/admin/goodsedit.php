<?php
session_start();
if(empty($_SESSION['adminid']))
{
	header("location:login.php");
	exit();
}

$id = $_GET['id'];
include('../mysql.php');
$res = query('select * from goods where id = '.$id);
$film = mysqli_fetch_array($res);

if($_POST)
{
	$name = str_replace('\'','‘',$_POST['name']);
	$price = $_POST['price'];
	$desc = str_replace('\'','‘',$_POST['desc']);

	$file = $_FILES["img"];
	$filepath = $film['image'];

	if(!$name)
	{
		echo '<script>alert("Name cannot be empty!");</script>';
	}
	else if(!$price)
	{
		echo '<script>alert("Price cannot be empty!");</script>';
	}
	else if(!$desc)
	{
		echo '<script>alert("Introduction cannot be empty!");</script>';
	}
	else
	{
		if($file['error']<=0)
		{
			//get filename
			$filename = $_FILES["img"]["name"];
			//Get file extension
			$ext = pathinfo($filename,PATHINFO_EXTENSION);
			//Randomly generate a new file name
			$filepath = md5(uniqid(mt_rand())).".".$ext;
			//Upload
			move_uploaded_file($_FILES["img"]["tmp_name"], "../img/".$filepath);
		}

		$sql = "update goods set `goodsName`='".$name."',`price`='".$price."',`catid`='".$_POST['catid']."',`desc`='".$desc."',`image`='".$filepath."',`addTime`='".date("Y-m-d H:i")."' where id=".$id;
		query($sql);
		echo '<script>alert("Edit succeeded!");location="goods.php";</script>';
	}
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/css.css" />
	<title>Edit product</title>
</head>
<body>
<?php include("header.php"); ?>
	<div class="admin_container">
	<form method="post" enctype="multipart/form-data">
		<table class="table" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td colspan="2" align="center">Edit product</td>
			</tr>
			<tr>
				<td align="right">Title</td>
				<td>
					<input name="name" required="required" value="<?php echo $film['goodsName']; ?>" maxlength="25" type="text"/>
				</td>
			</tr>
			<tr>
				<td align="right">price</td>
				<td>
					<input name="price" required="required" value="<?php echo $film['price']; ?>" maxlength="25" type="text"/>
				</td>
			</tr>
			<tr>
				<td align="right">Category</td>
				<td>
				<select name="catid">	
					<?php
						//check latest product
						$sql = 'select * from cate where type = 1 order by id desc ';
						//execute sql
						$res = query($sql);
						while($r = mysqli_fetch_array($res)){
							$selected = $film['catid'] == $r['id']?'selected':'';
							echo '<option value="'.$r['id'].'" '.$selected.'>'.$r['title'].'</option>';
						}
					?>
				</select>
				</td>
			</tr>
			<tr>
				<td align="right">Img</td>
				<td>
					<img src="../img/<?php echo $film['image']; ?>" width="200" /><br /><br />
					<input name="img" id="img" type="file" />
				</td>
			</tr>
			<tr>
				<td align="right">About</td>
				<td>
					<textarea name="desc"maxlength="500" required="required" cols="80" rows="10"><?php echo $film['desc']; ?></textarea>
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