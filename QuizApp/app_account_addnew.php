<?php
  require_once 'app_connect.php';
  session_start();
  if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin') {
    // do something...
  } else {
    echo '<meta http-equiv="refresh" content="0,url='.$base_url.'app_home.php">';
  }
?>

<?php
// Code xu ly
if(isset($_POST['addnew'])) {
  $uid = htmlspecialchars($_POST['username']);
  $name = htmlspecialchars($_POST['fullname']);
  $pwd = md5(htmlspecialchars($_POST['password']));
  $role = $_POST['role'];
  $status = $_POST['status'];

  $sql_add_user = "INSERT INTO quiz_users(username,fullname,password,role,status) VALUES('$uid','$name','$pwd','$role','$status')";
  if($db->query($sql_add_user)) {
    echo '<script>
      alert("Thêm mới thành công");
      window.location.href = "'.$base_url.'";
    </script>';
  } else {
    echo '<script>alert("Thêm mới thất bại");</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="vi" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Thêm tài khoản</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </head>
  <body>
    <div class="container">
      <h1>Thêm tài khoản</h1>
      <hr>
      <form class="form-horizontal" method="post">
        <div class="form-group">
          <label for="username">Tên tài khoản</label>
          <input type="text" class="form-control" name="username" id="username" placeholder="Nhập tên tài khoản">
        </div>
        <div class="form-group">
          <label for="fullname">Tên đầy đủ</label>
          <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Nhập tên đầy đủ">
        </div>
        <div class="form-group">
          <label for="password">Mật khẩu</label>
          <input type="password" class="form-control" name="password" id="password" value="123456" placeholder="Nhập mật khẩu">
        </div>
        <div class="form-group">
          <label for="role">Phân quyền</label>
          <select class="form-control" name="role">
            <option value="student">Thí sinh</option>
            <option value="teacher">Giảng viên</option>
            <option value="admin">Quản trị viên</option>
          </select>
        </div>
        <div class="form-group">
          <label for="status">Tình trạng</label>
          <select class="form-control" name="status">
            <option value="active">Hoạt động</option>
            <option value="block">Bị khóa</option>
          </select>
        </div>
        <div class="form-group">
          <input type="submit" class="form-control btn btn-primary" name="addnew" value="Lưu" />
        </div>
      </form>
    </div>
  </body>
</html>
