<!-- Zachery Morris and Katharina Kemper -->
<?php
    session_start();
    session_destroy();
    // Redirect to the login page:
    header('Location: http://localhost/CS4640-ztm4qv-kk6ev-project/index.php');
?>