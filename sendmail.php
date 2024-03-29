<?php
// Note: filter_var() requires PHP >= 5.2.0
if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['comments']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
 
  // detect & prevent header injections
  $mailTest = "/(content-type|bcc:|cc:|to:)/i";
  foreach ( $_POST as $key => $val ) {
    if ( preg_match( $mailTest, $val ) ) {
      exit;
    }
  }

$headers = 'From: ' . $_POST["name"] . '<' . $_POST["email"] . '>' . "\r\n" .
    'Reply-To: ' . $_POST["email"] . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

  mail( "josh3161@gmail.com", $_POST['subject'], $_POST['comments'], $headers );
  //  Replace with your email 
}
?>