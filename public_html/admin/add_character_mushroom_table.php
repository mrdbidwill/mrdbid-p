<?php
session_start();
    // last edit 6-20-2023

require_once("../../info/define.php");
require_once("../../info/class_db.php");
require_once("../../info/class_page.php");
require_once("../../info/class_mushroom.php");

$new_page  = new page( );
$new_mr    = new mushroom();
$new_db    = new db();
    
$index = 3;

$title  = "Admin Add Character Mushroom Table";
$author = "Will Johnston";
$keyWords = "Admin Add Character Mushroom Table";
$description = "Admin Add Character Mushroom Table";
$heading = "Admin Add Character Mushroom Table";

$showAds = 'n';
$css = 'y';
$new_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );

if( isset( $_SESSION['member'] ) && ( $_SESSION['member'] === "admin" ) )
{
    $member =  $_SESSION['member'];

    $link = $new_db->connect_database();
    $db   = 'mrdbid_php';

    ?>
    <br><br><a href="admin_dashboard.php">Admin Dashboard</a><br><br>
    <?php

    $new_mr->admin_add_column_mushroom_table( $link );

}            // close if( isset( $_SESSION['member'] ) && ( $_SESSION['member'] === "admin" ) )
else
{
   echo "You must be registered AND logged in as Administrator to use this form.<br>";
}

$new_page->close_page($index);
