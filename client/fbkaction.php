<?php 

include ('connection.php');

 

// call the register() function if add_btn is clicked
if (isset($_POST['submit'])) {
	feedback();
}


function feedback(){
	// call these variables with the global keyword to make them available in function
	global $conn, $rate, $review, $pid, $email;

	// receive all input values from the form.
    // defined below to escape form values

	$rate= $_POST['star'];
	$review =  $_POST['review'];
	$email = $_POST['IT'];
	$pid =  $_SESSION['pid'];
	

		
		$query = "INSERT INTO feedback (pid, rate, review,email) 
				  VALUES('$pid', '$rate', '$review', '$email')";
		

		if ($conn->query($query) === TRUE) {
			echo "<script type= 'text/javascript'>alert('Feedback sent');</script>";
			} else {
			echo "<script type= 'text/javascript'>alert('Already sent. You cant send again');</script>";
			}
	}
