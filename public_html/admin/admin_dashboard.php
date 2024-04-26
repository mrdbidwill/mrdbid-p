<?php
session_start();
    // last edit 3-8-2024

require_once("../../info/define.php");
require_once("../../info/class_db.php");
require_once("../../info/class_page.php");
require_once("../../info/class_mushroom.php");


$new_page  = new page( );
$new_mr    = new mushroom();
$new_db    = new db();
    
$index = 3;

$title  = "Admin Dashboard";
$author = "Will Johnston";
$keyWords = "Admin Dashboard";
$description = "Admin Dashboard";
$heading = "Admin Dashboard";

$showAds = 'n';
$css = 'y';
$new_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );

if( isset( $_SESSION['member'] ) && ( $_SESSION['member'] === "admin" ) )
{
    $member =  $_SESSION['member'];
    // echo "member is $member.<br>";

    $link = $new_db->connect_database();
    //$db   = 'mrdbid_php';

    if( isset( $_GET['success'] ) )
    {
        $passed_table = $_GET['success'];
        echo "<p>One row succcessfully added to <b class='greenCommentLarge'>$passed_table</b> table.</p>";
    }
?>
    <ul>
        <li><a href="admin_edit_lookup_table.php">Admin Edit <b>Lookup</b> Table <b>Data</b></a> - edit table in <?php echo DATABASE; ?> database</li>
        <li><a href="admin_insert_new_row_lookup_table.php">Admin Insert New Data - into an existing lookup table you select in <?php echo DATABASE; ?> database</a></li>
        <li><a href="admin_add_table.php">Admin Add Table</a> Admin Add new table in same format as existing tables in <?php echo DATABASE; ?> database</li>
    </ul>
<?php
    $new_mr->tables_print_show_tables( $link, DATABASE );

}            // close if( isset( $_SESSION['member'] ) && ( $_SESSION['member'] === "admin" ) )
else
{
   echo "You must be registered AND logged in as Administrator to use this form.<br>";   
}

$new_page->close_page($index);
