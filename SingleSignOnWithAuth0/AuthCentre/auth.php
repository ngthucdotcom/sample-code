<?php
  session_start();

  include 'env.php';
  // Require composer autoloader
  require __DIR__ . '/vendor/autoload.php';

  use Auth0\SDK\Auth0;

  $auth0 = new Auth0([
    'domain' => $_domain,
    'client_id' => $_client_id,
    'client_secret' => $_client_secret,
    'redirect_uri' => $_endpoint.'auth.php',
    'audience' => 'https://'.$_domain.'/userinfo',
    'persist_id_token' => true,
    'persist_access_token' => true,
    'persist_refresh_token' => true,
  ]);

  $userInfo = $auth0->getUser();


  if (!$userInfo) {
      // We have no user info
      // redirect to Login
      $loginTo = $_endpoint.'/login.php';
      header('Location: ' . $loginTo);
  } else {
      // User is authenticated
      // Say hello to $userInfo['name']
      // print logout button
      $_SESSION['userinfo'] = $userInfo;
      // var_dump($_SESSION);
      echo '<body onload="window.history.go(-3);"></body>';
  }
?>
