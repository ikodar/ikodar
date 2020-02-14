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
$email = $date =$message ="";
$errors = array(); 

// call the register() function if add_btn is clicked
if (isset($_POST['help'])) {
	gethelp();
	header("Location:help.php");
}


// POST PROJECTS
function gethelp(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors,$email,$message;

	// receive all input values from the form.
    // defined below to escape form values
	$email = $_SESSION['email'];
	$message =  $_POST['message'];
	

	// form validation: ensure that the form is correctly filled

	if (empty($message)) { 
		array_push($errors, "message is required."); 
	}

	

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$date = date("Y-m-d");
		$query = "INSERT INTO helps (email,message,date) 
				  VALUES('$email','$message','$date')";
		if ($conn->query($query) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $query . "<br>" . $conn->error;
		}
	}
	$conn->close();
}







?>