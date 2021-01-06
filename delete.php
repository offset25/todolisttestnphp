<?php


$obj_result = new \stdclass();
$obj_result->arr_todo = Array();
//$body = file_get_contents('php://input');
//print_r($body);
//print_r($_POST);
if (isset($_POST) && count($_POST) > 0 && isset($_POST['arr_todo']) &&  $_POST['id'] != "") {
	$arr_todo = $_POST['arr_todo'];
	$highest_id = 0;
	$id = $_POST['id'];
	for($n=0;$n<count($arr_todo);$n++) {
		if ($arr_todo[$n]['id'] == $id) {
			//print "found at $n \n";
			//array_slice($arr_todo, $n, 1);
			//print_r($arr_todo);
			unset($arr_todo[$n]);
			$arr_todo = array_values($arr_todo);
		}
	}
	$obj_result->arr_todo = $arr_todo;
}


print json_encode($obj_result);

?>
