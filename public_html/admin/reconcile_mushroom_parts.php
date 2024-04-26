<?php
session_start();
    // last edit 6-19-2023

require_once("../../info/define.php");
require_once("../../info/class_db.php");
require_once("../../info/class_page.php");
require_once("../../info/class_mushroom.php");


$new_page  = new page( );
$new_mr    = new mushroom();
$new_db    = new db();
    
$index = 3;

$title  = "Admin Reconcile Mushroom Table";
$author = "Will Johnston";
$keyWords = "Admin Reconcile Mushroom Table";
$description = "Admin Reconcile Mushroom Table";
$heading = "Admin Reconcile Mushroom Table";

$showAds = 'n';
$css = 'y' ;
$new_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );

if( isset( $_SESSION['member'] ) && ( $_SESSION['member'] === "admin" ) )
{
    $member =  $_SESSION['member'];
    // echo "member is $member.<br>";

    $link = $new_db->connect_database();
    $db   = 'mrdbid_php';



}            // close if( isset( $_SESSION['member'] ) && ( $_SESSION['member'] === "admin" ) )
else
{
   echo "You must be registered AND logged in as Administrator to use this form.<br>";   
}

$new_page->close_page($index);
