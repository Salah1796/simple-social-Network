<?php
//$link = mysql_connect('127.0.0.1:3307', 'mysql_user', 'mysql_password');

$servername = "127.0.0.1";
$username = "root";
$password = "";
$DB_name='plog';
$con=mysqli_connect($servername, $username, $password,$DB_name) or die("not Connected") ;
mysqli_set_charset($con,'utf8');

?>