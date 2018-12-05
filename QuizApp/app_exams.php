<?php
  require_once 'app_connect.php';
  session_start();
  if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'teacher') {
    // do something...
    $teacher = $_SESSION['user']['username'];
    $sql_select_exams = "SELECT * FROM quiz_exams WHERE teacher = '$teacher'";
    $data_exams = $db->fetch_assoc($sql_select_exams,0);
  } else {
    echo '<meta http-equiv="refresh" content="0,url='.$base_url.'app_home.php">';
  }
?>

<!DOCTYPE html>
<html lang="vi" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Đề thi</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </head>
  <body>
    <div class="container">
      <h1>Danh sách đề thi</h1>
      <hr>
      <a href="<?=$base_url;?>app_home.php" class="btn btn-primary">Trang chủ</a>
      <a href="<?=$base_url;?>app_questions.php" class="btn btn-info">Trang câu hỏi</a>
      <a href="<?=$base_url;?>app_exam_add.php" class="btn btn-success">Thêm đề thi</a>
      <hr>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>STT</th>
            <th>Đề thi</th>
            <th>Điểm cần đạt</th>
            <th>Cập nhật</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i=1;
            if(count($data_exams) > 0) {
              foreach ($data_exams as $key => $row_exam) {
                // code...
                echo '<tr>
                  <td>'.$i.'</td>
                  <td>'.$row_exam['exam'].'</td>
                  <td>'.$row_exam['point_require'].'</td>
                  <td>
                    <a href="'.$base_url.'app_account_edit/'.$row_exam['id'].'" class="btn btn-info">Sửa</a>
                    |
                    <a href="'.$base_url.'app_account_delete/'.$row_exam['id'].'" class="btn btn-danger">Xóa</a>
                  </td>
                </tr>';
                $i++;
              }
            } else {
              echo '<tr><td colspan="5" style="text-align:center;">Không có đề thi!</td></tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
