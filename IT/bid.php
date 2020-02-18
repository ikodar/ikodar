<?php 
	include('functions.php');
	if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
  }
 
  
if(isset($_SESSION["pid"])){
  $pid=$_SESSION["pid"];
}
else{
  $pid="";
  //header("location: index.php");
}

 //view name on top
$email=$_SESSION['email'];
$sql = "SELECT * FROM users WHERE email='$email'";
$results=$conn->query($sql);
$row = $results->fetch_assoc();

$firstname  =  $row['firstname'];
$lastname  =  $row['lastname'];
$user_type  =  $row['user_type'];

 
 $query = "SELECT * FROM projects where pid='$pid'";
 $results = $conn->query($query);
 if ($results->num_rows > 0) {
    //output data of each row
    while ($row = $results->fetch_assoc()) { 
      $name = $row ['name'];
      $type = $row['type'];
      $description = $row['description'];
      $biddate = $row['biddate'];
      $deadline = $row['deadline'];
      $amount = $row['amount'];
      $client = $row['client'];
      $link = $row['link'];
      $accept = $row['accept'];
    }

 }else{
     echo "0 results";
 }


?>
 <!DOCTYPE html>
 <html lang="en">
 
 <head>
   <meta charset="utf-8" />
   <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
   <link rel="icon" type="image/png" href="../assets/img/favicon.png">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <title>
     Bid
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
       <!--
         Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
 
         Tip 2: you can also add an image using data-image tag
     -->
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
             <a class="nav-link" href="./home.php">
               <!--<i class="material-icons">dashboard</i>-->
               <p>Dashboard</p>
             </a>
 
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
         </ul>
       </div>
     </div>
     <div class="main-panel">
       <!-- Navbar -->
       <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
         <div class="container-fluid">
           <div class="navbar-wrapper">
             <a class="navbar-brand" href="#pablo">My Projects</a>
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
                   <!--<i class="material-icons">Dashboard</i>-->
                   <p class="d-lg-none d-md-block">
                     Dashboard
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
                 <a class="nav-link" href="functions.php?logout='1'">Logout</a>
               </li>
             </ul>
           </div>
         </div>
       </nav>
 
       <!-- End Navbar -->
       <div class="content">
         <div class="container-fluid">
           <div class="row">
             <div class="col-md-10">

             <div class="card">
                 <div class="card-header card-header-primary">
                   <h4 class="card-title">Project Details</h4>
                
                 </div>

                 <div class="card-body">
                                 <div class="row">
                                   <div class="col-md-6">
                                     <div class="form-group">
                                        <label class="bmd-label-floating">Project Name: </label> 
                                          <tr>
                                            <td><?php echo $name; ?></a></td>    
                                          </tr>               
                                        </div>
                                      </div>                                             
                                    </div>

                                   <div class="row">
                                     <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="bmd-label-floating">Project Type:</label>   
                                         		<tr>
                                                <td><?php echo $type; ?></a></td>    
                                              </tr>                     
                                          </div>
                                        </div>                      
                                      </div>

                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label class="bmd-label-floating">Client:</label>
                                          <tr>
                                              <td><?php echo $client ?></a></td>    
                                            </tr>                           
                                        </div>
                                      </div>                                            
                                    </div>

                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label class="bmd-label-floating">Amount:</label>  
                                            <tr>
                                              <td><?php echo $amount ?></a></td>    
                                            </tr>
                                        </div>
                                      </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label class="bmd-label-floating">Bid End Date:</label>  
                                          <tr>
                                            <td><?php echo $biddate ?></a></td>     
                                          </tr>                      
                                        </div>
                                      </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label class="bmd-label-floating">Deadline:</label>
                                          <tr>
                                            <td><?php echo $deadline; ?></a></td>    
                                          </tr>                          
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Description:</label>			
                                            <tr>
                                              <td><?php echo $description; ?></a></td>
                                            </tr>                        
                                        </div>
                                      </div>

                                    </div>

                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="bmd-label-floating">Shedule:</label>  

                                    </div>
                                  </div>                                             
                                  </div>
                               </form>
                              </div>
                            </div>
                          </div>
                     
             <div class="col-md-10">

                   <div class="card">
                 <div class="card-header card-header-primary">
                   <h4 class="card-title">Place a bid on this project</h4>
                 </div>
                 <div class="card-body">

                   <form action="active.php" method="post" class="was-validated">
                   <input type="hidden" name="pid" value="<?=$pid;?>">
                   
                   <h1 style="font-size:17px;"><b>Bid Details</b></h>
                   <div class="row">
                   <div class="col-md-5">
                        <label style="margin-top:8px;">Bid Amount:</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="background-color:#d3d3d3; border: 1px solid #bdbdbd; padding:5px;">$</span>
                          </div>
                          <input name="bid" input type="number" min="1" step="any"  class="form-control" aria-label="Amount (to the nearest dollar)" style="border: 1px solid #bdbdbd;"  placeholder="Enter bid amount" required>
                          <div class="input-group-append"> 
                          <span class="input-group-text" style="background-color:#d3d3d3; border: 1px solid #bdbdbd; padding:3px;">USD</span>
                            
                          </div>
                          <div class="invalid-feedback">Please enter a value.</div>
                        </div>
                        </div>

                        <div class="col-md-5">
                        <label style="margin-top:8px;">This project will be delivered in:</label>
                        <div class="input-group mb-3">
                          <input name="days" type="number" min="1" class="form-control" style="border: 1px solid #bdbdbd;"  placeholder="Enter number of days" Fnequired>
                          <div class="input-group-append">
                            <span class="input-group-text" style="background-color:#d3d3d3; border: 1px solid #bdbdbd; padding:3px">Days</span>
                          </div>
                          <div class="invalid-feedback">Please enter number of days.</div>
                        </div>
                      
                        </div>
                        </div>
          
                        <div class="row">
                       <div class="col-md-10">
                         <div class="form-group">
                           <label>Describe Your Proposal:</label>
                           <div class="form-group" >
                             <textarea name="proposal" class="form-control" rows="5" style="border: 1px solid #bdbdbd;"  placeholder="what makes you best candidate for this project?" required></textarea>
                           </div>
                         </div>
                       </div>
                     </div>
                     <button name="submit" type="submit" class="btn btn-primary pull-right">Place Bid</button>
                     <div class="clearfix"></div>
                   </form>
                 </div>
               </div>
             </div>

                 </div>
               </div>
             </div>
             
 
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap-material-design.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

</body>

</html>