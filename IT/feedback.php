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


   $query = "SELECT * FROM projects INNER JOIN feedback ON projects.pid= feedback.pid";
   $results = $conn->query($query);
   if ($results->num_rows > 0) {
      //output data of each row
      while ($row = $results->fetch_assoc()) { if ($row['IT']==$_SESSION['email']){ ?>
       <?php $pid = $row ['pid'];
        $name = $row ['name'];
        $rate = $row['rate'];
        $review= $row['review'];
        $client = $row['client'];
      }
    }
   }else{
       echo "0 results";
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
     feedback
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
          </li>
         </ul>
       </div>
     </div>
     <div class="main-panel">
       <!-- Navbar -->
       <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
         <div class="container-fluid">
           <div class="navbar-wrapper">
             <a class="navbar-brand" href="#pablo">Feedbacks</a>
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
                  Feedback
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
           <div class="row">
             <div class="col-md-10">


                   <div class="card">
                 <div class="card-header card-header-primary">
                   <h4 class="card-title">Feedbacks</h4>
                 </div>
                 <div class="card-body px-5 py-4">
              <div class="row">    
                      <div class="table-responsive">
                          
					     <table class="table">
               <thead class="thead-dark text-primary" >
                 <tr >
                   
                   <th width="20px" style="font-size:15px">Project ID</th>
                   <th width="20px" style="font-size:15px">Project Name</th>
                   <th width="20px" style="font-size:15px">Client</th>
                   <th width="20px"style="font-size:15px">Ratings</th>
                   <th width="20px"style="font-size:15px">Reviews</th>

                 </tr>
               </thead>
               <tbody> 

                      <td><?php echo $pid; ?></a></td>    
                      <td><?php echo $name; ?></a></td>    
                      <td><?php echo $client ?></a></td>    
                      <td> <span class="fa fa-star checked" style="color: orange;"></span>
                      <?php echo $rate ?>/5</a></td>    
                      <td><?php echo $review ?></a></td>     
              </tbody>
  </table>
                                    </div>
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