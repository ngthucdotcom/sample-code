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
  $question = htmlspecialchars($_POST['question']);
  $level= htmlspecialchars($_POST['level']);

  $sql_add_question = "INSERT INTO quiz_questions(question,answer,level) VALUES('$question',null,'$level')";
  if($db->query($sql_add_question)) {
    echo '<script>
      alert("Thêm mới thành công");
      window.location.href = "'.$base_url.'app_questions.php";
    </script>';
  } else {
    echo '<script>alert("Thêm mới thất bại");</script>';
  }
  // var_dump($sql_add_question);
}

?>

<!DOCTYPE html>
<html lang="vi" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Thêm câu hỏi</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </head>
  <body>
    <div class="container">
      <h1>Thêm câu hỏi</h1>
      <hr>
      <a href="<?=$base_url;?>app_exams.php" class="btn btn-success">Trang đề thi</a>
      <a href="<?=$base_url;?>app_questions.php" class="btn btn-info">Trang câu hỏi</a>
      <hr>
      <form class="form-horizontal" method="post">
        <div class="form-group">
          <label for="question">Câu hỏi</label>
          <input type="text" class="form-control" name="question" id="question" placeholder="Nhập câu hỏi">
        </div>
        <div class="form-group">
          <label for="level">Độ khó</label>
          <select class="form-control" name="level">
            <option value="easy">Dễ</option>
            <option value="medium">Trung bình</option>
            <option value="hard">Khó</option>
          </select>
        </div>
        <div class="form-group">
          <input type="submit" class="form-control btn btn-primary" name="addnew" value="Lưu" />
        </div>
      </form>
    </div>
  </body>
</html>
