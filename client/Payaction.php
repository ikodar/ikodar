<?php 


include ('connection.php');



  if(isset($_SESSION["pid"])){
  $pid=$_SESSION["pid"];
}
else{
  $pid="";
  //header("location: index.php");
}

// variable declaration
$clientPaid = $ITincome = $AdminIncome = "";
$errors   = 0; 


// call the updateuser() function if updateuser_btn is clicked
if (isset($_POST['payh_btn'])) {
	updateh();
	header("Location:feedback.php");
}

// call the updateuser() function if updateuser_btn is clicked
if (isset($_POST['payf_btn'])) {
	updatef();
	header("Location:feedback.php");
}
                    
                    

                  
                  
//UPDATE hourly
function updateh(){
	global $conn,$clientPaid,$ITincome, $AdminIncome, $pid;


	//calculation hourly total
	$query1 = "SELECT SUM(hour) FROM tasks where pid='$pid'";
	$result1 = $conn->query($query1);
	$sum1 = $result1->fetch_assoc()['SUM(hour)'];

	
	//view amount to calculate total 
	$sql2 = "SELECT amount FROM projects where pid='$pid'";
	  $results2=$conn->query($sql2);
	$row2 = $results2->fetch_assoc();
	$sum2  =  $row2['amount'];

	
	$tot=  $sum1*$sum2;
	$tax=($tot/100)*10;
    


	//client paid amount
	$clientPaid= $tot+$tax;

	//IT income 
	$ITincome= $tot - $tax;
	

	//Admin income 
	$AdminIncome= $tax*2;


	
	//filling incomes
	$sql = "UPDATE projects SET clientPaid='$clientPaid', ITincome='$ITincome',AdminIncome='$AdminIncome' WHERE pid='$pid'";
	if($conn->query($sql) == TRUE){
			echo  "<script> alert('Paid updated successfully.');</script>";
	}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
	}

	//status change to past
	$sql = "UPDATE projects SET status='past' WHERE pid='$pid'";
	if($conn->query($sql) == TRUE){
			echo  "<script> alert('Paid updated successfully.');</script>";
	}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	
}


//UPDATE full
function updatef(){
	global $conn,$clientPaid,$ITincome, $AdminIncome, $pid;

	//view amount to calculate total 
$sql2 = "SELECT amount FROM projects where pid='$pid'";
$results2=$conn->query($sql2);
$row2 = $results2->fetch_assoc();
$sum2  =  $row2['amount'];


$tot= $sum2;
$tax=($tot/100)*10;



//client paid amount
$clientPaid= $tot+$tax;

//IT income 
$ITincome= $tot - $tax;


//Admin income 
$AdminIncome= $tax*2;
	


	
	//filling incomes
	$sql = "UPDATE projects SET clientPaid='$clientPaid', ITincome='$ITincome',AdminIncome='$AdminIncome' WHERE pid='$pid'";
	if($conn->query($sql) == TRUE){
			echo  "<script> alert('Paid updated successfully.');</script>";
	}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
	}

	//status change to past
	$sql = "UPDATE projects SET status='past' WHERE pid='$pid'";
	if($conn->query($sql) == TRUE){
			echo  "<script> alert('Paid updated successfully.');</script>";
	}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	
}

?>