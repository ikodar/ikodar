<?php 
  include('functions.php');
  include('functions1.php');
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
   <title>
     Active bids
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
         <a href="http://www.creative-tim.com" class="simple-text logo-normal">
           ikodar
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
 
 
       <div class="content">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12">
                          

      
                            <ul class="nav nav-tabs col-md-6" style="background-color:#113849; padding:20px; margin-left:15%">
                                  </li>
                                    <li class="nav-item px-4">
                                      <a class="nav-link active" href="active.php">Active Bids</a>
                                    </li>
                                    <li class="nav-item  px-4">
                                      <a class="nav-link" href="current.php">Current Work</a>
                                    </li>
                                    <li class="nav-item  px-4">
                                      <a class="nav-link" href="past.php">Past Work</a>
                                  </li>
                              </ul>
                      
                    <div class="card">
                      <div class="card-body mt-3">
                        <div class="table-responsive">
                          <table class="table">
                            <thead class="thead-dark text-primary">
                              <tr>
                                <th width="18%">PROJECT ID</th>
                                <th width="18%">PROJECT NAME</th>
                                <th width="16%">BIDS</th>
                                <th width="16%">MY BID</th>
                                <th width="16%">AVG BID</th>
                                <th width="18%">BID END DATE</th>
                                <th width="16%">ACTION</th>
                              </tr>
                            </thead>
                            <tbody>
                           

          <?php 
					    //retrieve data from project table
              $query = "SELECT * FROM projects INNER JOIN bid ON projects.pid= bid.pid";
              $results = $conn->query($query);
              if ($results->num_rows > 0) {
              //output data of each row
              while ($row = $results->fetch_assoc()) { 
                if ($row['email']==$_SESSION['email'] AND $row['status']=="new"){ ?>			
                    <tr>
                    <td><?php $pid= $row['pid']; ?></td>
                        <td><?php $name=$row['name']; ?></td>
                        <td> <?php
                           $query = "SELECT COUNT(Bid) FROM bid WHERE pid=$pid";
                            $results1 = $conn->query($query);
                            $bidcount= $results1->fetch_assoc()['COUNT(Bid)'];?></td>

                        <td><?php $biddate=$row['biddate']; ?></td>
                        <td><?php $bid= $row['Bid']; ?></td>

                        <td><?php $query = "SELECT ROUND( AVG(Bid),2 ) AS Average FROM bid WHERE pid=$pid";
                            $results1 = $conn->query($query);
                            $bidavg= $results1->fetch_assoc()['Average'];?></td>
                </tr>
               <?php echo '
            
            <form action="" method="post">
            <input type="hidden" name="pid" value="'.$pid.'">
                    <tr>
                    <td>'.$pid.'</td>
                    <td>'.$name.'</td>
                    <td>'.$bidcount.'</td>
                    <td>$'.$bid.' USD</td>
                    <td>$'.$bidavg.'USD</td>
                    <td>'.$biddate.'</td>

                   
                            <td><div class="input-group">
                            <button type="submit"  class="btn btn-primary pull-right px-3"  name="delete_btn">Delete Bid</button>
                            <button type="submit"  class="btn btn-primary pull-right px-4"  name="edit_btn">Edit Bid</button>
                            </div></td>
                            
                            </form>
                   
                    </tr>
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
              </div>
            </div>

                        
          
  <!--   Core JS Files   -->
<script src="assets/js/core/jquery.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap-material-design.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

</body>

</html>