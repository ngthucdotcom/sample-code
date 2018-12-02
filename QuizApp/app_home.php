<?php
  require_once 'app_connect.php';
  session_start();
?>

<!DOCTYPE html>
<html lang="vi" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Trang chủ</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </head>
  <body>
    <div class="container">
      <h1>Ứng dụng thi trắc nghiệm - Quiz App</h1>
      <hr>
      <?php if(isset($_SESSION['user'])):?>
      <h3>Họ tên: <strong><?=$_SESSION['user']['fullname']?></strong></h3>
      <h3>Quyền hạn:
        <strong>
        <?php echo (($_SESSION['user']['role'] == 'admin') ? 'Quản trị viên' : (($_SESSION['user']['role']=='teacher') ? 'Giảng viên' : (($_SESSION['user']['role']=='student') ? 'Thí sinh' : '-')));?>
        </strong>
      </h3>
      <h3>Nghiệp vụ:
        <strong>
        <?php if($_SESSION['user']['role'] == 'admin') echo '<a href="'.$base_url.'app_accounts.php">Truy cập</a>';
              else if($_SESSION['user']['role'] == 'teacher') echo '<a href="'.$base_url.'app_exams.php">Truy cập</a>';
              else if($_SESSION['user']['role'] == 'student') echo '<a href="'.$base_url.'app_accounts.php">Truy cập</a>';
        ?> |
        <a href="<?=$base_url;?>app_logout.php">Đăng xuất</a>
        </strong>
      </h3>
      <?php endif;?>
      <?php if(!isset($_SESSION['user'])):?>
      <h3>Đăng nhập:
        <strong>
          <a href="<?=$base_url;?>app_login.php">Truy cập</a>
        </strong>
      </h3>
      <?php endif;?>
    </div>
  </body>
</html>
