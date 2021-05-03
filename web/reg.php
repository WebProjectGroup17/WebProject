<?php
session_start();
if($_POST)
{
	$name = $_POST['name'];
	$pass = $_POST['pass'];
	$pass2 = $_POST['pass2'];

	if(!$name)
	{
		echo '<script>alert("User name cannot be empty!");location="reg.php";</script>';
	}
	else if(!$pass)
	{
		echo '<script>alert("Password cannot be empty!");location="reg.php";</script>';
	}
	else if($pass!=$pass2)
	{
		echo '<script>alert("The two passwords are inconsistent！");location="reg.php";</script>';
	}
	else
	{
		$sql =  "insert into `user`(username,password,isAdmin) values('".$name."','".$pass."',0)";
		include('mysql.php');
		query($sql);
		echo '<script>alert("Register Success！");location="login.php";</script>';
	}
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/css.css" />
	<title>Register</title>
</head>
<body>
<?php include("header.php"); ?>
	<div class="container">
	<form method="post">
		<table class="table" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td colspan="2" align="center">User Register</td>
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
				<td align="right">Repassword：</td>
				<td>
					<input name="pass2" required="required" maxlength="25" type="password"/>
				</td>
			</tr>
			<tr>
				<td align="right"></td>
				<td>
					<input type="submit" value="Register" />
				</td>
			</tr>
		</table>
	</form> 
</div>
</body>
</html>