<!-- Zachery Morris and Katharina Kemper -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="google-signin-client_id" content="590898294226-nmnlp76d4ki4ktaqnb90p9gvule455js.apps.googleusercontent.com">
  
  <title>Guiding the Hoos</title>

  <script type="text/javascript" src="https://apis.google.com/js/platform.js" async defer></script>
  <script type="text/javascript" src="/js/index.js"></script>

  <link rel="stylesheet" type="text/css" href="./css/style-sheet.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    <link rel="stylesheet" type="text/css" href="/css/style-sheet.css">
</head>
<body>
  <br><br>
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-body">
                    <div style="text-align: center; padding-top:5%;">
                        <a href="index.php"> <img src="./images/logo5.png" alt="Logo"></a><br>
                        <p class="text-edit1">Welcome to Guiding the Hoos, a website to stay updated on the best study spots, food locations, and organizations.</p>
                        <p class="text-edit2">Login below to access the site!</p>
                        <p style="margin-left:16%;" id="my-signin2"></p>
                    </div>
                </div>
            </div>
        </div>

<!-- Must connect to the DB -->
<?php require('connect-db.php'); ?> 

</body>

   <script>
     function onSuccess(googleUser) {
       console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
       window.location = "http://localhost/CS4640-ztm4qv-kk6ev-project/templates/homepage-after-login.php"; // change when deploying
       var profile = googleUser.getBasicProfile();
       var user_name = profile.getName();
       document.getElementById('name').innerHTML = user_name;
      }
     function onFailure(error) {
       console.log(error);
     }
     function renderButton() {
       gapi.signin2.render('my-signin2', {
         'scope': 'profile email',
         'width': 240,
         'height': 50,
         'longtitle': true,
         'theme': 'dark',
         'onsuccess': onSuccess,
         'onfailure': onFailure
       });
     }
   </script>
     <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
</html>