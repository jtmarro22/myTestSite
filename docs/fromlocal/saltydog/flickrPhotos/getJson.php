<?php

$myJson =  file_get_contents("./data.json");
// $myJson = json_decode($myJson);
echo htmlspecialchars($myJson);
?>