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


//call the delete function if delete_btn is clicked (for users)
if(isset($_POST['delete_btn'])){
	delete();
}


// call the updateuser() function if updateuser_btn is clicked
if (isset($_POST['update_btn'])) {
	update();
}

if (isset($_POST['accdelete_btn'])) {
	accdelete();
}


//DELETE USER INFO
function delete(){
	global $conn;

	$email = $_POST['email'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$postalcode = $_POST['postalcode'];
	$about = $_POST['about'];


	$sql = "UPDATE users SET firstname='', lastname='', address='', city='', 
			country='', postalcode='', about='' 
			WHERE email='$email'";
	if($conn->query($sql) == TRUE){
			echo  "<script> alert('Deleted successfully.');</script>";
	}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
}


//UPDATE USER function
function update(){
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

//ACCOUNT DELETE users 
function accdelete(){
	global $conn;

	$email=$_SESSION['email'];

	/*check if the person has any on going projects
	$sql="SELECT *
  FROM users INNER JOIN projects 
    ON users.email = projects.IT
 WHERE condition email ='$email' AND (status='completed' |status='past')";
*/



//check if the person has any on going projects
$sql = "SELECT * FROM projects WHERE client ='$email' && status='open'";
$results = $conn->query($sql);
if($results->num_rows == 0){
	$sql = "DELETE FROM users WHERE email ='$email'";
	if($conn->query($sql) == TRUE){
		echo  "<script> alert('User deleted successfully.');</script>";
		header('location: ../index.php');
	}else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}else{
	echo  "<script> alert('Cannot delete user due open projects.');</script>";
}
}

?>