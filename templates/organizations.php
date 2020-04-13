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
    ?> 
    

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
  img {
    /* max-height: 180px; */
    /* size:100%; */
    width: 100%;
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
    }

    .navbar-nav li.active{
      background-color: #0B3F72 !important;
      cursor: default;
    }

  </style>
   <!-- Navigation bar -->

   <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <ul class="navbar-nav mr-auto navbar-left">
                <li class="navbar-brand"><img src="../images/small-logo.png" height="30" class="d-inline-block align-top" alt=""></li>
                <li class="nav-item"><a class="nav-link" href="http://localhost/CS4640-ztm4qv-kk6ev-project/templates/homepage-after-login.php">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">Organizations</a></li>
                <li class="nav-item"><a class="nav-link" href="http://localhost/CS4640-ztm4qv-kk6ev-project/templates/form.php">Add Organization</a></li>
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
  <?php
  //   if($query = $db->prepare('SELECT id, password FROM users WHERE email = :email')){
      
  // $query->bindValue(':email', $email);
  // $query->execute();
  $num_rows = 0;
  $data = getAllTasks();
  //for row in $data:
  $num_rows =  count($data);
  foreach($data as $row){
   // echo "$row[1]";
  }
  $stmt = $db->query("SELECT * FROM `table5`");
  while ($row = $stmt->fetch()) {
    ?>
<?php
$dir = '../uploadedimages/';
$filenames = scandir($dir);
?>

    <!-- Cards -->
    <section style="padding-left: 14%;">
        <div class="wrapper">
            <div class="tile job-bucket">
              <div class="front">
                <div class="contents">
                  <img src="../uploadedimages/<?php echo ($row[6]); ?>" />
                  <h3><?php echo $row['org_name']; ?></h3>
                  <p><?php echo $row['about']; ?></p>
                </div>
              </div>
              <div class="back">
                <h3><?php echo $row['org_name']; ?></h3>
                <a> Contact: <?php echo $row['user_email']; ?></a>
                <?php $pieces = explode("/",$row['days']); ?>
                <a> Meeting: <?php foreach ($pieces as $item){ echo "<li>$item"; }?></a>
                <?php $times = explode("/",$row['times']); ?>
                <?php $finaltimes =array_merge($pieces,$times);?>
                <a> Tests: <?php foreach ($finaltimes as $item) { echo "$item"; }?></a>
                <a> Times: <?php foreach ($times as $item) { echo "$item"; }?></a>
                <a>Dues: <?php echo $row['dues']; ?></a>
                <a>Location: <?php echo $row['locations']; ?></a>
              </div>
            </div>
          </div>
        </section>
        <?php } ?>

    
    </body>
</html>