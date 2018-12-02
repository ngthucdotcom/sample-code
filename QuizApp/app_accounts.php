<?php
  require_once 'app_connect.php';
  session_start();
  if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin') {
    // do something...
    $sql_select_accounts = "SELECT * FROM quiz_users";
    $data_accounts = $db->fetch_assoc($sql_select_accounts,0);
  } else {
    echo '<meta http-equiv="refresh" content="0,url='.$base_url.'app_home.php">';
  }
?>

<!DOCTYPE html>
<html lang="vi" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Tài khoản</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </head>
  <body>
    <div class="container">
      <h1>Danh sách tài khoản</h1>
      <hr>
      <a href="<?=$base_url;?>app_home.php" class="btn btn-primary">Trang chủ</a>
      <a href="<?=$base_url;?>app_account_addnew.php" class="btn btn-success">Thêm tài khoản</a>
      <hr>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tài khoản</th>
            <th>Tên đầy đủ</th>
            <th>Quyền hạn</th>
            <th>Tình trạng</th>
            <th>Cập nhật</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i=1;
            foreach ($data_accounts as $key => $row_user) {
              // code...
              echo '<tr>
                <td>'.$i.'</td>
                <td>'.$row_user['username'].'</td>
                <td>'.$row_user['fullname'].'</td>
                <td>'.(($row_user['role'] == 'admin') ? 'Quản trị viên' : (($row_user['role']=='teacher') ? 'Giảng viên' : (($row_user['role']=='student') ? 'Thí sinh' : '-'))).'</td>
                <td>'.(($row_user['status']=='active') ? 'Hoạt động' : 'Tạm khóa').'</td>
                <td>
                  <a href="'.$base_url.'app_account_edit/'.$row_user['username'].'" class="btn btn-info">Sửa</a>
                  |
                  <a href="'.$base_url.'app_account_delete/'.$row_user['username'].'" class="btn btn-danger">Xóa</a>
                </td>
              </tr>';
              $i++;
            }
          ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
