
<?php
ini_set('max_execution_time', 0);
header('Content-Type: application/json');
$mycount = 0;
$myJson = "newdata.json";
for ($i=1; $i < 2; $i++) { 
    # code...


$apiUrl = "https://api.flickr.com/services/rest/?&method=flickr.photosets.getPhotos&api_key=204df225455ff4bafd6d7bf01c742e3d&photoset_id=72157706275341264&user_id=124478044@N03&per_page=10&page=" . $i .  "&format=json&nojsoncallback=1";

$json = file_get_contents($apiUrl);
$obj = json_decode($json);
$photos = $obj->photoset->photo;
// echo "<script> console.log(" . $json . ") </script>";
foreach ($photos as $current) {
    $farm = $current->farm;
$server = $current->server;
$photoId =  $current->id;
$photoSecret =  $current->secret;
$title = $current->title;
$photoUrl = "https://farm" . $farm . ".static.flickr.com/" . $server . "/" . $photoId . "_" . $photoSecret . ".jpg";
echo "[" . $mycount . " ]" . $photoUrl . "\n";
$photosDir = "photos/pets";
$newFile = $photosDir . "/" . $title . ".jpg";
// file_put_contents($newFile , fopen($photoUrl, 'r'));
$imgInfoUrl = "https://api.flickr.com/services/rest/?&method=flickr.photos.getInfo&api_key=204df225455ff4bafd6d7bf01c742e3d&photo_id=" . $photoId .  "&user_id=124478044@N03&gallery&format=json&nojsoncallback=1";
$infoJson = file_get_contents($imgInfoUrl);
$infoObj = json_decode($infoJson);
$description = $infoObj->photo->description->_content;
$dateUploaded = $infoObj->photo->dateuploaded;

$myObj->id = $mycount;
$myObj->filename = $newFile;
$myObj->title = $title;
$myObj->description = $description;
$myObj->dateuploaded = $dateUploaded;

$newJson = json_encode($myObj, JSON_PRETTY_PRINT);

file_put_contents($myJson , $newJson, FILE_APPEND);
$jsonString = json_encode($infoObj, JSON_PRETTY_PRINT);
$mycount++;
}
}

$newJsonData = json_decode(file_get_contents($myJson));


function cmp($a, $b){
    return strcmp($a->dateuploaded, $b->dateuploaded);
}

usort($newJsonData, "cmp");
file_put_contents($myJson , $newJsonData);

// $farm = $obj->photoset->photo[1]->farm;
// $server =  $obj->photoset->photo[1]->server;
// $photoId =  $obj->photoset->photo[1]->id;
// $photoSecret =  $obj->photoset->photo[1]->secret;

// echo $farm;
// echo $server;
// echo $photoId;
// echo $photoSecret;
// $title = $obj->photoset->photo[1]->title;

// $photoUrl = "https://farm" . $farm . ".static.flickr.com/" . $server . "/" . $photoId . "_" . $photoSecret . ".jpg";
// $photosDir = "photos/pets";
// $newFile = $photosDir . "/" . $title . ".jpg";



// //----------------- Download Photos---------------------
// file_put_contents($newFile , fopen($photoUrl, 'r'));

// echo  "<a href='" . $photoUrl . "' > Link </a> ";

// echo "<img src='" . $newFile . "' />";

// echo $json;


// $imgInfoUrl = "https://api.flickr.com/services/rest/?&method=flickr.photos.getInfo&api_key=204df225455ff4bafd6d7bf01c742e3d&photo_id=" . $photoId .  "&user_id=124478044@N03&gallery&format=json&nojsoncallback=1";
// $infoJson = file_get_contents($imgInfoUrl);
// $infoObj = json_decode($infoJson);

// $description = $infoObj->photo->description->_content;
// echo $description;




// file_put_contents($newFile , fopen($i, 'r'));
// $jsonString = json_encode($infoObj, JSON_PRETTY_PRINT);
// echo $jsonString;
// echo $json;
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
// $link = mysqli_connect("localhost", "root", "", "pet_photos");
// // $timestamp = date("Y-m-d H:i:s", SQL_TIMESTAMP);
// // $mydate = date_timestamp_get($date);
// // Check connection
// if($link === false){
//     die("ERROR: Could not connect. " . mysqli_connect_error());
// }
// // $time = date(SQL_TIMESTAMP, time());

// //  $date = date_timestamp_get();
// // Attempt insert query execution
// $sql = "INSERT INTO pet ( id, filename, description, pet_name, timestamp) VALUES ('', 'hello.jpg', 'yes this is it', 'John', NOW())";
// if(mysqli_query($link, $sql)){
//     echo "Records inserted successfully.";
// } else{
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
// }
 

exit();
?>