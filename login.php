<?php include('functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootsrap-grid.css">
  <link rel="stylesheet" type="text/css" href="css/bootsrap-grid.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootsrap-reboot.css">
  <link rel="stylesheet" type="text/css" href="css/bootsrap-reboot.min.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">

</head>

<body style="background:#DDFFE7;">
      <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background:#0C1446;">
        <div class="container">
          <a class="navbar-brand js-scroll-trigger" href="#page-top">i-කෝඩර් </a>
        </div>
    </nav>

  <div class="login-box">
    <form method="post" action="">
    <h1><center>Login</center></h1>
    <div class="textbox">
      <i class="fa fa-user" aria-hidden="true"></i>
      <input type="email" placeholder="email" name="email" value="" required>
    </div>
    <div class="textbox">
      <i class="fa fa-lock" aria-hidden="true"></i>
      <input type="password" placeholder="password" name="password_1" value="" required>
      <span class="error"><?php echo $passwordErr;?></span>
    </div>
    <input class="btn" type="submit" name="login_btn" value="Sign in">
    Don't have an account? <a href="register.php">Sign Up</a>
    </form>
  </div>

</body>
</html>