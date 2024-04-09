<?php
session_start();

// last edit 2-8-2023
        
require_once("../../info/class_page.php");

$new_page = new page( );
$index = 2;


$title  = "MRDBID Contact Links Page";
$author = "Will Johnston";
$keyWords = "MRDBID Contact Links Page";
$description = "MRDBID Contact Links Page";
$heading = "MRDBID Contact Links Page";

$showAds = 'n';

$css = 'y'; $new_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );
?>
<br>
<br>

<a href="contact.php"><img class="noWrap"   src="../images/contact_mushroom.png" alt="Contact " /> - Contact MRDBID</a><br><br><br>
      
<a href="contact_will.php"><img class="noWrap"   src="../images/contact_will.png" alt="Contact Will Johnston" /> - Contact Will Johnston</a><br><br><br>
      
<a href="contact_problem.php"><img class="noWrap" src="../images/report_problem.png" alt=" Report Problem" /> - Report problem with MRDBID web page navigation.</a>
   
<?php
$new_page->close_page( $index );
?>