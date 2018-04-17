<?php
// Connect database
$db_host = "localhost"; // This is address of mysql server
$db_user = "root"; // This is username of mysql server
$db_pass = "mysql"; // This is password of mysql server
$db_name = "sample"; // This is database name in mysql server
// * Notes: create database with name 'sample' before import file .sql
$conn = mysql_connect($db_host,$db_user,$db_pass) or die(mysql_error()); // Connect mysql server
mysql_select_db($db_name) or die("mysql can not find"); // Select database with database name
mysql_set_charset('utf8'); // Set charset as utf8
date_default_timezone_set('Asia/Ho_Chi_Minh'); // Set timezone at Ho Chi Minh City in Asia Region
?>
