<?php 
  include ('functions.php');
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
$lastname  =  $row['lastname'];
$user_type  =  $row['user_type'];


  
  //piechart
  $qry = "SELECT status, count(*) as number FROM projects WHERE status IN (completed AS pending ,past ) GROUP BY status ";
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
  
  <script type="text/javascript" src="../jquery/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>

  <!--piechart library-->
  <script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
  google.charts.load('current',{'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart()
  {
    var data = google.visualization.arrayToDataTable([
        ['payment', 'Number'],
        <?php
        while($row = mysqli_fetch_array($result))
        {
          echo "['".$row["payment"]."',".$row["number"]."],";
        }
        ?>
      ]);
    var options = {
      title: 'Percentage of types of payment'
      };
    var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
    chart.draw(data, options);

  }
  </script>
<!--End of piechart library-->


</head>

<body class="">
  
  <div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
          Tip 2: you can also add an image using data-image tag -->
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
               <!--<i class="material-icons">dashboard</i>-->
               <p>Dashboard</p>
             </a>
             </li>
             <li class="nav-item active  ">
               <a class="nav-link" href="./active.php">
                 <!--<i class="material-icons">dashboard</i>-->
                 <p>My Projects</p>
               </a>
 
           </li>
           <li class="nav-item active">
             <a class="nav-link" href="./myprofile.php">
               <!--<i class="material-icons">bubble_chart</i>-->
               <p>My Profile</p>
             </a>
           </li>
          </li>
           <li class="nav-item active">
             <a class="nav-link" href="./income.php">
               <!--<i class="material-icons">location_ons</i>-->
               <p>Income</p>
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
       <a class="navbar-brand" href="#pablo"></a>
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
                 <a class="nav-link" href="#pablo">
                   <!--<i class="material-icons">Dashboard</i>-->
                   <p class="d-lg-none d-md-block">
                    
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="aboutus.php">About Us</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="help.php">Help</a>
               </li>
               <li class="nav-item"> 
                 <a class="nav-link" href="processMyprfl.php?logout='1'">Logout</a>
               </li>
             </ul>
     </div>
   </div>
 </nav>
      <!-- End Navbar
      style="height:40px; width:40px; margin:0;" -->
      
      
      <div class="content" >
         <div class="container-fluid" >
         


 <!--graph/////////////////-->

 <div class="col-md-9">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Gained Income for Projects Types</h4>
              </div>
                <div class="card-body">
                  <div class="row">    
                      <div class="table-responsive">

<?Php
$query = "SELECT type,ITincome FROM projects WHERE status='past'";
$results = $conn->query($query);

if ($results->num_rows > 0){

  echo "No of records : ".$results->num_rows."<br>";
$php_data_array = Array(); // create PHP array
  echo "<table >
<tr> <th>Project Type</th><th>Gained Income</th></tr>";
while ($row = $results->fetch_row()) {
   echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
   $php_data_array[] = $row; // Adding to array
   }
echo "</table>";
}else{
echo $connection->error;
}
//print_r( $php_data_array);
// You can display the json_encode output here. 
 json_encode($php_data_array); 

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d = ".json_encode($php_data_array)."
</script>";
?>


<div id="chart_div"></div>
<br><br>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawChart);
	  
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Type');
        data.addColumn('number', 'ITincome');
		
        for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
       var options = {
          title: ' Gained Income for Projects Types',
          hAxis: {title: 'type',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));
        chart.draw(data, options);
       }
		
</script>
</div>
</div>
</div>
</div>
</div>
    <!--end of graph/////////////////-->


            </br>
              <!--pie chart-->
              <div class="card-category">
              <div id="piechart1" style="width:700px; height:300px;"></div>
              </div>
              
            </br>

            </br>
            
             
             
        <div class="content" >
        
          <div class="container-fluid">
          
          <div class="col-md-9">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Recent IT Individuals</h4>
              </div>
                <div class="card-body">
                  <div class="row">    
                      <div class="table-responsive">
                          
					     <table class="table">
               <thead class="thead-dark text-primary" >
                 <tr >
                   
                   <th width="20px" style="font-size:15px">project Type</th>
                   <th width="20px" style="font-size:15px">IT Individual</th>
                   <th width="20px"style="font-size:15px">Ratings</th>
                   <th width="20px"style="font-size:15px">Reviews</th>

                   
                 </tr>
               </thead>
               <tbody>
               <?php 
         $query = "SELECT projects.*,feedback.*
                  FROM projects 
                  INNER JOIN feedback ON feedback.pid = projects.pid ";

     $results2 = $conn->query($query);
     if ($results2->num_rows > 0) {
     //output data of each row
     while ($row = $results2->fetch_assoc()) { 
      { ?>			
           <tr>
              <td><?php echo $row['type'];?></td>
              <td><?php echo $row['email'];?></td>
              <td><?php echo $row['rate'];?></td>
              <td><?php echo $row['review'];?></td>

       <?php   }
         }
           }else{
         echo "0 results";
         }
         //<td><a class="btn btn-primary" href="details.php" role="button" name="view_btn">View</a>
       ?>

               </tbody>
             </table>

                  </div>
              </div>
            </div> 
          </div>
       </div>
          <!--Row 4444 end-->
                      
            


           
             
</body>

</html>
