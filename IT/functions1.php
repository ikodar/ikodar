<?php 

include ('connection.php');

 

// call the register() function if add_btn is clicked
if (isset($_POST['delete_btn'])) {
	retract();
	//header("Location:active.php");
}

if (isset($_POST['edit_btn'])) {
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
	
	$sql = "DELETE FROM bid WHERE pid=$pid";

    if($conn->query($sql) == TRUE){
    echo "<script type= 'text/javascript'>alert('Delete Successfullly');</script>";
} else {
echo "<script type= 'text/javascript'>alert('Error');</script>";
}
}

?>

	
