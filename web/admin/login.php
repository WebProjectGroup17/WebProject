<?php
session_start();
if($_POST)
{
	$name = $_POST['name'];
	$pass = $_POST['pass'];

	if(!$name)
	{
		echo '<script>alert("Username can not be empty！");location="login.php";</script>';
	}
	else if(!$pass)
	{
		echo '<script>alert("Password can not be empty！");location="login.php";</script>';
	}
	else
	{
		$sql =  "select * from `user` where username = '".$name."' and password = '".$pass."' and isAdmin=1";
		include('../mysql.php');
		$res = query($sql);
		if(mysqli_num_rows($res)>0)
		{
			$user = mysqli_fetch_array($res);
			$_SESSION['adminid'] = $user['id'];
			$_SESSION['adminname'] = $user['username'];
			echo '<script>alert("Login success！");location="goods.php";</script>';
		}
		else
		{
			echo '<script>alert("Username or Password wrong！");location="login.php";</script>';
		}

	}
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/css.css" />
	<title>Adminster login</title>
</head>
<body>
<?php include("header.php"); ?>
	<div class="container">
	<form method="post">
		<table class="table" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td colspan="2" align="center">Adminster login</td>
			</tr>
			<tr>
				<td width="30%" align="right">Username：</td>
				<td>
					<input name="name" required="required" maxlength="25" type="text"/>
				</td>
			</tr>
			<tr>
				<td align="right">Password：</td>
				<td>
					<input name="pass" required="required" maxlength="25" type="password"/>
				</td>
			</tr>
			<tr>
				<td align="right"> </td>
				<td>
					<input type="submit" value="Login" />
				</td>
			</tr>
		</table>
	</form> 
</div>
</body>
</html>