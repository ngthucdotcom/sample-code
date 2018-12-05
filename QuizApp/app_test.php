<?php
  require_once 'app_connect.php';
  // session_start();
  // var_dump($_SESSION);
?>

<?php
// require_once 'app_connect.php';
// $table = 'quiz_exams';
// $data['exam'] = 'Thi giữa kỳ';
// $data['teacher'] = 1234;
// $data['point_per_question'] = 1;
// $data['point_require'] = 80;
// var_dump($data);
// var_dump($db->insert_row($table,$data));
// var_dump($db->update_row($table,$data,'id',1));
?>

<!DOCTYPE html>
<html lang="vi" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Test</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </head>
  <body>
    <div class="container">
      <?php
        // $config = array('form-horizontal',null,null,'POST');
        //
        // $input[] = array('form-group','Họ tên','text','form-control','fullname','fullname',null,'Nhập họ tên');
        // $input[] = array('form-group','Mật khẩu','password','form-control','password','password',null,'Nhập mật khẩu');
        // $input[] = array('form-group','Email','email','form-control','email','email',null,'Nhập email');
        // $input[] = array('form-group','Điện thoại','text','form-control','phone','phone',null,'Nhập số điện thoại');
        // $input[] = array('form-group',null,'submit','form-control btn btn-primary','addinfo',null,'Lưu',null);

        // create_form(
        //   array('form-horizontal',null,null,'POST'),
        //   array(
        //     array('form-group','Họ tên','text','form-control','fullname','fullname',null,'Nhập họ tên'),
        //     array('form-group','Mật khẩu','password','form-control','password','password',null,'Nhập mật khẩu'),
        //     array('form-group','Email','email','form-control','email','email',null,'Nhập email'),
        //     array('form-group','Điện thoại','text','form-control','phone','phone',null,'Nhập số điện thoại'),
        //     array('form-group',null,'submit','form-control btn btn-primary','addinfo',null,'Lưu',null)
        //   )
        // );
        $data = array(
          array('form-horizontal',null,null,'POST'),
          array(
            array('form-group','Họ tên','text','form-control','fullname','fullname',null,'Nhập họ tên'),
            array('form-group','Mật khẩu','password','form-control','password','password',null,'Nhập mật khẩu'),
            array('form-group','Email','email','form-control','email','email',null,'Nhập email'),
            array('form-group','Điện thoại','text','form-control','phone','phone',null,'Nhập số điện thoại'),
            array('form-group',null,'submit','form-control btn btn-primary','addinfo',null,'Lưu',null)
          )
        );
        // var_dump($data);
        $form->create_form($data);
      ?>
    </div>
  </body>
</html>
