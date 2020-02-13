<?php 
  include ('process.php');
  if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: ../login.php');
  }

  //view name on top
  $email=$_SESSION['email'];
  $sql = "SELECT * FROM users WHERE email='$email'";
	$results=$conn->query($sql);
  $row = $results->fetch_assoc();

  $firstname  =  $row['firstname'];
  
  //piechart
  $qry = "SELECT type, count(*) as number FROM projects GROUP BY type ";
  $result = $conn->query($qry);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
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

  <!--piechart library-->
  <script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
  google.charts.load('current',{'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart()
  {
    var data = google.visualization.arrayToDataTable([
        ['Type', 'Number'],
        <?php
        while($row = mysqli_fetch_array($result))
        {
          echo "['".$row["type"]."',".$row["number"]."],";
        }
        ?>
      ]);
    var options = {
      title: 'Percentage of types of projects'
      }
    var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
    chart.draw(data, options);

  }
  </script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
          Tip 2: you can also add an image using data-image tag -->
      <div class="logo">
        <a class="simple-text logo-normal">
          ikodar
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
            <a class="navbar-brand" href="#pablo">Hi</a>
            
            <input name="email" type="email" class="form-control" style="width:100px" value="<?php echo $firstname?>">
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
              
              
              
              <li class="nav-item">
                <a class="nav-link" href="aboutus.php">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="help.php">Help</a>
              </li>
              <li class="nav-item"> 
                <a class="nav-link" href="home.php?logout='1'">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar
      style="height:40px; width:40px; margin:0;" -->
      
      <div class="content" >
         <div class="container-fluid" >
         <p class="card-category" style="font-weight:bold " >Explore more projects..</p>
           <div class="row">
           
           <div class="col-lg-3 col-md-6 col-sm-6" >
               <div class="card card-stats" >
                   <!--<p class="card-category" style="font-weight:bold " >New projects</p>-->
                   <button type="submit" background-color: rgb(11, 22, 88) class="btn btn-primary pull-right" value="submit" name="submit">Software Design</button>
                   <img src="./img/design.jpg" style="width:202px; length:202px align:center">
                </div>
               </div>


               <div class="col-lg-3 col-md-6 col-sm-6" >
               <div class="card card-stats" >
                   <!--<p class="card-category" style="font-weight:bold " >New projects</p>-->
                   <button type="submit" background-color: rgb(11, 22, 88) class="btn btn-primary pull-right" value="submit" name="submit">Software Development</button>
                   <img src="./img/deve.jpg" style="width:202px; length:202px align:center">
                </div>
               </div>

               <div class="col-lg-3 col-md-6 col-sm-6" >
               <div class="card card-stats" >
                   <!--<p class="card-category" style="font-weight:bold " >New projects</p>-->
                   <button type="submit" background-color: rgb(11, 22, 88) class="btn btn-primary pull-right" value="submit" name="submit">Graphic Design</button>
                   <img src="./img/mng.jpg" style="width:202px; length:200px align:center">
                </div>
               </div>
             

             

            
             </div></br>
              <!--pie chart-->
              <div class="row">
              <div id="piechart1" style="width:700px; height:300px;"></div>
              
              </div>
              
            </br>
            
             <p class="card-category" style="font-weight:bold " >Best software developers...</p>
             
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
          
                      
             <div class="row">
             <div class="col-md-4" >
               <div class="card card-chart">
                 
                   <div class="ct-chart" id="dailySalesChart" style="background-color:#d8ecff">fgdf</div>
                 
                 <div class="card-body" >
                   <h4 class="card-title">Daily Sales</h4>
                   <p class="card-category">
                     <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
                 </div>
                 <div class="card-footer">
                   <div class="stats">
                     <i class="material-icons">access_time</i> updated 4 minutes ago
                   </div>
                 </div>
               </div>
             </div>
             <div class="col-md-4">
               <div class="card card-chart">
               <div class="ct-chart" id="dailySalesChart" style="background-color:#d8ecff">fgdf</div>
                 <div class="card-body">
                   <h4 class="card-title">Email Subscriptions</h4>
                   <p class="card-category">Last Campaign Performance</p>
                 </div>
                 <div class="card-footer">
                   <div class="stats">
                     <i class="material-icons">access_time</i> campaign sent 2 days ago
                   </div>
                 </div>
               </div>
             </div>
             <div class="col-md-4">
               <div class="card card-chart">
               <div class="ct-chart" id="dailySalesChart" style="background-color:#d8ecff">fgdf</div>
                 <div class="card-body">
                   <h4 class="card-title">Completed Tasks</h4>
                   <p class="card-category">Last Campaign Performance</p>
                 </div>
                 <div class="card-footer">
                   <div class="stats">
                     <i class="material-icons">access_time</i> campaign sent 2 days ago
                   </div>
                 </div>
               </div>
             </div>
           </div>

           <p class="card-category" style="font-weight:bold " >Best Software Designers...</p>
             <div class="row">
             <div class="col-md-4">
               <div class="card card-chart">
               <div class="ct-chart" id="dailySalesChart" style="background-color:#d8ecff">fgdf</div>
                 <div class="card-body">
                   <h4 class="card-title">Daily Sales</h4>
                   <p class="card-category">
                     <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
                 </div>
                 <div class="card-footer">
                   <div class="stats">
                     <i class="material-icons">access_time</i> updated 4 minutes ago
                   </div>
                 </div>
               </div>
             </div>
             <div class="col-md-4">
               <div class="card card-chart">
                 <div class="card-header card-header-warning">
                   <div class="ct-chart" id="websiteViewsChart"></div>
                 </div>
                 <div class="card-body">
                   <h4 class="card-title">Email Subscriptions</h4>
                   <p class="card-category">Last Campaign Performance</p>
                 </div>
                 <div class="card-footer">
                   <div class="stats">
                     <i class="material-icons">access_time</i> campaign sent 2 days ago
                   </div>
                 </div>
               </div>
             </div>
             <div class="col-md-4">
               <div class="card card-chart">
                 <div class="card-header card-header-danger">
                   <div class="ct-chart" id="completedTasksChart"></div>
                 </div>
                 <div class="card-body">
                   <h4 class="card-title">Completed Tasks</h4>
                   <p class="card-category">Last Campaign Performance</p>
                 </div>
                 <div class="card-footer">
                   <div class="stats">
                     <i class="material-icons">access_time</i> campaign sent 2 days ago
                   </div>
                 </div>
               </div>
             </div>
           </div>
</body>

</html>
