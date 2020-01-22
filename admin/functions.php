<?php

session_start();

include('../connection.php');

function isLoggedIn()
{
	if (isset($_SESSION['email']) && $_SESSION['user_type'] == "admin") {
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

//call view function when view button is clicked.
if(isset($_POST['view_btn'])){
	view();
}

// call the updatepassword() function if save_btn is clicked
if (isset($_POST['update_btn'])) {
	updatepassword();
}

// call the saveprofile() function if save_btn is clicked
if (isset($_POST['save_btn'])) {
	saveprofile();
}

//VIEW PROJECT in detail.
function view(){
	header('location: view.php');
}

//UPDATE the profile details.
function saveprofile(){
	 // variable declaration
	 global $conn;
	 $email = $firstname = $lastname = $address ="";
	
	 $email     = $_POST['email'];
	 $firstname = $_POST['firstname'];
	 $lastname  = $_POST['lastname'];
	 $address   = $_POST['address'];

	 $sql = "UPDATE users SET  firstname='$firstname', lastname='$lastname', addresss='$address' WHERE email='$email'";
    if($conn->query($sql) == TRUE){
		echo "Record updated successfully";
	}else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	header('location: profile.php');
}
?>