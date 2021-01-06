<?php


$obj_result = new \stdclass();
$obj_result->arr_todo = Array();
$body = file_get_contents('php://input');
//print_r($body);
//print_r($_POST);
if (isset($_POST) && count($_POST) > 0 && isset($_POST['arr_todo']) &&  $_POST['title'] != "" && $_POST['user_id'] != "") {
	$arr_todo = $_POST['arr_todo'];
	$highest_id = 0;
	for($n=0;$n<count($arr_todo);$n++) {
		if ($arr_todo[$n]['id'] > $highest_id) {
			$highest_id = $arr_todo[$n]['id'];
		}
	}

	$user_id = $_POST['user_id'];
	/*
	$obj_task = new \stdclass();
	$obj_task->userId = $user_id;
	$obj_task->title = $_POST['title'];
	$obj_task->id = $highest_id+1;
	*/

	$data['userId'] = $user_id;
	$data['title'] = $_POST['title'];
	$data['id'] = $highest_id+1;
	$data['completed'] = false;
	$arr_todo[] = $data;
	$obj_result->arr_todo = $arr_todo;
	$obj_result->insert_id = $highest_id+1;
}


print json_encode($obj_result);

?>
