<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_errors', 'On');


require_once('./phpmailer/phpmailer/class.phpmailer.php');
require_once(__DIR__ . '/vendor/autoload.php');

$emailBool = false;
$phoneBool = false;
$emailSent = false;
$textSent = false;
//$url = "http://98.101.223.10:8080/2/webcam.jpg";
$name2 = "A Salty Dog Friend"; $email2; $message = "No Message";
// if(isset($_POST['name'])){
// 	$name2 = $_POST['name'];
// }
if(isset($_POST['email']) && !empty($_POST['email'])){
  $email2 = $_POST['email'];
  $emailBool = true;
  // echo isset($_POST['email']);
  // echo isset($_POST['email']);
}
if(isset($_POST['phone'])  && !empty($_POST['phone'])){
  $phone = $_POST['phone'];
  $phoneBool = true;
    // $phone = $phone . '@';
    // $phone = "+1" . $phone;
}
// if(isset($_POST['carrier'])){
// 	$carrier = $_POST['carrier'];
// }
if(isset($_POST['message'])){
	$message = $_POST['message'];
}

// $file_to_attach = 'https://selfie.saltydog.com/src/' . $_POST['image'] . '.jpg';
 $file_name = $_POST['image'] . '.jpg';
 $file_to_attach = './src/' . $_POST['image'] . '.jpg';



//  echo $file_to_attach;
echo '<body>
<div class="container">
<br>
  <div class="text-center">
    <a href="https://www.saltydog.com/" role="button" class="btn btn-primary"><h2> Salty Dog Home Page </h2></a>
    <br><br>
    <a href="https://selfie.saltydog.com/" role="button" class="btn btn-primary"> <h2>Take a New Picture</h2> </a>
  </div><br>
    ';

    function compress_image($source_url, $destination_url, $quality)
    {
        $info = getimagesize($source_url);
        $image = imagecreatefromjpeg($source_url);
        imagejpeg($image, $destination_url, $quality);
        // echo "Image uploaded successfully.";
    }
    if($phoneBool == true || $emailBool == true){
    $phone_file_to_attach = compress_image($file_to_attach, "src/" . $file_name, 45);
    }

if($phoneBool == true){
// Configure HTTP basic authorization: BasicAuth
$config = ClickSend\Configuration::getDefaultConfiguration()
              ->setUsername('jordan@saltydog.com')
              ->setPassword('32D1E230-2BB9-CB5B-81A1-0022B547030E');

              $apiInstance = new ClickSend\Api\MMSApi(new GuzzleHttp\Client(),$config);
              $mms_message = new \ClickSend\Model\MmsMessage();
              $mms_message->setTo($phone);
              $mms_message->setBody($message);
              $mms_message->setSubject("selfieCam");
              $mms_message->setFrom("selfieCam");
              $mms_message->setCountry("US");
              $mms_message->setSource("php");
            //   $mms_message->setListId(185161);
            //   $mms_message->setCustomString("custom");
              $mms_message->setFromEmail("selfie@saltydog.com");
              // \ClickSend\Model\MmsMessageCollection | MmsMessageCollection model
              $mms_messages = new \ClickSend\Model\MmsMessageCollection();
              $mms_messages->setMediaFile("https://selfie.saltydog.com/src/" . $file_name );
            // $mms_messages->AddEmbeddedImage($file_to_attach, "my-attach", $file_to_attach);

              $mms_messages->setMessages([$mms_message]);
              
              try {
                  $result = $apiInstance->mmsSendPost($mms_messages);
                  // print_r($result);
                  $textSent = true;
                echo '<h2 class="text-center" style="color: green;">Your Photo was Shared through Text!</h2> <br>';
              } catch (Exception $e) {
                  echo 'Exception when calling MMSApi->mmsSendPost: ', $e->getMessage(), PHP_EOL;
              }
    }

// $bob = 'bob@saltydog.com';
$tim = 'tim@saltydog.com';
$zach = 'zach@saltydog.com';
// $forms = 'forms@saltydog.com';

$from = 'selfie@saltydog.com';
$bob = '8433846463@vzwpix.com';
$jordanNumber = '8037075492@vzwpix.com';
$jordan = 'jordan@saltydog.com';
$mailBody = "\nMessage:\n\n" . $message;
$sent = 'yes';
$email = new PHPMailer;
$email->setFrom($from);
$email->Subject   = 'Hello From Salty Dog on Hilton Head Island';
if($emailBool == true){
$email->Body      = $mailBody;
// $email->AddBCC($bob);
// $email->AddBCC($jordan);
//  $email->AddBCC($tim);
// $email->AddBCC($zach);
// $email->AddBCC($forms);
// $email->AddBCC($phone);

$email->addAddress($email2);
//$email->addCustomHeader("CC: bob@saltydog.com");
// $email->AddAttachment( $file_to_attach , 'saltydogcafe.jpg' );
$email->AddEmbeddedImage($file_to_attach, "my-attach", $file_to_attach);


if(!$email->send()) {
    echo '<h2 style="color: red;">Email was not sent.</h2>';
    echo '<h2 style="color: red;"> Mailer error: ' . $email->ErrorInfo . "</h2>";
  } else {
    echo '
    <br>
    <br>
    
    <h2 class="text-center" style="color: green;">Your Photo was Emailed!</h2>
    
    ';
    $emailSent = true;

  }
}




if(!empty($phone) || !empty($email2)) {
echo '
<br>
<div class="text-center">
    <img src="' . $file_to_attach . '" style="max-width: 400px; height: auto;" >
    
</div>
<br>

<h4 class="text-center">' . $message . '</h4>
';
}


  echo ' </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body> ';

  $email->ClearAllRecipients( );
$email->Subject   = 'A Friend at Salty Dog';
  // $email->setTo($bob);
  $bobem = "bob@saltydog.com";
  $email->AddEmbeddedImage($file_to_attach, "my-attach", $file_to_attach);
  if($emailSent == true){
    $email->addAddress($bobem);
    $email->addAddress($tim);
    $email->addAddress($zach);
    $mailBody = $mailBody . "\n\n Emailed to " . $email2;
  }
  if($textSent == true){
    $email->addAddress($bob);
    $email->addAddress($jordanNumber);
    $mailBody = $mailBody . "\n\n Texted to " . $phone;
  } 
  $email->AddBCC($jordan);
  $email->Body = $mailBody;
  $email->send();
  $email2 = "";
  $phone = "";
  exit;
?>
