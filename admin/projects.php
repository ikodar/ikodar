<?php 
  include('functions.php');
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
  <title>Projects</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Fonts and icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/custom.css" rel="stylesheet" />

</head>
<body class="">
  <div class="wrapper ">
    <!--Dashboard panel-->
    <div class="sidebar" data-color="azure" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
        Tip 2: you can also add an image using data-image tag-->
      <div class="logo">
        <a class="simple-text logo-normal">
        i-කෝඩර්
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
            <a class="nav-link" href="projects.php">
              <p>Projects</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="users2.php">
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="profile.php">
              <p>My Profile</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="messages.php">
              <p>Messages</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="income.php">
              <p>Income</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- End of dashboard panel-->

    <!--Content-->
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <p class="navbar-brand">Projects</p> <!--CHECK THE HREF HERE-->
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item"> 
                <a class="nav-link" href="../index.php?logout='1'">Logout</a><!--HREF HERE CHECK-->
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!--Data section-->
      <div class="content" >
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6" >
            <div class="card card-stats" >
              <a background-color: rgb(11, 22, 88) class="btn btn-primary pull-right" href="newprojects.php">New Projects</a>
              <img src="./img/design.jpg" style="width:202px; length:202px align:center">
            </div>
          </div>
           <div class="col-lg-3 col-md-6 col-sm-6" >
             <div class="card card-stats" >
              <a background-color: rgb(11, 22, 88) class="btn btn-primary pull-right" href="existingprojects.php">Existing Projects</a>
               <img src="./img/deve.jpg" style="width:202px; length:202px align:center">
            </div>
           </div>
           <div class="col-lg-3 col-md-6 col-sm-6" >
             <div class="card card-stats" >
              <a background-color: rgb(11, 22, 88) class="btn btn-primary pull-right" href="pastprojects.php">Past Projects</a>
              <img src="./img/mng.jpg" style="width:202px; length:200px align:center">
             </div>
           </div>
        </div> 
      </div>       
      <!--End of data section-->
    </div>  
    <!-- End of Content -->
   </div>
</body>
</html>