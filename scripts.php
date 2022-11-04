<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    // session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();
    
    function getTasks()
    {
        global $conn;
        $sql = "SELECT tasks.id,tasks.title,tasks.task_datetime,tasks.Description,types.name AS types,priorities.name AS priorities,status.name AS status,tasks.task_datetime AS date FROM tasks
        INNER JOIN types ON tasks.type_id =types.id
        INNER JOIN priorities ON tasks.priority_id=priorities.id
        INNER JOIN status ON tasks.status_id=status.id";
        $result = mysqli_query($conn, $sql);
        return $result; 
    }

   

    function saveTask()
    {
        global $conn;
        //CODE HERE
        
        $title = $_POST['task-title'];
        $type = $_POST['task-type'];
        $priority = $_POST['task-priority'];
        $Status = $_POST['task-status'];
        $Date = $_POST['task-Date'];
        $Description = $_POST['task-Description'];

         //SQL INSERT
        echo $sql="INSERT INTO `tasks` (`title`, `type_id`, `priority_id`, `status_id`, `task_datetime`, `Description`) VALUES ('$title',' $type','$priority ','$Status','$Date','$Description')";
        if(mysqli_query($conn, $sql)){
        
            $_SESSION['message'] = "Task has been added successfully !";
		    header('location: index.php');
        }
    }

    function updateTask()
    {
        global $conn;
        //CODE HERE
        $id = $_POST['id_clicked'];
        $title = $_POST['task-title'];
        $type = $_POST['task-type'];
        $priority = $_POST['task-priority'];
        $Status = $_POST['task-status'];
        $Date = $_POST['task-Date'];
        $Description = $_POST['task-Description'];

      
        //SQL UPDATE
        $sql= "UPDATE `tasks` SET `title`='$title',`type_id`='$type',`priority_id`='$priority',`status_id`='$Status',`task_datetime`='$Date',`Description`='$Description' WHERE id= $id";
        if(mysqli_query($conn, $sql)){
         $_SESSION['message'] = "Task has been updated successfully !";
		 header('location: index.php');
        }
    }

    function deleteTask()
    {   
        global $conn;
        //CODE HERE
        $id = $_POST['id_clicked'];
        //SQL DELETE
        $sql = "DELETE FROM `tasks` WHERE id = $id ";
        if(mysqli_query($conn, $sql)){
        $_SESSION['message'] = "Task has been deleted successfully !";
		header('location: index.php');
        }
    }
    function numberTask($status)
    {
        global $conn;
        $sql = "SELECT * FROM `tasks` WHERE status_id = $status";
        $result = mysqli_query($conn,$sql);
        echo mysqli_num_rows($result);
    }
    

?>