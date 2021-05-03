<?php
session_start();
if($_POST)
{
	$name = $_POST['name'];
	$pass = $_POST['pass'];

	if(!$name)
	{
		echo '<script>alert("User name cannot be empty!");location="login.php";</script>';
	}
	else if(!$pass)
	{
		echo '<script>alert("Password cannot be empty!");location="login.php";</script>';
	}
	else
	{
		$sql =  "select * from `user` where username = '".$name."' and password = '".$pass."' and isAdmin = '".$_POST['type']."'";
		include('mysql.php');
		$res = query($sql);
		if(mysqli_num_rows($res)>0)
		{
			$user = mysqli_fetch_array($res);
			$_SESSION['id'] = $user['id'];
			$_SESSION['name'] = $user['username'];
			$_SESSION['adminid'] = $user['isAdmin'];
			if($_SESSION['adminid']){
				echo '<script>alert("Success！");location="admin/goods.php";</script>';
			}
			echo '<script>alert("Success！");location="index.php";</script>';
		}
		else
		{
			echo '<script>alert("Wrong user name or password!");location="login.php";</script>';
		}

	}
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/css.css" />
	<title>User login</title>
</head>
<body>

	<?php include("header.php"); ?>
	<div class="container">
	<form method="post">
		<table class="table" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td colspan="2" align="center">User Login</td>
			</tr>
			<tr>
				<td width="30%" align="right">Email：</td>
				<td>
					<input name="name" required="required" maxlength="25" type="email"/>
				</td>
			</tr>
			<tr>
				<td align="right">Password：</td>
				<td>
					<input name="pass" required="required" maxlength="25" type="password"/>
				</td>
			</tr>
			<tr>
				<td align="right">Type：</td>
				<td>
					<input type="radio" name="type" value="0" checked/>User 
					<input type="radio" name="type" value="1"/>Manager 
				</td>
			</tr>
			<tr>
				<td align="right"></td>
				<td>
					<input type="submit" value="Login" />
				</td>
			</tr>
		</table>
	</form> 
</div>
</body>
</html>