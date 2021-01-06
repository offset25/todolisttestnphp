<?php


$obj_result = new \stdclass();
$obj_result->arr_todo = Array();
$body = file_get_contents('php://input');
//print_r($body);
//print_r($_POST);
if (isset($_POST) && count($_POST) > 0 && isset($_POST['arr_todo']) &&  $_POST['id'] != "") {
	$arr_todo = $_POST['arr_todo'];
	$id = $_POST['id'];
	$highest_id = 0;
	for($n=0;$n<count($arr_todo);$n++) {
		if ($arr_todo[$n]['id'] == $id) {
			$arr_todo[$n]['completed'] = true;
		}
	}

	//$arr_todo[] = $data;
	$obj_result->arr_todo = $arr_todo;
}


print json_encode($obj_result);

?>
