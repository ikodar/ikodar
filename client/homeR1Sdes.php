<?php 

include_once 'connection.php';
include('process.php');
if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: ../login.php');
}

if(isset($_POST["pid"])){
  $_SESSION["pid"]=$_POST["pid"];
  header("location: details.php");
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
   <a href="http://www.creative-tim.com" class="simple-text logo-normal">
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
       <a class="navbar-brand" href="#pablo">Existing Projects</a>
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
       </ul>
     </div>
   </div>
 </nav>
 <!-- End Navbar -->

<!--  tabl -->
 <div class="content" >
        
          <div class="container-fluid">
          
            <div class="row">
            <div class="scroll" >
              <div class="col-md-12">
                
                  
                    <div class="table-responsive">
                    
                      <table class="table" style="background-color:#c3ccd3; color:#000000; ">
                        <thead style="background-color:#3A3D9E; color:#ffffff">
                          <tr>
                            <th width="18%">PROJECT ID</th>
                            <th width="18%">NAME</th>
                            <th width="16%">MORE</th>
                          </tr>
                        </thead>

                        
                        <tbody>
                        
                        <?php 
                            //retrieve data from project table
                            $query = "SELECT * FROM projects WHERE type='Software'";
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





 <div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Existing Projects</h4>
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
        if ($results->num_rows > 0) {
        //output data of each row
        while ($row = $results->fetch_assoc()) { 
          $date=date("Y-m-d");	
          if ($date<$row['biddate']){ ?>			
            
                  <td><?php $pid= $row['pid']; ?></td>
                  <td><?php $name=$row['name']; ?></td>
                  <td><?php $description=$row['description']; ?></td>
              
                  <?php echo '
                    <form action="existing.php" method="post">
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

<!--   Core JS Files   -->
<script src="assets/js/core/jquery.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap-material-design.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

</body>

</html>
