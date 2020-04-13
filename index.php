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
    .text-edit1 {
      font-weight: 750;
      color: rgb(11,63,114);
      font-family:arial;
    }

    .card{
      height: 510px;
      margin-top:-8px;
      width: 400px;
      border-width: 2px;
      border-color: rgba(255, 255, 255, 0.527);
      background-color: rgba(255, 255, 255, 0.700);
    }

    html, body {
        background: url(http://localhost/CS4640-ztm4qv-kk6ev-project/images/rotunda3.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    input, textarea, button {
      display:inline-block;
      font-family:arial;
      margin: 5px 10px 5px 60px;
      padding: 8px 12px 8px 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      width: 90%;
      font-size: small;
    }

    button[type=submit] {
      font-family:arial;
      font-size: 14px;
      font-weight: 550;
      padding:5px 15px; 
      background:#0B3F72; 
      border:0 none;
      cursor:pointer;
      border-radius: 5px; 
      color:white;
    }
  
    button[type=submit]:hover {
      opacity:0.8;
      box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    }

    .label1 {
      font-family:arial;
      margin-left: -100px;
      font-weight: 750;
      color: rgb(11,63,114);
    }

    .label2 {
      font-family:arial;
      margin-left: -66px;
      font-weight: 750;
      color: rgb(11,63,114);
    }

    .link {
      font-family:arial;
      margin-left: 95px;
      font-weight: 750;
      font-size:small;
      color: #337AB7;
    }

    img{
      width:80%;
    }

    .adjust-card{
      margin-left: 34%;
    }

  </style>

<!-- must connect to the DB -->
<?php require('connect-db.php'); ?> 

<!-- start a session -->
<?php session_start(); ?>

</head>
  <body>
  <br><br>
        <div class="adjust-card">
            <div class="card">
                <div class="card-body">
                    <div style="text-align: center; padding-top:5%;">
                        <img src="./images/logo5.png" alt="Logo" style="margin-top:-20px;"><br>
                        <p class="text-edit1">Welcome to Guiding the Hoos, a website to stay updated on the best organizations on Grounds. Login below!</p>
                        <hr>
                        <div style="float:left;">
                        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST"> 
                           <div class="label1" >Email:</div> 
                           <input type="text" name="email" required autofocus /> </br>
                           <div class="label2">Password:</div> 
                           <input type="password" name="pwd" required /> </br>
                          <button type="submit" value="submit">Login</button> </br>
                          <a class="link" href="http://localhost/CS4640-ztm4qv-kk6ev-project/templates/sign-up.php">or Sign Up Here</a>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>

<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // clean white space
    $email = trim($_POST['email']);
    $pwd = trim($_POST['pwd']);

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
      if(password_verify($pwd, $password_hashed)){
        // verifcation success, user has loggedin
        // create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['id'] = $id;
        $_SESSION['email'] = $email;
        $_SESSION['pwd'] = $pwd;
        $_SESSION['pwd_hashed'] = $password_hashed;
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['year'] = $year;
        header('Location: http://localhost/CS4640-ztm4qv-kk6ev-project/templates/homepage-after-login.php');
      }
      else{
        echo 'Incorrect password!';
      }
    }
    else{
      echo 'Incorrect username!';
    }
  }
 
?>

</body>
</html>