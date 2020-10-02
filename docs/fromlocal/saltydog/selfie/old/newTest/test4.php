<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('src/class.phpmailer.php');
//$url = "http://98.101.223.10:8080/2/webcam.jpg";
$name2 = "A Salty Dog Friend";$email2 = "selfie@saltydog.com";$message = "No Message";
if(isset($_POST['name'])){
	$name2 = $_POST['name'];
}
if(isset($_POST['email'])){
	$email2 = urldecode($_POST['email']);
}
if(isset($_POST['phone'])){
	$phone = $_POST['phone'];
	$phone = $phone . '@';
}
if(isset($_POST['carrier'])){
	$carrier = $_POST['carrier'];
}
if(isset($_POST['message'])){
	$message = $_POST['message'];
}

if($carrier == "Verizon"){
    $phone = $phone . "vzwpix.com";
}
elseif($carrier == "AT&T"){
    $phone = $phone . "txt.att.net";
}
elseif($carrier == "T-Mobile"){
    $phone = $phone . "tmomail.net";
}
elseif($carrier == "Sprint"){
    $phone = $phone . "messaging.sprintpcs.com";
}
elseif($carrier == "Virgin Mobile"){
    $phone = $phone . "vmobl.com";
}
elseif($carrier == "Tracfone"){
    $phone = $phone . "mmst5.tracfone.com";
}
elseif($carrier == "Boost Mobile"){
    $phone = $phone . "myboostmobile.com";
}
elseif($carrier == "U.S. Cellular"){
    $phone = $phone . "email.uscc.net";
}
elseif($carrier == "Metro PCS"){
    $phone = $phone . "mymetropcs.com";
}
elseif($carrier == "Ting"){
    $phone = $phone . "message.ting.com";
}

// $bob = 'bob@saltydog.com';
// $tim = 'tim@saltydog.com';
// $zach = 'zach@saltydog.com';
// $forms = 'forms@saltydog.com';

$sent = 'yes';
$email = new PHPMailer();
$email->From      = 'selfie@saltydog.com';
$email->FromName  = 'Selfie Cam';
$email->Subject   = 'Hi from the Selfie Cam at Salty Dog Cafe';
$email->Body      = $message;
//  $email->AddBCC($bob);
//  $email->AddBCC($tim);
// $email->AddBCC($zach);
// $email->AddBCC($forms);
// $email->AddBCC($phone);
// $email->AddAddress( $email2 );
$email->AddAddress( $phone );
$file_to_attach = 'src/'.$_POST['image'].'.jpg';
//$email->addCustomHeader("CC: bob@saltydog.com");
$email->AddAttachment( $file_to_attach , 'saltydogcafe.jpg' );

return $email->Send();
// header('Location:https://selfie.saltydog.com/');
?>