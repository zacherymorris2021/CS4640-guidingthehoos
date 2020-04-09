<!-- Zachery Morris and Katharina Kemper -->
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

    <!-- Must connect to the DB -->
    <?php require('../connect-db.php'); ?> 

    <!-- nav bar:
        1. Logo: small-logo.png
        2. Study Spots
        3. Food Places
        4. Organization
        Right side
        1. Search bar
        2. Profile
        3. Sign out-->
        <!-- Navigation bar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <ul class="navbar-nav mr-auto navbar-left">
                <li class="navbar-brand"><img src="../images/small-logo.png" height="30" class="d-inline-block align-top" alt=""></li>
                <li class="nav-item"><a class="nav-link" href="http://localhost/CS4640-ztm4qv-kk6ev-project/templates/homepage-after-login.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="http://localhost/CS4640-ztm4qv-kk6ev-project/templates/organizations.php">Organizations</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">Add Organization</a></li>
            </ul>
            <ul class="navbar-nav navbar-right">
            <li class="nav-item" style="padding-top:3.5px">
            <form action="" method = "GET" style="padding-right: 10px">
                <input width=align="right" class="form-control" type ="text" name= 'q' placeholder="Search Website..." value = "">
            </form>
            </li>
                <li class="nav-item">
                <a class="nav-link" href="../index.php" onclick="signOut();">Sign out</a>
                </li>
            </ul>
        </nav>

    <div class="container">
        <br>
        <form name="RegisterForm" action="" method="post">
            <div class="section"><span>1</span>Personal Information</div>
            <p><em> Disclaimer: This info will be made available on this site</em></p>
            <div class="inner-section">
                <label>Your First Name: <input type="text" id="firstname" placeholder="John" autofocus="" /></label>
                <p class="error_message" id="msg_num3" style="color: red;"></p>
                <label>Your last Name: <input type="text" id="lastname" placeholder="Doe" /></label>
                <p class="error_message" id="msg_num4" style="color: red;"></p>
                <label>Email Address: <input type="text" id ="emailholder" placeholder = "abc123@virginia.edu" pattern=".+@virginia.edu" required /></label>
                <p class="error_message" id="msg_num2" style="color: red;"></p>
            </div>
        
            <div class="section"><span>2</span>Organization Information</div>
            <div class="inner-section">
                <label>Organization Name: <input type="text" id="org_name" placeholder="Organization"/></label>
                <p class="error_message" id="msg_num5" style="color: red;"></p>
                <label>Weekly Meeting:
                    <div class="weekDays"> <br>
                        <!-- Monday with time dispaly -->
                        <label><input type="checkbox" id="monday" class="weekday" onclick= "myFunction('conditionalM')"/> Monday</label>
                            <div id="conditionalM" style="display:none">
                                <label for="meetT">Choose a Meeting Time: </label>
                                <input id="meetT" type="time" placeholder="11:59"> <br>  <br>
                            </div>
                        <!-- Tuesday with time dispaly -->
                        <label><input type="checkbox" id="tuesday" class="weekday" onclick= "myFunction('conditionalT')"/> Tuesday</label>
                            <div id="conditionalT" style="display:none">
                                <label for="meetT">Choose a Meeting Time: </label>
                                <input id="meetT" type="time"  placeholder="11:59"> <br> <br> 
                            </div>
                        <!-- Wednesday with time dispaly -->
                        <label><input type="checkbox" id="wednesday" class="weekday" onclick= "myFunction('conditionalw')"/> Wednesday</label>
                            <div id="conditionalw" style="display:none">
                                <label for="meetT">Choose a Meeting Time: </label>
                                <input id="meetT" type="time" placeholder="11:59"> <br>  <br>
                            </div>
                        <!-- Thursday with time display -->
                        <label><input type="checkbox" id="thursday" class="weekday" onclick= "myFunction('conditionalTH')"/> Thursday</label>
                            <div id="conditionalTH" style="display:none">
                                <label for="meetT">Choose a Meeting Time: </label>
                                <input id="meetT" type="time" placeholder="11:59"> <br>  <br>
                            </div>
                        <!-- Friday with time dispaly -->
                        <label><input type="checkbox" id="friday" class="weekday" onclick= "myFunction('conditionalF')"/> Friday</label>
                            <div id="conditionalF" style="display:none">
                                <label for="meetT">Choose a Meeting Time: </label>
                                <input id="meetT" type="time" placeholder="11:59"> <br><br>  
                            </div>
                        <!-- Saturday with time display -->
                        <label><input type="checkbox" id="saturday" class="weekday" onclick= "myFunction('conditionalST')" /> Saturday</label>
                            <div id="conditionalST" style="display:none">
                                <label for="meetT">Choose a Meeting Time:</label>
                                <input id="meetT" type="time" placeholder="11:59"> <br>  <br>
                            </div>
                         <!-- Sunday with time display -->
                        <label><input type="checkbox" id="sunday" class="weekday" onclick= "myFunction('conditionalSU')"/> Sunday</label>
                            <div id="conditionalSU" style="display:none">
                                <label for="meetT">Choose a Meeting Time: </label>
                                <input id="meetT" type="time" placeholder="11:59"> <br><br>  
                            </div>
                      </div>
                </label>
                <label>Dues <input type="text" placeholder="100" id ="dues" /></label>
                <p class="error_message" id="msg_num1" style="color: red;"></p>
                <label>Location<input type="text" name="field4" placeholder = "120 Olsson Hall" /></label>
                <label>About<input type="text" name="field5" placeholder = "About your organization" /></label>
                <label>Do you want to include an image? <input type="file" id = "picupload" ></label>
            </div>
            <div class="button">
                <button type="button" class = "btn btn-primary" id="Submit" onclick="Rightinfo()" >Submit</button>
                <p id="demo"></p>
            </div>
            <br>
            
        </form>
        </div>
    </body>  

