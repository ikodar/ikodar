<?php 
     include ('process.php'); 
     if (!isLoggedIn()) {
     $_SESSION['msg'] = "You must log in first";
     header('location: ../login.php');
     }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" /> 
  <title>ikodar</title>
  
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <link href="css/custom.css" rel="stylesheet" />

  <style>
      @import url(https://fonts.googleapis.com/css?family=Roboto:400,900,700,500);

body {
  padding: 60px 0;
  background-color: rgba(178,209,229,0.7);
  margin: 0 auto;
  width: 600px;
}
.body-text {
  padding: 0 20px 30px 20px;
  font-family: "Roboto";
  font-size: 1em;
  color: #333;
  text-align: center;
  line-height: 1.2em;
}
.form-container {
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.card-wrapper {
  background-color: #6FB7E9;
  width: 100%;
  display: flex;

}
.personal-information {
  background-color: #3C8DC5;
  color: #fff;
  padding: 1px 0;
  text-align: center;
}
h1 {
  font-size: 1.3em;
  font-family: "Roboto"
}
input {
  margin: 1px 0;
  padding-left: 3%;
  font-size: 14px;
}
input[type="text"]{
  display: block;
  height: 50px;
  width: 97%;
  border: none;
}
input[type="email"]{
  display: block;
  height: 50px;
  width: 97%;
  border: none;
}
input[type="submit"]{
  display: block;
  height: 60px;
  width: 100%;
  border: none;
  background-color: #3C8DC5;
  color: #fff;
  margin-top: 2px;
  curson: pointer;
  font-size: 0.9em;
  text-transform: uppercase;
  font-weight: bold;
  cursor: pointer;
}
input[type="submit"]:hover{
  background-color: #6FB7E9;
  transition: 0.3s ease;
}
#column-left {
  width: 46.8%;
  float: left;
  margin-bottom: 2px;
}
#column-right {
  width: 46.8%;
  float: right;
}

@media only screen and (max-width: 480px){
  body {
    width: 100%;
    margin: 0 auto;
  }
  .form-container {
    margin: 0 2%;
  }
  input {
    font-size: 1em;
  }
  #input-button {
    width: 100%;
  }
  #input-field {
    width: 100%;
  }
  h1 {
    font-size: 1.2em;
  }
  input {
    margin: 2px 0;
  }
  input[type="submit"]{
    height: 50px;
  }
  #column-left {
    width: 100%;
    display: block;
    float: none;
  }
  #column-right {
    width: 100%;
    display: block;
    float: none;
  }
}
  </style>
  
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      
      <div class="logo">
        
          ikodar
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="home.php">
              <p>Dashboard</p>
            </a>
          </li>
          
          <li class="nav-item active">
            <a class="nav-link" href="./projects.php">
              <p>My Projects</p>
            </a>
          </li>
          
          <li class="nav-item active">
            <a class="nav-link" href="./profile.php">
              <p>My Profile</p>
            </a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="./projects.php">
              <p>Messages</p>
            </a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="./payments.php">
              <p>Payments</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel">

      <!-- Navbar   iiiii -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo" style="font-weight:bold; font-size:50px"><centre>PAY</centre></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          
        </div>
      </nav>

      <!--payment info-->
      <div class="content" >
         <div class="container-fluid" >
      <div class="body-text">Write your name in the right fields. Also write your imaginary card number. By clicking CCV field card will turn.</div>
  <form>
    <div class="form-container">
      <div class="personal-information">
        <h1>Payment Information</h1>
      </div> <!-- end of personal-information -->
           
          <input id="column-left" type="text" name="first-name" placeholder="First Name"/>
          <input id="column-right" type="text" name="last-name" placeholder="Surname"/>
          <input id="input-field" type="text" name="number" placeholder="Card Number"/>
          <input id="column-left" type="text" name="expiry" placeholder="MM / YY"/>
          <input id="column-right" type="text" name="cvc" placeholder="CCV"/>
         
          <div class="card-wrapper"></div>
      
          <input id="input-field" type="text" name="streetaddress" required="required" autocomplete="on" maxlength="45" placeholder="Streed Address"/>
          <input id="column-left" type="text" name="city" required="required" autocomplete="on" maxlength="20" placeholder="City"/>
          <input id="column-right" type="text" name="zipcode" required="required" autocomplete="on" pattern="[0-9]*" maxlength="5" placeholder="ZIP code"/>
          <input id="input-field" type="email" name="email" required="required" autocomplete="on" maxlength="40" placeholder="Email"/>
          <input id="input-button" type="submit" value="Submit"/>
        
          
          
    </form>
  </div>
  </div>
  </div>

            
  
</body>

</html>
