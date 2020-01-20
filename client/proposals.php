<?php 

  include_once 'connection.php';
  $result = mysqli_query($conn,"SELECT * FROM projects");
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
 <div class="logo">
   <a href="http://www.creative-tim.com" class="simple-text logo-normal">
     ikodar
   </a>
 </div>
 <div class="sidebar-wrapper">
   <ul class="nav">
     <li class="nav-item active  ">
       <a class="nav-link" href="./home.php">
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
       <a class="navbar-brand" href="#pablo">Project 1</a>
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
          </li>
        </ul>
      </div>
    </div>
  </nav>
 <!-- End Navbar -->
 <div class="content">
         <div class="container-fluid">
 <div class="card-body">
                   <form>
                   <div class="row">
                       <div class="col-md-4">
                         <div class="form-group">
                         <h4><strong><a class="nav-link" href="details.php">Details</a></strong></h4>
                           
                         </div>
                       </div>
                       <div class="col-md-4">
                         <div class="form-group">
                         <h4><strong><a class="nav-link" href="proposals.php">Proposals</a></h4></strong>
                           
                         </div>
                       </div>
                       <div class="col-md-4">
                         <div class="form-group">
                         <h4><strong><a class="nav-link" href="tasks.php">Tasks</a></h4></strong>
                           
                         </div>
                       </div>
                     </div>
 
<!--retrieve data from database-->
<div class="card">
        <div class="card-body mt-3">
          <div class="table-responsive">
            <table class="table">
              <thead class="thead-dark text-primary">
                <tr>
                  <th width="18%">ID</th>
                  <th width="18%">Name</th>
                  <th width="18%">Description</th>
                  <th width="18%">Action</th>
                </tr>
              </thead>
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
                              <td><?php echo $row['pid']; ?></td>
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $row['description']; ?></td>
                              <td>
                                <div class="input-group">
                                  <a class="btn btn-primary" href="view.php" role="button" name="view_btn">View</a>
                                  <a class="btn btn-primary" href="" role="button" name="view_btn">Delete</a>
                                </div>
                              </td>
                          </tr>
                  <?php   }
                    }

                  }else{
                    echo "0 results";
                  }
                    ?>
              </tbody>
            </table>
      <!--end retrieve data-->
          </div>
        </div>
      </div>
      <!--End of data section-->
</div>     

</div>
<!--
 <div class="content">
  <div align = "right">
      Sort By:<br>
      <button type="submit" background-color: rgb(11, 22, 88) class="btn btn-primary pull-right" value="submit" name="submit">Best rank</button>
      <button type="submit" background-color: rgb(11, 22, 88) class="btn btn-primary pull-right" value="submit" name="submit">Amount lowest</button>
      <button type="submit" background-color: rgb(11, 22, 88) class="btn btn-primary pull-right" value="submit" name="submit">Amount highest</button><br><br><br><br>
      
      <?php  //retrieve data from bid table
              $query = "SELECT COUNT (pid) FROM bid WHERE pid='$pid'";
              $results = $conn->query($query);?>

      No. of Bids: <?php echo $results; ?>
  </div>
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
                <?php }
                    }
                  }else{
                    echo "0 results";
                  } ?>
          </tbody>
        </table>
      </div>       
     </div>
   </div>
 </div>
                -->        

<!--   Core JS Files   -->
<script src="assets/js/core/jquery.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap-material-design.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

</body>

</html>
