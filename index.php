<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Test</title>

<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!--<link href="./css/custom.css" rel="stylesheet">
<script src="./js/custom.js"></script>
-->
</head>
<body>

<div style="margin-left:auto; margin-right:auto; margin-top:20px; margin-bottom:20px; max-width:80%;">
	<div class="card text-center">
		<div class="card-body">
			<h5 class="card-title">To Do</h5>
			<ul class="list-group">
			</ul>
			<br><br>
			<form>
				<div class="form-group row">
					<label for="task_title" class="col-sm-2 col-form-label">Task</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="task_title" placeholder="What do you need to do?">
					</div>
				</div>
				<div class="form-group row">
					<label  class="col-sm-2 col-form-label"></label>
					<div class="col-sm-10" style="text-align:right;">
						<button type="button" class="btn btn-primary save_item">Save Item</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$ = jQuery;
	var arr_todo = [];

	function do_completed( event ) {
		console.log(event.data.item_id);
		//console.log(event.data.item_id);
		temp_data = new Object(); 
		temp_data.arr_todo = arr_todo; 
		temp_data.id = event.data.item_id; 
		$.ajax({
			url: 'done.php',
			type: 'POST',
			data: temp_data,
			dataType: 'json',
			//contentType: 'multipart/form-data; charset=utf-8',
			success: function (response) {
				
				$('li.item-id-' + temp_data.id).find('span').html("<button type=\"button\" class=\"btn btn-success\">done</button>");
				arr_todo = response.arr_todo;
			},
			error: function () {
			    alert("error");
			}
		}); 
	}

	function do_delete( event ) {
		//console.log(event.data.item_id);
		temp_data = new Object(); 
		temp_data.arr_todo = arr_todo; 
		temp_data.id = event.data.item_id; 
		$.ajax({
			url: 'delete.php',
			type: 'POST',
			data: temp_data,
			dataType: 'json',
			//contentType: 'multipart/form-data; charset=utf-8',
			success: function (response) {
				
				$('li.item-id-' + temp_data.id).remove();
				arr_todo = response.arr_todo;
				//console.info(response);
			},
			error: function () {
			    alert("error");
			}
		}); 
	}

	function do_add( event ) {
		temp_data = new Object(); 
		temp_data.arr_todo = arr_todo; 
		temp_data.user_id = 1; 
		temp_data.title = $('#task_title').val();
		$.ajax({
			url: 'add.php',
			type: 'POST',
			data: temp_data,
			dataType: 'json',
			//contentType: 'multipart/form-data; charset=utf-8',
			success: function (response) {
				arr_todo = response.arr_todo;
				console.info('response is');
				console.info(response.arr_todo);
				item_id = response.insert_id;
				do_add_item_html(item_id, temp_data.title);
				temp_data.title = $('#task_title').val('');
				
				//console.info(response);
			},
			error: function () {
			    alert("error");
			}
		}); 
	}

	function do_add_item_html(item_id, title) {
		var item = "<li class=\"item-id-" + item_id + " list-group-item d-flex justify-content-between align-items-center\">" + title + "<span><button type=\"button\" class=\"btn btn-success\">&#10003;</button>&nbsp;<button type=\"button\" class=\"btn btn-danger\">x</button></span></li>";
		$('.list-group').append(item);
		$('.list-group').find('.item-id-'+item_id).data('item_id', item_id);
		$('.list-group').find('.item-id-'+item_id).find('.btn-success').on('click', { item_id: item_id}, do_completed);
		$('.list-group').find('.item-id-'+item_id).find('.btn-danger').on('click', { item_id: item_id}, do_delete);
	}
	$('.save_item').on('click', do_add);

	$( document ).ready(function() {
		console.log( "ready!" );
		$.get( "https://jsonplaceholder.typicode.com/todos", function( data ) {
			
			arr_todo = data;	
			for(var n=0;n<data.length;n++) {
				if (data[n].userId == 1) {
					title = data[n].title;
					var item = "<li class=\"item-id-" + data[n].id + " list-group-item d-flex justify-content-between align-items-center\">" + title + "<span><button type=\"button\" class=\"btn btn-success\">&#10003;</button>&nbsp;<button type=\"button\" class=\"btn btn-danger\">x</button></span></li>";
					$('.list-group').append(item);
					$('.list-group').find('.item-id-'+data[n].id).data('item_id', data[n].id);
					$('.list-group').find('.item-id-'+data[n].id).find('.btn-success').on('click', {
  item_id: data[n].id}, do_completed);
					$('.list-group').find('.item-id-'+data[n].id).find('.btn-danger').on('click', {
  item_id: data[n].id}, do_delete);
					//arr_todo.push(data[n]);
				}
				//console.info(data[n]);
			}
			//console.info(arr_todo);
			//console.info(data);

			/*
			temp_data = new Object(); 
			temp_data.arr_todo = arr_todo; 
			temp_data.user_id = 1; 
			temp_data.title = "test_title"; 
			$.ajax({
				url: 'add.php',
				type: 'POST',
				data: temp_data,
				//contentType: 'multipart/form-data; charset=utf-8',
				success: function (response) {
					//console.info(response);
				},
				error: function () {
				    alert("error");
				}
			}); 
			*/
		});

	});
</script>

</body>
</html>
