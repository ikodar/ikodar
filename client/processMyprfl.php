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

	$sql = "select email from users";
	$rs = mysqli_query($conn, $sql);
	//get row
	$fetchRow = mysqli_fetch_assoc($rs);

// log user out if LOGOUT BUTTON clicked
if (isset($_GET['logout'])) {
    // remove all session variables
	session_unset();
    // destroy the session
	session_destroy();
	header("location: ../index.php");
}


// variable declaration
$company =  $firstname = $lastname = $address = $city = $country = $postalcode = $about = "";
$errors   = 0; 

// call the register() function if submit is clicked
if (isset($_POST['submit'])) {
	update();
}

// updating profile
function update(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $company, $firstname, $lastname, $address, $city, $country, $postalcode, $about;

	// receive all input values from the form.
    // defined below to escape form values
	//$username     =  $_POST['username'];
	$company     =  $_POST['company'];
    //$email = $_POST['email'];
	$firstname  =  $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address  =  $_POST['address'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$postalcode = $_POST['postalcode'];
	$about = $_POST['about'];

	if ($errors== 0) {
		
		$query = "INSERT INTO users where email='$_SESSION'(company, firstname, lastname, address, city, country, postalcode, about) 
				  VALUES('$company', '$firstname', '$lastname','$address','$city','$country','$postalcode','$about')";
		if ($conn->query($query) == TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $query . "<br>" . $conn->error;
		}
	}else{
		echo '<script language="javascript">';

// echo "window.location.reload();";
echo '</script>';
 
	}

	$conn->close();
}

?>