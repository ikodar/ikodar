<?php 
session_start();

include ('connection.php');

function isLoggedIn()
{
	if (isset($_SESSION['email']) && $_SESSION['user_type'] == "IT") {
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
$bid = $proposal = $days= $email=$pid ="";
$errors = array(); 

// call the register() function if add_btn is clicked
if (isset($_POST['submit'])) {
	placebid();
	header("Location:bid.php");
}


// POST PROJECTS
function placebid(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $bid, $days, $proposal,$email,$pid;

	// receive all input values from the form.
    // defined below to escape form values
	
	$bid =  $_POST['bid'];
	$days =  $_POST['days'];
	$proposal =  $_POST['proposal'];
	$email = $_SESSION['email'];
	$pid =  $_POST['pid'];
	

	// form validation: ensure that the form is correctly filled

	if (empty($bid)) { 
		array_push($errors, "Bid amount is required."); 
	}

	if (empty($days)) { 
		array_push($errors, " required."); 
	}

	if (empty($proposal)) { 
		array_push($errors, "proposal is required."); 
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		
		$query = "INSERT INTO bid (Bid, Days, Proposal,pid,email) 
				  VALUES('$bid', '$days', '$proposal', '$pid','$email')";
		if ($conn->query($query) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $query . "<br>" . $conn->error;
		}
	}
	$conn->close();
}





?>