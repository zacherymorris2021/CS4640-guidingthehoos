<?php
$hostname='localhost:3306'; // port number 3306 - got from xammp
$dbname='guiding'; // type localhost in broswer - user=web4640 pass=5833683ztm
$username="katz";
$password="zackat";

// dsn = data source name - format: dsn = "mysql:host=hostname;dbname=dbname
$dsn = "mysql:host=$hostname;dbname=$dbname";

// PDO(dsn, username, password)
try
{
    $db = new PDO($dsn, $username, $password);
    // echo "<p> You connected </p>"; 
}
catch(PDOException $e)
{
    $error_message = $e -> getMessage();
    echo "<p> An error occured while connecting to the database: $error_message </p>"; 
}
catch(Exception $e)
{
    $error_message = $e -> getMessage();
    echo "<p> Error message: $error_message </p>"; 
}
?>