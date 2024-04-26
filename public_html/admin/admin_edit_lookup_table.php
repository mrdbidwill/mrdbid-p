<?php
session_start();
    // last edit 3-25-2024

require_once("../../info/define.php");
require_once("../../info/class_db.php");
require_once("../../info/class_page.php");
require_once("../../info/class_mushroom.php");


$new_page  = new page( );
$new_mr    = new mushroom();
$new_db    = new db();
    
$index = 3;

$title  = "Admin Edit Lookup Table";
$author = "Will Johnston";
$keyWords = "Admin Edit Lookup Table";
$description = "Admin Edit Lookup Table";
$heading = "Admin Edit Lookup Table";

$showAds = 'n';
$css = 'y'; $new_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );

if( isset( $_SESSION['member'] ) && ( $_SESSION['member'] === 'admin' ) )
{
    $member =  $_SESSION['member'];
    // echo "member is $member.<br>";

    $link = $new_db->connect_database();
    $db   = 'mrdbid_php';

    ?>
    <br><br><a href="admin_dashboard.php">Admin Dashboard</a><br><br>
    <?php


    if( isset( $_POST['rows'] ))
    {
        $row_to_edit = $_POST['rows'];
        $table       = $_POST['tables'];
        $edit        = 'y';
         //echo "<p>Table:  $table and <b>row</b> to edit is $row_to_edit on line ".__LINE__.".</p>";
        $new_mr->admin_print_edit_row_form( $link, $table, $row_to_edit, $edit );
    }
    elseif( isset( $_POST['tables'] ))
    {
        $table_to_edit = $_POST['tables'];

        if( $table_to_edit === 'x')
        {
            echo "<p>OUCH! There is no table <b>\"x\"!</b> Please try again.</p>";
        }
        else
        {
            //echo "<p>Table to edit is <b>$table_to_edit</b> on line ".__LINE__.".</p>";
        }

        $new_mr->admin_print_radio_list_one_LOOKUP_table_EDIT( $link, $table_to_edit, $show_button = 1 );
    }
    else
    {
        $new_mr->admin_print_radio_list_LOOK_UP_tables( $link, $db);  // print radio list of all lookup tables
    }
}            // close if( isset( $_SESSION['member'] ) && ( $_SESSION['member'] === "admin" ) )
else
{
   echo "You must be registered AND logged in as Administrator to use this form.<br>";
}

$new_page->close_page($index);
