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
$lastname  =  $row['lastname'];
$user_type  =  $row['user_type'];


  
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
      };
    var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
    chart.draw(data, options);

  }
  </script>
<!--End of piechart library-->

<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1200px;
  
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #801814;
  font-size: 20px;
  
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
  font-weight:bold ;

}

/* Number text (1/3 etc) 
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}
*/

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 1s ease;
}

 
/*.active {
  background-color: #2E3B7F;
}*/

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 0.5s;
  animation-name: fade;
  animation-duration: 6s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 2}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>

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
                <a class="nav-link" href="process.php?logout='1'">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar
      style="height:40px; width:40px; margin:0;" -->
      
      
      <div class="content" >
         <div class="container-fluid" >
         <p class="card-category" style="font-weight:bold " >Explore more projects..</p></br>

         
         <!-- transition -->
         <div class="card-category" >
         
         <div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">    </div>
  <img src="./img/design.jpg" style="height:300px; width:100%">
  
  <div class="text" >Software Design Projects</div></a>
</div>

<div class="mySlides fade">
  <div class="numbertext">    </div>
  <img src="./img/deve.jpg" style="height:300px; width:100%">
  
  <div class="text">Software Development Projects</div></a>
</div>

<div class="mySlides fade">
  <div class="numbertext">    </div>
  <img src="./img/mng.jpg" style="height:300px; width:100%">
  
  <div class="text">Graphic Design Projects</div></a>
</div>


</div>
</br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 4000); // Change image every 2 seconds
}
</script>
         </div>
         
         <!-- End of transition -->


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
