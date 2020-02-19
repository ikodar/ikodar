<?php 
	include('functions.php');
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
   <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
   <link rel="icon" type="image/png" href="../assets/img/favicon.png">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <title>
     about
   </title>
   <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
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
        <a class="simple-text logo-normal">Hi <?php echo $firstname?> (<?php echo $user_type?>)</a>
       </div>
       
       <div class="sidebar-wrapper">
 <ul class="nav">
           <li class="nav-item active  ">
             <a class="nav-link" href="./home.php">
               <!--<i class="material-icons">dashboard</i>-->
               <p>Dashboard</p>
             </a>
             </li>
             <li class="nav-item active  ">
               <a class="nav-link" href="./active.php">
                 <!--<i class="material-icons">dashboard</i>-->
                 <p>My Projects</p>
               </a>
 
           </li>
           <li class="nav-item active">
             <a class="nav-link" href="./myprofile.php">
               <!--<i class="material-icons">bubble_chart</i>-->
               <p>My Profile</p>
             </a>
           </li>
          </li>
           <li class="nav-item active">
             <a class="nav-link" href="./income.php">
               <!--<i class="material-icons">location_ons</i>-->
               <p>Income</p>
             </a>
           </li>
           <li class="nav-item active">
             <a class="nav-link" href="./feedback.php">
               <!--<i class="material-icons">bubble_chart</i>-->
               <p>Feedback</p>
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
             <a class="navbar-brand" href="#pablo"></a>
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
            
                 <!--<button type="submit" class="btn btn-white btn-round btn-just-icon">
                   <i class="material-icons">search</i>-->
                   <div class="ripple-container"></div>
                 </button>
               </div>
             </form>
             <ul class="navbar-nav">
               <li class="nav-item">
                 <a class="nav-link" href="#pablo">
                   <!--<i class="material-icons">Dashboard</i>-->
                   <p class="d-lg-none d-md-block">
            
                   </p>
                 </a>
               </li>
               
               <li class="nav-item">
                 <a class="nav-link" href="aboutus.php">About Us</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="help.php">Help</a>
               </li>
               <li class="nav-item"> 
                 <a class="nav-link" href="functions.php?logout='1'">Logout</a>
               </li>
             </ul>
           </div>
         </div>
       </nav>
 
 <!-- End Navbar -->

      <div class="content">
        <div class="container-fluid">              
          <section id="about">
            <div class="container-fluid bg-2 text-center">
              <h3><b>Freelancing and Crowdsourcing Marketplace</b></h3>
                <div class="row text-center">
                  <div class="col-sm-2">
                    <div class="thumbnail">
                      <img src="img/free1.jpg" alt="Image" height="10%" width="700%">  
                    </div>
                  </div>
                </div>
                <h2></h2>
                <p><b>Through our marketplace, employers can hire freelancers to do work in areas such as software development, writing, data entry and design right through to engineering, the sciences, sales and marketing services.</b></p>
              </div>
          </section> 

        </div>
      </div>

      <div class="container-fluid bg-1 text-center">
        <h1>Need Work Done?</h1>
        <h4></h4>
      </div>        
   
        <section id="about">
          <div class="container-fluid bg-2 text-center">
            <h2></h2>
            <h3></h3>
              <div class="row text-center">
                <div class="col-sm-4">
                  <div class="thumbnail">
                    <img src="img/job.png" alt="Image" height="200" width="200">
                    <h2></h2>
                    <p><strong><b>Post a Job</b></strong></p>
                    <p>It's easy. Simply post a job you need completed and receive competitive bids from freelancers within minutes.</p>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="thumbnail">
                    <img src="img/work.jpg" alt="Image" height="200" width="200">
                    <h2></h2>
                    <p><strong><b>Choose Freelancers</b></strong></p>
                    <p>Whatever your needs, there will be a freelancer to get it done: from web design, mobile app development, virtual assistants, product manufacturing, and graphic design (and a whole lot more).Yes, we built efficient systems which suit your differing needs.</p>
                  </div>
                  </div>
        
                <div class="col-sm-4">
                  <div class="thumbnail">
                    <img src="img/pay.jpg" alt="Image" height="200" width="200">
                    <h2></h2>
                    <p><strong><b>Pay Safely</b></strong></p>
                   <p>With secure payments and thousands of reviewed professionals to choose from, Freelancer.com is the simplest and safest way to get work done online.</p>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>    


         

      

     

            
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  
  
</body>

</html>