<script>
    // id = 
document.getElementById("Submit").addEventListener("click", displaydone);
var SubmitDate = () =>{
    return " Date: " + Date();
}
var displaydone = function(){
    document.getElementById("demo").innerHTML = SubmitDate();
}
displaydone();
// puts in the time for when a day is checked
function myFunction(id) {
       var a = document.getElementById(id);
       if(a.style.display == 'block')
          a.style.display = 'none';
       else
          a.style.display = 'block';
    }
    // checks if there is an error and if there is not it submits it
function Rightinfo(){
    var x,text;
    x=document.getElementById("dues").value;
    if(isNaN(x)){
        text = "Enter a number";
    }
    else{
        text="";
    }
    document.getElementById("msg_num1").innerHTML = text;
    var y,text2;
    y = document.getElementById("emailholder").value;
    if(y.endsWith("@virginia.edu")){
        text2 = "wins";
    }
    else{
        text2= "Please enter your @virginia.edu email";
    }
    document.getElementById("msg_num2").innerHTML = text2;
    var letters = /^[A-Za-z]+$/;
    var z = document.getElementById("firstname").value;
    if(z.match(letters)){
        text3="";
    }
    else{
        text3 = "Please write only letters for your name";
    }
    document.getElementById("msg_num3").innerHTML = text3;
    var last,text4;
    var last = document.getElementById("lastname").value;
    if(last.match(letters)){
        text4="";
    }
    else{
        text4 = "Please write only letters for your name";
    }
    document.getElementById("msg_num4").innerHTML = text4;
    var text5;
    var orgname= document.getElementById("org_name").value;
    if(orgname.length == 0){
        text5 = "Enter the name of your organization"
    }
    document.getElementById("msg_num5").innerHTML = text5;  
    
    var frm = document.getElementsByName('RegisterForm')[0];
    frm.submit();
    frm.reset();

    }
</script>

<style>
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
	color: #1981DE; 
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
      color: #fff;
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
</html>
