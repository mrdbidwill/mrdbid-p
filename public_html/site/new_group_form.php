<?php
session_start();
// last edit 6-25-2023

require_once("../../info/define.php");
require_once("../../info/class_page.php");
require_once("../../info/class_mushroom.php");
require_once("../../info/class_db.php");

$new_page  = new page( );
$new_mr    =  new mushroom( );
$new_db    =  new db( );
$index = 2;

$title  = "New Group Form";
$author = "Will Johnston";
$keyWords = "New Group Form";
$description = "New Group Form";
$heading = "New Group Form";

$showAds = 'n';
$css = 'y';
$new_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );

if( isset( $_SESSION['member'] )  )
{
    $member =  $_SESSION['member'];
    // echo "member is $member.<br>";
    
    $link = $new_db->connect_database();

    echo "<h2>About groups:</h2>";

    echo "\n<p>This is <b>your</b> group. You can use it however you like. Name it whatever helps you. Perhaps name your groups for the month you found the specimen, or location, or possible genus or species, or \"backyard\", it is up to you.</p>\n

     \n<p>My original idea was that this would be organizational, such as location or possible genus, but this will be determined by future uses.</p>\n";

    $group_cluster = 'group';
    $edit = 0;
    $new_mr->group_cluster_print_new_group_cluster_category_form( $link, $group_cluster, $edit );
}
else
{
   echo "You must be registered <b>AND</b> logged in to use this form.<br>";
}


$new_page->close_page($index);
?>