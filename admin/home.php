
<?php 
	include('functions.php');
	if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
  }
  //total number of registered users (IT)
  $sql1 = "SELECT COUNT(email) FROM users WHERE user_type='IT'";
  $results1 = $conn->query($sql1);
  $ITcount= $results1->fetch_assoc()['COUNT(email)'];

  //total number of registered users (Clients)
  $sql2 = "SELECT COUNT(email) FROM users WHERE user_type='client'";
  $results2 = $conn->query($sql2);
  $clientcount= $results2->fetch_assoc()['COUNT(email)'];

  //total number of projects
  $sql6 = "SELECT COUNT(pid) FROM projects";
  $results6 = $conn->query($sql6);
  $total= $results6->fetch_assoc()['COUNT(pid)'];

  //for the pie chart
  $sql = "SELECT type, count(*) as number FROM projects GROUP BY type";
  $results = $conn->query($sql);
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Dashboard</title>

  <!-- including links and necessary deatils for the pie chart-->
  <script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current',{'packages':['corechart']});
    //for the piechart
    google.charts.setOnLoadCallback(drawChart);
    function drawChart(){
      var data = google.visualization.arrayToDataTable([
        ['Type','Number'],
        <?php 
            while($row = mysqli_fetch_array($results)){
              echo "['".$row["type"]."',".$row["number"]."],";

            }
        ?>
      ]);
      var option:{
        title:'Percentage of Project types',
        pieHole:0.4
      };
      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      chart.draw(data, options);

    } 

    //for the line chart
    google.charts.setOnLoadCallback(drawChart2);
    function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
  </script>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Fonts & icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../css/bootstrap.min.css" rel="stylesheet" />
  <link href="../css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />

  <link href="css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <link href="css/custom.css" rel="stylesheet" />
</head>
<body class="">
  <div class="wrapper ">
    <!--Dashboard panel-->
    <div class="sidebar" data-color="azure" data-background-color="white">
      <!--Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
        Tip 2: you can also add an image using data-image tag-->
      <div class="logo">
        <a class="simple-text logo-normal">
        i-කෝඩර්
        </a>
        <a class="simple-text logo-normal"><?php echo $_SESSION['email'];?></a>
        <a class="simple-text logo-normal">(Admin)</a>
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
            <p class="navbar-brand">Dashboard</p> <!--CHECK THE HREF HERE-->
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item"> 
                <a class="nav-link" href="functions.php?logout='1'">Logout</a><!--HREF HERE CHECK-->
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
      <div class="container-fluid">

          <!-- client IT individuals count-->
          <div class="row d-flex justify-text-center" >
            <div class="col-md-4">
              <div class="card ">
                <div class="card-header card-header-primary" style="background-color:#175873; font-size:30px; color:white;">
                      <p class="card-category">No. of IT individuals</p>                  
                 </div>
                <div class="card-body " style="font-size:30px;">
                  <p class="card-category"><?php echo $ITcount;?></p>
                </div>  
              </div>
            </div>
            <div class="col-md-4">
              <div class="card ">
                <div class="card-header card-header-primary" style="background-color:#175873; font-size:30px; color:white;">
                  <p class="card-category">No. of Clients</p>                 
                 </div>
                <div class="card-body " style="font-size:30px;">
                  <p class="card-category"><?php echo $clientcount;?></p>
                </div> 
              </div>
            </div>
          </div>

          <div class="row"> 
          <!--Pie chart-->
            <div class="col-md-5">
              <div class="card ">
                <div class="card-header ">
                  <h4 class="card-title">Project Statistics</h4>
                  <p class="card-category">Total No. of projects <?php echo $total;?></p>
                </div>
                <div class="card-body ">
                  <div id="piechart" style="width:700px; height:300px;"></div>
                </div>
              </div>
            </div>
          <!--End of pie chart-->
          <!--line  chart-->
           <div class="col-md-5">
              <div class="card ">
                <div class="card-header ">
                  <h4 class="card-title">User Statistics</h4>
                  <p class="card-category">Total No. of registered users <?php echo $clientcount + $ITcount;?></p>
                </div>
                <div class="card-body ">
                <div id="curve_chart" style="width: 700px; height: 300px"></div>
                </div>
              </div>
            </div>
          <!--End of line chart-->
          </div>

      </div>
      </div>

    </div>
    <!-- End of Content -->
  </div>
</body>
</html>