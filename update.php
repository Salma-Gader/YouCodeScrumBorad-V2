<?php 

include "database.php";
include 'scripts.php';
$result = getTasks();
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    	
	<!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/css/vendor.min.css" rel="stylesheet" />
	<link href="assets/css/default/app.min.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
    <title>Document</title>
</head>
<body>

   
			<!-- TASK MODAL -->
<?php
  global $conn;
  $id= $_GET['updateId'];
  $request= "SELECT tasks.id,tasks.title,tasks.type_id,tasks.priority_id,tasks.status_id,tasks.task_datetime,tasks.Description FROM tasks
  WHERE tasks.id= $id";
 
  $result = mysqli_query($conn, $request);
  $row = $result->fetch_assoc();
	echo '
	<div>
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="scripts.php" method="POST" id="form-task">
					<div class="modal-header">
						<h5 class="modal-title">Add Task</h5>
						<a href="#" class="btn-close" data-bs-dismiss="modal"></a>
					</div>
					<div class="modal-body">
							<!-- This Input Allows Storing Task Index  -->
							<input type="hidden" id="task-id" name="task-id">
							<div class="mb-3">
								<label class="form-label">Title</label>
								<input type="text"  name="task-title" class="form-control" id="task-title" value="'.$row["title"].'" >
								<input type="hidden" name="id_clicked"  value="'.$row["id"].'">
							</div>
							<div class="mb-3">
								<label class="form-label">Type</label>
								<div class="ms-3">
									<div class="form-check mb-1">
										<input class="form-check-input" name="task-type" type="radio" id="task-type-feature" value="1"'; if($row["type_id"] == 1){echo 'checked';} echo '/>
										<label class="form-check-label" for="task-type-feature" value="Feature">Feature</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" name="task-type" type="radio"   id="task-type-bug" value="2"'; if($row["type_id"] == 2){echo 'checked';} echo '/>
										<label class="form-check-label" for="task-type-bug" >Bug</label>
									</div>
								</div>
								
							</div>
							<div class="mb-3">
								<label class="form-label">Priority</label>
								<select class="form-select" name="task-priority"id="task-priority">
									<option value="">Please select</option>
									<option value="1"'; if($row["priority_id"] == 1){echo 'selected';} echo ' >Low</option>
									<option value="2"'; if($row["priority_id"] == 2){echo 'selected';} echo ' >Medium</option>
									<option value="3"'; if($row["priority_id"] == 3){echo 'selected';} echo ' >High</option>
									<option value="4"'; if($row["priority_id"] == 4){echo 'selected';} echo ' >Critical</option>
								</select>
							</div>
							<div class="mb-3">
								<label class="form-label">Status</label>
								<select class="form-select" name="task-status" id="task-status" >
									<option value="">Please select</option>
									<option value="1"'; if($row["status_id"] == 1){echo 'selected="selected"';} echo '>To Do</option>
									<option value="2"'; if ($row["status_id"] == 2) echo 'selected="selected"'; echo '>In Progress</option>
									<option value="3"'; if ($row["status_id"] == 3) echo 'selected="selected"'; echo '>Done</option>
								</select>
							</div>
							<div class="mb-3">
								<label class="form-label">Date</label>
								<input type="date" class="form-control" id="task-date" name="task-Date" value="'.$row["task_datetime"].'"/>
							</div>
							<div class="mb-0">
								<label class="form-label">Description</label>
								<textarea class="form-control" rows="10" id="task-description" name="task-Description"> '.$row["Description"].'</textarea>
							</div>
						
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
						<button type="submit" name="delete" class="btn btn-danger task-action-btn" id="task-delete-btn">Delete</a>
						<button type="submit" name="update" class="btn btn-warning task-action-btn" id="task-update-btn">Update</a>
						<button type="submit" name="save" class="btn btn-primary task-action-btn" id="task-save-btn">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	';
	?>
	 

</body>
	
	<!-- ================== BEGIN core-js ================== -->
	<script src="assets/js/vendor.min.js"></script>
	<script src="assets/js/app.min.js"></script>
	<!-- ================== END core-js ================== -->
</html>