<?php
session_start();

// last edit 2-8-2023
        
require_once("../../info/class_page.php");
 
$new_page = new page( );
$index = 2;

$title  = "MRDBID Contact Page";
$author = "Will Johnston";
$keyWords = "MRDBID Contact Page";
$description = "MRDBID Contact Page";
$heading = "MRDBID Contact Page";

$showAds = 'n';

$css = 'y'; $new_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );
?>

       
<form name="contactform" method="post" action="send_form_email.php">
      
<table class="mail">
    <tbody>
        <tr>
            <td>
                First name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input  type="text" name="first_name" maxlength="50" size="30" />
            </td>
        </tr>
 
        <tr>
            <td>
                Last Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input  type="text" name="last_name" maxlength="50" size="30" />
            </td>
        </tr>
 
        <tr>
            <td>
                Email Address: 
                <input  type="text" name="email" maxlength="80" size="30" />
            </td>
        </tr> 
                
        <tr> 
            <td>
                Comment:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <textarea  name="comments" cols="100" rows="10"></textarea>
            </td>
        </tr>
        
        <tr>
            <td style="text-align:center">
                <input type="submit" value="Submit" />
            </td>
        </tr>
    </tbody>
</table>
 
</form>
      
   

<?php
$new_page->close_page( $index );
?>