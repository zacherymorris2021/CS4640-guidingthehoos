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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    .text-edit1 {
      font-weight: 750;
      font-size: 20px;
      color: rgb(11,63,114);
      font-family:arial;
    }

    .card{
      height: 551px;
      width: 400px;
      border-width: 2px;
      border-color: rgba(255, 255, 255, 0.527);
      background-color: rgba(255, 255, 255, 0.700);
    }

    .adjust-card{
      margin-left: 34%;
      margin-top: -18px;
    }

    @media only screen (min-width: 900px) and (min-height:1200) {
      .adjust-card{
      margin-left: 40%;
      margin-top: 20%;
    } 
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
      font-size:14px;
      color: rgb(11,63,114);
    }

    .label2 {
      font-family:arial;
      margin-left: -100px;
      font-weight: 750;
      font-size:14px;
      color: rgb(11,63,114);
    }

    .label3 {
      font-family:arial;
      margin-left: -93px;
      font-weight: 750;
      font-size:14px;
      color: rgb(11,63,114);
    }

    .label4 {
      font-family:arial;
      margin-left: -102px;
      font-weight: 750;
      font-size:14px;
      color: rgb(11,63,114);
    }

    .label5 {
      font-family:arial;
      margin-left: -104px;
      font-weight: 750;
      font-size:14px;
      color: rgb(11,63,114);
    }

    .link {
      font-family:arial;
      margin-left: 95px;
      font-weight: 750;
    }

    img {
        width: 70px;
        padding-bottom: 10px;
    }

    .custom-select {
      font-family: Arial;
      margin-left: 60px;
      width: 90%;
      margin: 8px 12px 5px 60px;
    }

    .edit-margins{
      margin-right:90px;
      display:inline-block;
    }
    .link {
      font-family:arial;
      margin-left: 95px;
      font-weight: 750;
    }

</style>

<!-- must connect to the DB -->
<?php require('../connect-db.php'); ?> 

</head>
  <body>
  <br><br>
        <div class="adjust-card">
            <div class="card">
                <div class="card-body">
                    <div style="text-align: center; padding-top:5%;">
                        <img src="../images/small-logo.png" alt="Logo" style="margin-top:-28px;"><br>
                        <p class="text-edit1">Welcome to Guiding the Hoos! </br> Create your account below!</p>
                        <hr>
                        <div class="edit-margins">
                        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST"> 
                           <div class="label1" >First Name:</div> 
                           <input type="text" name="first_name" required autofocus /> </br>

                           <div class="label2">Last Name:</div> 
                           <input type="text" name="last_name" required /> </br>

                           <div class="label3">Year at UVA:</div> 
                           <select class="custom-select" name="years" required>
                            <option value="">None</option>
                            <option value="first">First</option>
                            <option value="second">Second</option>
                            <option value="third">Third</option>
                            <option value="fourth">Fourth</option>
                          </select>

                           <div class="label4">UVA Email:</div> 
                           <input type="email" name="email" required /> </br>

                           <div class="label5">Password:</div> 
                           <input type="password" name="pwd" required /> </br>

                          <button type="submit" value="submit">Sign up</button> </br>
                          <a class="link" href="http://localhost/CS4640-ztm4qv-kk6ev-project/index.php">return to login</a>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>

<script type="text/javascript">
  function redirect(){
    window.location.href = 'http://localhost/CS4640-ztm4qv-kk6ev-project/index.php';
  }
</script>

<?php 
  // check is the account with that email already exists
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // remove white space
    $email = trim($_POST['email']);
    $password = trim($_POST['pwd']);
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $year = trim($_POST['years']);

      if($query = $db->prepare('SELECT id, password FROM users WHERE email = :email')){
      
        $query->bindValue(':email', $email);
        $query->execute();
        $data = $query->fetchAll();

        // Store the result so we can check if the account exists in the database.
        if (count($data) > 0) {
          // Username already exists
          exit('Username exists, please choose another!'); // need to fix to show in form card
        } 
      
        else {
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
          $query->closeCursor();
        }
      }
}
?>

</body>
</html>