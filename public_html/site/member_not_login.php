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
   $title  = "MRDBID Member Login NOT Page";
   $author = "Will Johnston";
   $keyWords = "MRDBID, mushroom";
   $description = "MRDBID Member Login NOT Page";
   $heading = "MRDBID Member Login NOT Page";
   $showAds = 'n';
   
   // only way to get to this page is to click on the this is not you link
   // so remove all ability to be someone else in this session
   
   session_unset();
   session_destroy();
   
   // delete cookie using same as set - except time set to past
   if( isset( $_COOKIE['mrbdid'] ) )
   {
      setcookie( "mrbdid", "", 1, "/", "", 0 );
   }

 
    $css = 'y';
$o_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );

   
 $o_member->display_secure_login_form( $index );


$o_page->close_page( $index );

?>