<?php
session_start();

// last edit 7-23-2023
   require_once("../../info/define.php");
   require_once("../../info/class_member.php");
   require_once("../../info/class_db.php");
   require_once("../../info/class_page.php");

   $o_page     = new page();
   $o_db       = new db();
   $o_member   = new member();

   $index = 2;
   $title  = "MRDBID Member Login Page";
   $author = "Will Johnston";
   $keyWords = "MRDBID, mushroom, fungi, fungus";
   $description = "MRDBID Member Login Page";
   $heading = "MRDBID Member Login Page ";
   $showAds = 'n';
  
   // $o_page->all_page_pre_open_check();
    $css = 'y';
    $o_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );
    
    $o_member->display_secure_login_form( $index );

    $o_page->close_page( $index );
