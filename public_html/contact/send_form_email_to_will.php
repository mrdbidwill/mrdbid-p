<?php
session_start();

// last edit 2-8-2023

require_once("../../info/class_page.php");

$new_page = new page( );
$index = 2;

$title  = "MRDBID Send Email To Will Page";
$author = "Will Johnston";
$keyWords = "";
$description = "MRDBID Send Email To Will Page";
$heading = "MRDBID Send Email Page";

$showAds = 'n';

$css = 'y'; $new_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );


if(isset($_POST['email'])) {     
 
    $email_to = "will@mrdbid.com";
    $email_subject = "Contact Will";     
 
    function died($error)
    {
 
        echo "Sorry, but there were error(s) found with the form you submitted. ";
         echo "These errors appear below.<br><br>";
         echo $error."<br><br>";
         echo "Please go back and fix these errors.<br><br>";
         die();
     }
 
    if(!isset($_POST['first_name']) || 
        !isset($_POST['last_name']) || 
        !isset($_POST['email'])     || 
        !isset($_POST['comments']))
        {
            died('We are sorry, but there appears to be a problem with the form you submitted.');       
        }
 
    $first_name  = $_POST['first_name'];    
    $last_name   = $_POST['last_name'];    
    $email_from  = $_POST['email'];       
    $comments    = $_POST['comments'];     
     
     $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from))
   {
     $error_message .= 'The Email Address you entered does not appear to be valid.<br>';
   }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'The First Name you entered does not appear to be valid.<br>';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br>';
 
  }
 
  if(strlen($comments) < 2) {
 
    $error_message .= 'The Comments you entered do not appear to be valid.<br>';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
  
    // $line = __line__;  $file = __file__; 
    // echo "Made it to Line $line of $file.<br>";
 
    $email_message = "Form details below.\n\n";    

    // $line = __line__;  $file = __file__; 
    // echo "Made it to Line $line of $file.<br>";
 
    function clean_string($string)
    {
       $bad = array("content-type","bcc:","to:","cc:","href");
       return str_replace($bad,"",$string);
    }
    
    // $line = __line__;  $file = __file__; 
    // echo "Made it to Line $line of $file.<br>";    
    
    
    $first_name  = $new_page->testInput( $first_name );
    $last_name   = $new_page->testInput( $last_name );
    $email_from  = $new_page->testInput( $email_from );
    $comments    = $new_page->testInput( $comments );
 
   // $line = __line__;  $file = __file__; 
   // echo "Made it to Line $line of $file.<br>";
 
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
 
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Comments: ".clean_string($comments)."\n";   
 
  // $line = __line__;  $file = __file__; 
  // echo "Made it to Line $line of $file.<br>"; 
 
@mail($email_to, $email_subject, $email_message, $email_from);  
}

?>
<br>
<br>
<br>
<br>
<p>Your email has been sent. Thank you.</p>
<br>
<br>
<br>
<br>


<?php

$new_page->close_page( $index );

?>
