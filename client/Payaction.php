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

if(isset($_POST['pid'])){
    $_SESSION['pid']=$_POST['pid'];
    //header('location: paymentHInfo.php');
  }
  if(isset($_SESSION["pid"])){
  $pid=$_SESSION["pid"];
}
else{
  $pid="";
  //header("location: index.php");
}

// variable declaration
$clientPaid = $ITincome = $pid= "";
$errors   = 0; 


// call the updateuser() function if updateuser_btn is clicked
if (isset($_POST['pay_btn'])) {
	update();
}


//UPDATE USER function
function update(){
	global $conn,$clientPaid,$ITincome, $pid;

	$clientPaid = $_POST['clientPaid'];
	$pid = $_POST['pid'];



	$sql = "UPDATE projects SET clientPaid='$clientPaid' WHERE pid='$pid'";
	if($conn->query($sql) == TRUE){
			echo  "<script> alert('Paid updated successfully.');</script>";
	}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
}

?>