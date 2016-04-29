<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "addressbook";
$link = mysql_connect($host, $user, $pass);
mysql_select_db($db_name);
mysql_query("SET NAMES utf8");
?>