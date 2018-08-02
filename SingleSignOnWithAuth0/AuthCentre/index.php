<?php
  session_start();
?>
<html>
    <head>

        <title> Single Sign-On Web App | SWA </title>

        <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- font awesome from BootstrapCDN -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">

        <link href="app.css" rel="stylesheet">
        <!-- Auth0 -->
        <script src="https://cdn.auth0.com/js/auth0/8.8/auth0.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>



    </head>
    <body class="home">
        <div class="container">
            <div class="login-page clearfix">
              <?php if(!$_SESSION['userinfo']): ?>
              <div class="login-box auth0-box before">
                <img src="url" alt="Logo Auth Site"/>
                <h3>Authentication App</h3>
                <!-- <p>Zero friction identity infrastructure, built for developers</p> -->
                <a id="qsLoginBtn" class="btn btn-primary btn-lg btn-login btn-block" href="login.php">Sign In</a>
              </div>
              <?php else: ?>
              <div class="logged-in-box auth0-box logged-in">
                <h1 id="logo"><img src="url" alt="Logo Auth Site"/></h1>
                <img class="avatar" src="<?php echo $_SESSION['userinfo']['picture'] ?>" style="width:200px; border-radius:20px" />
                <h3>Hello, <span class="nickname"><?php echo $_SESSION['userinfo']['name'] ?></span>!</h3>
                <h4>Email: <span class="nickname"><?php echo $_SESSION['userinfo']['email'] ?></span></h4>
                <a id="qsLogoutBtn" class="btn btn-warning btn-logout" href="logout.php">Logout</a>
              </div>
              <?php endif ?>
            </div>
        </div>
    </body>
</html>
