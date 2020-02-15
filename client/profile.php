<?php 

  include('profileProcess.php');
	if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
  }
 //view 
  $email=$_SESSION['email'];
  $sql = "SELECT * FROM users WHERE email='$email'";
	$results=$conn->query($sql);
  $row = $results->fetch_assoc();

  $firstname  =  $row['firstname'];
  $lastname = $row['lastname'];
  $address  =  $row['address'];
	$city = $row['city'];
	$country = $row['country'];
	$postalcode = $row['postalcode'];
	$about = $row['about'];
  
?>
 <!DOCTYPE html>
 <html lang="en">
 
 <head>
   <meta charset="utf-8" />
   <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
   <link rel="icon" type="image/png" href="../assets/img/favicon.png">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <title>
     myprofile 
   </title>
   <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
   <!--     Fonts and icons     -->
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
   <!-- CSS Files -->
   <link href="css/material-dashboard.css?v=2.1.1" rel="stylesheet" />

   <!-- CSS dfdfJust for demo purpose, don't include it in your project -->
   <link href="../assets/demo/demo.css" rel="stylesheet" />

   <link href="css/custom.css" rel="stylesheet" />
 </head>
 
 <body class="">
   <div class="wrapper ">
     <div class="sidebar" data-color="azure" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
       <!--
         Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
 
         Tip 2: you can also add an image using data-image tag
     -->
     <div class="logo">
     <a class="simple-text logo-normal">
        i-කෝඩර්
        </a>
        <a class="simple-text logo-normal"><?php echo $_SESSION['email'];?></a>
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
               <a class="nav-link" href="./projects.php">
                 <!--<i class="material-icons">dashboard</i>-->
                 <p>My Projects</p>
               </a>
 
           </li>
           <li class="nav-item active">
             <a class="nav-link" href="./profile.php">
               <!--<i class="material-icons">bubble_chart</i>-->
               <p>My Profile</p>
             </a>
           </li>
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
       <!-- Navbar -->
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
               

               
               <li class="nav-item">
                 <a class="nav-link" href="aboutus.php">About Us</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="help.php">Help</a>
               </li>
               <li class="nav-item"> 
                 <a class="nav-link" href="profileProcess.php?logout='1'">Logout</a>
               </li>
             </ul>
           </div>
         </div>
       </nav>
 
       <!-- End Navbar -->
       <div class="content" style="width:1500px">
         <div class="container-fluid" style="width:1500px">
           
           
           <div class="row">
             <div class="col-lg-6 col-md-12">
               <div class="card">
                 <div class="card-header card-header-tabs card-header-primary">
                   
                 
                
                        
                                <ul class="nav nav-tabs col-md-8" style="background-color:#113849; padding:20px; margin-left:15%">
                                  
                                   
                                    
                                      <a style="color:white; font-size:20px; text-align:center">My Profile</a>
                                    
                                    
                                      
                                  
                              </ul>
                  
                     
                      

                 </div>
                 <div class="card-body">
                   <form method="post" action="profile.php"  >
                     <div class="row">
                       <div class="col-md-4">
                         <div class="form-group">
                           <label class="bmd-label-floating" >Email address</label>
                           <input name="email" type="email" class="form-control" style="width:500px" value="<?php echo $_SESSION['email'];?>">
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-6">
                         <div class="form-group">
                           <label class="bmd-label-floating">First Name</label>
                           <input name="firstname" type="text" class="form-control" value="<?php echo $firstname?>">
                         </div>
                       </div>
                       <div class="col-md-6">
                         <div class="form-group">
                           <label class="bmd-label-floating">Last Name</label>
                           <input name="lastname" type="text" class="form-control" value="<?php echo $lastname?>">
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-12">
                         <div class="form-group">
                           <label class="bmd-label-floating">Adress</label>
                           <input name="address" type="text" class="form-control" value="<?php echo $address?>">
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-4">
                         <div class="form-group">
                           <label class="bmd-label-floating">City</label>
                           <input name="city" type="text" class="form-control" value="<?php echo $city?>">
                         </div>
                       </div>
                       <div class="col-md-4">
                         <div class="form-group">
                           <label class="bmd-label-floating">Country</label>
                           <input name="country" type="text" class="form-control" value="<?php echo $country?>">
                         </div>
                       </div>
                       <div class="col-md-4">
                         <div class="form-group">
                           <label class="bmd-label-floating">Postal Code</label>
                           <input name="postalcode" type="text" class="form-control" value="<?php echo $postalcode?>">
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-12">
                         <div class="form-group">
                           <label>About Me</label>
                           <div class="form-group">
                             
                             <textarea name="about" style="width:520px" class="input" rows="5"><?php echo $about?></textarea>
                           </div>
                         </div>
                       </div>
                     </div>

                     <p style="color:red;">
                        <?php
                            if(isset($error)){
                              echo $error;
                            }
                        ?>
                     <div class="col-md-12">
                     <input class="btn btn-primary pull-right" type="submit" name="submit_btn" value="SAVE">

                     <input class="btn btn-primary pull-right" type="submit" name="delete_btn" value="DELETE" formaction="profile.php">
                     
                     
                     </div>
                     
                   </form>
                 </div>
               </div>
             </div>
 
             
                         
   <!--   Core JS Files   -->
   <script src="../assets/js/core/jquery.min.js"></script>
   <script src="../assets/js/core/popper.min.js"></script>
   <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
   <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  
 </body>
 
 </html>
