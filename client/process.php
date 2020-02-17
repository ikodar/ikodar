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
$type = $name = $description = $biddate = $schedule = $deadline = $dateErr = $dateErr2= $payment= $amount = $status  = $task="";
$errors   = 0; 

// call the postproject() function if submit is clicked
if (isset($_POST['submit'])) {
	postproject();
}

// POST PROJECTS
function postproject(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $type, $name, $description,  $biddate, $schedule, $deadline, $payment, $amount,  $status, $dateErr, $dateErr2;

	// receive all input values from the form.
	// defined below to escape form values
	$type = $_POST['type'];
	$name     =  $_POST['name'];
	$description     =  $_POST['description'];
	$biddate  =  $_POST['biddate'];
    $schedule = $_POST['shedule'];
    $deadline  =  $_POST['deadline'];
	$payment = $_POST['payment'];
	$amount = $_POST['amount'];
	$client   =  $_SESSION['email'];
	// form validation: ensure that dates are correctly filled
	$currentdate=date("Y-m-d");
	if($currentdate>$biddate){
		$dateErr = "Incorrect date selected.";
		$errors=$errors+1;
		
	}
	if ($biddate > $deadline) {
		$dateErr2 = "Dates are not linked.";
		$errors=$errors+1;

	}
	
	if ($errors== 0) {
		
		$query = "INSERT INTO projects (type, name, description,  biddate, schedule, deadline, payment, amount, status,client) 
				  VALUES('$type','$name', '$description', '$biddate','$schedule','$deadline','$payment','$amount','new','$client')";
		if ($conn->query($query) === TRUE) {
			echo "New record created successfully";
			header('location: existing.php');
		} else {
		    echo "Error: " . $query . "<br>" . $conn->error;
		}
	}else{
		echo '<script language="javascript">';
        echo 'alert("Incorrect date selected");';

echo '</script>';
 
	}
	$conn->close();
}

//accept project link
if(isset($_POST['acceptproject_btn'])){
	acceptproject();
}

function acceptproject(){
	global $conn;
	$link = $_POST['link'];
	$pid = $_SESSION['pid'];

	$sql="UPDATE projects SET status='completed', accept='accepted' WHERE pid='$pid'";

	if($conn->query($sql)==TRUE){
		echo  "<script> alert('Project updated.');</script>";
		header('location: payments.php');
	}else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}


//DELETE PROJECT
if(isset($_POST['delete_btn'])){
	global $conn;

	$pid = $_SESSION['pid'];

	$sql="SELECT status from projects WHERE pid='$pid'";
	$results = $conn->query($sql);
	$row = $results->fetch_assoc();

	if($row['status']== "new"){
		$sql="DELETE FROM projects WHERE pid='$pid'";
		if($conn->query($sql)==TRUE){
			$sql="DELETE FROM bid WHERE pid='$pid'";
			if($conn->query($sql)==TRUE){
				echo "<script> alert('Project deleted successfully.');</script>";
				header ('location: existing.php');
			}else{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}else{
		echo "<script> alert('Project cannot be deleted.');</script>";
	}

	

}

?>