<?php 
  include('functions.php');
	if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
  }

  $pid = "";

  if (isset($_POST['view_btn']) {
    global $pid = $_POST['pid'];
   }

   $query = "SELECT * FROM projects where pid='$pid'";
   $results = $conn->query($query);
   if ($results->num_rows > 0) {
      //output data of each row
      while ($row = $results->fetch_assoc()) { 
      }

   }else{
       echo "0 results";
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Projects</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Fonts and icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <p class="navbar-brand">Projects</p> <!--CHECK THE HREF HERE-->
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item"> 
                <a class="nav-link" href="../index.php?logout='1'">Logout</a><!--HREF HERE CHECK-->
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <!--Data section-->
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
 
                <div class="content">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-8">
                         <div class="card">
                            <div class="card-header card-header-primary">
                               <h4 class="card-title">Project Details</h4>                   
                            </div>
                             <div class="card-body">
                              <form>
                     
                                  <div class="row">
                                   <div class="col-md-6">
                                     <div class="form-group">
                                        <label class="bmd-label-floating">Project Name: </label> 
                                          <?php
                                            $query = "SELECT * FROM projects where pid='$pid'";
                                            $results = $conn->query($query);
                                            if ($results->num_rows > 0) {
                                            //output data of each row
                                              while ($row = $results->fetch_assoc()) { 
                                              { ?>			
                                                <tr>
                                                  <td><?php echo $row['name']; ?></a></td>    
                                                </tr>
                                                <?php   }
                                                  }

                                                  }else{
                                                    echo "0 results";
                                                  }
                                                   ?>                         
                                        </div>
                                      </div>                                             
                                    </div>

                                   <div class="row">
                                     <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="bmd-label-floating">Project Type:</label>   
                                          <?php
                                            $query = "SELECT * FROM projects where pid='$pid'";
                                            $results = $conn->query($query);
                                            if ($results->num_rows > 0) {
                                            //output data of each row
                                              while ($row = $results->fetch_assoc()) { 
                                              { ?>			
                                              <tr>
                                                <td><?php echo $row['type']; ?></a></td>    
                                              </tr>
                                              <?php   }
                                              }

                                              }else{
                                                echo "0 results";
                                              }
                                            ?>                       
                                          </div>
                                        </div>                      
                                      </div>

                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label class="bmd-label-floating">IT Individual:</label>                           
                                        </div>
                                      </div>                                            
                                    </div>
                     
                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label class="bmd-label-floating">Amount:</label>  
                                            <?php
                                              $query = "SELECT * FROM projects where pid='$pid'";
                                              $results = $conn->query($query);
                                              if ($results->num_rows > 0) {
                                              //output data of each row
                                                while ($row = $results->fetch_assoc()) { 
                                                { ?>			
                                                <tr>
                                                  <td><?php echo $row['amount']; ?></a></td>    
                                                </tr>
                                                  <?php   }
                                                }

                                                }else{
                                                  echo "0 results";
                                                }
                                            ?>

                                        </div>
                                      </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label class="bmd-label-floating">Bid End Date:</label>  
                                          <?php
                                            $query = "SELECT * FROM projects where pid='$pid'";
                                            $results = $conn->query($query);
                                              if ($results->num_rows > 0) {
                                              //output data of each row
                                                while ($row = $results->fetch_assoc()) { 
                                                { ?>			
                                                <tr>
                                                  <td><?php echo $row['biddate']; ?></a></td>     
                                                </tr>
                                                <?php   }
                                                }

                                                }else{
                                                  echo "0 results";
                                                }
                                          ?>                        
                                        </div>
                                      </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label class="bmd-label-floating">Deadline:</label>
                                          <?php
                                            $query = "SELECT * FROM projects where pid='$pid'";
                                            $results = $conn->query($query);
                                              if ($results->num_rows > 0) {
                                              //output data of each row
                                              while ($row = $results->fetch_assoc()) { 
                                              { ?>			
                                              <tr>
                                                <td><?php echo $row['deadline']; ?></a></td>    
                                              </tr>
                                              <?php   }
                                              }

                                              }else{
                                                echo "0 results";
                                              }
                                          ?>                           
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Description:</label>
                                            
                                            <?php
                                              $query = "SELECT * FROM projects where pid='$pid'";
                                              $results = $conn->query($query);
                                              if ($results->num_rows > 0) {
                                              //output data of each row
                                                while ($row = $results->fetch_assoc()) { 
                                                { ?>			
                                                <tr>
                                                  <td><?php echo $row['description']; ?></a></td>
                                                </tr>
                                              <?php   }
                                              }

                                              }else{
                                                echo "0 results";
                                              }
                                              ?>                          
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
                        </div>
                      </div>
      <!--End of data section-->

    </div>
    <!-- End of Content -->
  </div>
</body>
</html>