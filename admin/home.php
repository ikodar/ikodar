
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
  <title>Dashboard</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Fonts & icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../css/bootstrap.min.css" rel="stylesheet" />
  <link href="../css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />

  <link href="css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
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
            <p class="navbar-brand">Dashboard</p> <!--CHECK THE HREF HERE-->
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item"> 
                <a class="nav-link" href="functions.php?logout='1'">Logout</a><!--HREF HERE CHECK-->
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
    <div class="content">
     <div class="container-fluid">
      <div class="row">
       <div class="col-md-5">
        <div class="card ">
         <div class="card-header ">
          <h4 class="card-title">Project Statistics</h4>
           <p class="card-category">Overall Project divisions</p>
         </div>
         <div class="card-body ">
          <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
           <div class="legend">
            <i class="fa fa-circle text-info"></i> System development
            <i class="fa fa-circle text-danger"></i> Web development
            <i class="fa fa-circle text-warning"></i> Graphics
           </div>
           </div>
         </div>
       </div>
      </div>
     </div>
    </div>
   </div>
    <!-- End of Content -->
  </div>
</body>
</html>