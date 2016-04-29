<?php 
// ovaj programski deo registracije je nešto najosnovnije i predviđen je da zaštiti sajt tek od nekih slabijih hakerskih napada. Takođe obezbeđene su samo osnovne funkcije za upravljanje korisnicima. Što se dizajna tiče, trudio sam da pratim osnovnu temu sajta kakvu sam zatekao. Ukoliko imate neka pitanja, obratite se na e-mail: agapetos@gmail.com (David).

if (isset($_GET['register'])) {

include 'config.php';

	$usersent=$_POST['username'];
	$passsent1=$_POST['password1'];
	$passsent2=$_POST['password2'];
	$usersent=stripslashes($usersent);
	$passsent1=stripslashes($passsent1);
	$passsent2=stripslashes($passsent2);
	$usersent=mysql_real_escape_string($usersent);
	$passsent1=mysql_real_escape_string($passsent1);
	$passsent2=mysql_real_escape_string($passsent2);
	if (($passsent1==$passsent2) AND ($passsent1!="") AND ($passsent2!="") AND ($usersent!="")) {
	$hash = hash('sha256', $passsent1);

	function createSalt()
	{
		$string = md5(uniqid(rand(), true));
		return substr($string, 0, 11);
	}
	$salt = createSalt();
	$hash = hash('sha256', $salt . $hash);
	

$query = "INSERT INTO users ( username, password, salt, level )
        VALUES ( '$usersent' , '$hash' , '$salt' , '0' );";
mysql_query($query);
mysql_close();
header("refresh: 7; url=login.php");
echo 'Uspešno ste registrovali vaš nalog. Kontaktirajte administratora da vam aktivira nalog.';

	}
	else echo 'Niste ispravno uneli sva polja. Molimo vas ponovo unesite korisničko ime i lozinku.';

}
else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web address book Apex Service | Registracija</title>
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
<div align="center">
<form action="?register=1" method="POST">
	<div style="width:350px;margin:10px auto">
		<div><div style="width:150px;text-align:right;float:left">Korisničko ime: </div><input type="text" name="username" /></div>
		<div><div style="width:150px;text-align:right;float:left">Lozinka: </div><input type="password" name="password1" /></div>
		<div><div style="width:150px;text-align:right;float:left">Ponovi lozinku: </div><input type="password" name="password2" /></div>
		<div><input type="submit" value="Registruj se" /></div>
	</div>
</form>
  </div>
</body>
</html>
<?php
}
?>