<?php
  session_start();

  include 'env.php';
  require __DIR__ . '/vendor/autoload.php';

  use Auth0\SDK\Auth0;

  $auth0 = new Auth0([
    'domain' => $_domain,
    'client_id' => $_client_id,
    'client_secret' => $_client_secret,
    'redirect_uri' => $_endpoint.'auth.php',
    'audience' => 'https://'.$_domain.'/userinfo',
    'responseType' => 'code',
    'scope' => 'openid email profile',
    'persist_id_token' => true,
    'persist_access_token' => true,
    'persist_refresh_token' => true,
    'prompt' => none,
  ]);

  $auth0->login();
