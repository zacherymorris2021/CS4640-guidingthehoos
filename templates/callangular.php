<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Guiding the Hoos</title>

  <link rel="stylesheet" type="text/css" href="/css/form-style.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/CS4640-ztm4qv-kk6ev-project/css/homepage-after-login.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    
    
</head>
<body>
<?php 
    include('../connect-db.php');
    require('../connect-db.php');
    require('../todo-db.php');
    ?> 
  
    <?php
      // We need to use sessions, so you should always start sessions using the below code.
      session_start();
      // If the user is not logged in redirect to the login page...
      if (!isset($_SESSION['loggedin'])) {
        header('Location: http://localhost/CS4640-ztm4qv-kk6ev-project/index.php');
        exit;
      }
  ?>

    <div id="container">
    <div id="main">

    <!-- nav bar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <ul class="navbar-nav mr-auto navbar-left">
            <li class="navbar-brand"><img src="../images/small-logo.png" height="30" class="d-inline-block align-top" alt=""></li>
            <li class="nav-item"><a class="nav-link" href="http://localhost/CS4640-ztm4qv-kk6ev-project/templates/homepage-after-login.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="http://localhost/CS4640-ztm4qv-kk6ev-project/templates/organizations.php">Organizations</a></li>
            <li class="nav-item"><a class="nav-link active" href="#">Add Organization</a></li>
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

    <div class="container">
        <!-- <br> -->
        <form name="RegisterForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST"  enctype="multipart/form-data">
        
            <div class="section"><span>2</span>Image Upload</div>
            <div class="inner-section">
                <label>Do you want to include an image of your organization?<br>
                <input type="file" name ="uploadfile" id = "picupload" /></label>
            </div>
              <input type="hidden" name = "useremail" value = "<?php  echo $_SESSION['email'] ?>" />
              <button type="submit" value="submit" name="submit2">Submit</button> <br>
        </form>
        </div>
    </div>
    </div>

    <footer class="primary-footer bg-dark" id="footer">
        <small class="copyright">&copy; Guiding the Hoos</small>
    </footer>

        <script type="text/javascript">
  function redirect(){
    window.location.href = 'http://localhost/CS4640-ztm4qv-kk6ev-project/templates/organizations.php';
  }
</script>
<?php
    error_reporting(0);
        $name_msg = NULL;
        $name = NULL;
       if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['submit2'])){
    //    if(isset($_POST["file_name"])) {
        $filename = $_FILES["uploadfile"]["name"];
        $filetmpname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "../uploadedimages/";
        move_uploaded_file($filetmpname, $folder.$filename);

        $email = $_POST['useremail'];
        // addTask($org_name, $dues, $locations,$about,$chk,$tbox,$filename,$email);
        $hostname='localhost:3306'; // port number 3306 - got from xammp
        $dbname='guiding'; // type localhost in broswer - user=web4640 pass=5833683ztm
        $username="katz";
        $password="zackat";
        $dsn = "mysql:host=$hostname;dbname=$dbname";
        $db = new PDO($dsn, $username, $password);
        $query = "INSERT INTO `addimage`(`uploadfile`, `email`) VALUES (:filename, :email)";
        $statement = $db->prepare($query);
        $statement->bindValue(':filename', $filename);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $statement->closeCursor();

        // if((($_POST['about']) != NULL && ($_POST['org_name']) != NULL && is_numeric($_POST['dues']) == TRUE)){
        echo '<script type="text/javascript">',
                'redirect();',
                '</script>';
    }
}

?>

    </body> 
    <script src="http://code.jquery.com/jquery-1.5.js"></script> 
<script>
function countChar(val){
     var len = val.value.length;
     if (len >= 250) {
              val.value = val.value.substring(0, 250);
     } else {
              $('#charNum').text(250 - len + " characters left");
     }
};
</script>
<script>
   
function myFunction(id) {
       var a = document.getElementById(id);
       if(a.style.display == 'block')
          a.style.display = 'none';
       else
          a.style.display = 'block';
    }

function Rightinfo(){
    document.getElementById("msg_num5").innerHTML = text5;  
    
    var frm = document.getElementsByName('RegisterForm')[0];
    frm.submit();
    frm.reset();

    }
</script>

<style>
    /* {
        margin:0;
        padding:0;
    } */
    button {
        border: none;
        outline: 0;
        display: inline-block;
        padding: 4px;
        color: white;
        background-color: #0B3F72;
        text-align: center;
        cursor: pointer;
        /* width: 65%; */
        font-size: 18px;
        margin:auto;
        border-radius:5px;
        /* margin-left: 20%; */
        width: 15%;
      }

      button:hover {
        opacity:0.8;
        background-color: rgb(66, 184, 20) !important;
        border: greenyellow !important;
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
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

.msg {
	  font-style: italic;
	  color: red;
    }
    /* changed the bootstrap button */
.btn-primary:hover {
    background-color: rgb(66, 184, 20) !important;
    border: greenyellow !important;
}

p{
    font-size:80%;
}
.container{
	width:70%;
	padding:2%;
	margin:40px auto;
	background: rgb(255, 255, 255);
    border-radius: 10px;
    box-decoration-break: inherit;
	box-shadow: 0px 0px 10px rgba(25, 37, 61, 0.719);
}
.container .inner-section{
	padding: 2%;
	background: #F8F8F8;
	border-radius: 6px;
	margin-bottom: 15px;
}

.container label{ /*looks at the labels*/
    display: block;
    font-size: 90%;
    font-family: sans-serif;
    margin-bottom: 15px;
    color: #0B3F72;
}
.container input[type="text"] { /*looks at the input type text*/
	display: block;
	box-sizing: border-box;
	width: 100%;
    padding: 8px;
    border: 2px solid rgb(243, 236, 236);
	border-radius: 20%;
	-webkit-border-radius:6px;
	box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.432);
}

.container .section{
	font: normal 20px, serif;
	color: #2D95EA; 
	margin-bottom: 10px;
}
.container .section span {/* sets the number*/
	background: #1981DE;
	padding: 5px 10px 5px 10px;
	border-radius: 50%; /*circle*/
	border: 4px solid rgb(250, 250, 250);
	font-size: 82%;
    margin-left: -40px;
    margin-top: -5px;
    color: rgb(255, 255, 255); 
    position: absolute;
}

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
</style>
</html>
