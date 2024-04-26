<?php
session_start();
    // last edit 2-20-2023

require_once("../../info/define.php");
require_once("../../info/class_db.php");
require_once("../../info/class_page.php");
require_once("../../info/class_mushroom.php");


$page_id  = new page( );
$mr_id    = new mushroom();
$mr_pass  = new mushroom();
$db_id    = new db();
    
$index = 3;

$title  = "Admin Loop Over All Tables";
$author = "Will Johnston";
$keyWords = "Admin Loop Over All Tables";
$description = "Admin Loop Over All Tables";
$heading = "Admin Loop Over All Tables";

$showAds = 'n';
$css     = 'y';
$page_id->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );

if( isset( $_SESSION['member'] ) && ( $_SESSION['member'] === "admin" ) )
{
    
   $member =  $_SESSION['member'];
   // echo "member is $member.<br>";

   $editForName = "no";
 
   $link = $db_id->connect_database();
   $db   = 'mrdbid_php';

    ?>
    <br><br><a href="admin_dashboard.php">Admin Dashboard</a><br><br>
    <?php


    $mr_id->tables_print_show_tables($link, $db);
   
   $table_names[ ] = '';
   $table_names = $mr_id->table_return_names( $link);
   
   $numTables = sizeof($table_names);
   echo "<br>Number of Tables:  $numTables<br>";

   for( $x=0; $x<$numTables; $x++)
   {
       // echo "<br>Table Names:  $table_names[$x] on line ".__LINE__."<br>";
       //$table = 'annulus_position';
       $edit = 'y';
       $pass_id = '2';
       // $ok = $admin_id->print_look_up_table($link, $table_names[$x] );
       $ok = $mr_id->print_edit_specimen_form( $link, $table_names[$x], $pass_id, $edit );
       // $ok = $mr_id->edit_look_up_table_form( $link, $table_names[$x], $edit );
   }
}
else
{
   echo "You must be registered AND logged in as Administrator to use this form.<br>";   
}


$page_id->close_page($index);
