<?php
  require_once 'app_connect.php';
  session_start();
  if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'teacher') {
    // do something...
    $sql_select_questions = "SELECT quiz_questions.id,quiz_questions.question,quiz_questions.level,quiz_answers.answer FROM quiz_questions JOIN quiz_answers WHERE quiz_questions.answer = quiz_answers.id";
    $data_questions = $db->fetch_assoc($sql_select_questions,0);
  } else {
    echo '<meta http-equiv="refresh" content="0,url='.$base_url.'app_home.php">';
  }
?>

<!DOCTYPE html>
<html lang="vi" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Câu hỏi</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </head>
  <body>
    <div class="container">
      <h1>Danh sách câu hỏi</h1>
      <hr>
      <a href="<?=$base_url;?>app_home.php" class="btn btn-primary">Trang chủ</a>
      <a href="<?=$base_url;?>app_exams.php" class="btn btn-success">Trang đề thi</a>
      <a href="<?=$base_url;?>app_question_add.php" class="btn btn-info">Thêm câu hỏi</a>
      <a href="<?=$base_url;?>app_answer_add.php" class="btn btn-info">Thêm câu trả lời</a>
      <hr>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>STT</th>
            <th>Câu hỏi</th>
            <th>Câu trả lời</th>
            <th>Mức độ</th>
            <th>Cập nhật</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i=1;
            if(count($data_questions)) {
              foreach ($data_questions as $key => $row_question) {
                // code...
                echo '<tr>
                  <td>'.$i.'</td>
                  <td>'.$row_question['question'].'</td>
                  <td>'.$row_question['answer'].'</td>
                  <td>'.(($row_question['level'] == 'easy') ? 'Dễ' : (($row_question['level']=='medium') ? 'Trung bình' : (($row_question['level']=='hard') ? 'Khó' : '-'))).'</td>
                  <td>
                    <a href="'.$base_url.'app_question_edit/'.$row_question['id'].'" class="btn btn-info">Sửa</a>
                    |
                    <a href="'.$base_url.'app_question_delete/'.$row_question['id'].'" class="btn btn-danger">Xóa</a>
                  </td>
                </tr>';
                $i++;
              }
            } else {
              echo '<tr><td colspan="5" style="text-align:center;">Không có câu hỏi!</td></tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
