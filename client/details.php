<?php 

  include_once 'connection.php';
  include('process.php');
  if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
  }

  if(isset($_SESSION["pid"])){
    $pid=$_SESSION["pid"];
  }
  else{
    $pid="";
  }
  //for view the IT individual's each bids
if (isset($_POST['submit'])) {
	$pid = $_POST['pid'];
}
	$sql = "SELECT * FROM projects WHERE pid = '$pid'";
	$results = $conn->query($sql);
	$row = $results->fetch_assoc();
	$name = $row['name'];
	$type = $row['type'];
  $IT = $row['IT'];
  $amount = $row['amount'];
  $payment = $row['payment'];
  $biddate = $row['biddate'];
  $deadline = $row['deadline'];
  $description = $row['description'];
  $schedule = $row['schedule'];
  $link = $row['link'];
  $accept = $row['accept'];

  if(isset($_POST['acceptproject_btn'])){

    //update the status and acception of the project and redirect to payment page
    $sql="UPDATE projects SET accept='accepted',status='completed' WHERE pid='$pid'";
    if ($conn->query($sql) === TRUE) {
      echo "Link submitted successfully.";
      header('location: payments.php');
  } else{
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
    

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
    <title>
      ikodar
    </title>
<!--     Fonts and icons     -->
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
<div class="sidebar" data-color="azure" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
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
         <p>Dashboard</p>
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
       <a class="navbar-brand" href="#pablo">
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
              <a class="nav-link" href="process.php?logout='1'">Logout</a>
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
          <!--links to the other project details-->
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
                              <form action="existing.php" method="post">
                     
                                  <div class="row">
                                   <div class="col-md-6">
                                     <div class="form-group">
                                        <label class="bmd-label-floating">Project Name: </label> 
                                        <?php  echo $name; ?>                      
                                        </div>
                                      </div>                                             
                                    </div>

                                   <div class="row">
                                     <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="bmd-label-floating">Project Type:</label>   
                                          <?php  echo $type; ?>                       
                                          </div>
                                        </div>                      
                                      </div>

                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label class="bmd-label-floating">IT Individual:</label> 
                                          <?php  echo $IT; ?>                          
                                        </div>
                                      </div>                                            
                                    </div>
                     
                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label class="bmd-label-floating">Amount:</label>  
                                          <?php  echo $amount; ?>$
                                          <?php  echo $payment; ?>
                                        </div>
                                      </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label class="bmd-label-floating">Bid End Date:</label>  
                                        <?php  echo $biddate; ?>                      
                                        </div>
                                      </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label class="bmd-label-floating">Deadline:</label>
                                        <?php  echo $deadline; ?>                       
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Description:</label>
                                          <?php  echo $description; ?>                      
                                        </div>
                                      </div>
                                  
                                    </div>

                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label class="bmd-label-floating">Shedule:</label>  
                                      <?php  echo $schedule; ?>                       
                                    </div>
                                  </div>  
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input type="submit" name="delete_btn" class="btn btn-primary" value="Delete">                    
                                    </div>
                                  </div>

                                  </div>
                     
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>

                    <div class="row">
                      <div class="col-md-8">
                        <div class="card">
                          <div class="card-header card-header-primary">
                            <h4 class="card-title">Final Project Handover</h4>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-6">  
                              <?php $sql="SELECT link FROM projects WHERE pid='$pid'";
                                    $results=$conn->query($sql);
                                    $project=$results->fetch_assoc()['link'];
                              ?>
                                <table>
                                  <tr>
                                    <form action="payments.php" method="post">
                                      <td><input name="link" type="text" class="form-control" value="<?php echo $link?>"></td>
                                      <td><button type="submit"  class="btn btn-primary pull-right"  name="acceptproject_btn">Accept</button></td>
                                      <td><?php echo $accept?></td> 
                                    </form>  
                                  </tr>
                                </table>        
                              </div>                     
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
