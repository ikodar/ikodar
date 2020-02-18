<?php 
	include('functions.php');
	if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
  }

  if(isset($_POST["pid"])){
    $_SESSION["pid"]=$_POST["pid"];
    header("location: bid.php");
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
     Dashboard
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
             <div class="col-md-8">
             <br/>
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Recent Projects</h4>
              </div>
                <div class="card-body">
                  <div class="row">    
                      <div class="table-responsive">
                          <table class="table">
                            <tbody>

                            <?php 
					    //retrieve data from project table
              $query = "SELECT * FROM projects";
              $results = $conn->query($query);
              if ($results->num_rows > 0){
                //output data of each row
                while ($row = $results->fetch_assoc()) { 
                    if ($row['status']=="new"){ ?>	
                     <tr>
                        <td><?php $pid= $row['pid']; ?></td>
                        <td><?php $name=$row['name']; ?></td>
                        <td><?php $description=$row['description']; ?></td>
                    
               <?php echo '
                <form action="home.php" method="post">
                <input type="hidden" name="pid" value="'.$pid.'">
            
                    <tr>
                    <td>'.$pid.'</td>
                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$name.'"></td>
                    <td>'.$description.'</td>
                    </tr>
                </form>
                ';?>
                <?php   }
                  }

                    }else{
                  echo "0 results";
                  }
                ?>
                
                            </tbody>
                          </table>
                  </div>
              </div>
            </div> 
          </div>
       </div>
       <div class="col-md-4">
              <div class="card card-profile">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Reputation</h4>
              </div>
                <div class="card-body">
                
        <?php
        $email=$_SESSION['email'];

        $query = "SELECT * FROM feedback";
        $results = $conn->query($query);
        if ($results->num_rows > 0){
          //output data of each row
          while ($row = $results->fetch_assoc()) { 
              if ($row['email']==$_SESSION['email']){ ?>	
                  <?php 
                  
        $query = "SELECT ROUND( AVG(rate),2 ) AS Average FROM feedback";
                            $results1 = $conn->query($query);
                           echo $rtavg= $results1->fetch_assoc()['Average'];?>/5 <br/>

      ( <?php $query = "SELECT COUNT(review) FROM feedback WHERE pid=$pid";
                            $results1 = $conn->query($query);
                          echo $rewcount= $results1->fetch_assoc()['COUNT(review)'];?> Reviews)
                        
                <?php   }
                  }

                    }else{
                  echo "0 results";
                  }
                ?>
                        
                        
      
      </div>
      
    </div>
    <br/>
                
                <!--My Wallet-->
		<div class="card">
    <div class="card-header card-header-primary">
                <h4 class="card-title"><h4>My Wallet</h4>  
              
      </div>
      <div class="card-body">
                
			<ul class="list-group">
			  <li class="list-group-item">Total Income: $</li>
        <li class="list-group-item">Average Income:$ </li>
			  <li class="list-group-item">Hourly Rate: $</li>
		
			</ul>
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