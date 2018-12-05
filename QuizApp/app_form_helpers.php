<?php
// hàm tạo form
// $config[class,id,action,method] => $config[0,1,2,3]
// $input[div,label,type,class,name,id,placeholder] => $input[0,1,2,3,4,5,6]
// Demo:
// $config = array('form-horizontal',null,null,'POST');
//
// $input[] = array('form-group','Họ tên','text','form-control','fullname','fullname',null,'Nhập họ tên');
// $input[] = array('form-group','Mật khẩu','password','form-control','password','password',null,'Nhập mật khẩu');
// $input[] = array('form-group','Email','email','form-control','email','email',null,'Nhập email');
// $input[] = array('form-group','Điện thoại','text','form-control','phone','phone',null,'Nhập số điện thoại');
// $input[] = array('form-group',null,'submit','form-control btn btn-primary','addinfo',null,'Lưu',null);
//
// create_form($config,$input);
class Form {
  public function create_form($configs=null) {
    $flag=0;
    foreach ($configs as $key => $config) {
      // code...
      if($flag==0) {
        echo '<form';
        echo ($config[0]!=null) ? ' class="'.$config[0].'"' : '';
        echo ($config[1]!=null) ? ' id="'.$config[1].'"' : '';
        echo ($config[2]!=null) ? ' action="'.$config[2].'"' : '';
        echo ($config[3]!=null) ? ' method="'.$config[3].'"' : '';
        echo '>';
        $flag=1;
      } else {
        foreach ($config as $key => $row) {
          // code...
          echo ($row[0]!=null) ? '<div class="'.$row[0].'">' : '';
          echo ($row[1]!=null) ? '<label>'.$row[1].'</label>' : '';
          echo '<input';
          echo ($row[2]!=null) ? ' type="'.$row[2].'"' : '';
          echo ($row[3]!=null) ? ' class="'.$row[3].'"' : '';
          echo ($row[4]!=null) ? ' name="'.$row[4].'"' : '';
          echo ($row[5]!=null) ? ' id="'.$row[5].'"' : '';
          echo ($row[6]!=null) ? ' value="'.$row[6].'"' : '';
          echo ($row[7]!=null) ? ' placeholder="'.$row[7].'"' : '';
          echo '>';
          echo ($row[0]!=null) ? '</div>' : '';
        }
      }
    }
    echo '</form>';
  }
}
?>
