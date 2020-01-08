<?php include('functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootsrap-grid.css">
  <link rel="stylesheet" type="text/css" href="css/bootsrap-grid.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootsrap-reboot.css">
  <link rel="stylesheet" type="text/css" href="css/bootsrap-reboot.min.css">
  <link rel="stylesheet" type="text/css" href="css/register.css">

  <script src="jquery/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</head>

<body style="background:#DDFFE7;">
      <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background:#0C1446;">
        <div class="container">
          <a class="navbar-brand js-scroll-trigger" href="#page-top">i-කෝඩර් </a>
        </div>
    </nav>

  <div class="login-box">
    <form class="" method="post" action="register.php">
    <h1><center>Sign Up</center></h1>
    <div class="radiobox">
      <h5>User Type:</h5>
      <input type="radio" name="user_type" value="client" required> Client  
      <input type="radio" name="user_type" value="IT"> IT individual
    </div>
    <div class="textbox">
      <input type="email" placeholder="email" name="email" value="" required>
      <span class="error"><?php echo $emailErr;?></span>
    </div>
    <div class="textbox">
      <input type="password" placeholder="password" name="password_1" value="" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
      title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters."required>
    </div>
    <!--<div id="message">
      <h3>Password must contain the following:</h3>
      <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
      <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
      <p id="number" class="invalid">A <b>number</b></p>
      <p id="length" class="invalid">Minimum <b>8 characters</b></p>
    </div>-->
    <div class="textbox">
      <input type="password" placeholder="confirm password" name="password_2" value="" required>
      <span class="error"><?php echo $passwordErr;?></span>
    </div>
    <input class="btn" type="submit" name="register_btn" value="Create Account">
    Already have an account? <a href="login.php">Sign In</a>
    </form>
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

</body>
</html>