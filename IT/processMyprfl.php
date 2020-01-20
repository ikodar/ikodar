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
$firstname = $lastname = $address = $city = $country = $postalcode = $about = $email ="";
$errors   = 0; 

// call the update() function if submit is clicked
if (isset($_POST['submit_btn'])) {
	update();
}

// updating profile
function update(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors,$firstname, $lastname, $address, $city, $country, $postalcode, $about;

	// receive all input values from the form.
    // defined below to escape form values
	//$username     =  $_POST['username'];
	//$company     =  $_POST['company'];
    //$email = $_POST['email'];
	$firstname  =  $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address  =  $_POST['address'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$postalcode = $_POST['postalcode'];
	$about = $_POST['about'];
	$email = $_POST['email'];

	if ($errors== 0) {
		
		$query = "UPDATE users  
				  SET firstname='$firstname',lastname='$lastname',
				      address='$address',city = '$city',country = '$country',
					  postalcode = '$postalcode',about = '$about'
				  WHERE email='$email'";
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