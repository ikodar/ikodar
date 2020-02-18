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

// log user out if LOGOUT BUTTON clicked
if (isset($_GET['logout'])) {
    // remove all session variables
	session_unset();
    // destroy the session
	session_destroy();
	header("location: ../index.php");
}



//POST FINAL PROJECT LINK
if(isset($_POST['submitproject_btn'])){
	project();
	header("Location:details.php");
}

$link ="";
$errors = array(); 

// call the Complete() function if complete button is clicked
if (isset($_POST['complete'])) {
	Complete();
	//header("Location:tasks.php");
}


function Complete(){
	// call these variables with the global keyword to make them available in function
	global $conn, $link;

	// receive all input values from the form.
    // defined below to escape form values
	
	$link =  $_POST['link'];
	$pid=  $_SESSION['pid'];
	$tid =  $_POST['tid'];

	
	$query = "UPDATE tasks 
              SET link = '$link' WHERE tid = '$tid'";

              
if ($conn->query($query) === TRUE) {
	echo "<script type= 'text/javascript'>alert('Completed');</script>";
	} else {
	echo "<script type= 'text/javascript'>alert('Error');</script>";
	}
	

}

function project(){
	global $conn;
	$pid=$_SESSION["pid"];
	$link=$_POST['link'];
	$sql="UPDATE projects SET link='$link', accept='submitted' WHERE pid='$pid'";
	if ($conn->query($sql) === TRUE) {
        echo "Link submitted successfully.";
    } else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}


?>