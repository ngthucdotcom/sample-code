<?php
  require_once 'app_connect.php';
  session_start();
  if(isset($_SESSION['user'])) {
    session_destroy();
    echo '<meta http-equiv="refresh" content="0,url='.$base_url.'app_home.php">';
  } else {
    echo '<meta http-equiv="refresh" content="0,url='.$base_url.'app_login.php">';
  }
?>
