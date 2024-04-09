<?php
session_start();

// last edit 7-30-2023
   require_once("../../info/define.php");
   require_once("../../info/class_page.php");
   require_once("../../info/class_member.php");
 
   $newPage    = new page( );
   $newMember  = new member();
   $index = 2;

$title  = "Reset Password Page";
$author = "Will Johnston";
$keyWords = "";
$description = "Reset Password Page";
$heading = "Reset Password";
$showAds = 'n';
$css     = 'y';

$newPage->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );

  // $line = __line__;  $file = __file__; 
  // echo "Made it to Line $line of $file.<br />";

function died($error)
{
    // your error code can go here

    echo "Sorry, but there were error(s) found with the form you submitted. ";
    echo "These errors appear below.<br /><br />";
    echo $error."<br /><br />";
    echo "Please go back and fix these errors.<br /><br />";
    die();
}
// validation expected data exists

if( !isset($_POST['forgotPasswordEmail']))
{
    died('Did you enter an email address?');
}

if(isset($_POST['forgotPasswordEmail'])) {     
 
   $memberEmail = $_POST['forgotPasswordEmail'];
    // EDIT THE 2 LINES BELOW AS REQUIRED 
    $email_to = $memberEmail; 
    $email_subject = " Password Reset";     

    $email_from  = $_POST['forgotPasswordEmail'];        // required
     
     $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from))
   {
     $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
   }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
  
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
  
    // $line = __line__;  $file = __file__; 
    // echo "Made it to Line $line of $file.<br />";

    if( PRODUCTION === "yes" )
    {
       $email_message = "Please click on this link or paste it into your browser window to reset your  password:  https://www.mrdbid.com/site/reset_pw.php?email=".$memberEmail.".\n\n";
    }
    else
    {
       $email_message = "Please click on this link or paste it into your browser window to reset your  password: http://localhost/public_html/site/reset_password.php?email=".$memberEmail."\n\n";         
    }
       
   // $line = __line__;  $file = __file__; 
    // echo "Made it to Line $line of $file.<br />";
 
    function clean_string($string):string
    {
       $bad = array("content-type","bcc:","to:","cc:","href");
       return str_replace($bad,"",$string);
    }
    
    // $line = __line__;  $file = __file__; 
    // echo "Made it to Line $line of $file.<br />";    
    
    
    $sez_sent = false;
    $sez_sent = $email_from  = $newMember->test_input( $email_from );
          
 
   // $line = __line__;  $file = __file__; 
   // echo "Made it to Line $line of $file.<br />";

 
  
 
  // $line = __line__;  $file = __file__; 
  // echo "Made it to Line $line of $file.<br />"; 
 
@mail($email_to, $email_subject, $email_message, $email_from);  
}

?>
<br />
<br />
<br />
<br />
<p>Your reset password email has been sent.</p>
<br />
<br />
<br />
<br />


<?php

$newPage->close_page( $index );

?>
