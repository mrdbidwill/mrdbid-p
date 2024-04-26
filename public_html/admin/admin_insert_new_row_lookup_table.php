<?php
session_start();
    // last edit 9-11-2023

require_once("../../info/define.php");
require_once("../../info/class_db.php");
require_once("../../info/class_page.php");
require_once("../../info/class_mushroom.php");


$new_page  = new page( );
$new_mr    = new mushroom();
$new_db    = new db();
    
$index = 3;

$title  = "Admin Insert New Row Lookup Table";
$author = "Will Johnston";
$keyWords = "Admin Insert New Row Lookup Table";
$description = "Admin Insert New Row Lookup Table";
$heading = "Admin Insert New Row Lookup Table";

$showAds = 'n';
$css = 'y';
$new_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );

if( isset( $_SESSION['member'] ) && ( $_SESSION['member'] === "admin" ) )
{
    $member =  $_SESSION['member'];
    // echo "member is $member.<br>";

    $link = $new_db->connect_database();
    $db   = 'mrdbid_php';

    ?>
    <br><br><a href="admin_dashboard.php">Admin Dashboard</a><br><br>
    <?php


    if( isset( $_POST['tables'] ))
    {
        $table_to_use = $_POST['tables'];
        //echo "<p>Selected Table:  $table_to_use on line ".__LINE__.".</p>";
        echo "<p>Selected Table:  $table_to_use.</p>";
        $new_mr->admin_print_insert_new_lookup_row_form( $link, $table_to_use );
    }
    else
    {
        $new_mr->admin_print_radio_list_LOOK_UP_tables( $link, $db);
    }
}            // close if( isset( $_SESSION['member'] ) && ( $_SESSION['member'] === "admin" ) )
else
{
   echo "You must be registered AND logged in as Administrator to use this form.<br>";   
}

$new_page->close_page($index);
