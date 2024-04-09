<?php
session_start();
// last edit 3-22-2023

require_once("../../info/define.php");
require_once("../../info/class_page.php");
require_once("../../info/class_mushroom.php");
require_once("../../info/class_db.php");

$new_page  = new page( );
$new_mr =  new mushroom( );
$new_db =  new db( );
$index = 2;

$title  = "Delete Image";
$author = "Will Johnston";
$keyWords = "Delete Image";
$description = "Delete Image";
$heading = "Delete Image";

$showAds = 'n';
$css = 'y'; $new_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );

if( isset( $_SESSION['member'] )  )
{
    
    $member =  $_SESSION['member'];
    // echo "member is $member.<br>";
    
    $link = $new_db->connect_database();
    $table_name = 'images';

    if( isset( $_GET['table_id'] ) )
    {
        $table_id  = $_GET['table_id'];

        $new_mr->delete_image( $link, $table_id);

    }
    else
    {
        echo "<br>No id was passed  on ".__LINE__." of ".__FILE__.".<br>";
    }
}
else
{
   echo "You must be registered <b>AND</b> logged in to use this form.<br>";
}


$new_page->close_page($index);
?>