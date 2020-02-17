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

$firstname = $lastname = $address = $city = $country = $postalcode = $about = $email ="";
$errors   = 0; 

// call the postproject() function if submit is clicked
if (isset($_POST['submit'])) {
	postproject();
}

// POST PROJECTS
function postproject(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $firstname, $lastname, $address, $city, $country, $postalcode, $about;

	// receive all input values from the form.
	$firstname  =  $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address  =  $_POST['address'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$postalcode = $_POST['postalcode'];
	$about = $_POST['about'];
	$email = $_POST['email'];

	
    
	

	
	
	if ($errors== 0) {
		
		$query = "INSERT INTO users (firstname, lastname, address,  city, country, postalcode, about) 
				  VALUES('$firstname','$lastname', '$address', '$city','$country','$postalcode','$about')";
		if ($conn->query($query) == TRUE) {
			echo "Profile completed successfully";
			header('location: profile.php');
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