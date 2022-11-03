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
        $sql = "SELECT * FROM tasks";
        $result = mysqli_query($conn, $sql);
        return $result;
        
        //$sql ="SELECT tasks.id as id ,  tasks.title as title  ,  tasks.task_datetime as task_datetime, tasks.Description as Description , 
        //tasks.prioriti as type_id , statuses.name  as status_id, priorities.name as priority FROM tasks";

        // JOIN types on types.id = tasks.type_id
        // JOIN status on statuses.id = tasks.status_id 
        // JOIN priorities on priorities.id = tasks.priority_id";
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
        //CODE HERE
        //SQL UPDATE
        $_SESSION['message'] = "Task has been updated successfully !";
		header('location: index.php');
    }

    function deleteTask()
    {
        //CODE HERE
        //SQL DELETE
        $_SESSION['message'] = "Task has been deleted successfully !";
		header('location: index.php');
    }

?>