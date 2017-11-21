<?php
include 'tkb_array.php';

$tenmon = $_POST['tenmon'];

foreach ($monhoc as $mon){
	if ($tenmon==$mon['TEN_MON']){
		echo json_encode($mon);
	}
}


?>
