<?php
session_start();
    // last edit 5-27-2023

require_once("../../info/define.php");
require_once("../../info/class_db.php");
require_once("../../info/class_page.php");
require_once("../../info/class_mushroom.php");

$page_id  = new page( );
$mr_id    = new mushroom();
$mr_pass  = new mushroom();
$db_id    = new db();
    
$index = 3;

$title  = "Admin Save DB Tables and Column Names to file";
$author = "Will Johnston";
$keyWords = "Admin Save DB Tables and Column Names to file";
$description = "Admin Save DB Tables and Column Names to file";
$heading = "Admin Save DB Tables and Column Names to file";

$showAds = 'n';
$css     = 'y';
$page_id->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );

if( isset( $_SESSION['member'] ) && ( $_SESSION['member'] === "admin" ) )
{

   $member    =  $_SESSION['member'];
   $member_id =  $_SESSION['id'];

   $editForName = "no";
 
   $link = $db_id->connect_database();
   $db   = 'mrdbid_php';
   
   $table_names[ ] = '';
   $table_names = $mr_id->table_return_names( $link);
   
   $numTables = sizeof($table_names);

   $string_save = '';

   echo "<h2>Database:  $db</h2>";
   $string_save .= "Database:  $db\n\n";

   for( $x=0; $x<$numTables; $x++)
   {
   //    $edit = 'y';
       // $mr_id->admin_print_column_names( $link, $table_names[$x], $member_id, $edit );
       //$mr_id->describe_table( $link, $table_names[$x]);
       $counter = $x +1;

       $sql = "describe $table_names[$x]";
       $query = $link->prepare($sql);
       $query->execute();
       $result = $query->get_result(); // get the mysqli result

       echo "<h3>$table_names[$x]:</h3>\n";
       $string_save .= "$counter. $table_names[$x]:\n";

       while($row = mysqli_fetch_array($result))
       {
           echo "{$row['Field']} - {$row['Type']}<br>\n";
           $string_save .= "{$row['Field']} - {$row['Type']}\n";

       }
       $string_save .= "\n\n";
   }
    $file_out = "../sql/".$db."_text.txt";
    $num_bytes_saved = file_put_contents( $file_out, $string_save);

    $string_save = str_replace( '<br>', '\n', $string_save );

    if( $num_bytes_saved == 0 )
    {
        echo "<br><b>NO</b> bytes were written to $file_out.<br>";
    }
    else
    {
        echo "<br>$num_bytes_saved bytes were written to $file_out.<br>";
    }
}
else
{
   echo "You must be registered AND logged in as Administrator to use this form.<br>";   
}


$page_id->close_page($index);
