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

//delete
if (isset($_POST['delete_btn'])) {
	delete();
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
$company =  $firstname = $lastname = $address = $city = $country = $postalcode = $about = $email ="";
$errors   = 0; 


// updating profile
function update(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $firstname, $lastname, $address, $city, $country, $postalcode, $about;

	
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

		    echo "Record updated successfully";
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





//deleting profile
function delete(){
	$query = "DELETE FROM users WHERE email='$email'"; 
if($conn->query($query) == TRUE){ 
    echo "Record was deleted successfully."; 
} else{ 
    echo "ERROR: Could not able to execute $sql. "  
                                         . $conn->error; 
} 
	
}


?>