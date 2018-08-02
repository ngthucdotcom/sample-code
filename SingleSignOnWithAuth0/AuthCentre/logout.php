<?php
include 'env.php';
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

$auth0->logout();
session_destroy();
if(isset($_GET['return'])) {
  $_return_to = $_GET['return'];
} else {
  $_return_to = $_endpoint;
}

$logout_url = sprintf('http://%s/v2/logout?client_id=%s&returnTo=%s', $_domain, $_client_id, $_return_to);
header('Location: ' . $logout_url);
die();
