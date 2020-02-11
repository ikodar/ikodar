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

// call the updatepassword() function if update_btn is clicked
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

	 $sql = "UPDATE users 
	 		 SET  firstname='$firstname', lastname='$lastname', 
			  address='$address' 
			  WHERE email='$email'";
    if($conn->query($sql) == TRUE){
		echo "Record updated successfully";
	}else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

//varaibale declaration
 $passwordErr = $passwordErr1 ="";

//UPDATE the password
function updatepassword(){
	//variable declaration
	global $conn, $passwordErr, $passwordErr1;

	$oldpass = $password1 =$password2= $email ="";
	$errors = 0;

	$email=$_SESSION['email'];
	$oldpass = $_POST['oldpass'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];

	// form validation: ensure that the form is correctly filled
	//checking if the old password is correct
	if($oldpass != "") {
		$password = md5($oldpass);
        $sql = "SELECT password FROM users WHERE email='$email'LIMIT 1";
        $results=$conn->query($sql);
        if($results != $password){
            $passwordErr1="Old password incorrect.";
            $errors=$errors+1;
        }
    }

	//checking if the new password and confirm password match
	if ($password1 != $password2) {
        $passwordErr = "The two passwords do not match.";
        $errors=$errors+1;
    }

	//update/change the password if there are no errors
	if ($errors == 0) {
		$password = md5($password1);
		$sql = "UPDATE users SET password =$password WHERE email='$email'";
		if($conn->query($sql) == TRUE){
			echo "Record updated successfully";
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

}
?>