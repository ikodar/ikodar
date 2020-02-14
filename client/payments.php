<?php 
     include ('process.php'); 
     if (!isLoggedIn()) {
     $_SESSION['msg'] = "You must log in first";
     header('location: ../login.php');
     }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" /> 
  <title>ikodar</title>
  
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <link href="css/custom.css" rel="stylesheet" />
  
  <style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #5DA8EC;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
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
            <a class="nav-link" href="./payments.php">
              <p>Payments</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar   iiiii -->
      
       <!-- payment -->
      <h2>PAY</h2>
<p>   </p>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">
        <div class="row">
          
            
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            
          

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
          
        </div>
        
        <input type="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>

  <!--cart-->
  <div class="col-25">
    <div class="container">
    <div class="card-body">
      <!--head line cart-->
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>
      <?php 
      $query = "SELECT COUNT(status) FROM projects WHERE status='completed'";
      $result = $conn->query($query);
      $count = $result->fetch_assoc()['COUNT(status)'];

      echo $count;
      ?>
      
      
      
      </b></span></h4>
      <!--products cart-->
      <?php 
                  //retrieve data from project table
        $query = "SELECT * FROM projects";
        $results = $conn->query($query);
        if ($results->num_rows > 0) {
        //output data of each row
        while ($row = $results->fetch_assoc()) { 
          $date=date("Y-m-d");	
          if ($date<$row['biddate']){ ?>			
                  
                  <?php $name= $row['name']; ?>
                  <?php $amount= $row['amount']; ?>

                  
                  <?php echo '
                    <form action="existing.php" method="post">
                    <input type="hidden" name="name" value="'.$name.'">
                    <input type="hidden" amount="amount" value="'.$amount.'">
                        <tr>
                        <a href="#"><td>'.$name.'</td></a>
                        <span class="price"><td>'.$amount.'</td></span>
                        </tr>
                    </form>
                    ';?>
                  
          <?php   }
                      }

                        }else{
                      echo "0 results";
                      }
                    ?>
          
      
      
      <hr>
      <p>Total <span class="price" style="color:black"><b>
      <?php
      $email=$_SESSION['email'];
      $query = "SELECT SUM(amount) FROM projects WHERE status='completed' AND client='$email";
      $result = $conn->query($query);
      $count2 = $result->fetch_assoc()['SUM(amount)'];

      echo $count2;
      ?>
      
      
      
      </b></span></p>
    </div>
    </div>
  </div>
</div>
<!--payment end-->

      

            


            
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  
  
</body>

</html>
