<?php 

  
  include('process.php');
  if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
  }


  if(isset($_POST['pid'])){
    $_SESSION['pid']=$_POST['pid'];
    //header('location: paymentHInfo.php');
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
    <a class="simple-text logo-normal">
    i-කෝඩර්
    </a>
    <a class="simple-text logo-normal">Hi</a>
        <a class="simple-text logo-normal"><?php echo $firstname,$lastname?></a>
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
     
     <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
       <span class="sr-only">Toggle navigation</span>
       <span class="navbar-toggler-icon icon-bar"></span>
       <span class="navbar-toggler-icon icon-bar"></span>
       <span class="navbar-toggler-icon icon-bar"></span>
     </button>
     <div class="collapse navbar-collapse justify-content-end">
       
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
                          
                <div class="content">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                         <div class="card">
                            <div class="card-header card-header-primary" style="font-size:20px">
                               <!--name-->
                               <p>Project Name : 
                               <?php 
                  
                  $query = "SELECT * FROM projects where pid='$pid'";
                  $result = $conn->query($query);
                  if ($result->num_rows > 0) {
                  //output data of each row
                  while ($row = $result->fetch_assoc()) { 
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
                </p>
            <!-- hourly rate-->
            <p>Full amount : 
                <?php
                  //view amount to calculate total 
                  $sql2 = "SELECT amount FROM projects where pid='$pid'";
                  $results2=$conn->query($sql2);
                  $row2 = $results2->fetch_assoc();
                  $am  =  $row2['amount'];
                  echo $am;
                ?>
                </p>
                            </div>
                             <div class="card-body">
                             
                              <form>
                     
                              <table class="table">
                        <thead class="thead-dark text-primary" >
                          <tr >
                            <th width="10px" style="font-size:15px">TASK ID</th>
                            <th width="30px"style="font-size:15px">TASK NAME</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                  $query = "SELECT * FROM tasks where pid='$pid'";
              $results2 = $conn->query($query);
              if ($results2->num_rows > 0) {
              //output data of each row
              while ($row = $results2->fetch_assoc()) { 
               { ?>			
                    <tr>
                        <td width="10px" ><?php echo $row['tid']; ?></a></td>
                        <td width="30px" ><?php echo $row['task']; ?></a></td>
                        
                    </tr>
                <?php   }
                  }
                    }else{
                  echo "0 results";
                  }
                  //<td><a class="btn btn-primary" href="details.php" role="button" name="view_btn">View</a>
                ?>

                        </tbody>
                      </table>
                      
                    <a class="btn btn-primary" href="pay.php" role="button" name="view_btn">PAY</a>
                    <a class="btn btn-primary" href="paymentsHour.php" role="button" name="view_btn">BACK</a>
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
