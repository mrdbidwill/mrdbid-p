<?php
session_start();
// last edit 3-23-2024

require_once("../../info/define.php");
require_once("../../info/class_page.php");
require_once("../../info/class_mushroom.php");
require_once("../../info/class_db.php");

$new_page  = new page( );
$new_mr =  new mushroom( );
$new_db =  new db( );

    $index = 2;

    $title  = "Admin Edit Table Processor";
    $author = "Will Johnston";
    $keyWords = "Admin Edit Table Processor";
    $description = "Admin Edit Table Processor";
    $heading = "Admin Edit Table Processor";
    $showAds = 'n';
    
    $css = 'y';
    $new_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );
    
    $link = $new_db->connect_database();
    
    // check connection
    if (mysqli_connect_errno())
    {
        printf("Connect failed: %s\n", mysqli_connect_errno());
        exit();
    }
    echo "<hr>";

    if( isset( $_POST['table']))
    {
        $table_name  = $_POST['table'];
        //echo "<p>Table name is <b>$table_name</b> on line ".__LINE__." of ".__FILE__.".</p>";
    }
    else
    {
        //echo "<p>Table name is NOT set on line ".__LINE__." of ".__FILE__.".</p>";
    }


    if( isset( $_POST['rows']))
    {
        $rows = $_POST['rows'];
        //echo "<p>Rows is <b>$rows</b> on line ".__LINE__." of ".__FILE__.".</p>";
    }
    else
    {
        //echo "<p>Rows is NOT set on line ".__LINE__." of ".__FILE__.".</p>";
    }


    if( isset( $_POST['row_num']))
    {
        $row_num = $_POST['row_num'];
        //echo "<p>row_num is <b>$row_num</b> on line ".__LINE__." of ".__FILE__.".</p>";
    }
    else
    {
        //echo "<p>specimen_id is NOT set on line ".__LINE__." of ".__FILE__.".</p>";
    }


    $existing_data = $new_mr->look_up_data_this_id( $link, $row_num, $table_name );

    $existing_name = $existing_data[0];
    $existing_description = $existing_data[1];
    $existing_comments = $existing_data[2];
    $existing_source = $existing_data[3];

    if( isset( $_POST['name']))
    {
        $name = $_POST['name'];
        if ($name !== $existing_name) {
            $new_mr->admin_update_lookup_table_data( $link, $table_name, 'name', $name, $row_num );
        } else {
            //echo "<p>name is the same as the existing name on line ".__LINE__." of ".__FILE__.".</p>";
        }
    }


    if( isset( $_POST['description']))
    {
        $description = $_POST['description'];
        if ($description !== $existing_description) {
            $new_mr->admin_update_lookup_table_data( $link, $table_name, 'description', $description, $row_num );
        } else
        {
            //echo "<p>description is the same as the existing description on line ".__LINE__." of ".__FILE__.".</p>";
        }
    }

    if (isset($_POST['comments']))
    {
        $comments = $_POST['comments'];
        if ($comments !== $existing_comments) {
            $new_mr->admin_update_lookup_table_data( $link, $table_name, 'comments', $comments, $row_num );
        } else
        {
            //echo "<p>comments is the same as the existing comments on line ".__LINE__." of ".__FILE__.".</p>";
        }
    }

    if(isset( $_POST['source']))
    {
        $source = $_POST['source'];
        if ($source !== $existing_source) {
            $new_mr->admin_update_lookup_table_data( $link, $table_name, 'source', $source, $row_num );
        } else
        {
            //echo "<p>source is the same as the existing source on line ".__LINE__." of ".__FILE__.".</p>";
        }
    }

   	$new_page->close_page( $index );

?>