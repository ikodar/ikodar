<?php 
     include ('process.php'); 
     if (!isLoggedIn()) {
     $_SESSION['msg'] = "You must log in first";
     header('location: ../login.php');
     }
     //view name on top
$email=$_SESSION['email'];
$sql = "SELECT * FROM users WHERE email='$email'";
$results=$conn->query($sql);
$row = $results->fetch_assoc();

$firstname  =  $row['firstname'];
$lastname  =  $row['lastname'];
$user_type  =  $row['user_type'];



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
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <div class="logo">
    <a class="simple-text logo-normal">
        i-කෝඩර්
        </a>
        <a class="simple-text logo-normal">Hi</a>
        <a class="simple-text logo-normal"><?php echo $firstname?></a>
        <a class="simple-text logo-normal">(<?php echo $user_type?>)</a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="home.php">
              <p>Home</p>
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
            <a class="navbar-brand" href="#pablo">
            <strong></strong>
            </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">              
            </form>
            <ul class="navbar-nav">             
              <li class="nav-item dropdown">             
              <li class="nav-item">
                <a class="nav-link" href="aboutus.php">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="help.php">Help</a>
              </li>
              <li class="nav-item"> 
                <a class="nav-link" href="process.php?logout='1'">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      

      <div class="content">
         <div class="container-fluid">                     
            <section id="about">
          <div class="container-fluid bg-2 text-center">
            <h2></h2>
            <h3></h3>
            <div class="row text-center">
              <div class="col-sm-10">
                <div class="thumbnail">
                  <ul class="nav nav-tabs col-md-8" style="background-color:#113849; padding:20px; margin-left:20%">                           
                     <li class="nav-item active  px-4">
                       <a class="nav-link" href="addprojects.php">Add Projects</a>
                      </li>
                  </ul>
                <h2></h2>
                <br><br>              
              </div>
            </div>

              <div class="col-sm-10">
               <div class="thumbnail">
                <ul class="nav nav-tabs col-md-8" style="background-color:#113849; padding:20px; margin-left:20%">                                 
                  <li class="nav-item active  px-4">
                    <a class="nav-link" href="existing.php">Existing Projects</a>
                  </li>
                </ul>
                <h2></h2>
                <br><br>
               </div>
             </div>
        
              <div class="col-sm-10">
                <div class="thumbnail">
                  <ul class="nav nav-tabs col-md-8" style="background-color:#113849; padding:20px; margin-left:20%">
                    <li class="nav-item active  px-4">
                      <a class="nav-link" href="completed.php">Past Projects</a>
                    </li>
                  </ul>
                <h2></h2>  
                </div>
              </div>
            </div>
         </div>
       </section>    



  
            
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  
</body>

</html>
