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
$type = $name = $description = $biddate = $schedule = $deadline = $dateErr = $dateErr2= $payment= $amount = $status = $task="";
$errors   = 0; 

// call the postproject() function if submit is clicked
if (isset($_POST['submit'])) {
	postproject();
}

// call the add() function if task_btn is clicked
if (isset($_POST['add'])) {
	addtask();
	header("Location:tasks.php");
}




// POST PROJECTS
function postproject(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $type, $name, $description,  $biddate, $schedule, $deadline, $payment, $amount,  $status, $dateErr, $dateErr2;

	// receive all input values from the form.
	// defined below to escape form values
	$type = $_POST['type'];
	$name     =  $_POST['name'];
	$description     =  $_POST['description'];
	//$description     =  "test"
    
	// $biddate  =  $_POST['biddate'];
	$biddate  =  $_POST['biddate'];
    $schedule = $_POST['shedule'];
    $deadline  =  $_POST['deadline'];
	$payment = $_POST['payment'];
	$amount = $_POST['amount'];
	
	
	//$client   =  $_SESSION['username'];

	// form validation: ensure that dates are correctly filled
	$currentdate=date("Y-m-d");
	if($currentdate>$biddate){
		$dateErr = "Incorrect date selected.";
		$errors=$errors+1;
		
	}
	if ($biddate > $deadline) {
		$dateErr2 = "Dates are not linked.";
		$errors=$errors+1;

	}


	
	if ($errors== 0) {
		
		$query = "INSERT INTO projects (type, name, description,  biddate, schedule, deadline, payment, amount, status) 
				  VALUES('$type','$name', '$description', '$biddate','$schedule','$deadline','$payment','$amount',  'new')";
		if ($conn->query($query) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $query . "<br>" . $conn->error;
		}
	}else{
		echo '<script language="javascript">';
echo 'alert("Incorrect date selected");';
// echo "window.location.reload();";
echo '</script>';
 
	}
	$conn->close();
}


// POST PROJECTS
function addtask(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $task, $pid, $email;

	// receive all input values from the form.
    // defined below to escape form values
	
	$task =  $_POST['task'];
	$pid =  $_POST['pid'];
	$email = $_SESSION['email'];
	
	

	// form validation: ensure that the form is correctly filled

	if (empty($task)) { 
		array_push($errors, "Task is required."); 
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