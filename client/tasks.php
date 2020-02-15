<?php 

  include_once 'connection.php';
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
                  <h4 class="card-title">Tasks</h4>
                </div>
                <div class="card-body">
                </div>
              </div>

             <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Create a New Task</h4>
                </div>
                 <div class="card-body">
                  <form action="tasks.php" method="post" class="was-validated">
                  <input type="hidden" name="pid" value="<?=$pid;?>">                                      
                    <div class="row">
                      <div class="col-md-5">                      
                      </div>                        
                    </div>

                    <div class="row">
                      <div class="col-md-10">
                        <div class="form-group">
                          <label>Decribe your task:</label>
                            <div class="form-group" >
                              <textarea name="task" class="form-control" rows="5" style="border: 1px solid #bdbdbd;"  placeholder="add your task here"></textarea>
                            </div>
                        </div>
                      </div>
                    </div>

                  <div class="row">
                    <div class="col-md-5">
                        <label style="margin-top:8px;">Task will be completed(in hours):</label>
                        <div class="input-group mb-3">
                          <input name="hour" type="int" class="form-control" style="border: 1px solid #bdbdbd;"  placeholder="Enter number of hours" required>
                          <div class="input-group-append">
                            <span class="input-group-text" style="background-color:#d3d3d3; border: 1px solid #bdbdbd; padding:3px">Hours</span>
                          </div>
                          <div class="invalid-feedback">Please enter number of hours.</div>
                        </div>
                      </div>
                        </div>

                    <button type="submit"  class="btn btn-primary pull-right" name="add">ADD</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>

            <div class="card-body">
              </div>
            </div>

            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">All Tasks</h4>
              </div>
            <div class="card-body">

                               
                <div class="row">
                  <div class="col-md-10">  
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>

                      <?php 
                  //retrieve data from project table
                  $query = "SELECT * FROM tasks WHERE pid='$pid'";
                  $results = $conn->query($query);
                    if ($results->num_rows > 0){
                    //output data of each row
                     while ($row = $results->fetch_assoc()) { ?>	
                          <form action ="tasks.php"	method="post" class="was-validated">
                          
                          <tr>
                              <input type="hidden" name="tid" value="<?php echo $tid?>"> 
                              <td><?php echo $row['task']; ?></td>
 
                              <td width="50">
                                <div class="input-group">
                                <td><input name="link" type="text" class="form-control" value=""></td>
                                  <?php echo $row['link'];?>
                              </td>

                                 <td> <button type="submit"  class="btn btn-primary pull-right" value="submit" name="satisfy">Accept</button></td>
                                  
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
