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
$task = $email=$pid ="";
$errors = array(); 

// call the register() function if add_btn is clicked
if (isset($_POST['add'])) {
	addtask();
	header("Location:tasks.php");
}


// POST PROJECTS
function addtask(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $task,$email,$pid;

	// receive all input values from the form.
    // defined below to escape form values
	
	$task =  $_POST['task'];
	
	$email = $_SESSION['email'];
	$pid =  $_POST['pid'];
	

	// form validation: ensure that the form is correctly filled

	if (empty($task)) { 
		array_push($errors, "Bid amount is required."); 
	}

	

	

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		
		$query = "INSERT INTO tasks (task,pid,email) 
				  VALUES('$task',$pid','$email')";
		if ($conn->query($query) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $query . "<br>" . $conn->error;
		}
	}
	$conn->close();
}







?>