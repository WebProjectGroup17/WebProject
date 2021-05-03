<?php
session_start();
if(empty($_SESSION['adminid']))
{
	header("location:login.php");
	exit();
}

$id = $_GET['id'];
include('../mysql.php');
query('delete from user where id = '.$id);
echo '<script>location="users.php";</script>';