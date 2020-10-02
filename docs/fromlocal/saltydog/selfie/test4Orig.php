<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require_once('../phpmailer/phpmailer/class.phpmailer.php');
//$url = "http://98.101.223.10:8080/2/webcam.jpg";
$name2 = "A Salty Dog Friend";$email2 = "";$message = "No Message";
if(isset($_POST['name'])){
	$name2 = $_POST['name'];
}
if(isset($_POST['email'])){
	$email2 = $_POST['email'];
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
$from = 'selfie@saltydog.com';
$sent = 'yes';
$email = new PHPMailer;
$email->setFrom($from);
// $email->From      = 'selfie@saltydog.com';
// $email->FromName  = 'Selfie Cam';
$email->Subject   = 'Selfie Cam at Salty Dog Cafe';
$email->Body      = "\nMessage:\n\n" . $message;
//  $email->AddBCC($bob);
//  $email->AddBCC($tim);
// $email->AddBCC($zach);
// $email->AddBCC($forms);
// $email->AddBCC($phone);
$email->addAddress($email2);
$email->addAddress($phone);
$file_to_attach = '../src/'.$_POST['image'].'.jpg';
//$email->addCustomHeader("CC: bob@saltydog.com");
// $email->AddAttachment( $file_to_attach , 'saltydogcafe.jpg' );
$email->AddEmbeddedImage($file_to_attach, "my-attach", $file_to_attach);
if(!$email->send()) {
    echo 'Message was not sent.';
    echo 'Mailer error: ' . $email->ErrorInfo;
  } else {
    echo '
    <body>
    <div class="container">
    <br>
    <br>

    <div class="text-center">
    <a href="https://selfie.saltydog.com/test/" role="button" class="btn btn-primary"> <h2>Take a New Picture</h2> </a>
    <a href="https://www.saltydog.com/" role="button" class="btn btn-primary"><h2> Salty Dog Home Page </h2></a>
    </div>
    <br>
    <br>
    
    <h2 style="color: green;">Your Photo was Sent!</h2>
    
    <h3>Photo: </h3>
    <br>
    <div class="text-center">
        <img src="' . $file_to_attach . '"style="max-width: 400px; height: auto;" >
        
    </div>
    <br>
    <h3>Message: </h3>
    <br>
 
    <h4>' . $message . '</h4>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
    ';
  }
// header('Location:https://selfie.saltydog.com/');
?>
