<?php
session_start();

// Require composer autoloader
require __DIR__ . '/vendor/autoload.php';

use Auth0\SDK\Auth0;

$auth0 = new Auth0([
  'domain' => 'DOMAIN',
  'client_id' => 'CLIENT_ID',
  'client_secret' => 'CLIENT_SECRET',
  'redirect_uri' => 'ENDPOINT_URL/auth.php',
  'audience' => 'https://DOMAIN/userinfo',
  'persist_id_token' => true,
  'persist_access_token' => true,
  'persist_refresh_token' => true,
]);

$userInfo = $auth0->getUser();

if ($userInfo) {
  $_SESSION['user'] = $userInfo['name'];
  // $_SESSION['type'] = 'SSO';
}

?>
<html>
  <head>
    <title>Demo Single Sign On</title>
    <link rel="stylesheet" href="style.css" />

    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
  </head>
  <body>
  <center>
    <h1>Demo Single Sign On</h1>
    <div id='cart'>
      <?php
        if(isset($_SESSION['user'])) {
          echo 'Xin chào, <b style="color: red">' . $_SESSION['user'] . '!</b>';
          echo '<a href="logout.php" style="color: blue"> Đăng xuất</a>';
        } else {
          echo '<center>
          <button onclick="location.href'."='ENDPOINT_URL/auth.php/';".'" id="sso-login" style="background-color: red; color: white; width: 100%">Đăng nhập với Auth0</button>
          </center>';
        }
      ?>
    </div>
    </center>
  </body>
</html>
