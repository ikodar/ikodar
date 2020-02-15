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
    

    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

</head>
<body id="page-top" style="background:#DDFFE7;">

    <!-- Navigation bar-->
    <nav class="navbar navbar-default navbar-expand-lg navbar-light fixed-top" id="mainNav" style="background:black;">
      <div class="container">
        <div class="navbar-header">
            <h4 style="color: white;">i-කෝඩර්</h4>
        </div>
          <ul class="nav navbar-nav navbar-right" >
            <li style="padding-left:20px;"><a href="#page-top">Home</a></li>
            <li style="padding-left:20px;"><a href="#about">About Us</a></li>
            <li style="padding-left:20px;"><a href="#projects">Projects</a></li>
            <li style="padding-left:20px;"><a href="#contact">Contact us</a></li>
            <li style="padding-left:20px;"><a href="login.php">Sign in</a></li>
            <li style="padding-left:20px;"><a href="register.php">Sign up</a></li>
          </ul>
      </div>
    </nav>
    <!-- End of navigation bar-->

<div class="container-fluid bg-1 text-center">
    <div class="row header">
	<div class="col-lg-4">
			<div class="container text-center" style = "padding-top: 70px;">
        <h3>i-කෝඩර් We Connect You All</h3>
        <h4>Welcome To Freelancing and Crowdsourcing !</h4><br/>
				<p>Remember, time is money. Use it properly. Do not waste your time thinking when others are getting things done here.</p>
				<a href="Register.php" class="btn btn-warning btn-lg">It's Free!! Join Now!!!</a>
				<p></p>
				<div class="btn-group">
					<a href="#how" type="button" class="btn btn-info">How it works</a>
					<a href="#faq" type="button" class="btn btn-light">FAQ</a>
					<a href="#category" type="button" class="btn btn-info">Catagories</a>
				</div>
			</div>
		</div>	
	
  
    <div class="col-lg-8">
      <div id="carousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner ">
        <div class="carousel-item active ">
          <img class="d-inline-block w-100" style="width: 120px; height: 500px;" src="img/web.jpg" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <h5><strong>Website Development</strong></h5>
            <p>Yes, we built creatuve websites which suit your needs.</p>
          </div>
       </div>
   
      <div class="carousel-item">
         <img class="d-inline-block w-100" style="width: 120px; height: 500px;" src="img/system.jpg" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            <h5><strong>System Development</strong></h>
            <p>Yes, we built efficient systems which suit your differing needs.</p>
          </div>
      </div>

       <div class="carousel-item">
          <img class="d-inline-block w-100" style="width: 120px; height: 500px;" src="img/graphic.jpg" alt="Third slide">
          <div class="carousel-caption d-none d-md-block">
            <p><strong>Graphic Design</strong></p>
            <p>Yes, we do the graphic designs which will stun you and go beyind your expectations.</p>
          </div>
        </div>
      </div>

      <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      </div>
    </div>
    </div>
    </div>
    
    

  <div style="background:#cce5ff">
<div class="container fluid text-center" style="padding:5%;">
<div class="row header">

		<div class=" card" style="padding:40px 80px 40px 80px;margin-top:15px;box-shadow: 4px 4px 2px 5px rgba(0, 0, 0, 0.2), 0 6px 0px 0 rgba(0, 0, 0, 0.19);background:#fff">
			<h1>Need works done?</h1>
			<p>It's easy. Simply post a job you need completed and receive competitive bids from freelancers within minutes. Whatever your needs, there will be a freelancer to get it done: from web design, mobile app development, virtual assistants, product manufacturing, and graphic design (and a whole lot more). It is the simplest and safest way to get work done online.</p>
			
			<a href="login.php" class="btn btn-primary btn-lg" style="background-color:#0d3f6e">Get Started</a>
    </div>
    
		<div class=" card" style="padding:40px 80px 40px 80px;margin-top:15px;box-shadow: 4px 4px 2px 5px rgba(0, 0, 0, 0.2), 0 6px 0px 0 rgba(0, 0, 0, 0.19);background:#fff">
			<h1>Looking for work?</h1>
			<p>If you are an expert in any kind of computer related or online work, then do not hesitate to join our platform. It is easy to use and payment is secured. It is a great platform to those people who are skillful. So do not miss the chance to explore the job posts and make some money.</p>
			<p></p>
			<a href="login.php" class="btn btn-primary btn-lg" style="background-color:#0d3f6e">Get Started</a>
		</div>
	</div>
</div>
</div>



    <section id="projects">
    <div class="container-fluid bg-5 text-center" style="color:black;">
        <h2>Latest Projects</h2><br/><br/>
        <div class="row">
          
          <?php 
          /* Show any 4 random job post
           * 
           * Store sql query result in $result variable and loop through it if we have any rows
           * returned from database. $result->num_rows will return total number of rows returned from database.
          */
          $sql = "SELECT * FROM projects Order By Rand() Limit 4";
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
            {
             ?>
            <div class="col-md-6 fixHeight">             
              <h3><?php echo $row['name']; ?></h3>
              <p><?php echo $row['description']; ?></p>
              <a href="login.php" button type="button" class="btn btn-outline-dark">View</button></a>
             
            </div>
          <?php
            }
          }
          ?>
       
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
                  <input type="submit" class="btn btn-primary btn-raised" name="message_btn" value="Send Message" >
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