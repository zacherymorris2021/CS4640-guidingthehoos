
<?php

header('Access-Control-Allow-Origin: http://localhost:4200');
// header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');


// get the size of incoming data
$content_length = (int) $_SERVER['CONTENT_LENGTH'];

// retrieve data from the request
$postdata = file_get_contents("php://input");

// Process data
// (this example simply extracts the data and restructures them back)
// Extract json format to PHP array
$request = json_decode($postdata);
// var_dump ($request);
// echo $request[0];
$data = [];
$data[0]['length'] = $content_length;
foreach ($request as $k => $v)
{
  $data[0][$k] = $v;

}
// echo "cool";'
// echo gettype($request);
// echo gettype($data)
// echo "cool";

$hostname='localhost:3306'; // port number 3306 - got from xammp
$dbname='guiding'; // type localhost in broswer - user=web4640 pass=5833683ztm
$username="katz";
$password="zackat";
$dsn = "mysql:host=$hostname;dbname=$dbname";
$db = new PDO($dsn, $username, $password);
$name = $data[0]['name'];
$type = $data[0]['type'];
$days = $data[0]['days'];
$dues = $data[0]['dues'];
$locations = $data[0]['locations'];
$about = $data[0]['about'];
$uploadfile = $data[0]['uploadfile'];
$query = "INSERT INTO `addorg`(`name`, `type`, `days`, `dues`, `locations`, `about`, `uploadfile`) VALUES (:name,:type,:days,:dues , :locations, :about, :uploadfile)";
$statement = $db->prepare($query);
$statement->bindValue(':name', $name);
$statement->bindValue(':type', $type);
$statement->bindValue(':days', $days);
$statement->bindValue(':dues', $dues);
$statement->bindValue(':locations', $locations);
$statement->bindValue(':about', $about);
$statement->bindValue(':uploadfile', $uploadfile);
$statement->execute();
$statement->closeCursor();

// Send response (in json format) back the front end
echo json_encode(['content'=>$data]);
?>

