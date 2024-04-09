<?php
session_start();

// last edit 7-26-2023

   require_once("../../info/define.php");
   require_once("../../info/class_db.php");
   require_once("../../info/class_page.php");

$o_page     = new page();
$o_db       = new db();

$index = 2;
$title  = "MRDBID Member Log Out Page";
$author = "Will Johnston";
$keyWords = "MRDBID, mushroom, fungi, fungus";
$description = "MRDBID Member Log Out Page";
$heading = "MRDBID Member Log Out Page";

$showAds = 'n';

$o_db = new db();
$link = $o_db->connect_database(  );

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error()." Line ".__LINE__." of ".__FILE__."<br>";
}
else
{
    // echo "<br> Connected to database Line ".__LINE__." of ".__FILE__.".<br>";
}


if( isset( $_SESSION['member'] ) )
{
   $old_member = $_SESSION['member'];  // store  to test if they *were* logged in
}   
   unset($_SESSION['member']);
   session_destroy();

   // delete cookie using same as set - except time set to past
   if( isset( $_COOKIE['mrdbid'] ) )
   {

      $userID = $o_page->get_userID_from_cookie();
      
      // echo "userID is $userID passed into delete_active_token_from_user  on line ".__LINE__." of ".__FILE__.".<br>";    
         
      if( $o_page->delete_active_token_from_user( $link, $userID ) )
      {
        // echo "Successful token deletion on line ".__LINE__." of ".__FILE__.".<br>";
      }
    
      // NOW delete cookie on browser
      setcookie( "mrdbid", "", 1, "/", "", 0 );
      
   }

$css = 'y';
$o_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );




if (!empty($old_member))
{
   echo "<p>You are logged out.</p>";
}
else
{
   // if they weren't logged in but came to this page somehow
   echo "<p>You were <b>not</b> logged in, and so have <b>not</b> been logged out.</p>";
}
$o_page->close_page( $index );

?>