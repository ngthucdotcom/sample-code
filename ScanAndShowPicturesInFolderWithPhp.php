<?php
//thư mục cần duyệt
$directory = "./";

//lấy tất cả các file có phần mở rộng là jpg
$images = glob($directory . "*.jpg");

//duyệt và show hình ảnh
foreach($images as $image)
{
echo '<img src="'.$image.'"/>';
}
?>
