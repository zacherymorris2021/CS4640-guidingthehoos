<!-- Zachery Morris and Katharina Kemper -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <title>Guiding the Hoos</title>

  <link rel="stylesheet" type="text/css" href="http://localhost/CS4640-ztm4qv-kk6ev-project/css/organizations.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

</head>

  <body>

  <!-- Must connect to the DB -->
  <?php require('../connect-db.php'); ?> 

    <!-- Navigation bar -->

        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <ul class="navbar-nav mr-auto navbar-left">
                <li class="navbar-brand"><img src="../images/small-logo.png" height="30" class="d-inline-block align-top" alt=""></li>
                <li class="nav-item"><a class="nav-link" href="http://localhost/CS4640-ztm4qv-kk6ev-project/templates/homepage-after-login.php">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">Organizations</a></li>
                <li class="nav-item"><a class="nav-link" href="http://localhost/CS4640-ztm4qv-kk6ev-project/templates/form.php">Add Organization</a></li>
            </ul>
            <ul class="navbar-nav navbar-right">
            <li class="nav-item" style="padding-top:3.5px">
            <form action="" method = "GET" style="padding-right: 10px">
                <input width=align="right" class="form-control" type ="text" name= 'q' placeholder="Search Website..." value = "">
            </form>
            </li>
                <li class="nav-item">
                <a class="nav-link" href="../index.php" onclick="signOut();">Sign out</a>
                </li>
            </ul>
        </nav>

    <!-- Cards -->
    <section style="padding-left: 14%;">
        <div class="wrapper">
            <div class="tile job-bucket">
              <div class="front">
                <div class="contents">
                  <img src="http://localhost/CS4640-ztm4qv-kk6ev-project/images/esc1.png"/>
                  <h3>ESC</h3>
                  <p>"Engineering Student Council (ESC) is a Special Status Organization of the University of Virginia and the representative body for undergraduate students of the School of Engineering and Applied Science (SEAS). "</p>
                </div>
              </div>
              <div class="back">
                <h3>Engineering Student Council</h3>
                <a> Contact: Allison Horenburg (aav56@virginia.edu)</a>
                <a> Meeting: Wednesday 19:00</a>
                <a>Dues: $0</a>
                <a>Location: Thornton Hall - Rodman Room</a>
              </div>
            </div>
            <div class="tile job-bucket">
              <div class="front">
                <div class="contents">
                  <img src="http://localhost/CS4640-ztm4qv-kk6ev-project/images/theta2.png"/>
                  <h3>Theta Tau</h3>
                  <p>"Theta Tau strives to promote professional development, service, and brotherhood among its memebers. Events are held throughout the semester to achieve this like food drives, challah for hunger, and a bake sale."</p>
                </div>
              </div>
              <div class="back">
                <h3>Theta Tau</h3>
                <a> Contact: Eddie Moder (edv56@virginia.edu)</a>
                <a> Meeting: Sunday 12:00</a>
                <a>Dues: $250</a>
                <a>Location: Thornton Hall - E316</a>
              </div>
            </div>
            <div class="tile job-bucket">
              <div class="front">
                <div class="contents">
                  <img src="http://localhost/CS4640-ztm4qv-kk6ev-project/images/shpe.jpeg"/>
                  <h3>SPHE</h3>
                  <p>"Our mission is to promote engineering in the Hispanic/Latino community through recruitment and retention, support diversity in the community, and encourage academic, and professional growth among our members."</p>
                </div>
              </div>
              <div class="back">
                <h3>SHPE</h3>
                <a> Contact: Kathryn Waston (aerfc6@virginia.edu)</a>
                <a> Meeting: Wednesday 13:00</a>
                <a>Dues: $20</a>
                <a>Location: Mech Bld</a>
              </div>
            </div>
          </div>
        </section>

    <!-- Footer -->
    <footer class=" footer">
        <a href="#"><i class="fa fa-facebook-official"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-flickr"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
      </footer>
    </body>

  <style>
    /* Navigation bar */
    .nav-item a:hover {
      color: rgb(255, 255, 255) !important;
      cursor: pointer;
    }

    .navbar-nav a:hover{
      background-color: #0B3F72;
      color: #000000;
    }

    .navbar-nav li {
      font-family: "Open Sans", sans-serif;
      font-size: 1em;
      line-height: 30px;
      padding-right: 3px;
      padding-left: 3px;
    }

    .navbar-nav a {
      text-decoration: none !important;
      color: #fff;
      display: block;
      transition: .3s background-color;
    }

    .navbar-nav a.active {
      background-color: #0B3F72 !important;
      cursor: default;
    }

    .navbar-nav li.active{
      background-color: #0B3F72 !important;
      cursor: default;
    }

    /* Slideshow */
    .img-details{
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 50%;
    }

    .footer {
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #343A40;
    color: white;
    text-align: center;
    padding-top: 7px;
    padding-bottom: 7px;
    }
  </style>
</html>