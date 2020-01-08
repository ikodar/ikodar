<?php include('functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

	<title>Home</title>

	  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootsrap-grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootsrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootsrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="css/bootsrap-reboot.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">

    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>
<body id="page-top" style="background:#DDFFE7;">

    <!-- Navigation bar-->
    <nav class="navbar navbar-default navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background:#0C1446;">
      <div class="container">
        <div class="navbar-header">
            <h4 style="color: white;">i-කෝඩර්</h4>
        </div>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#page-top">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#contact">Contact us</a></li>
            <li><a href="login.php">Sign in</a></li>
            <li><a href="register.php">Sign up</a></li>
          </ul>
      </div>
    </nav>
    <!-- End of navigation bar-->

    <div class="container-fluid bg-1 text-center">
        <h3>i-කෝඩර් We Connect You All</h3>
        <h4>Welcome To Freelancing and Crowdsourcing !</h4>
    </div>        
   
    <section id="about">
    <div class="container-fluid bg-2 text-center">
        <h2>About Us</h2>
        <h3>About what we do</h3>
        <div class="row text-center">
            <div class="col-sm-4">
              <div class="thumbnail">
                <img src="img/web.jpg" alt="Image">
                <p><strong>Website Development</strong></p>
                <p>Yes, we built creatuve websites which suit your needs.</p>
              </div>
            </div>

             <div class="col-sm-4">
              <div class="thumbnail">
                <img src="img/system.jpg" alt="Image">
                <p><strong>System Development</strong></p>
                <p>Yes, we built efficient systems which suit your differing needs.</p>
              </div>
            </div>
        
            <div class="col-sm-4">
              <div class="thumbnail">
                <img src="img/graphic.jpg" alt="Image">
                <p><strong>Graphic Design</strong></p>
                <p>Yes, we do the graphic designs which will stun you and go beyind your expectations.</p>
              </div>
            </div>
        </div>
    </div>
    </section>    

    <section id="contact">
    <div class="container-fluid bg-3 text-center">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="text-center title">Contact us</h2>
            <h4 class="text-center description">Write a few lines about any clarifications you need. We will respond and get back to you in a couple of hours.</h4>
            <form class="contact-form" method="post" action="index.php">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Your Name" name="name">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <textarea class="form-control" rows="4" id="exampleMessage" placeholder="Enter your message." name="message" required></textarea>
              </div>
              <div class="row">
                <div class="col-md-4 ml-auto mr-auto text-center">
                  <input type="submit" class="btn btn-primary btn-raised" name="message_btn" value="Send Message">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>

    <footer class="container-fluid bg-4 text-center">
    </footer>

</body>
</html>