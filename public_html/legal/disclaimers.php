<?php
session_start();

// last edit 2-8-2023

require_once("../../info/class_page.php");

$new_page = new page( );
$index = 2;

$title  = "MRDBID Disclaimers";
$author = "Will Johnston";
$keyWords = "MRDBID Disclaimers";
$description = "MRDBID Disclaimers";
$heading = "MRDBID Disclaimers";

$showAds = 'n';

$css = 'y'; $new_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );
?>



<h2>Disclaimers of MRDBID</h2>

<p>Although every effort has been made to provide accurate information,  <b>MRDBID</b> does not make any guarantee.</p>

<p><b>MRDBID</b> is not responsible for the actions or failures of any third parties.</p>

<p>Any comments made are strictly the opinion of the writer and may or may not reflect the position of <b>MRDBID</b>.</p>
   
<?php
$new_page->close_page( $index );
?>