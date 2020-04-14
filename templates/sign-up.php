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

  <style>
    .card{
      width: 400px;
      border-width: 2px;
      border-color: rgba(255, 255, 255, 0.527);
      background-color: rgba(255, 255, 255, 0.700);
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      margin: auto;
      text-align: center;
      margin-top:5%;
    }

    html, body {
        background: url(http://localhost/CS4640-ztm4qv-kk6ev-project/images/rotunda3.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    button {
        border: none;
        outline: 0;
        display: inline-block;
        color: white;
        background-color: #0B3F72;
        text-align: center;
        cursor: pointer;
        width: 45%;
        font-size: 17px;
        margin:auto;
        border-radius:5px;
      }

      button:hover {
        opacity:0.8;
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
      }

    h1{
        color: #0B3F72;
        font-size:25px;
      }

    .link {
      margin-left: auto;
      margin-right:auto;
      font-weight: 750;
      font-size:15px;
      color: #337AB7;
    }

    img{
      width:20%;
      margin-left:auto;
      margin-right:auto;
    }

    hr {
        color: #0B3F72; 
        padding:0px;
        margin:0px;
        border: 0;
        height: 1px;
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
      }

    .title1 {
        color: #0B3F72;
        font-size: 18px;
        font-weight: 600;
      }

      .title2 {
        color: #259DDD;
        font-size: 18px;
      }

      .oneline{
        display:inline;
        padding: 5px;
      }

      .custom-select {
        width: auto;
        font-size:18px;
      }

      .msg1 {
        font-style: italic;
        color: red;
      }


</style>

<!-- must connect to the DB -->
<?php require('../connect-db.php'); ?> 

<?php
    session_start();
    session_destroy();
?>

</head>
  <body>
  <section>
  <form action="<?php $_SERVER['PHP_SELF']?>" method="POST"> 
    <div class="card">
      <img src="../images/small-logo.png" alt="Logo-small" style="padding-top:10px;">

        <h1 style="padding-top:10px;padding-bottom:5px;">Welcome to Guiding the Hoos!<br>Create your account below!</h1>
      
      <hr>

      <div class="oneline" style="padding-top:15px;">
        <span class="title1" >First Name:</span> 
        <span class="title2">
          <input type="text" name="first_name" autofocus placeholder="John"/>
        </span>
      </div>
      <span class="msg1"><strong><?php validate_first();?></strong></span>


      <div class="oneline" style="">
        <span class="title1" >Last Name:</span> 
        <span class="title2">
          <input type="text" name="last_name" placeholder="Smith"/>
        </span>
      </div>
      <span class="msg1"><strong><?php validate_last();?></strong></span>

      <div class="oneline" style="">
        <span class="title1" >Email:</span> 
        <span class="title2">
          <input type="text" name="email" placeholder="compID@virginia.edu"/>
        </span>
      </div>
      <span class="msg1"><strong><?php validate_email();?></strong></span>


      <div class="oneline" style="">
        <span class="title1" >Password:</span> 
        <span class="title2">
          <input type="text" name="pwd" placeholder="password"/>
        </span>
      </div>
      <span class="msg1"><strong><?php validate_pwd();?></strong></span>

      
      <div class="oneline">
        <span class="title1" >Year:</span> 
        <span class="title2">
          <select class="custom-select" name="years">
            <option value="">None</option>
            <option value="first">first</option>
            <option value="second">second</option>
            <option value="third">third</option>
            <option value="fourth">fourth</option>
          </select>
        </span>
      </div>
      <span class="msg1"><strong><?php validate_year();?></strong></span>


      <div style="padding-top:15px;">
            <button type="submit" value="submit">Sign up</button> </br>
            <div style="padding-top:5px;"> </div>
            <a class="link" href="http://localhost/CS4640-ztm4qv-kk6ev-project/index.php">return to login</a>
          </div>
          <div style="padding-top:10px;"> </div>
    </div>
  </form>
  </section>

<?php
  // error messages for first name
  function validate_first(){
    if( isset($_POST['first_name']) && (strlen($_POST['first_name']) == 0) ){ 
      echo "Please enter your first name!";
    }
  }

  // error messages for last name
  function validate_last(){
    if( isset($_POST['last_name']) && (strlen($_POST['last_name']) == 0) ){ 
      echo "Please enter your last name!";
    }
  }

  // error messages for email
  function validate_email(){
    global $db;
    if( isset($_POST['email']) && (strlen($_POST['email']) == 0) ){ 
      echo "Please enter your UVA email!";
    }
    
    if(isset($_POST['email']) && (strlen($_POST['email'])!=0) ){
      if(stristr(''.$_POST['email'], '@virginia.edu') == FALSE){
        echo 'Use UVA email i.e. sqw34@virginia.edu!';
      }
    }

    if(isset($_POST['email']) && (strlen($_POST['email'])!=0)){
      $email = trim($_POST['email']);
        if($query = $db->prepare('SELECT id FROM users WHERE email = :email')){
          $query->bindValue(':email', $email);
          $query->execute();
          
          // Store the result so we can check if the account exists in the database.
          $data = $query->fetchAll();
  
          // check is the account with that email already exists
          if (count($data) > 0) {
            // Username already exists
            echo 'Email exists, please choose another!'; 
          }
        }
    }
  }

  // error message for password
  function validate_pwd(){
    if( isset($_POST['pwd']) && (strlen($_POST['pwd']) == 0) ){ 
      echo "Please enter a password!";
    }

    elseif( isset($_POST['pwd']) && (strlen($_POST['pwd']) < 5) && (strlen($_POST['pwd']) > 0) ){ 
      echo "Minimum password length is 6!";
    }
  }

  // error messages for year
  function validate_year(){
    if( isset($_POST['years']) && (strlen($_POST['years']) == 0) ){ 
      echo "Please select a year!";
    }
  }
?>

<script type="text/javascript">
  function redirect(){
    window.location.href = 'http://localhost/CS4640-ztm4qv-kk6ev-project/index.php';
  }
</script>

<?php 
  if($_SERVER['REQUEST_METHOD'] == 'POST' && strlen($_POST['first_name'])!=0 && strlen($_POST['last_name'])!=0 && strlen($_POST['email'])!=0 && strlen($_POST['pwd'])!=0 && strlen($_POST['years'])!=0 ){
    // remove white space
    $email = trim($_POST['email']);
    $password = trim($_POST['pwd']);
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $year = trim($_POST['years']);

      if($query = $db->prepare('SELECT id, password FROM users WHERE email = :email')){
      
        $query->bindValue(':email', $email);
        $query->execute();
        
        // Store the result so we can check if the account exists in the database.
        $data = $query->fetchAll();

        // check is the account with that email already exists
        if (count($data) > 0) {
          // Username already exists
          exit;
        } 
      
        else {
          if(stristr(''.$_POST['email'], '@virginia.edu') == TRUE){
          // Username doesnt exists, insert new account
          if ($query = $db->prepare('INSERT INTO users (email, password, first_name, last_name, year) VALUES (:email, :pwd, :first_name, :last_name, :year)')) {
            // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
            $pwd = password_hash($password, PASSWORD_BCRYPT);
            $query->bindValue(':email', $email);
            $query->bindValue(':pwd', $pwd);
            $query->bindValue(':first_name', $first_name);
            $query->bindValue(':last_name', $last_name);
            $query->bindValue(':year', $year);
            $query->execute();

            $query->closeCursor();
            echo '<script type="text/javascript">',
                  'redirect();',
                  '</script>';
            // header('Location: http://localhost/CS4640-ztm4qv-kk6ev-project/index.php')
          } 
        }
          $query->closeCursor();
        }
      }
}
?>

</body>
</html>