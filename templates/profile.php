<!-- Zachery Morris and Katharina Kemper -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/js/index.js"></script>

  <title>Guiding the Hoos</title>

  <link rel="stylesheet" type="text/css" href="/css/homepage-after-login.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 

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
      }

      .navbar-nav li.active{
        background-color: #0B3F72 !important;
        cursor: default;
      }

      /* profile card */
      .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 550px;
        margin: auto;
        text-align: center;
        margin-top:5%;
      }

      .title1 {
        color: #0B3F72;
        font-size: 20px;
        font-weight: 600;
      }

      .title2 {
        color: #259DDD;
        font-size: 20px;
      }

      .oneline{
        display:inline;
        padding: 5px;
      }

      button {
        border: none;
        outline: 0;
        display: inline-block;
        padding: 8px;
        color: white;
        background-color: #0B3F72;
        text-align: center;
        cursor: pointer;
        width: 75%;
        font-size: 18px;
        margin:auto;
      }

      button:hover {
        opacity:0.8;
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
      }

      h1{
        color: #0B3F72;
        padding:7px;
      }

      hr {
        color: #0B3F72; 
        padding:0px;
        margin:0px;
        border: 0;
        height: 1px;
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
      }


    </style>

    <!-- Navigation bar -->
    <section>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
          <ul class="navbar-nav mr-auto navbar-left">
              <li class="navbar-brand"><img src="../images/small-logo.png" height="30" class="d-inline-block align-top" alt=""></li>
              <li class="nav-item"><a class="nav-link" href="http://localhost/CS4640-ztm4qv-kk6ev-project/templates/homepage-after-login.php">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="http://localhost/CS4640-ztm4qv-kk6ev-project/templates/organizations.php">Organizations</a></li>
              <li class="nav-item"><a class="nav-link" href="http://localhost/CS4640-ztm4qv-kk6ev-project/templates/form.php">Add Organization</a></li>
          </ul>

          <ul class="navbar-nav navbar-right">
            <li class="nav-item">
              <a class="nav-link active" href="profile.php"><?php echo $_SESSION['first_name'] . "'s Profile";?> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Sign out</a>
            </li>
          </ul>
      </nav>
    </section>

    <!-- profile card -->
    <section>
      <div class="card">
        <!-- <img src="img.jpg" style="width:100%"> -->
        <h1>Welcome to your profile!</h1>

        <hr>

        <div class="oneline" style="padding-top:15px;"> 
          <span class="title1">First Name:</span> 
          <span class="title2"><?php echo $_SESSION['first_name'];?></span>
        </div>

        <div class="oneline"> 
          <span class="title1">Last Name:</span> 
          <span class="title2"><?php echo $_SESSION['last_name'];?></span>
        </div>

        <div class="oneline"> 
          <span class="title1">Email:</span> 
          <span class="title2"><?php echo $_SESSION['email'];?></span>
        </div>

        <div class="oneline" style="padding-bottom:15px;"> 
          <span class="title1">Year:</span> 
          <span class="title2"><?php echo $_SESSION['year'];?></span>
        </div>

        <button onclick="window.location.href = 'http://localhost/CS4640-ztm4qv-kk6ev-project/templates/edit-user-info.php';">Edit Info</button> <br>
      </div>
    </section>

  </body>
</html>