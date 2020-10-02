<?php
$getStream = file_get_contents("http://98.101.223.10:8078/axis-cgi/jpg/image.cgi?jpg");

$imgFile = "./image.jpg";

file_put_contents($imgFile, $getStream);

?>