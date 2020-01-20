 <?php 

      include_once 'connection.php';
      include('process.php');
      if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login.php');
      }
 ?>

 <!DOCTYPE html>
 <html lang="en">
  <head>
   <meta charset="utf-8" />
   <title>
     ikodar
   </title>
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
               <p>Home</p>
             </a>
           </li>
           <li class="nav-item active">
             <a class="nav-link" href="./projects.php">
               
               <p>My Projects</p>
             </a>
           </li>
           
           <li class="nav-item active">
             <a class="nav-link" href="./profile.php">
               <!--<i class="material-icons">bubble_chart</i>-->
               <p>My Profile</p>
             </a>
           </li>

           <li class="nav-item active">
            <a class="nav-link" href="./projects.php">
              
              <p>Messages</p>
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
       <!-- Navbar -->
       <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
         <div class="container-fluid">
           <div class="navbar-wrapper">
             <a class="navbar-brand" href="#pablo">Completed Projects</a>
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
               
               <li class="nav-item dropdown">
                 
               
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
       <!-- End Navbar -->
       <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body mt-3">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="thead-dark text-primary">
                          <tr>
                            <th width="18%">PROJECT ID</th>
                            <th width="18%">PROJECT NAME</th>
                            <th width="16%">MORE</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                            //retrieve data from project table
                            $query = "SELECT * FROM projects";
                            $results = $conn->query($query);
                            if ($results->num_rows > 0) {
                            //output data of each row
                            while ($row = $results->fetch_assoc()) { 
                              $date=date("Y-m-d");	
                              if ($date<$row['biddate']){ ?>			
                                  <tr>
                                      <td><?php echo $row['pid']; ?></td>
                                      <td><?php echo $row['name']; ?></td>
                                      <td><a class="btn btn-primary" href="details.php" role="button" name="view_btn">View</a>
                                  </tr>
                              <?php 
                                }
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
 