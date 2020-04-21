<!-- Zachery Morris and Katharina Kemper -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <title>Guiding the Hoos</title>

  <!-- <link rel="stylesheet" type="text/css" href="http://localhost/CS4640-ztm4qv-kk6ev-project/css/organizations.css"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
  <body>

    <!-- must connect to the DB -->
    <?php 
      include('../connect-db.php');
      require('../connect-db.php');
      require('../todo-db.php');
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
      position: relative;
      height:100%;
    }

    #container{
      min-height:100%;
    }

    #main{
      overflow:auto;
      padding-bottom:50px;
    }

    .img-cards {
      width: 100%;
      height: 150px;
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

    input[type=text] {
    width: 130px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
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

    input[type=text]:focus {
      width: 40%;
    }

    /* Style the search box inside the navigation bar */
    .navbar-nav input[type=text] {
      float: right;
      padding: 5px 5px;
      border: none;
      margin-top: 2px;
      font-size: 15px;
      width:220px;
      background-color:#F9F9F9;
    }

    .navbar-nav .search-container button {
  float: right;
  padding: 5px 10px;
  margin-top: 2px;
  background: #0B3F72;
  font-size: 17px;
  border: none;
  cursor: pointer;
  color:#F9F9F9;
}

.navbar-nav .search-container button:hover {
  background: #0B3F72;
  color:white;
}

    /* When the screen is less than 600px wide, stack the links and the search field vertically instead of horizontally */
    @media screen and (max-width: 900px) {
      .navbar-nav a, .navbar-nav input[type=text] {
        float: none;
        display: block;
        text-align: left;
        width: 100%;
        margin: 0;
        padding: 14px;
      }
      .navbar-nav input[type=text] {
        border: 1px solid #ccc;
      }
    }
    
    h2{
        color: #0B3F72;
        padding:7px;
      }
    #title2 {
      color: #259DDD;
      font-size: 15px;
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

  <div id="container">
    <div id="main">

      <!-- Navigation bar -->
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <ul class="navbar-nav mr-auto navbar-left">
            <li class="navbar-brand"><img style="" src="../images/small-logo.png" height="30px" class="d-inline-block align-top" alt=""></li>
            <li class="nav-item"><a class="nav-link" href="http://localhost/CS4640-ztm4qv-kk6ev-project/templates/homepage-after-login.php">Home</a></li>
            <li class="nav-item"><a class="nav-link active" href="#">Organizations</a></li>
            <li class="nav-item"><a class="nav-link" href="http://localhost/CS4640-ztm4qv-kk6ev-project/templates/form.php">Add Organization</a></li>            
        </ul>

        <ul class="navbar-nav navbar-right">
          <li class="nav-item">
          <div class="search-container">
            <form  method="GET"  id="searchform"> 
              <input  type="text" name="name" placeholder="Search for organization name..."> 
              <button type="submit" name="search"><i class="fa fa-search"></i></button> 
            </form>
            </div>  
          </li>

          <li class="nav-item">
            <a class="nav-link" href="profile.php"><?php echo $_SESSION['first_name'] . "'s Profile";?> </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="logout.php">Sign out</a>
          </li>
       </ul>
      </nav>

      <p style="text-align:center; color:#0B3F72; font-size:20px; font-weight:600;"><?php searchbar();?></p>

      <?php
        function searchbar(){
          if($_SERVER['REQUEST_METHOD'] == 'GET'){
            if (isset($_GET['search'])) {
              global $db;
              $value = $_GET["name"];
              $query = "SELECT * FROM table5 WHERE org_name='$value'";
              $statement = $db->prepare($query);
              $statement->execute();
              $results = $statement->fetch();
              if (($results) == NULL){
                echo '<br>' . 'Your search of ' . '<strong>' . $value . '</strong>' . " is not an organization.";
              }
              else{
                echo '<br>' . 'Your search of ' . '<strong>' . $value . '</strong>' . " is an organization.";
              }
              $statement->closecursor();
            }
          }
        }

        $stmt = $db->query("SELECT * FROM `table5`");
        while ($row = $stmt->fetch()) {
          ?>
          <?php $pieces = explode("/",$row['days']); 
            $times = explode("/",$row['times']); 
            foreach ($times as $key=>$value) {if(empty($value)) unset($times[$key]); }
            foreach ($pieces as $key=>$value) {if(empty($value)) unset($pieces[$key]); }
            $finaltimes =array_merge($pieces,$times);
            $mergedArray = array();
              while( count($pieces) > 0 || count($times) > 0 ){
                if ( count($pieces) > 0 )
                $mergedArray[] = array_shift($pieces);
                if ( count($times) > 0 )
                $mergedArray[] = array_shift($times);
              }
            $key = 1;
            $lastkey = count($mergedArray);
            ?>

          <!-- Cards -->
          <section style="padding-left: 14%;">
              <div class="wrapper">
                  <div class="tile job-bucket">
                    <div class="front">
                      <div class="contents">
                        <img class="img-cards" src="../uploadedimages/<?php if ($row[6] == NULL) echo 'noimage.jpg'; else{echo ($row[6]);} ?>" />
                        <h3><?php echo $row['org_name']; ?></h3>
                        <p><?php echo $row['about']; ?></p>
                      </div>
                    </div>
                    <div class="back">
                      <h2><?php echo $row['org_name']; ?></h2>
                      <hr>
                      <a style = "text-decoration:underline; font-size:20px;"> Contact:</a>
                      <div id="title2"><?php echo $row['user_email']; ?></div>
                      <a style = "text-decoration:underline; font-size:20px;"> Meeting Days: </a>
                      <div id="title2">
                      <?php foreach($mergedArray as $value){
                        if($key%2){
                          if($key==$lastkey){ echo $value;}
                          else{ echo $value." ";}
                        }
                        else{
                          if($key==$lastkey){ echo $value."</br>";}
                          else{ echo $value."</br>";}}
                        $key++;} ?>
                        </div>
                      <a style = "text-decoration:underline; font-size:20px;">Dues:</a>
                      <div id="title2"><?php echo $row['dues']; ?></div>
                      <a style = "text-decoration:underline; font-size:20px;">Location:</a>
                      <div id="title2"><?php echo $row['locations']; ?></div>
                    </div>
                  </div>
                </div>
              </section>
              <?php }
            $stmt->closecursor(); ?>
          </div>
        </div>
        
        <!-- footer -->
        <footer class="primary-footer bg-dark" id="footer">
          <small class="copyright">&copy; Guiding the Hoos</small>
        </footer>

<style>
.tile {
  width: 250px;
  height: 400px;
  margin: 2em;
  position: relative;
  float: left;
  border: 3px #0B3F72 solid;
  border-color: #0B3F72;
}
  .tile .front, .back {
    display: block;
    top: 0; bottom: 0;
    left: 0; right: 0;
    width: 250px;
    height: 400px;
    position: absolute;
    overflow: hidden;
    text-align: center;
  }
  h3, p, a {
    padding: 0 20px;
  }
  /* img {
    /* max-height: 180 px; */
    /* height: auto; */
    /* max-width: 180px; */
    /* size:100%; */


    /* size:100%; */
    /* width: 100%; } */
  .front {
    background:rgb(243, 243, 243);
    transition: all .5s ease-in-out;
    z-index: 2;
  }
    .front h3 {
      font-size: 2em;
      color: #fff;
      text-shadow: 0 0 5px #000;
      margin-top: -1.5em;
      margin-bottom: 1.5em;
    }

  .back {
    background:rgb(243, 243, 243);
    color: rgb(11,63,114);
    z-index: 1;
    padding-top: 25px;
    height: 400px;
  }
    .back h3 {
      font-size: 25px;
      color: rgb(11,63,114);
      margin-top: 0.5em;
      margin-bottom: 1em;
    }
    .back a {
      display: block;
      font-size: 1em;
      color: rgb(11,63,114);
      margin: 0 20px;
      padding: .5em 0;
    }

    .front:hover {
      top: -400px;
      transform: rotate(4deg);
    }
</style>

    </body>
</html>