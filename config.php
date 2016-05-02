<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "email-informisanje";
$mysqli = mysqli_connect($host, $user, $pass, $db_name) or die;
$mysqli->query("SET NAMES 'utf8'") or die;
date_default_timezone_set('Europe/Belgrade');
?>