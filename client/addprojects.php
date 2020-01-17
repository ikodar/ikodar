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
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  
  <title>ikodar</title>
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
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          ikodar
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="home.php">
              <!--<i class="material-icons">dashboaaard</i>-->
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
              <!--<i class="material-icons">content_paste</i>-->
              <p>View Open Projects</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./viewpast.php">
              <!--<i class="material-icons">library_books</i>-->
              <p>View Past Project</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./myprofile.php">
              <!--<i class="material-icons">bubble_chart</i>-->
              <p>My Profile</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./payments.php">
              <!--<i class="material-icons">location_ons</i>-->
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
            <a class="navbar-brand" href="#pablo">Add Projects</a>
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
                <!--<button type="submit" class="btn btn-white btn-round btn-just-icon..">
                  <i class="material-icons">search</i>-->
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  
                  <p class="d-lg-none d-md-block">
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                
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
      

            <div class="content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="card">
                        <div class="card-header card-header-primary">
                          <h4 class="card-title">Add New Project</h4>
                          

                              <form class="myform" action="" method="post">
                                <label>Project Name: </label><br>
                                <input name="name" type="text" class="input" id=name required/><br><br>
                                
                                <label>Description: </label><br>
                                <textarea rows="5" cols="60" name="description" value="description">Enter description hereee...</textarea></br></br>
                                
                                
                                
                                
                                
                                <label>Skills required</label></br>
                               
                                <input type="checkbox" name="skills" value="Business Analyst"><label>Business Analyst</label><br/>
                                <input type="checkbox" name="skills" value="Developer"><label>Developer</label><br/>
                                <input type="checkbox" name="skills" value="Quality Assuarance"><label>Quality Assuarance</label><br/>
                                
                                
                                <label>Bid end date: </label><br>
                                <input name="biddate" type="date" class="input" id="biddate" required/>
                                <span class="error"><?php echo $dateErr;?></span></br></br>

                                <label>Tentative shedule: </label><br>
							                	<label for="fileupload">Select a file to upload</label>
                                <input name="shedule" type="file" value="fileupload" class="input"required/>
                                </br></br>

                                <label>Tentative deadline: </label><br>
                                <input name="deadline" type="date" class="input" required/>
                                <span class="error"><?php echo $dateErr2;?></span></br></br></br></br>

                                <label>Payment: </label><br>
                                <select name="payment" onChange="combo(this, 'theinput')">
                                <option value="Hourly">Hourly basis</option>
                                <option value="full">Fully payment</optio n>
                                </select></br></br>

                                
                                <label style="margin-top:8px;">Bid Amount:</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="background-color:#d3d3d3; border: 1px solid #bdbdbd; padding:5px;">$</span>
                          </div>
                          <input name="amount"type="int" class="input" aria-label="Amount (to the nearest dollar)" style="border: 1px solid #bdbdbd;"  placeholder="Enter bid amount">
                          <div class="input-group-append">
                            <span class="input-group-text" style="background-color:#d3d3d3; border: 1px solid #bdbdbd; padding:3px;">USD</span>
                          </div>

                            </div>
                            </div><br><br>
                            <button type="submit" class="btn btn-primary pull-right" value="submit" name="submit">Post</button>
                            <div class="clearfix"></div>
                          </form>
                        </div>
                      </div>
                    </div>

            
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  
  
</body>

</html>
