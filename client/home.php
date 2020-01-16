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
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    ikodar
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
          Tip 2: you can also add an image using data-image tag -->
      <div class="logo">
        <a class="simple-text logo-normal">
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
            <a class="nav-link" href="./addprojects.php">
              <p>Add Projects</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./viewopen.php">
              <p>View Open Projects</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./viewpast.php">
              <p>View Past Project</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./myprofile.php">
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
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <!--<button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>-->
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">Dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="contactus.php">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="aboutus.php">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="help.php">Help</a>
              </li>
              <li class="nav-item"> 
                <a class="nav-link" href="../index.php?logout='1'">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar
      style="height:40px; width:40px; margin:0;" -->
      
      <div class="content" >
         <div class="container-fluid" >
           <div class="row">
             <div class="col-lg-3 col-md-6 col-sm-6" >
               <div class="card card-stats" >
                 
                   <div class="card-icon" style="background-color:#00008b">
                     <i class="material-icons">content_copy</i>
                   </div>
                   <p class="card-category" style="font-weight:bold " >New projects</p>
                   <h3 class="card-title" >5
                     <small></small>
                   </h3>
                </div>
                
               </div>
             

             <div class="col-lg-3 col-md-6 col-sm-6" >
               <div class="card card-stats" >
                 
                   <div class="card-icon" style="background-color:#0077bb">
                     <i class="material-icons" >content_copy</i>
                   </div>
                   <p class="card-category" style="font-weight:bold " >Open projects</p>
                   <h3 class="card-title" >10
                     <small></small>
                   </h3>
                </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6" >
               <div class="card card-stats" >
                 
                   <div class="card-icon" style="background-color:#4db4d7">
                     <i class="material-icons">content_copy</i>
                   </div>
                   <p class="card-category" style="font-weight:bold " >Past projects</p>
                   <h3 class="card-title" >10
                     <small></small>
                   </h3>
                </div>
             </div>

</body>

</html>
