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
$IT = $status ="";
$errors = array(); 

// call the accept() function if accept_btn is clicked
if (isset($_POST['accept_btn'])) {
	accept();
	//header("Location:proposals.php");
}


// AWARD PROJECTS
function accept(){
	// call these variables with the global keyword to make them available in function
	global $conn, $IT, $status;

	// receive all input values from the form.
    // defined below to escape form values
	
	$IT =  $_POST['IT'];
	$pid=  $_SESSION['pid'];
	$sql="SELECT IT FROM projects WHERE pid='$pid'";
	$results=$conn->query($sql);
	$ITcheck=$results->fetch_assoc()['IT'];


    if($ITcheck==""){
	// form validation: ensure that the form is correctly filled

	// award bid if there are no errors in the form
	$query = "UPDATE projects 
              SET IT = '$IT', status = 'open' WHERE pid = '$pid'";

              
	if ($conn->query($query) === TRUE) {
		echo "New record created successfully";
		header('location:details.php');
	} else {
	   echo "Error: " . $query . "<br>" . $conn->error;
	}
	}else{
		echo "<script type= 'text/javascript'>alert('Can not award maltiple bids');</script>";
	}	

}







?>