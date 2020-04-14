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
            <form  method="GET"  id="searchform"> 
              <input  type="text" name="name" placeholder="Search for organization name..."> 
              <input  type="submit" name="search" value="search"> 
            </form>  
          </li>

          <li class="nav-item">
            <a class="nav-link" href="profile.php"><?php echo $_SESSION['first_name'] . "'s Profile";?> </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="logout.php">Sign out</a>
          </li>
       </ul>
      </nav>

      <p style="text-align:center;"><?php searchbar(); ?></p>

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
                echo $value." is not an organization.";
              }
              else{
                echo $value." is an organization.";
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
                      <h3 ><?php echo $row['org_name']; ?></h3>
                      <a style = "text-decoration: underline;"> Contact:</a>
                      <?php echo $row['user_email']; ?>
                      <a style = "text-decoration: underline;"> Meeting Days: </a>
                      <?php foreach($mergedArray as $value){
                        if($key%2){
                          if($key==$lastkey){ echo $value;}
                          else{ echo $value." ";}
                        }
                        else{
                          if($key==$lastkey){ echo $value."</br>";}
                          else{ echo $value."</br>";}}
                        $key++;} ?>
                      <a style = "text-decoration: underline;">Dues</a>
                      <?php echo $row['dues']; ?>
                      <a style = "text-decoration: underline;">Location</a>
                      <?php echo $row['locations']; ?>
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

    </body>
</html>