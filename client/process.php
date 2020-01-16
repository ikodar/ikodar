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
$name = $description  = $skill1 = $skill2 = $skill3 = $biddate = $schedule = $deadline = $dateErr = $dateErr2= $payment= $amount= $status= "";
$errors   = 0; 

// call the register() function if submit is clicked
if (isset($_POST['submit'])) {
	postproject();
}

// POST PROJECTS
function postproject(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $name, $description, $skill1, $skill2, $skill3, $biddate, $schedule, $deadline, $payment, $amount, $dateErr, $dateErr2;

	// receive all input values from the form.
    // defined below to escape form values
	$name     =  $_POST['name'];
	$description     =  $_POST['description'];
	//$description     =  "test"
	$skill1 = $_POST['skill1'];
	$skill2 = $_POST['skill2'];
	$skill3 = $_POST['skill3'];
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
// 		echo '<script language="javascript">';
// echo 'alert("Incorrect date selecte")';
// echo '</script>';
	}


	/* form validation: ensure that the form is correctly filled
	if (empty($name)) { 
		array_push($errors, "Name is required."); 
	}
	if (empty($desc)) { 
		array_push($errors, "Description is required."); 
	}
	if (empty($biddate)) { 
		array_push($errors, "Bid ending date is required."); 
	}
	if (empty($enddate)) {
		array_push($errors, "Project ending date is required.");
    }*/
    
    // register project if there are no errors in the form
	if ($errors== 0) {
		
		$query = "INSERT INTO projects (name, description, skills, biddate, schedule, deadline, payment, amount,status) 
				  VALUES('$name', '$description', '$skill1', '$skill2', 'skill3', '$biddate','$schedule','$deadline','$payment','$amount','new')";
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

?>