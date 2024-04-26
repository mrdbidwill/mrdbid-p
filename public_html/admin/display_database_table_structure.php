<?php
session_start();
    // last edit 2-29-2024

require_once("../../info/define.php");
require_once("../../info/class_db.php");
require_once("../../info/class_page.php");
require_once("../../info/class_mushroom.php");


$page_id  = new page( );
$mr_id    = new mushroom();
$mr_pass  = new mushroom();
$db_id    = new db();
    
$index = 3;

$title  = "Admin Display Database Table Structure";
$author = "Will Johnston";
$keyWords = "Admin Display Database Table Structure";
$description = "Admin Display Database Table Structure";
$heading = "Admin Display Database Table Structure";

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
        <h1>Display Database Table Structure</h1>
    <?php


   // $mr_id->tables_print_show_tables($link, $db);
   
   $table_names[ ] = '';
   $table_names = $mr_id->table_return_names( $link);
   
   $numTables = sizeof($table_names);
   echo "<br>Number of Tables in $db:  $numTables<br>Tables:<br>";

   for( $x=0; $x<$numTables; $x++)
   {
       $display_x = $x + 1;
       echo "<br>($display_x) <b>$table_names[$x]</b><br>";

       $col_names_array = $mr_id->column_return_names( $link, $table_names[$x] );

       // echo "<br>Table Name:  $table_name ".__LINE__."<br>";

       $num_cols = sizeof( $col_names_array );

       for($ct_c=0; $ct_c<$num_cols;$ct_c++ )
       {
           echo "$col_names_array[$ct_c]<br>";
       }


       // echo "<br>($x) <b>$table_names[$x]</b> on line ".__LINE__."<br>";
       //$table = 'annulus_position';
       //$edit = 'y';
       //$pass_id = '2';
       // $ok = $admin_id->print_look_up_table($link, $table_names[$x] );
       //$ok = $mr_id->print_edit_specimen_form( $link, $table_names[$x], $pass_id, $edit );
       // $ok = $mr_id->edit_look_up_table_form( $link, $table_names[$x], $edit );
   }
}
else
{
   echo "You must be registered AND logged in as Administrator to use this form.<br>";   
}


$page_id->close_page($index);
