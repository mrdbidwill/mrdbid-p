<?php
session_start();

// last edit 7-30-2023

   require_once("../../info/define.php");
   require_once("../../info/class_member.php");
   require_once("../../info/class_db.php");
   require_once("../../info/class_page.php");

   $o_page     = new page();
   $o_db       = new db();
   $o_member   = new member();

   $index = 2;
   $title  = "MRDBID Member Forgot Password Page";
   $author = "Will Johnston";
   $keyWords = "";
   $description = "MRDBID Member Forgot Password Page";
   $heading = "MRDBID Member Forgot Password Page ";
   
   $showAds = 'n';
 
   $css = 'y';
$o_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );

   $o_member->forgot_password_form( $index );

   $o_page->close_page( $index );

?>