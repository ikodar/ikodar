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
    <nav class="navbar navbar-default navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background:#0C1446;">
      <div class="container">
        <div class="navbar-header">
            <h4 style="color: white;">i-කෝඩර්</h4>
        </div>
          <ul class="nav navbar-nav navbar-right">
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
        <h3 style="padding-top:50px;">i-කෝඩර් We Connect You All</h3>
        <h4>Welcome To Freelancing and Crowdsourcing !</h4>
    </div>        
   
    <section id="about">
    <div class="container-fluid bg-2 text-center">
        <h2>About Us</h2>
        <h3>About what we do</h3>
      
   <div class="row text-center">
    <div class="col-md-12">
      <div id="carousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner px-5 py-5">
        <div class="carousel-item active ">
          <img class="d-inline-block w-100" style="width: 100px; height: 400px;" src="img/web.jpg" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <h5><strong>Website Development</strong></h5>
            <p>Yes, we built creatuve websites which suit your needs.</p>
          </div>
       </div>
   
      <div class="carousel-item">
         <img class="d-inline-block w-100" style="width: 100px; height: 400px;" src="img/system.jpg" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            <h5><strong>System Development</strong></h>
            <p>Yes, we built efficient systems which suit your differing needs.</p>
          </div>
      </div>

       <div class="carousel-item">
          <img class="d-inline-block w-100" style="width: 100px; height: 400px;" src="img/graphic.jpg" alt="Third slide">
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
  </section>    


    <section id="projects">
    <div class="container-fluid bg-5 text-center">
        <h2>Our Projects</h2>
        <div class="container">
          <div class="row text-center">
            <table class="table" style="padding-left:100px; padding-right:100px;">
                <thead class="thead-dark text-primary">
                  <tr>
                    <th width="18%">ID</th>
                    <th width="18%">Name</th>
                    <th width="18%">Description</th>
                    <th width="18%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    //retrieve data from project table
                    $query = "SELECT * FROM projects";
                    $results = $conn->query($query);
                    if ($results->num_rows > 0){
                      //output data of each row
                      while ($row = $results->fetch_assoc()) { 
                          if ($row['status']=="new"){ ?>			
                            <tr>
                                <td><?php echo $row['pid']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td style="float:center">
                                  <div class="input-group" >
                                    <div style="padding-right:20px;">
                                      <a class="btn btn-primary" href="view.php" role="button" name="view_btn">View</a>
                                    </div>
                                    <div>
                                      <a class="btn btn-primary" href="login.php" role="button">Bid</a>
                                    </div>
                                  </div>
                                </td>
                            </tr>
                    <?php   }
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