<!-- Zachery Morris and Katharina Kemper -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <title>Guiding the Hoos</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    
  </head>

  <body>

    <!-- Must connect to the DB -->
    <?php require('../connect-db.php'); ?> 

    <!-- check if user has session -->
    <?php
      // We need to use sessions, so you should always start sessions using the below code.
      session_start();
      // If the user is not logged in redirect to the login page...
      if (!isset($_SESSION['loggedin'])) {
        header('Location: http://localhost/CS4640-ztm4qv-kk6ev-project/index.php');
        exit;
      }
    ?>

  <style>
      {
        margin:0;
        padding:0;
      }

      html, body {
        background: url(http://localhost/CS4640-ztm4qv-kk6ev-project/images/planeback3.png) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        height:100%;
      }

      #container{
        min-height:100%;
      }

      #main{
        overflow:auto;
        padding-bottom:50px;
      }

      .card{
        width: 60%;
        border-width: 2px;
        border-color: rgba(255, 255, 255, 0.527);
        background-color: rgba(255, 255, 255, 0.950);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        margin: auto;
        text-align: center;
      }

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
        color: lightgrey!important;
        display: block;
        transition: .3s background-color;
      }

      .navbar-nav a.active {
        background-color: #0B3F72 !important;
        cursor: default;
        color: white!important;
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
        width: 90%;
        border-radius:10px;
      }

      /* Website description */
      .edit-container{
        padding:0.01em 16px
      }
      .edit-center{
        text-align:center!important
      }
      .edit-content{
        max-width:980px;
        margin:auto
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

      #footer {
        position:relative;
        bottom: 0;
        width: 100%;
        height: 50px;
        background-color: #343A40;
        color:lightgrey;
        text-align: center;
        padding: 10px;
        margin-top:-50px;
        clear:both;
      }
    </style>

    <div id="container">
      <div id="main">
         <!-- Navigation bar -->
         <section>
          <nav class="navbar navbar-expand-md navbar-dark bg-dark">
              <ul class="navbar-nav mr-auto navbar-left">
                  <li class="navbar-brand"><img src="../images/small-logo.png" height="30" class="d-inline-block align-top" alt=""></li>
                  <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                  <li class="nav-item"><a class="nav-link" href="http://localhost/CS4640-ztm4qv-kk6ev-project/templates/organizations.php">Organizations</a></li>
                  <!-- <li class="nav-item"><a class="nav-link" href="http://localhost/CS4640-ztm4qv-kk6ev-project/templates/form.php">Add Organization</a></li> -->
                  <li class="nav-item"><a class="nav-link" href="http://localhost:4200/">Add Organization</a></li>
              </ul>

              <ul class="navbar-nav navbar-right">
                <li class="nav-item">
                  <a class="nav-link" href="profile.php"><?php echo $_SESSION['first_name'] . "'s Profile";?> </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">Sign out</a>
                </li>
              </ul>
          </nav>
        </section>
        
        <!-- Website description -->
        <div class="card">
          <section class="edit-container edit-center edit-content" style="max-width:600px">
            <br>
            <h2 class="edit-wide">Guiding the Hoos</h2>
            <p class="edit-opacity"><i>We love Grounds and want others to express their opinions!</i></p>
            <p class="edit-justify">We have created an informational website about organizations and clubs around Grounds. Guiding the Hoos is made for UVA students that need recommendations for student councils, greek life, and club sports - which just hits the surface of what we provide! A user can submit and view organizations, in hope to guide Hoos through a thoughful decision making process! </p>
          </section>

          <!-- Slide show -->
          <section sytle="padding-bottom:20px;">
            <img class="my-pics img-details" src="http://localhost/CS4640-ztm4qv-kk6ev-project/images/pic1.jpg" >
            <img class="my-pics img-details" src="http://localhost/CS4640-ztm4qv-kk6ev-project/images/pic-2.png" >  
          </section>
        </div>

      </div>
    </div>

    <footer class="primary-footer bg-dark" id="footer">
        <small class="copyright">&copy; Guiding the Hoos</small>
    </footer>
  </body>

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