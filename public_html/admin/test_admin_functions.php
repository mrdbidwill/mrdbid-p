<?php
session_start();
// last edit 3-23-2024

require_once("../../info/define.php");
require_once("../../info/class_page.php");
require_once("../../info/class_mushroom.php");
require_once("../../info/class_db.php");

$new_page     = new page( );
$newMushroom  = new mushroom( );
$db_id        = new db();
$index = 2;

$title  = "Test Mushroom Functions";
$author = "Will Johnston";
$keyWords = "Test Mushroom Functions";
$description = "Test Mushroom Functions";
$heading = "Test Mushroom Functions";

$showAds = 'n';
$css = 'y';

$new_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );

if( isset( $_SESSION['member'] ) && ( $_SESSION['member'] === "admin" ) )
{
    $member =  $_SESSION['member'];
    // echo "member is $member.<br>";
    $link = $db_id->connect_database();
    //$id = 1;

    // displays Go directly to character by clicking on link below or for color related characters click HERE. in one table row
    // next row displays list of all characters
    // $newMushroom->anchor_tag_to_character_name( $link, $id );

    //$specimen_id = 2;
    //$newMushroom->character_edit_ajax_form($link, $specimen_id);

    //$does_file_exist = file_exists( 'admin_edit_table_processor.php' );

    //if( $does_file_exist )
    //{
        //echo "File exists.<br>";
    //}
    //else
    //{
        //echo "File does not exist.<br>";
    //}

    $table_to_edit = 'annulus_position';
    // $newMushroom->admin_print_radio_list_one_table( $link, $table_to_edit );

    echo "<hr><hr><hr><hr>";

    $newMushroom->admin_print_radio_list_one_LOOKUP_table_EDIT( $link, $table_to_edit );

    //$db = 'mrdbid_php';
    //$newMushroom->admin_print_radio_list_LOOK_UP_tables( $db, $link);

   // $row_to_edit = $_POST['columns'];
   // $table       = $_POST['tables'];
   // $edit        = 'y';
   // echo "<p>Table:  $table and Column to edit is $row_to_edit on line ".__LINE__.".</p>";
   // $newMushroom->admin_print_edit_row_form( $link, $table, $row_to_edit, $edit );
}
else
{
   echo "You must be registered <b>AND</b> logged in to use this form.<br>";
}

$new_page->close_page($index);
?>