<?php 

include ('connection.php');

 // variable declaration
$bid = $proposal = $days= $email=$pid ="";
$errors = array(); 

// call the register() function if add_btn is clicked
if (isset($_POST['submit'])) {
	placebid();
	//header("Location:active.php");
}

// call the register() function if add_btn is clicked
if (isset($_POST['delete_btn'])) {
	retract();
	//header("Location:active.php");
}

if (isset($_POST['edit_btn'])) {
	header("Location:bid1.php");

}

if (isset($_POST['update_btn'])) {
	edit();
}



// POST BID
function placebid(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $bid, $days, $proposal,$email,$pid,$biddate,$deadline;

	$query = "SELECT * FROM projects where pid='$pid'";
	$results = $conn->query($query);
	if ($results->num_rows > 0) {
	//output data of each row
	while ($row = $results->fetch_assoc()) { 
	 { ?>			
		  <tr>
			  <td><?php $biddate= $row['biddate']; ?></a></td>
			  <td><?php $deadline= $row['deadline']; ?></a></td>
		 </tr>
	  <?php   }
		}

		  }
	  

	// receive all input values from the form.
    // defined below to escape form values
	
	$bid =  $_POST['bid'];
	$days =  $_POST['days'];
	$proposal =  $_POST['proposal'];
	$email = $_SESSION['email'];
	$pid =  $_POST['pid'];
	

	$date1 =  new DateTime ($biddate); 
	$date2 =  new DateTime ($deadline); 
	$interval=date_diff($date1,$date2);
	//$interval = $date_diff($date1);

// Use comparison operator to  
// compare dates 

	// form validation: ensure that the form is correctly filled

	if (empty($bid)) { 
		array_push($errors, "Bid amount is required."); 
	}

	if (empty($days)) { 
		array_push($errors, " required."); 
	}

	if (empty($proposal)) { 
		array_push($errors, "proposal is required."); 
	}

	if ($days>$interval) {
		
		echo "<script type= 'text/javascript'>alert('Days must not exceed the deadline');</script>";
		array_push($errors, "error.");
		}
		


	// register bid if there are no errors in the form
	if (count($errors) == 0) {
		
		$query = "SELECT * FROM bid where pid='$pid' AND email='$email'";
		$results = $conn->query($query);
		if ($results->num_rows > 0) {
			echo "<script type= 'text/javascript'>alert('Bid already exists');</script>";}
			else{
		$query = "INSERT INTO bid (Bid, Days, Proposal,pid,email) 
				  VALUES('$bid', '$days', '$proposal', '$pid','$email')";}

		if($conn->query($query) === TRUE) {
				echo "<script type= 'text/javascript'>alert('Bid submitted successfully');</script>";}
			else {
				echo "<script type= 'text/javascript'>alert('error');</script>";}
			}
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
    echo "<script type= 'text/javascript'>alert('Deleted Successfullly');</script>";
} else {
echo "<script type= 'text/javascript'>alert('Error');</script>";
}
}

function edit(){
	// call these variables with the global keyword to make them available in function
	global $conn,$pid,$days,$proposal,$bid;

	// receive all input values from the form.
    // d
	$bid =  $_POST['bid'];
	$days =  $_POST['days'];
	$proposal =  $_POST['proposal'];
	$email = $_SESSION['email'];
	$pid =  $_POST['pid'];


	$sql = "UPDATE bid SET Bid='$bid', days='$days', proposal='$proposal' 
			WHERE pid='$pid'";
	if($conn->query($sql) == TRUE){
			echo  "<script type= 'text/javascript'>alert('bid updated successfully.');</script>";
			header("Location:active.php");
	}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
	}


}

?>

	
