<?php
session_start();

include('connection.php');

//variable declaration
$user_type =  $email = 	$password_1 = $password_2 = $passwordErr = $emailErr= $message = $name="";
$errors   = 0; 

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

//call login() function if login_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// call the message() function if message_btn is clicked
if (isset($_POST['message_btn'])) {
	message();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $email, $user_type, $password_1, $password_2, $emailErr, $passwordErr;

	// receive all input values from the form.
    $user_type   =  $_POST['user_type'];
	$email       =  $_POST['email'];
	$password_1  =  $_POST['password_1'];
	$password_2  =  $_POST['password_2'];

	// form validation: ensure that the form is correctly filled
    if ($password_1 != $password_2) {
        $passwordErr = "The two passwords do not match.";
        $errors=$errors+1;
    }
    if($email != "") {
        $sql = "SELECT * FROM users WHERE email='$email'LIMIT 1";
        $results=$conn->query($sql);
        if($results->num_rows == 1){
            $emailErr="email already exist";
            $errors=$errors+1;
        }
    }
    
    // register user if there are no errors in the form
	if ($errors == 0) {
        $password = md5($password_1);//hashing the password before saving in the database
        $date     =  date("Y-m-d");
        $sql = "INSERT INTO users (email, password, user_type,reg_time) 
                VALUES('$email', '$password','$user_type','$date')";
        
        if ($conn->query($sql) === TRUE) {
            if($user_type=="admin"){
                $_SESSION['email'] = $email; // put logged in user in session
                $_SESSION['user_type'] = "admin";
                $_SESSION['success']  = "You are now logged in.";
                header('location: admin/home.php');
                
            }else if($user_type=="client"){
                $_SESSION['email'] = $email; // put logged in user in session
                $_SESSION['user_type'] = "client";
                $_SESSION['success']  = "You are now logged in.";
                header('location: client/home.php');
                
            }else{
                $_SESSION['email'] = $email; // put logged in user in session
                $_SESSION['user_type'] = "IT";
                $_SESSION['success']  = "You are now logged in.";
                header('location: IT/home.php');
            }
            echo "New account created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
     
    }
    $conn->close();
}

//LOGIN USER
function login(){
	// call these variables with the global keyword to make them available in function
	global $conn, $passwordErr, $email, $password_1;

	// receive all input values from the form.
	$email    =  $_POST['email'];
	$password_1  =  $_POST['password_1'];
	
	$password = md5($password_1);//hashing the password before saving in the database
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
	$results=$conn->query($sql);
    if ($results->num_rows == 1) { //user found
        //checking the user type to direct to the relevant page
        $row = $results->fetch_assoc();
        if($row['user_type']=="admin"){
            $_SESSION['email'] = $email; // put logged in user in session
			$_SESSION['user_type'] = "admin";
			$_SESSION['success']  = "You are now logged in.";
            header('location: admin/home.php');
            
        }else if($row['user_type']=="client"){
            $_SESSION['email'] = $email; // put logged in user in session
			$_SESSION['user_type'] = "client";
			$_SESSION['success']  = "You are now logged in.";
            header('location: client/home.php');
            
        }else{
            $_SESSION['email'] = $email; // put logged in user in session
			$_SESSION['user_type'] = "IT";
			$_SESSION['success']  = "You are now logged in.";
			header('location: IT/home.php');
        }
    }else { //user not found
        $passwordErr= "Wrong username/password combination.";
    }
    $conn->close();
}

//SEND MESSAGE in index page
function message(){
    // call these variables with the global keyword to make them available in function
    global $conn, $errors, $email, $name, $message;
    
    // receive all input values from the form.
    $name     =  $_POST['name'];
	$email    =  $_POST['email'];
    $message  =  $_POST['message'];
    $date     =  date("Y-m-d-H-i");
    
    $sql = "INSERT INTO messages (name, email, message, date)
            VALUES ('$name','$email','$message','$date')";
    if ($conn->query($sql) === TRUE) {
        echo "Message recorded successfully";
    } else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}



?>