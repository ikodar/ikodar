<?php 
session_start();

include ('connection.php');

function isLoggedIn()
{
	if (isset($_SESSION['email']) && $_SESSION['user_type'] == "client") {
		return true;
	}else{
		return false;
	}
}

// log user out if LOGOUT BUTTON clicked
if (isset($_GET['logout'])) {
    // remove all session variables
	session_unset();
    // destroy the session
	session_destroy();
	header("location: ../index.php");
}


// variable declaration
$task = $hour = $pid = $accept ="";
$errors = array(); 

// call the register() function if add_btn is clicked
if (isset($_POST['add'])) {
	addtask();
	header("Location:tasks.php");
}


// ADD TASK
function addtask(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $task,$hour,$pid;

	// receive all input values from the form.
    // defined below to escape form values
	
	$task =  $_POST['task'];
	$hour = $_POST['hour'];
	$pid =  $_POST['pid'];
	

	// form validation: ensure that the form is correctly filled

	if (empty($task)) { 
		array_push($errors, "task is required."); 
	}

	if (empty($hour)) { 
		array_push($errors, "No of hours are required."); 
	}


	// add tasks if there are no errors in the form
	if (count($errors) == 0) {
		
		$query = "INSERT INTO tasks (task,hour,pid) 
				  VALUES('$task','$hour','$pid')";
		if ($conn->query($query) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $query . "<br>" . $conn->error;
		}
	}
	$conn->close();
}

//accept task link
if(isset($_POST['task_btn'])){
	accepttask();
}

function accepttask(){
	global $conn;
	$tid = $_POST['tid'];

	$sql="UPDATE tasks SET accept='accepted' WHERE tid = '$tid'";

	if($conn->query($sql)==TRUE){
		echo  "<script> alert('Task accepted.');</script>";
	}else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}


?>