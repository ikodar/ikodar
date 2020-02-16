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


// call the updatepassword() function if update_btn is clicked
if (isset($_POST['update_btn'])) {
	updatepassword();
}

// call the saveprofile() function if save_btn is clicked
if (isset($_POST['save_btn'])) {
	saveprofile();
}

//call the delete function if delete_btn is clicked (for users)
if(isset($_POST['delete_btn'])){
	delete();
}

//call send function if send_btn is clicked. (email sending)
if(isset($_POST['send_btn'])){
	send();
}

// call the updateuser() function if updateuser_btn is clicked
if (isset($_POST['updateuser_btn'])) {
	updateuser();
}

//UPDATE the profile details, for the admin only.
function saveprofile(){
	 // variable declaration
	 global $conn;
	 $email = $firstname = $lastname = $address ="";
	
	 $email     = $_POST['email'];
	 $firstname = $_POST['firstname'];
	 $lastname  = $_POST['lastname'];
	 $address   = $_POST['address'];

	 $sql = "UPDATE users 
	 		 SET  firstname='$firstname', lastname='$lastname', address='$address' 
			  WHERE email='$email'";
	echo  "<script> confirm('Are you sure you want to change?');</script>";
    if($conn->query($sql) == TRUE){
		echo  "<script> alert('Record updated successfully.');</script>";
	}else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}


//UPDATE the password
function updatepassword(){
	//variable declaration
	global $conn;

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
		$res = $results->fetch_assoc()['password'];
		// echo "<script> console.log('$res') </script>";
        if($res != $password){
			echo  "<script> alert('Old password incorrect.');</script>";
            $errors=$errors+1;
        }
    }

	//checking if the new password and confirm password match
	if ($password1 != $password2) {
		echo  "<script> alert('The two passwords do not match.');</script>";
        $errors=$errors+1;
    }

	//update/change the password if there are no errors
	if ($errors == 0) {
		$password = md5($password1);
		$sql = "UPDATE users SET password ='$password' WHERE email='$email'";
		echo  "<script> confirm('Are you sure you want to change?');</script>";
		if($conn->query($sql) == TRUE){
			echo  "<script> alert('Password updated successfully.');</script>";
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

}

//DELETE users 
function delete(){
	global $conn;

	$user=$_POST['email'];

	//check if the person has any on going projects
	$sql = "SELECT * FROM projects WHERE (client ='$user' || IT='$user') && status='open'";
	$results = $conn->query($sql);
	if($results->num_rows == 0){
		$sql = "DELETE FROM users WHERE email ='$user'";
		if($conn->query($sql) == TRUE){
			echo  "<script> alert('User deleted successfully.');</script>";
			header('location: users2.php');
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}else{
		echo  "<script> alert('Cannot delete user due open projects.');</script>";
	}
}

//UPDATE USER function
function updateuser(){
	global $conn;

	$email = $_POST['email'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$postalcode = $_POST['postalcode'];
	$about = $_POST['about'];


	$sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', address='$address', city='$city', 
			country='$country', postalcode='$postalcode', about='$about' 
			WHERE email='$email'";
	if($conn->query($sql) == TRUE){
			echo  "<script> alert('User updated successfully.');</script>";
	}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
}

//SEND email function
function send(){
	$msg = $_POST['reply'];
	     //sender's email,subject of the email, message to be sent
	//mail('vinethrip@gmail.com','Reply for the ikodar contact us form',$msg);
	//header('location: messages.php');

	$sender = 'vinethrip@gmail.com';
	$recipient = 'vinethrip@yahoo.com';

	$subject = "php mail test";
	$message = "php test message";
	//$headers = 'From:' . $sender;
	

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From:'.$sender. "\r\n";

	if (mail($recipient, $subject, $message, $headers))
	{
		echo  "<script> alert('Message sent successfully.');</script>";
		header('location: messages.php');
	}
	else
	{
		echo  "<script> alert('Message not sent.');</script>";
	}

}

?>