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
$clientPaid = $ITincome = $AdminIncome = $pid= "";
$errors   = 0; 


// call the updateuser() function if updateuser_btn is clicked
if (isset($_POST['pay_btn'])) {
	update();
}


                    
                    

                  
                  
//UPDATE USER function
function update(){
	global $conn,$clientPaid,$ITincome, $AdminIncome, $pid;

	//990
	$sum = $_POST['amount'];

	//90
	$tax = $sum/11;

	//900
	$tot = $sum-$tax;


	//client paid amount
	$clientPaid= $sum;

	//IT income 
	$totIT= $tot - $tax;
	$ITincome= $totIT;

	//Admin income 
	$AdminIncome= $tax*2;


	

	$sql = "UPDATE projects SET clientPaid='$clientPaid', ITincome='$ITincome',AdminIncome='$AdminIncome' WHERE pid='$pid'";
	if($conn->query($sql) == TRUE){
			echo  "<script> alert('Paid updated successfully.');</script>";
	}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
	}
	header('location: paymentsHour.php');
	
}

?>