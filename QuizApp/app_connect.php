<?php
// Require thư viện PHP
require_once 'app_database.php';
// Kết nối database
$db = new DB();
$db->connect();
$db->set_char('utf8');
date_default_timezone_set('Asia/Ho_Chi_Minh'); // Set timezone at Ho Chi Minh City in Asia Region
$base_url = 'http://localhost/SampleCode/QuizApp/';
?>
