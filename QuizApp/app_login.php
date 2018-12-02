<?php
  require_once 'app_connect.php';
  session_start();
  if(isset($_SESSION['user'])) {
    echo '<meta http-equiv="refresh" content="0,url='.$base_url.'app_home.php">';
  }
?>

<?php
// Code xu ly
if(isset($_POST['login'])) {
  $uid = htmlspecialchars($_POST['username']);
  $pwd = md5(htmlspecialchars($_POST['password']));

  $sql_check_login = "SELECT * FROM quiz_users WHERE username='$uid' AND password='$pwd' AND status='active'";
  if($db->num_rows($sql_check_login) == 1) {
    $data = $db->fetch_assoc($sql_check_login,1);
    $_SESSION['user']['username'] = $data['username'];
    $_SESSION['user']['fullname'] = $data['fullname'];
    $_SESSION['user']['role'] = $data['role'];
    echo '<script>
    alert("Đăng nhập thành công");
    window.location.href = "'.$base_url.'app_home.php";
    </script>';
  } else {
    echo '<script>alert("Đăng nhập thất bại");</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="vi" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Đăng nhập</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </head>
  <body>
    <div class="container">
      <h1>Đăng nhập</h1>
      <hr>
      <form class="form-horizontal" method="post">
        <div class="form-group">
          <label for="username">Tên tài khoản</label>
          <input type="text" class="form-control" name="username" id="username" placeholder="Nhập tên tài khoản">
        </div>
        <div class="form-group">
          <label for="password">Mật khẩu</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu">
        </div>
        <div class="form-group">
          <input type="submit" class="form-control btn btn-primary" name="login" value="Đăng nhập" />
        </div>
      </form>
    </div>
  </body>
</html>
