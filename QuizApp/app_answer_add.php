<?php
  require_once 'app_connect.php';
  session_start();
  if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'teacher') {
    // do something...
  } else {
    echo '<meta http-equiv="refresh" content="0,url='.$base_url.'app_home.php">';
  }
?>

<?php
// Code xu ly
if(isset($_POST['addnew'])) {
  $answer = htmlspecialchars($_POST['answer']);
  $question = intval(htmlspecialchars($_POST['question']));

  $sql_add_answer = "INSERT INTO quiz_answers(answer,question) VALUES('$answer',$question)";
  if($db->query($sql_add_answer)) {
    echo '<script>
      alert("Thêm mới thành công");
      window.location.href = "'.$base_url.'app_questions.php";
    </script>';
  } else {
    echo '<script>alert("Thêm mới thất bại");</script>';
  }
}
$sql_select_questions = "SELECT * FROM quiz_questions";
$data_questions = $db->fetch_assoc($sql_select_questions,0);
?>

<!DOCTYPE html>
<html lang="vi" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Thêm câu trả lời</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </head>
  <body>
    <div class="container">
      <h1>Thêm câu trả lời</h1>
      <hr>
      <a href="<?=$base_url;?>app_exams.php" class="btn btn-success">Trang đề thi</a>
      <a href="<?=$base_url;?>app_questions.php" class="btn btn-info">Trang câu hỏi</a>
      <hr>
      <form class="form-horizontal" method="post">
        <div class="form-group">
          <label for="question">Câu hỏi</label>
          <select class="form-control" name="question">
            <?php
              foreach ($data_questions as $key => $row_question) {
                // code...
                echo '<option value="'.intval($row_question['id']).'">'.$row_question['question'].'</option>';
              }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="answer">Câu trả lời</label>
          <input type="text" class="form-control" name="answer" id="answer" placeholder="Nhập câu trả lời">
        </div>
        <div class="form-group">
          <input type="submit" class="form-control btn btn-primary" name="addnew" value="Lưu" />
        </div>
      </form>
    </div>
  </body>
</html>
