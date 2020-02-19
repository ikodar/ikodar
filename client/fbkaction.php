<?php 

include ('connection.php');

 

// call the register() function if add_btn is clicked
if (isset($_POST['submit'])) {
	feedback();
}
$query = "SELECT * FROM projects";
$results = $conn->query($query);
if ($results->num_rows > 0) {
   //output data of each row
   while ($row = $results->fetch_assoc()) { if ($row['IT']==$_SESSION['email']){ ?>
	<?php 
	 $email = $row['IT'];
   }
 }
}else{
	echo "0 results";
}

function feedback(){
	// call these variables with the global keyword to make them available in function
	global $conn, $rate, $review, $pid, $email;

	// receive all input values from the form.
    // defined below to escape form values

$rate= $_POST['star'];
	$review =  $_POST['review'];
	$email = $_POST['IT'];
	$pid =  $_POST['pid'];
	

		
		$query = "INSERT INTO feedback (pid, rate, review,email) 
				  VALUES('$pid', '$rate', '$review', '$email')";
		

		if ($conn->query($query) === TRUE) {
			echo "<script type= 'text/javascript'>alert('Feedback sent');</script>";
			} else {
			echo "<script type= 'text/javascript'>alert('Already sent. You cant send again');</script>";
			}
	}
