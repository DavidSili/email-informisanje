<?php 
 
session_start();
include 'config.php';
if (isset($_GET['login'])) {

	$usersent=$_POST['username'];
	$passsent=$_POST['password'];
	$usersent=stripslashes($usersent);
	$passsent=stripslashes($passsent);
	$usersent=mysql_real_escape_string($usersent);
	$passsent=mysql_real_escape_string($passsent);
	$sql = 'SELECT * FROM users WHERE `username`="'.$usersent.'"';
	$result = mysql_query($sql);
	
	if (mysql_num_rows($result)==1) {
	
		$row=mysql_fetch_assoc($result);
		$passsql=$row['password'];
		$saltsql=$row['salt'];
		$level=$row['level'];
		
		$xhash = hash ('sha256', $passsent);
		$hash = hash('sha256', $saltsql . $xhash);
		
		if ($level>0 && $hash==$passsql) {
		
			$_SESSION['loggedin'] = 1;
			$_SESSION['level'] = $level;
			header("Location: index.php");
			exit;
		
		$ok=1;
		}
		else echo "Pogrešni podaci";
		
	}
	else echo "Pogrešni podaci";
 
}

if (isset($ok)==false) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Web address book Apex Service | Prijava</title>
<style type="text/css">
<!--
.button {
	height: 50px;
	width: 200px;
	border: thin solid #FF0000;
	background-color: #999999;
	font-family: "Times New Roman", Times, serif;
	font-size: 20px;
	font-weight: bold;
}
.style1 {
	font-family: "Times New Roman", Times, serif;
	font-size: 36px;
	font-weight: bold;
	font-style: italic;
}
-->
</style>
</head>

<body>
<div align="center"><img src="images/apex logo.jpg" width="458" height="184" /><span class="style1">Web address book </span>
  <em>ver. 1.0.</em><a href="logout.php" style="float:right;margin-top:170px">odjava</a>
  <hr />
</div>
<div>
<h2>Admin panel</h2>
</div>
</body>
</html>
<?php
}
?>
