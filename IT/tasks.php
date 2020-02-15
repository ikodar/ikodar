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
        <a class="simple-text logo-normal"><?php echo $_SESSION['email'];?></a>
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
            <form>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <h4><a class="nav-link" href="details.php">Details</a></h4>                          
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <h4><a class="nav-link" href="tasks.php">Tasks</a></h4>                         
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
            
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">All Tasks</h4>
              </div>
            <div class="card-body">

                               
                <div class="row">
                  <div class="col-md-12">  
                  <div class="table-responsive px-5 py-3">
                    <table class="table">
                      <tbody>
                      <thead class="thead text-primary">
                              <tr>
                              <th scope="col">TASKS</th>
                                <th scope="col">HOURS</th>
                                <th scope="col"></th>
                                <th scope="col">STATUS</th>
                              </tr>
                            </thead>

                      <?php 
                  //retrieve data from project table
                  $query = "SELECT * FROM tasks WHERE pid='$pid'";
                  $results = $conn->query($query);
                    if ($results->num_rows > 0){
                    //output data of each row
                     while ($row = $results->fetch_assoc()) { ?>	
                          <form action =""	method="post" class="was-validated">
                          
                          <tr>
                              <input type="hidden" name="tid" value="<?php echo $tid?>"> 
                              <td><?php echo $row['task']; ?></td>
                              <td><?php echo $row['hour']; ?></td>
                              
 
                              <td style="width:350px;"> 
                                <div class="input-group" >
                                <input name="link" type="text" class="form-control" value="">
                                </div>
                                </td>

                                <td>
                                <div class="input-group" >
                                  <button type="submit"  class="btn btn-primary pull-right" value="submit" name="complete">Complete</button>
                                </div>
                                </td>
                             
                          </tr>
                          </form>
                  <?php   
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
 


<!--   Core JS Files   -->
<script src="assets/js/core/jquery.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap-material-design.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>


</body>

</html>
