<?php 
  include('functions.php');
	if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
  header('location: ../login.php');
  
  }

  //retrieve current data 
  $email=$_SESSION['email'];
  $sql = "SELECT * FROM users WHERE email='$email'";
	$results=$conn->query($sql);
  $row = $results->fetch_assoc();

  $firstname  =  $row['firstname'];
  $lastname = $row['lastname'];
  $address  =  $row['address'];

?>
 <!DOCTYPE html>
 <html lang="en">
 
 <head>
   <meta charset="utf-8" />
   <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
   <link rel="icon" type="image/png" href="../assets/img/favicon.png">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <title>
     myprofile 
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
     <!--Dashboard panel-->
    <div class="sidebar" data-color="azure" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
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
            <p class="navbar-brand">My Profile</p> <!--CHECK THE HREF HERE-->
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
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
       <div class="content" style="width:1500px">
         <div class="container-fluid" style="width:1500px">
         <!--  <div class="row">-->
             <div class="col-lg-6 col-md-12">
               <div class="card">
                 <div class="card-header card-header-primary">
                  <h4 class="card-title">Profile Details</h4>                   
                 </div>
                 <div class="card-body">
                   <form method="post" action="profile.php"  >
                     <div class="row">
                       <div class="col-md-4">
                         <div class="form-group">
                           <label class="bmd-label-floating" >Email address</label>
                           <?php echo $_SESSION['email'];?>
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-6">
                         <div class="form-group">
                           <label class="bmd-label-floating">First Name</label>
                           <input name="firstname" type="text" class="form-control" value="<?php echo $firstname?>">
                         </div>
                       </div>
                       <div class="col-md-6">
                         <div class="form-group">
                           <label class="bmd-label-floating">Last Name</label>
                           <input name="lastname" type="text" class="form-control" value="<?php echo $lastname?>">
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-12">
                         <div class="form-group">
                           <label class="bmd-label-floating">Adress</label>
                           <input name="address" type="text" class="form-control" value="<?php echo $address?>">
                         </div>
                       </div>
                     </div> 
                     <div class="col-md-12">
                        <input class="btn btn-primary pull-right" type="submit" name="save_btn" value="SAVE"> 
                     </div>
                  </form>
                 </div>
               </div>
               <div class="card">
                 <div class="card-header card-header-primary">
                  <h4 class="card-title">Change Password</h4>                   
                 </div>
                 <div class="card-body">
                   <form method="post" action="profile.php">
                     <div class="row">
                       <div class="col-md-6">
                         <div class="form-group">
                           <label class="bmd-label-floating">Current Password</label>
                           <input name="oldpass" type="password" class="form-control" required>
                           <span class="error"><?php echo $passwordErr1;?></span>
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-6">
                         <div class="form-group">
                           <label class="bmd-label-floating">New Password</label>
                           <input name="password1" type="password" class="form-control" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters." required>
                         </div>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col-md-6">
                         <div class="form-group">
                           <label class="bmd-label-floating">Confirm Password</label>
                           <input name="password2" type="password" class="form-control" required>
                           <span class="error"><?php echo $passwordErr;?></span>
                         </div>
                       </div>
                     </div>
                     <div class="col-md-12">
                        <input class="btn btn-primary pull-right" type="submit" name="update_btn" value="UPDATE"> 
                     </div>
                  </form>
                 </div>
               </div>
             </div>
             </div>

             <script>
    var myInput = document.getElementById("psw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
      document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
      document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      if(myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }

      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if(myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
      }

      // Validate numbers
      var numbers = /[0-9]/g;
      if(myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
      }

      // Validate length
      if(myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
      }
    }
  </script>


   <!--   Core JS Files   -->
   <script src="../assets/js/core/jquery.min.js"></script>
   <script src="../assets/js/core/popper.min.js"></script>
   <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
   <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  
</body>
</html>
