<?php
session_start();

if(isset($_SESSION['user'])) {
  session_destroy();
  echo '<script>alert("Đăng xuất thành công!")</script>';
  echo '<meta http-equiv="refresh" content="0,url=ENDPOINT_URL/logout.php?return=CLIENT_URL">';
  echo '<meta http-equiv="refresh" content="0,url=index.php">';
}
?>
