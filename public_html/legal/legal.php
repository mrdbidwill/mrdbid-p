<?php
session_start();

// last edit 2-8-2023

require_once("../../info/class_page.php");

$new_page = new page( );
$index = 2;

$title  = "MRDBID Legal Page";
$author = "Will Johnston";
$keyWords = "MRDBID Legal Page";
$description = "MRDBID Legal Page";
$heading = "MRDBID Legal Page";

$showAds = 'n';

$css = 'y'; $new_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );
?>

      <ul>
      
      <li><a href="privacy_policy.php">MRDBID Privacy Policy</a></li>
      <li><a href="terms_of_service.php">MRDBID Terms of Service</a></li>
      <li><a href="disclaimers.php">MRDBID Disclaimers</a></li>
      
      </ul>
      


<?php

$new_page->close_page( $index );
?>