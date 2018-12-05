<?php
  require_once 'app_connect.php';
  session_start();
  if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'teacher') {
    // do something...
    $id = $_GET['id'];
    $sql_select_questions = "SELECT * FROM quiz_questions WHERE id=$id";
    $data_questions = $db->fetch_assoc($sql_select_questions,1);
    $sql_select_answers = "SELECT * FROM quiz_answers WHERE question=$id";
    $data_answers = $db->fetch_assoc($sql_select_answers,0);
  } else {
    echo '<meta http-equiv="refresh" content="0,url='.$base_url.'app_home.php">';
  }
?>

<?php
// Code xu ly
if(isset($_POST['update_question'])) {
  $data['question'] = htmlspecialchars($_POST['question']);
  $data['level']= htmlspecialchars($_POST['level']);

  if($db->update_row('quiz_questions',$data,'id',$id)) {
    echo '<script>
      alert("Cập nhật thành công");
      window.location.href = "'.$base_url.'app_questions.php";
    </script>';
  } else {
    echo '<script>alert("Cập nhật thất bại");</script>';
  }
}
if(isset($_POST['add_answer'])) {
  $data['answer'] = htmlspecialchars($_POST['answer']);

  if($db->update_row('quiz_questions',$data,'id',$id)) {
    echo '<script>
      alert("Cập nhật thành công");
      window.location.href = "'.$base_url.'app_questions.php";
    </script>';
  } else {
    echo '<script>alert("Cập nhật thất bại");</script>';
  }
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
      <div class="row">
        <form class="form-horizontal" method="post">
          <div class="form-group">
            <label for="question">Câu hỏi</label>
            <input type="text" class="form-control" name="question" id="question" value="<?=$data_questions['question']?>" placeholder="Nhập câu hỏi">
          </div>
          <div class="form-group">
            <label for="level">Độ khó</label>
            <select class="form-control" name="level">
              <option value="easy"<?=($data_questions['level']=='easy') ? ' selected' : '';?>>Dễ</option>
              <option value="medium"<?=($data_questions['level']=='medium') ? ' selected' : '';?>>Trung bình</option>
              <option value="hard"<?=($data_questions['level']=='hard') ? ' selected' : '';?>>Khó</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" class="form-control btn btn-primary" name="update_question" value="Lưu" />
          </div>
        </form>
        <hr>
        <form class="form-horizontal" method="post">
          <div class="form-group">
            <label for="answer">Chọn đáp án</label>
            <select class="form-control" name="answer">
              <?php
                foreach ($data_answers as $key => $row_answer) {
                  // code...
                  if($row_answer['id']==$data_questions['answer']) {
                    echo '<option value="'.intval($row_answer['id']).'" selected>'.$row_answer['answer'].'</option>';
                  } else {
                    echo '<option value="'.intval($row_answer['id']).'">'.$row_answer['answer'].'</option>';
                  }
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" class="form-control btn btn-primary" name="add_answer" value="Lưu" />
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
