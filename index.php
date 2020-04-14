<!-- Zachery Morris and Katharina Kemper -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">  <!-- required to handle IE -->
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <meta name="google-signin-client_id" content="590898294226-nmnlp76d4ki4ktaqnb90p9gvule455js.apps.googleusercontent.com">
  
  <title>Guiding the Hoos</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />

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
        font-size: 18px;
        margin:auto;
        border-radius:5px;
      }

      button:hover {
        opacity:0.8;
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
      }

    h1{
        color: #0B3F72;
        font-size:20px;
        padding-left:10px;
        padding-right:10px;
      }

    .link {
      margin-left: auto;
      margin-right:auto;
      font-weight: 750;
      font-size:15px;
      color: #337AB7;
    }

    img{
      width:80%;
      margin-left:auto;
      margin-right:auto;
    }

    hr {
        color: #0B3F72; 
        padding:0.2px;
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

      .msg1 {
        font-style: italic;
        color: red;
      }

  </style>

<!-- must connect to the DB -->
<?php require('connect-db.php'); ?> 

<!-- start a session -->
<?php session_start(); ?>

</head>
  <body>
    <section>
      <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
        <div class="card">
          <img src="./images/logo5.png" alt="Logo">
          
            <h1 style="padding-bottom:5px;"> Welcome to Guiding the Hoos, a website to stay updated on the best organizations on Grounds.</h1>
          
          <hr> 

          <div class="oneline" style="padding-top:15px;padding-bottom:3px;">
            <span class="title1" >UVA Email:</span> 
            <span class="title2">
              <input type="text" name="email" autofocus placeholder="compID@virginia.edu"/>
            </span>
          </div>
          <span class="msg1"><strong><?php validate_email();?></strong></span>

          <div class="oneline" style="padding-top:15px;padding-bottom:3px;">
            <span class="title1">Password:</span> 
            <span class="title2">
              <input type="password" name="pwd" placeholder="password" />
            </span>
          </div>
          <span class="msg1"><strong><?php validate_pwd();?></strong></span>

          <div style="padding-top:15px;">
            <button type="submit" value="submit">Login</button> </br>
            <div style="padding-top:5px;"> </div>
            <a class="link" href="http://localhost/CS4640-ztm4qv-kk6ev-project/templates/sign-up.php">or Sign Up Here</a>
          </div>
          <div style="padding-top:10px;"> </div>

      </div>
      </form>
    </section>

<?php
    // error message for email
    function validate_email(){
      global $db;
      if( isset($_POST['email']) && (strlen($_POST['email']) == 0) ){ 
        echo "Please enter your UVA email!";
      }
      
      elseif(isset($_POST['email'])){
        if(stristr(''.$_POST['email'], '@virginia.edu') == FALSE){
          echo 'Use UVA email i.e. sqw34@virginia.edu!';
        }
      }

      elseif( isset($_POST['email']) && (strlen($_POST['email']) != 0) ){
        $email = trim($_POST['email']);
        if($query = $db->prepare('SELECT id, password FROM users WHERE email = :email')){
          $query->bindValue(':email', $email);
          $query->execute();
          $user = $query->fetchAll();
          if(count($user) > 0){
            // user found, do nothing
          }
          else{
            echo "Email doesn't match our records! <br />";
          }
        }
      }
    }

    // error message for password
    function validate_pwd(){
      global $db;
      if( isset($_POST['email']) && (strlen($_POST['email']) == 0) ){ 
        echo "Please enter your password!";
      }

      elseif(isset($_POST['email'])){
        $email = trim($_POST['email']);
        $pwd = trim($_POST['pwd']);
      

        // prepare SQL statement - protects against SQL injection
        if( (isset($_POST['email'])) && ($query = $db->prepare('SELECT * FROM users WHERE email = :email')) ){
          $query->bindValue(':email', $email);
          $query->execute();

          $results = $query->fetch();
          $password_hashed = $results[2];

          // account exists, now we verify the password
          if(password_verify($pwd, $password_hashed)){
            // password matches, will be logged in
          }
          else{
            echo "Password doesn't match our records!";
          }
        }
      }
    }
?>

<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // clean white space
    $email = trim($_POST['email']);
    // $pwd = trim($_POST['pwd']);

    // prepare SQL statement - protects against SQL injection
    if($query = $db->prepare('SELECT * FROM users WHERE email = :email')){
      $query->bindValue(':email', $email);
      $query->execute();

      $results = $query->fetch();
      $id = $results[0]; 
      $email = $results[1]; 
      $password_hashed = $results[2];
      $first_name = $results[3];
      $last_name = $results[4];
      $year = $results[5];

      // account exists, now we verify the password
      if(password_verify(trim($_POST['pwd']), $password_hashed)){
        // verifcation success, user has loggedin
        // create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['id'] = $id;
        $_SESSION['email'] = $email;
        $_SESSION['pwd'] = trim($_POST['pwd']);
        $_SESSION['pwd_hashed'] = $password_hashed;
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['year'] = $year;
        header('Location: http://localhost/CS4640-ztm4qv-kk6ev-project/templates/homepage-after-login.php');
      }
    }
  }
?>

</body>
</html>