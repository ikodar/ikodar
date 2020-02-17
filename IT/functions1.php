<?php 

include ('connection.php');

// log user out if LOGOUT BUTTON clicked
if (isset($_GET['logout'])) {
    // remove all session variables
	session_unset();
    // destroy the session
	session_destroy();
	header("location: ../index.php");
}

 

// call the register() function if add_btn is clicked
if (isset($_POST['retract'])) {
	retract();
	//header("Location:active.php");
}


function retract(){
	// call these variables with the global keyword to make them available in function
	global $conn,$pid;

	// receive all input values from the form.
    // d
	$pid=  $_POST['pid'];

    $sql = "SELECT * FROM bid WHERE WHERE pid=$pid";
	$results = $conn->query($sql);
	if($results->num_rows == 0){
	
	$sql = "DELETE FROM bid WHERE pid=$pid";

    if($conn->query($sql) == TRUE){
    echo "<script type= 'text/javascript'>alert('Delete Successfullly');</script>";
} else {
echo "<script type= 'text/javascript'>alert('Error');</script>";
}
}
}
?>

	
