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
	//header("Location:active.php");
}


// POST BID
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

	// register bid if there are no errors in the form
	if (count($errors) == 0) {
		
		$query = "INSERT INTO bid (Bid, Days, Proposal,pid,email) 
				  VALUES('$bid', '$days', '$proposal', '$pid','$email')";
		

		if ($conn->query($query) === TRUE) {
			echo "<script type= 'text/javascript'>alert('Bid submitted successfully');</script>";
			} else {
			echo "<script type= 'text/javascript'>alert('Bid alraedy exists');</script>";
			}
	}
}

//POST FINAL PROJECT LINK
if(isset($_POST['submitproject_btn'])){
	project();
}

$link ="";
$errors = array(); 

// call the Complete() function if complete button is clicked
if (isset($_POST['complete'])) {
	Complete();
	//header("Location:tasks.php");
}


function Complete(){
	// call these variables with the global keyword to make them available in function
	global $conn, $link;

	// receive all input values from the form.
    // defined below to escape form values
	
	$link =  $_POST['link'];
	$pid=  $_SESSION['pid'];
	$tid =  $_POST['tid'];

	
	$query = "UPDATE tasks 
              SET link = '$link' WHERE tid = '$tid'";

              
if ($conn->query($query) === TRUE) {
	echo "<script type= 'text/javascript'>alert('Completed');</script>";
	} else {
	echo "<script type= 'text/javascript'>alert('Error');</script>";
	}
	

}

//FINAL POROJECT LINK submission
function project(){
	global $conn;
	$pid=$_SESSION["pid"];
	$link=$_POST['link'];
	$sql="UPDATE projects SET link='$link', accept='submitted' WHERE pid='$pid'";
	if ($conn->query($sql) === TRUE) {
        echo "<script> alert('Link submitted successfully.');</script>";
    } else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}


?>