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

    $title  = "Edit One Character Processor";
    $author = "Will Johnston";
    $keyWords = "Edit One Character Processor";
    $description = "Edit One Character Processor";
    $heading = "Edit One Character Processor";
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

    // $db = 'mrdbid_php';
    // $new_mr->table_print_column_data_type($link, $db);  // prints out a list of every table and column name and data type


    echo "<hr>";

    foreach($_POST as $key => $val)   // enter POST values into array
    {
        if (is_array($key))
        {
            echo "<p>Is an array on line ".__LINE__." of ".__FILE__.".</p>";
        }
        else
        {
            // echo "{$key} - {$val} <br>";
            $enter_var_array[] = $val;
        }
    }

    if(isset($_POST['character']) )
    {
        $character  = $_POST['character'];
        // echo "<p>L ".__LINE__." character: $character</p>";
    }
    else
    {
        echo "<p></p>character is NOT set on line ".__LINE__." of ".__FILE__.".</p>";
    }

    if(isset($_POST['specimen_id']) )
    {
        $specimen_id  = $_POST['specimen_id'];
        // echo "<p>L ".__LINE__." specimen_id: $specimen_id</p>";
    }
    else
    {
        echo "<p></p>specimen id for THIS SPECIMEN is NOT set on line ".__LINE__." of ".__FILE__.".</p>";
    }

    if(isset($_POST['character_id']) )
    {
        $character_id  = $_POST['character_id'];
        echo "<p>character_id: $character_id on Line ".__LINE__." of ".__FILE__.".</p>";
    }
    else
    {
        echo "<p></p>character_id is NOT set on line ".__LINE__." of ".__FILE__.".</p>";
    }

    if(isset($_POST['character_value']) )
    {
        $character_value  = $_POST['character_value'];
         echo "<p>L ".__LINE__." character_value: $character_value</p>";
    }
    else
    {
        echo "<p></p>character_value is NOT set on line ".__LINE__." of ".__FILE__.".</p>";
    }

    if( isset( $_SESSION['id'] ) )
    {
         $addedBy  = $_SESSION['id'];
    }
    else
    {
        exit( "You must be logged in.<br>" );
    }

    if(isset( $_POST['specimen_id']) )
    {
        $specimen_id = $_POST['specimen_id'];
        echo "<p>specimen_id: $specimen_id on L ".__LINE__." of ".__FILE__.".</p>";
    }
    else
    {
        echo "<p>specimen_id is NOT set on line ".__LINE__." of ".__FILE__.".</p>";
    }

        if( isset( $_POST['old_value']) && $_POST['old_value'] != 1 )   // if old_value is set, then update
        {
            $old_value = $_POST['old_value'];
            echo "<p>L ".__LINE__." old_value: $old_value.</p>";

            $query_string = "UPDATE specimen_characters SET character_value = '$character_value' WHERE character_id = $character_id AND specimen_id = $specimen_id";
            // $query_string = "UPDATE specimen_characters SET $table_name = '$new_value' WHERE id = $specimen_name";

            echo "<br>query_string:  $query_string on L ".__LINE__." of ".__FILE__.".<br>";


            /* Prepare statement */
            $query = $link->prepare($query_string);
            if($query === false)
            {
                trigger_error('Wrong SQL: ' . $query . ' Error: ' . $link->errno . ' ' . $link->error, E_USER_ERROR);
            }
            $query->execute();
            $result = $query->get_result();

            if ($query->errno) {
                echo "<p>FAILURE!!! " . $query->error."</p>";
            }
            else
            {
                echo "<p>Character $character Updated {$query->affected_rows} rows.</p>";
            }
        }
        else
        {
            echo "<p>Need to insert since old_value is NOT set on line ".__LINE__." of ".__FILE__.".</p>"; // so insert

            $has_lookup_table = $new_mr->is_a_lookup_table( $link, $character );
            if($has_lookup_table)
            {
                $display_option = 9;
            }
            else
            {
                $display_option = 5;
            }

            $query_string = "INSERT INTO specimen_characters (`id`, `specimen_id`, `character_id`, `character_value`, `display_options`, `entered_by`, `date_entered`) VALUES ('0', ?, ?, ?, ?, ?, now() )";

            echo "<br>query_string:  $query_string on L ".__LINE__." of ".__FILE__.".<br>";


            /* Prepare statement */
            $query = $link->prepare($query_string);
            $query->bind_param("iiiii", $specimen_id, $character_id, $character_value, $display_option, $addedBy);
            if($query === false)
            {
                trigger_error('Wrong SQL: ' . $query . ' Error: ' . $link->errno . ' ' . $link->error, E_USER_ERROR);
            }
            $query->execute();
            $result = $query->get_result();

            if ($query->errno) {
                echo "<p>FAILURE!!! " . $query->error."</p>";
            }
            else
            {
                echo "<p><b>Added</b> character($character_id) with value($character_value) to specimen($specimen_id)  Updated {$query->affected_rows} rows.</p>";
            }
        }

   	$new_page->close_page( $index );

?>