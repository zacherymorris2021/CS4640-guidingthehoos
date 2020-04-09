<!-- Zachery Morris and Katharina Kemper -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/js/index.js"></script>

  <title>Guiding the Hoos</title>

  <link rel="stylesheet" type="text/css" href="/css/homepage-after-login.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

</head>
  <body>

    <!-- Must connect to the DB -->
    <?php require('../connect-db.php'); ?> 

    <!-- Navigation bar -->
    <section>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
          <ul class="navbar-nav mr-auto navbar-left">
              <li class="navbar-brand"><img src="../images/small-logo.png" height="30" class="d-inline-block align-top" alt=""></li>
              <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="http://localhost/CS4640-ztm4qv-kk6ev-project/templates/organizations.php">Organizations</a></li>
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
    </section>

    <!-- Website description -->
    <section class="edit-container edit-center edit-content" style="max-width:600px">
      <br><br>
      <h2 class="edit-wide">Guiding the Hoos</h2>
      <p class="edit-opacity"><i>We love Grounds and want others to express their opinions!</i></p>
      <p class="edit-justify">We have created an informational website about organizations, food places, and study spots around Grounds. Guiding the Hoos is made for UVA students that need recommendations for clubs to join, best study spots, and the tastiest food locations! Users can submit and view these different categories to make more well informed decisons.</p>
    </section>

    <!-- Slide show -->
    <section>
      <img class="my-pics img-details" src="http://localhost/CS4640-ztm4qv-kk6ev-project/images/pic-1.jpg" >
      <img class="my-pics img-details" src="http://localhost/CS4640-ztm4qv-kk6ev-project/images/pic-2.png" >
      <br><br>
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

    /* Website description */
    .edit-container{
      padding:0.01em 16px
    }
    .edit-center{
      text-align:center!important
    }
    .edit-content{
      max-width:980px;margin:auto
    }
    .edit-wide{
      font-family:"Segoe UI",Arial,sans-serif;
      letter-spacing:4px;
    }
    .edit-opacity{
      opacity:0.60;
    }
    .edit-justify{
      text-align:justify!important
    }

    /* footer */
    .footer {
        position: relative;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #343A40;
        color: white;
        text-align: center;
        padding-top: 7px;
        padding-bottom: 7px;
        letter-spacing: 20px;
      }
  </style>

  <script>
    // Slideshow - image change's every 4 seconds
    var index = 0;
    slideshow();
    function slideshow() {
      var i;
      var x = document.getElementsByClassName("my-pics");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      index++;

      if (index > x.length) {
        index = 1
      }

      x[index-1].style.display = "block";
      setTimeout(slideshow, 4000);
    }
  </script>
</html>