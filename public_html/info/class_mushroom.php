<?php
// File Name:  class_mushroom.php
/**
 * Creates mushroom class and functions
 * @author Will Johnston
 * @version 1.0
 * @since 1.0
 * @access public
 * @copyright Will Johnston
 * edited 4-5-2024
 */
include_once('define.php');

class mushroom
{
    function list_all_characters_lookup( $link, $specimen_id )
    {
        // working on it
        // new 3-15-2024 this function will list all characters in characters table and display their lookup table options if available

        echo "<hr>\n\n<h1>Character List:</h1>\n<hr>\n"; // give a little space between the two basic_info and the characters

        $table_name = 'characters';
        $query_part_name = $link->prepare("SELECT id, name from parts ORDER BY id ASC");
        $query_part_name->execute();
        $result_part_name = $query_part_name->get_result();

        if ($result_part_name == false)
        {
            echo "Database not available, try again later L".__LINE__." of ".__FILE__.".<br>";
        }
        else
        {
            while ($data_part_name = mysqli_fetch_assoc($result_part_name))  // loop over character table
            {
                $part_name = $data_part_name['name'];
                $part_id = $data_part_name['id'];

                if( $part_name != 'Not Entered')
                {
                    //echo "<p>Part ID:  $part_id - Part name: <b>$part_name</b> on line ".__LINE__."</p>";
                }

                $query = $link->prepare("SELECT * from $table_name WHERE part = ?");
                $query->bind_param("s", $part_id);
                $query->execute();
                $result = $query->get_result();

                if ($result == false)
                {
                    echo "Database not available, try again later L".__LINE__." of ".__FILE__.".<br>";
                }
                else
                {
                    while ($data = mysqli_fetch_assoc($result))
                    {
                        if (isset($data['look_up_y_n']) )
                        {
                            $lookup_table_name = $data['name'];
                            $part = $data['part'];

                            $part_name = $this->get_part_name_from_id($link, $part);
                            //echo "<p>Part name: <b>$part_name</b> on line ".__LINE__."</p>";

                            if( $data['look_up_y_n'] == 1 )
                            {
                                //echo "<p>Part name: <b>$part_name</b> on line ".__LINE__."</p>";

                                if ($this->name_contains('color', $lookup_table_name) )
                                {
                                  //  echo "<p>$part_name: <b>{$data['name']}</b> is a COLOR CHARACTER!</p>";
                                  //  $lookup_table_name = 'color';
                                  //  $this->admin_print_radio_list_one_LOOKUP_table_EDIT( $link, $lookup_table_name );
                                }
                                elseif ($this->name_contains('taste', $lookup_table_name))
                                {
                                    echo "<p>$part_name: <b>{$data['name']}</b> is a  Taste CHARACTER!</p>";
                                    $lookup_table_name = 'taste';
                                    $this->admin_print_radio_list_one_LOOKUP_table_EDIT( $link, $lookup_table_name, $show_button = 1 );
                                }
                                elseif ($this->name_contains('odor', $lookup_table_name))
                                {
                                    echo "<p>$part_name: <b>{$data['name']}</b> is a  Odor CHARACTER!</p>";
                                    $lookup_table_name = 'odor';
                                    $this->admin_print_radio_list_one_LOOKUP_table_EDIT( $link, $lookup_table_name, $show_button = 1 );
                                }
                                elseif ($this->name_contains('abundance', $lookup_table_name))
                                {
                                    echo "<p>$part_name: <b>{$data['name']}</b> is a  Abundant CHARACTER!</p>";
                                    $lookup_table_name = 'abundance';
                                    $this->admin_print_radio_list_one_LOOKUP_table_EDIT( $link, $lookup_table_name, $show_button = 1 );
                                }
                                echo "<p>$part_name: <b>{$data['name']}</b></p>";
                                $this->admin_print_radio_list_one_LOOKUP_table_EDIT( $link, $lookup_table_name, $show_button = 1 );
                            }
                            else
                            {
                                //echo "<p>Part name: <b>$part_name</b> on line ".__LINE__."</p>";
                                echo "<p>$part_name: <b>{$data['name']}</b> on  line ".__LINE__."</p>";
                            }
                        }
                        else    // $data['look_up_y_n'] is NOT set
                        {
                            echo "<p>data['look_up_y_n'] is  <b>NOT</b> set on line ".__LINE__."</p>";

                        }
                    }
                }
            }
        }       // end      while ($data_part_name = mysqli_fetch_assoc($result_part_name))  // loop over character table
    }// function list_all_characters_lookup( $link, $specimen_id )


function get_part_name_from_id( $link, $part_id ):string
{
    // get part name
    $query_part_name = $link->prepare("SELECT name from parts WHERE id = ? ");
    $query_part_name->bind_param("i", $part_id);
    $query_part_name->execute();
    $result_part_name = $query_part_name->get_result();

    $part_name = mysqli_fetch_assoc($result_part_name);
    //echo "<p>Part name: <b>{$part_name[0]}</b> on line ".__LINE__."</p>";

    return $part_name['name'];
}  // close function get_part_name_from_id( $link, $part_id )



function get_character_id_from_name( $link, $character_name ):int
{
    // get character id
    $query_character_id = $link->prepare("SELECT id from characters WHERE name = ? ");
    $query_character_id->bind_param("s", $character_name);
    $query_character_id->execute();
    $result_character_id = $query_character_id->get_result();

    $character_id = mysqli_fetch_assoc($result_character_id);
    //echo "<p>Character id: <b>{$character_id[0]}</b> on line ".__LINE__."</p>";

    return $character_id['id'];
}  // close function get_character_id_from_name( $link, $character_id )

function get_display_type_from_character_name( $link, $character_name )
{
    // get display type
    $query_display_type = $link->prepare("SELECT display_options from characters WHERE name = ? ");
    $query_display_type->bind_param("s", $character_name);
    $query_display_type->execute();
    $result_display_type = $query_display_type->get_result();

    $display_type = mysqli_fetch_assoc($result_display_type);
    //echo "<p>Display type: <b>{$display_type[0]}</b> on line ".__LINE__."</p>";

    return $display_type['display_options'];


}  // close function get_display_type_from_character_name( $link, $character_name )

function get_selected_value_for_this_specimen_id_this_character_id( $link, $specimen_id, $character_id )
{
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    /* create a prepared statement */
    $stmt = $link->prepare("SELECT character_value from specimen_characters WHERE specimen_id = ? AND character_id = ?");

    /* bind parameters for markers */
    $stmt->bind_param("ii", $specimen_id, $character_id);

    /* execute query */
    $stmt->execute();

    /* bind result variables */
    $stmt->bind_result($character_value);

    /* fetch value */
    $stmt->fetch();

    //echo "<p>Character value: <b>$character_value</b> on line ".__LINE__."</p>";

    return $character_value;
}  // close function get_selected_value_for_this_specimen_id_this_character_id( $link, $character_name, $specimen_id )



    function return_basic_info_for_this_specimen_id($link, $specimen_id)
    {
        $data_array = array();
        $table_name = 'specimens';
        $query = $link->prepare("SELECT * FROM $table_name WHERE id = ?");

        $query->bind_param("i", $specimen_id);

        $query->execute();
        $result = $query->get_result(); // get the mysqli result
        $size_column = mysqli_num_fields($result);
        if(!$result)
        {
            echo "Database not available, try again later L".__LINE__.".<br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $result );
            if( $rowCt > 0 )
            {
                //echo "<br>rowCt: $rowCt on line ".__LINE__.".";

                $rowAnswers = mysqli_fetch_array($result);


                //$num_col = sizeof($col_names_array);
                                //echo "<br>num_col: $num_col on line ".__LINE__.".";
                for($i=0;$i<$size_column;$i++)
                {
                    $data_array[] = $rowAnswers[$i];
                   // echo "<br>rowAnswers[".$i."] is $rowAnswers[$i] on line ".__LINE__."<br>";
                }
            }
            else
            {
                // echo "No return from function return_data_array_for_this_id( $link, $table, $col_names_array, $pass_id ):array - Line ".__LINE__.".<br>";
                return $data_array;
            }
            //$size_return = sizeof($data_array );
            //echo "<br>Size of return array is $size_return on line ".__LINE__.".<br>";
            return $data_array;
        }
        return $data_array;

    }   // close function return_basic_info_for_this_specimen_id($link, $specimen_id)



    function admin_update_lookup_table_data( $link, $table_name, $column_name, $new_value, $row_num ):bool
    {
        //echo "<p>table_name: $table_name - column_name: $column_name - new_value: $new_value on line ".__LINE__.".</p>";
        $query_update = "UPDATE $table_name SET $column_name = ? WHERE id = ?";

        echo "<p>L ".__LINE__." query_update:  $query_update</p><p></p>";

        $query_update = $link->prepare($query_update);
        $query_update->bind_param("ss", $new_value, $row_num);

        // echo "<br>query: $query<br>";

        $query_update->execute( );
        $result_update = $query_update->get_result();

        if ($query_update->errno)
        {
            // echo "<p>FAILURE!!! " . $query_update->error."</p>";
            return 0;
        }
        else
        {
             // -  {$query_update->affected_rows} row(s) updated.
            echo "<b>$column_name</b> updated in table <b>$table_name</b>.</p>";
            return 1;
        }

    }   // close     function admin_update_lookup_table_data( $link, $table_name, $column_name, $new_value, $row_num  ):bool


    function admin_add_column_mushroom_table( $link ):void
    {
        $edit = 0;
        $data_type = '';

        ?>
        <form name="add_column"  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <table class="compare">
                        <tr class="compare">
                            <td class="compare">
                                <input type="text" id="col_name" name="col_name"  size="64" maxlength="64"><label for="col_name"> Column Name:</label>
                            </td>
                        </tr>

                        <tr class="compare">
                            <td class="compare">
                                <label for="data_type"> Data Type:</label>
                                <select name="data_type" id="data_type">

                                <option value="x" <?php if( $edit   && $data_type == "x") {echo "selected='selected'";}elseif( !$edit ){ echo "selected='selected'";}?>>Select</option>
                                <option value="int"     <?php if( $edit   && $data_type == "int") { echo "selected='selected'";} ?>>int</option>
                                <option value="varchar" <?php if( $edit   && $data_type == "varchar") { echo "selected='selected'";} ?>>varchar</option>
                                <option value="char"    <?php if( $edit   && $data_type == "char") { echo "selected='selected'";} ?>>char</option>
                                </select>
                            </td>
                        </tr>

                        <tr class="compare">
                            <td class="compare">
                                <input type="text" id="length" name="length"  size="64" maxlength="64"><label for="length"> length:</label>
                            </td>
                        </tr>

                        <tr class="compare">
                            <td class="compare">
                                <input type="text" id="default" name="default"  size="64" maxlength="64"><label for="default"> default:</label>
                            </td>
                        </tr>
                        
                        <tr class="compare">
                            <td class="compare">
                                <br>
                                <input type="submit" name = "submit" value="Submit">
                            </td>
                        </tr>
                    </table>
        </form>
        <?php

    }   // admin_add_column_mushroom_table( $link )


    function anchor_tag_to_character_name( $link, $specimen_id ):void
    {
        $table_name = 'characters';
        //$col_names_array = $this->column_return_names( $link, $table_name );
                $query = $link->prepare("SELECT * FROM characters");
                $query->execute();
                $result = $query->get_result(); // get the mysqli result

                if(!$result)
                {
                    echo "Database not available, try again later L".__LINE__." ".__FILE__."<br>";
                }
                else
                {
                    $row_ct =  mysqli_num_rows( $result );
                    if( $row_ct > 0 )
                    {
                        //echo "<p><b>Output of while loop</b> on Line ".__LINE__." of ".__FILE__.":</p>";
                        while ($row = $result->fetch_assoc())
                        {
                            $id              =  $row['id'];
                            $name            = $row['name'];
                            $display_options = $row['display_options'];
                            $look_up_y_n     = $row['look_up_y_n'];
                            $part            = $row['part'];

                            $character_names_array[] = $name;

                            // echo "<p> id: $id - name: $name - display_options: $display_options - look_up_y_n: $look_up_y_n - part:  $part</p>";

                        }
                   }
                   else
                   {
                       echo "<p>row_ct is NOT greater than zero.</p>";
                   }
                }
        //echo "<p>name: $name on line ".__LINE__."</p>";

        $character_names_array_alpha[] = asort($character_names_array);


    //    foreach ($col_names_array_alpha as $value)
    //    {
    //        //echo "value: $value<br>";
    //    }


        $num_characters = sizeof( $character_names_array );

        $num_c = 30;                 // rows  - for display output

        $num_r = (int)($num_characters/$num_c);  // columns
        $num_r = $num_r + 1;

        //$this->character_edit_ajax_form($link, $specimen_id);  //display form for editing specimen


        //echo "<hr>\n<b>This is a BIG change of how to access the characters of a specimen from the one Google type input box above to the loooong list below. (line ".__LINE__." of ".__FILE__."</b><hr>\n";


        echo "\n<table class='p_1'> <!-- anchor tag table Line 92  -->\n<tr class='p_1'>\n<td class='p_1'>";

        $display_ct = 1;

        for($ct_c=0; $ct_c<$num_characters;$ct_c++ )    // for every column in mushroom table currently 103
        {
            $character_name   = $character_names_array[$ct_c];
            $display_character_name = $this->prep_db_word_for_display( $character_name );

            $remainder_rows = $ct_c % ($num_r * $num_c);
            $remainder_cols = $ct_c % $num_c;

            $table_ct   = $ct_c + 1;


            if( ($character_name  != 'id') && ($character_name != 'date_entered') && ($character_name != 'entered_by')  )
            {
                // echo "$ct_c -$table_ct -$remainder_rows - $remainder_cols<br>";

                $is_color_character = $this->name_contains( 'color', $character_name );

                if( !$is_color_character )
                {
                    echo "<a href=\"member_dashboard.php?a=16&sid=".$specimen_id."&name=".$character_name."_$table_ct\">$display_character_name</a><br><br>\n";
                }
                else
                {
                    echo "<a href=\"#".$character_name."_$table_ct\">$display_character_name</a> <b>Use color!</b><br><br>\n";
                }
                $table_ct   = $table_ct + 1;
                $display_ct = $display_ct + 1;
            }

            // echo "<p>ct_c:  $ct_c  r: $remainder_rows  c: $remainder_cols table_count:  $table_ct</p>\n";

            if(  ($remainder_cols == 0) && ($ct_c != 0) )
            {
                echo "</td>\n<td class='p_1'>  <!-- Line  ".__LINE__." -->\n";
            }

            if( $remainder_rows == 0 )
            {
                echo "<tr class='p_1'>\n<td class='p_1'>  <!-- Line  ".__LINE__." -->\n";
            }
        }
            echo "</td>\n</tr>\n</table><!-- END anchor tag table Line 105  -->\n\n";

    }     // close     function anchor_tag_to_character_name( $link ):void

    function admin_print_radio_list_LOOK_UP_tables( $passLink, $db ):void
    {
        $queryName = "SHOW tables FROM ".$db;

        $resultLog = mysqli_query($passLink, $queryName);

        if(!$resultLog)
        {
            echo "Database not available, try again later L".__LINE__.".<br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $resultLog );
            if( $rowCt > 0 )
            {
                ?>
                <p>Select which table's data to edit:</p>

                <form name="edit_new"  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <table>
                        <tr>
                            <td>
                                <input type="radio" id="x" name="tables"  size="12"  value="x" checked="checked" /><label for="x"> Select One:</label>
                            </td>
                        </tr>
                        <?php

                        while( $rowAnswers = mysqli_fetch_row($resultLog) )
                        {
                            $tableName  = $rowAnswers[0];

                            // data_source ??
                            if( ( $tableName != 'characters') && ( $tableName != 'specimen_group') && ($tableName != 'images') && ($tableName != 'member') && ($tableName != 'member_type') && ($tableName != 'tokens') && ($tableName != 'mushroom_character_group') && ($tableName != 'color') && ($tableName != 'images_thumbnail') && ($tableName != 'lens') && ($tableName != 'member_list_clusters') && ($tableName != 'member_list_groups'))
                            {
                                ?>
                                <tr>
                                    <td>
                                        <input type="radio"  id="<?php echo $tableName; ?>" name="tables" size="40" value="<?php echo htmlentities($tableName ); ?>"> <label for="<?php echo $tableName; ?>"><?php echo $tableName; ?> </label>
                                    </td>
                                </tr>
                            <?php
                            }
                        }
                        ?>
                        <tr>
                            <td>
                                <p>Double-check your information. If all is correct click the "Submit" Button.</p>

                                <br>
                               <!--  <input type="hidden" name="table" value="<?php echo $tableName; ?>">  -->
                                <input type="hidden" name="tried" value="mydog">
                                <input type="submit" name = "submit" value="Submit">
                            </td>
                        </tr>
                    </table>
                </form>

                <?php

            }
            else
            {
                echo "No return from function show_radio_list_tables - Line ".__LINE__.".<br>";

            }
        }
    }    // close admin_print_radio_list_LOOK_UP_tables( $db, $passlink )




    function admin_print_radio_list_one_LOOKUP_table_EDIT( $link, $table_to_edit, $show_button ):void
    {
        if( $table_to_edit == 'x' )
        {
            echo "No table name was sent Line ".__LINE__." of ".__FILE__.".<br>";
            return;
        }

        $queryName = "SELECT * FROM $table_to_edit";
        $resultLog = mysqli_query($link, $queryName);

        if(!$resultLog)
        {
            echo "table_to_edit:  $table_to_edit - queryName: $queryName on line ".__LINE__."<br>";
            echo "Database not available, try again later L".__LINE__.".<br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $resultLog );
            if( $rowCt > 0 )
            {
                if($show_button)
                {
                    ?>
                    <p>Select which <b>row</b> of character <b><?php echo $table_to_edit; ?></b> <u>data</u> to edit:</p>

                    <form name="edit_row_data"  method="post" action="edit_one_character_processor.php">  <!-- form edit_row_data begins line <?php echo __LINE__; ?> -->
                    <?php
                }
                    ?>
                    <table>
                        <tr>
                            <td>
                                <!-- <input type="radio" id="x" name="rows_radio"  size="12" value="x" checked="checked"><label for="x"> Select One:</label> -->
                                <input type="radio" id="x" name="<?php echo $table_to_edit; ?>"  size="12" value="x" checked="checked"><label for="x"> Select One:</label>
                            </td>
                        </tr>
                        <?php

                        while( $rowAnswers = mysqli_fetch_assoc($resultLog) )
                        {

                            $row_id = '';
                            if(isset ( $rowAnswers['id']  ) )
                            {
                                $row_id  = $rowAnswers['id'];
                            }

                            $row_name = '';
                            if(isset ( $rowAnswers['name']  ) )
                            {
                                $row_name  = $rowAnswers['name'];
                            }

                            $row_description = '';
                            if(isset ( $rowAnswers['description']  ) )
                            {
                                $row_description  = $rowAnswers['description'];
                            }

                            $row_comments = '';
                            if(isset ( $rowAnswers['comments']  ) )
                            {
                                $row_comments  = $rowAnswers['comments'];
                            }

                            $row_source = '';
                            if(isset ( $rowAnswers['source']  ) )
                            {
                                $row_source  = $rowAnswers['source'];
                            }

                            ?>
                            <tr>
                                <td>
                                    <input type="radio"  id="<?php echo $table_to_edit; ?>" name="<?php echo $table_to_edit; ?>" size="40" value="<?php echo htmlentities($row_id ); ?>"> <label for="<?php echo $row_id; ?>"><?php echo "$row_id:  $row_name - $row_description - $row_comments - $row_source"; ?> </label>
                                </td>
                            </tr>

                            <?php
                        }

                        if( $show_button )
                        {
                            ?>
                            <tr>
                                <td>
                                    <br>
                                    <input type="hidden" name="tables" value="<?php echo $table_to_edit; ?>">
                                    <input type="hidden" name="tried" value="mydog">
                                    <input type="submit" name = "submit" value="Submit">
                                </td>
                            </tr>
                            </table>
                            </form>   <!-- form edit_row_data ends line <?php echo __LINE__; ?> -->
                            <?php
                        }
                        else
                        {
                            ?>
                            </table><br><br>
                            <?php
                        }
            }
            else
            {
                echo "No return from function show_radio_list_tables - Line ".__LINE__.".<br>";

            }
        }
    }    // close admin_print_radio_list_one_LOOKUP_table_EDIT( $link, $table_to_edit )



    function admin_print_edit_row_form( $link, $table_name, $row_num, $edit ):void
    {
        if( !$table_name  )
        {
            echo "<p>No table name was sent Line ".__LINE__.".</p>\n";
            return;
        }

        if( !$row_num  )
        {
            echo "<p>No <b>row number to edit</b> was sent Line ".__LINE__.".\n</p>";
            return;
        }

        if( $table_name != 'characters' && $table_name != 'images' && $table_name != 'images_thumbnails' && $table_name != 'lens' && $table_name != 'member' && $table_name != 'member_type' && $table_name != 'tokens')
        {
            $col_names_array = $this->column_return_names( $link, $table_name );
            $db_array        = $this->return_data_array_for_this_id( $link, $table_name, $col_names_array, $row_num );  //SELECT * FROM $table

            // echo "<br>Table Name:  $table_name ".__LINE__."<br>";

            $num_cols = sizeof( $col_names_array );
            // echo "<br><br>Mushroom Table:  $table_name<br><br>";

            echo "<form action=\"admin_edit_table_processor.php\" method=\"post\" name=\"$table_name\" >\n
            <table>\n";

            for($ct_c=0; $ct_c<$num_cols;$ct_c++ )
            {
                ?>
                <tr>
                    <td>
                        <?php
                        if( isset( $db_array[$ct_c] ) )
                        {
                            if( $col_names_array[$ct_c] == 'id' )
                            {
                               // echo "<b>Table ID: $db_array[$ct_c]</b><br>";
                            }
                            elseif(  $col_names_array[$ct_c] == 'entered_by' )
                            {
                                //echo "<b>Entered By: $db_array[$ct_c]</b><br>";
                            }
                            elseif(  $col_names_array[$ct_c] == 'date_entered' )
                            {
                                //echo "<b>Date Entered: $db_array[$ct_c]</b><br>";
                            }
                            else
                            {
                                $return_to_one = $ct_c + 1;
                                $u_count = 'c'.$return_to_one;
                                //echo "$u_count. $col_names_array[$ct_c]<br>";

                                echo "<label for=\"".$col_names_array[$ct_c]."\">".$col_names_array[$ct_c].":</label>  <input type=\"text\" name=\"".$col_names_array[$ct_c]."\" id=\"".$u_count."\" size=\"100\" maxlength=\"100\" value = \"";

                                if( $edit )
                                {
                                    echo "$db_array[$ct_c]\">\n";
                                }
                                else
                                {
                                    echo "\">\n";
                                }
                            }
                        }
                        else
                        {
                            $return_to_one = $ct_c + 1;
                            $u_count = 'c'.$return_to_one;
                            //echo "$u_count. $col_names_array[$ct_c]<br>";
                            ?>
                            <label for="<?php echo $u_count;?>"><?php echo $col_names_array[$ct_c]; ?>:</label>  <input type="text" name="<?php echo $u_count;?>" id="<?php echo $u_count;?>" size="100" maxlength="100" value = "">
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        </table>

        <br>
        <input type="hidden" name="table" value="<?php echo $table_name; ?>">
        <input type="hidden" name="row_num" value="<?php echo $row_num; ?>">
        <input type="hidden" name="tried"  value="mydog">
        <input type="submit" name="submit" value="Submit">
        </form>
        <?php

    }     // close function admin_print_edit_row_form( $link, $table_name, $pass_id, $edit )**********************



    function admin_print_insert_new_lookup_row_form( $link, $table_name )
    {

            $col_names_array = $this->column_return_names( $link, $table_name );

            $num_cols = sizeof( $col_names_array );

             // echo "<p>Table Name:  $table_name ".__LINE__."</p>";
            ?>

            <form action="admin_new_row_lookup_table_processor.php" method="post" name="<?php echo $table_name ?>" >
                <table class="lookup">
                    <?php
                    for($ct_c=0; $ct_c<$num_cols;$ct_c++ )    // for every column in mushroom table currently 97
                    {
                        $target = $col_names_array[$ct_c];

                        //$return_to_one = $ct_c + 1;   // moved up from 860 to around line 801 so lookup tables still in order
                        $return_to_one = $ct_c - 1;
                        $u_count = 'c'.$return_to_one;   // double check this
                        // $u_count = 'c'.$ct_c;           // and this

                        if( ($target != 'id') &&  ($target != 'entered_by') &&($target != 'date_entered') )
                        {
                                    ?>
                                    <tr class="lookup">
                                        <td>
                                            <?php
                                            // $return_to_one = $ct_c + 1;   // moved up to around line 801 so lookup tables still in order
                                            // $u_count = 'c'.$return_to_one;
                                            ?>
                                            <label for="<?php echo $u_count;?>"><?php echo $col_names_array[$ct_c]; ?>: </label>  <input type="text" name="<?php echo $u_count;?>" id="<?php echo $u_count;?>" size="128" maxlength="128" value = "">
                                        </td>
                                    </tr>
                                    <?php
                        }    // close if( ($target != 'id') &&  ($target != 'entered_by') &&($target != 'date_entered') )
                    }
                     ?>

                </table>
                <p>Double check your information. If all is correct click the "Submit" Button.</p>

                <br>
                <input type="hidden" name="table" value="<?php echo $table_name; ?>">
                <input type="submit" name = "submit" value="Submit">
            </form>
            <?php

    }  // function admin_print_insert_new_lookup_row_form( $link, $table_to_use )


    function admin_print_add_lookup_table_form( $pass_link, $new_table_name )
    {
        ?>
        <p>Enter new table name:</p>

                <form name="new_lookup_table"  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <table>
                        <tr>
                            <td>
                                <input type="text" id="new_table_name" name="new_table_name"  size="64" maxlength="64" value=""  /><label for="new_table_name"> </label>
                            </td>
                        </tr>
                        </table>
                    <br>
                    <input type="submit" name = "submit" value="Submit">
                </form>
        <?php
    }  // function admin_print_add_table_form( $link, $db )

    function admin_add_lookup_table( $new_table_name )
    {
        $link = mysqli_connect( HOST, ADMIN_USER, ADMIN_PASSWORD, DATABASE );

        // check connection
        if ( mysqli_connect_errno() )
        {
            printf("Connect failed: %s\n", mysqli_connect_errno());
            exit();
        }

        $query = "CREATE TABLE $new_table_name (
            `id` int NOT NULL,
            `name` char(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
            `description` varchar(248) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
            `comments` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
            `source` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
            `entered_by` int NOT NULL,
            `date_entered` datetime NOT NULL
             ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci";

        //$resultLog = mysqli_query($link, $query);

        if ($link->query($query) === TRUE)
         {
            echo "Table $new_table_name created successfully.";
         }
         else
         {
            echo "Error creating table: " . $link->error;
         }
    }   //     function admin_add_lookup_table( $pass_link, $new_table_name)





// color functions below ===============================================================

    function color_display_color_character_edit_here_link($specimen_id)
    {
        // displays the link to edit color related characters
        echo "\n<table class='p_1'> <!-- anchor tag table Line 92  -->\n";

        echo "\n<tr class='p_1'>\n<td class='p_1'><br></td>\n</tr>"; // empty row

        echo "\n<tr class='p_1'>\n<td class='p_1'>Go directly to <b>color related characters</b> click  <a href=\"member_dashboard.php?a=13&sid=$specimen_id\"> HERE.</a> </td>\n</tr>\n";

        echo "\n<tr class='p_1'>\n<td class='p_1'><br></td>\n</tr>\n</table>\n<br><br>\n";      // empty row
    }   // function color_display_color_character_edit_here_link($specimen_id)


function color_update_specimens_character($link, $character, $character_color, $specimen_id ):bool   // works 3-18
    {
        $query_update = "UPDATE specimen_characters SET character_value = ? WHERE specimen_id = ? AND character_id = ?";

        echo "<p>character color:  $character_color - specimen_id:  $specimen_id - character: $character - query_update:  $query_update on line ".__LINE__."</p>";

        $query_update = $link->prepare($query_update);
        $query_update->bind_param("iii", $character_color, $specimen_id, $character);

        // echo "<br>query: $query<br>";

        $query_update->execute( );
        $result_update = $query_update->get_result();

        if ($query_update->errno)
        {
            // echo "<p>FAILURE!!! " . $query_update->error."</p>";
            return 0;
        }
        else
        {
             $color_names = $this->color_return_color_names_from_id($link, $character_color);  // works 3-18
            //$color_names = $this->color_get_color_name_from_color_id($link, $character_color);  // not working

            // echo "<p>specimen_id: $specimen_id line ".__LINE__."</p>";
            $specimen_name = $this->specimen_return_name_from_specimen_id($link, $specimen_id);
            //var_dump( $color_names );
            $latin_name  = $color_names[0][0];
            $common_name = $color_names[0][1];
            $cwc         = $color_names[0][2];

            // echo "<p>specimen_id: $specimen_id line ".__LINE__."</p>";
            $specimen_name = $this->specimen_return_name_from_specimen_id($link, $specimen_id);

            //  -  {$query_update->affected_rows} row(s) updated.
            echo "<p>Specimen ID( $specimen_id ) <b class=''>$specimen_name</b>'s character variable <b class='red'>$character</b> updated to color ($character_color) $latin_name (Latin) - $common_name (common)- $cwc (closest websafe color).</p>";


            echo "<br> <br> <a href=\"member_dashboard.php?a=13&sid=$specimen_id\">Update another color character for this specimen?</a><br>";
            return 1;
        }
    }       // close function color_update_specimens_character




function color_insert_specimens_character( $link, $character_id, $selected_color, $specimen_id, $owner_id ):bool
    {
        $display_option = 6;  // display option always 6 for color
        $query_insert = "INSERT INTO `specimen_characters`(`id`, `specimen_id`, `character_id`, `character_value`, `display_options`, `entered_by`, `date_entered`) VALUES ('0', ?, ?, ?, ?, ?,now())";

        echo "<p>specimen_id:  $specimen_id - character id:  $character_id -  character_value: $character_value - query_update:  $query_update on line ".__LINE__."</p>";

        $query_insert = $link->prepare($query_insert);
        $query_insert->bind_param("iiiii", $specimen_id, $character_id, $selected_color, $display_option, $owner_id);

        // echo "<br>query_insert: $query_insert<br>";

        $query_insert->execute( );
        $result_insert = $query_insert->get_result();

        if ($query_insert->errno)
        {
            // echo "<p>FAILURE!!! " . $query_insert->error."</p>";
            return 0;
        }
        else
        {
             $color_names = $this->color_return_color_names_from_id($link, $character_color);  // works 3-18
            //$color_names = $this->color_get_color_name_from_color_id($link, $character_color);  // not working

            // echo "<p>specimen_id: $specimen_id line ".__LINE__."</p>";
            $specimen_name = $this->specimen_return_name_from_specimen_id($link, $specimen_id);
            //var_dump( $color_names );
            $latin_name  = $color_names[0][0];
            $common_name = $color_names[0][1];
            $cwc         = $color_names[0][2];

            // echo "<p>specimen_id: $specimen_id line ".__LINE__."</p>";
            $specimen_name = $this->specimen_return_name_from_specimen_id($link, $specimen_id);

            //  -  {$query_update->affected_rows} row(s) updated.
            echo "<p>Specimen ID( $specimen_id ) <b class=''>$specimen_name</b>'s character variable <b class='red'>$character</b> entered as  color ($character_color) $latin_name (Latin) - $common_name (common)- $cwc (closest websafe color).</p>";


            echo "<br> <br> <a href=\"member_dashboard.php?a=13&sid=$specimen_id\">Enter another color character for this specimen?</a><br>";
            return 1;
        }
    }       // close function color_insert_specimens_character( $link, $character_id, $selected_color, $specimen_id, $owner_id )



 function color_return_COLOR_names( $link, $table_name ):array  // works 3-18
    {
        echo "<br>table_name:  $table_name on line ".__LINE__.".";
        $color = '%color%';
        $query_column = $link->prepare("SELECT * FROM characters WHERE name LIKE ?");
        $query_column->bind_param("s", $color);
        $query_column->execute();
        $result_column = $query_column->get_result(); // get the mysqli result

        if(!$result_column)
        {
            echo "Database not available, try again later L".__LINE__.".<br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $result_column );
            $column_name = [];
            if( $rowCt > 0 )
            {
                while( $rowAnswers = mysqli_fetch_array($result_column) )
                {
                    $column_name[]  = $rowAnswers['name'];
                }
                //echo "</table>";
                return $column_name;
            }
            else
            {
                echo "No return from function return_table_column_names - Line ".__LINE__.".<br>";
                return 0;
            }
        }
        return 0;
    }   // close function color_return_COLOR_names( $link, $table_name )

        function color_return_COLOR_ids( $link, $table_name ):array  //works 3-18 return id of values in characters table that contain 'color'
    {
        echo "<br>table_name:  $table_name on line ".__LINE__.".";
        $color = '%color%';
        $query_column = $link->prepare("SELECT id FROM $table_name WHERE name LIKE ?");
        $query_column->bind_param("s", $color);
        $query_column->execute();
        $result_column = $query_column->get_result(); // get the mysqli result

        if(!$result_column)
        {
            echo "Database not available, try again later L".__LINE__.".<br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $result_column );
            $character_ids = [];
            if( $rowCt > 0 )
            {
                while( $rowAnswers = mysqli_fetch_row($result_column) )
                {
                    $character_ids[]  = $rowAnswers[0];
                }
                //echo "</table>";
                return $character_ids;
            }
            else
            {
                echo "No return from function return_table_column_names - Line ".__LINE__.".<br>";
                return 0;
            }
        }
        return 0;
    }   // close function color_return_COLOR_character_ids( $link, $table_name )




function color_return_one_color_data_by_id( $link, $color_id ):array // works 3-18 - returns all data for one color
    {
        $query = "SELECT * FROM color WHERE id = ?  ORDER BY color_group ASC, sequence ASC";

        $query_color = $link->prepare($query);
        $query_color->bind_param("i", $color_id);
        // echo "<br>query: $query<br>";

        $query_color->execute( );
        $result_color = $query_color->get_result();

        $color_data = [];

        if ($result_color === false)
        {
            echo "<p>Problem line ".__LINE__.".</p>";
        }

        $rowCt =  mysqli_num_rows( $result_color );
            if( $rowCt > 0 )
            {
                $rowAnswers = mysqli_fetch_assoc($result_color );

                $color_data[] = $rowAnswers['id'];
                $color_data[] = $rowAnswers['latin_name'];
                $color_data[] = $rowAnswers['common_name'];
                $color_data[] = $rowAnswers['color_group'];
                $color_data[] = $rowAnswers['hex'];
                $color_data[] = $rowAnswers['sequence'];
                $color_data[] = $rowAnswers['r_val'];
                $color_data[] = $rowAnswers['g_val'];
                $color_data[] = $rowAnswers['b_val'];
                $color_data[] = $rowAnswers['closest_websafe_color'];
                $color_data[] = $rowAnswers['cwc_r'];
                $color_data[] = $rowAnswers['cwc_g'];
                $color_data[] = $rowAnswers['cwc_b'];
                $color_data[] = $rowAnswers['image_file'];

                return $color_data;
            }
            else
            {
                echo "<p>No return for that color id Line ".__LINE__.".</p>";
                return $color_data;
            }

    }    // close color_return_one_color_data_by_id( $link, $color_id ):array




function color_return_color_names_from_id( $link, $color_id )   // works 3-18 -  returns latin_name, common_name, closest_websafe_color
    {
        $query_color = $link->prepare("SELECT latin_name, common_name, closest_websafe_color FROM color WHERE id = ?");
        $query_color->bind_param("i", $color_id );
        $query_color->execute();
        $result_color = $query_color->get_result(); // get the mysqli result

        if(!$result_color)
        {
            echo "Database not available, try again later L".__LINE__.".<br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $result_color );
            if( $rowCt > 0 )
            {
                $column_data = [];
                while ($rowAnswers = mysqli_fetch_row( $result_color ) )
                {
                    $color_data[] = $rowAnswers;
                }
                return $color_data;
            }
            else
            {
                echo "No return from function column_return_names - Line ".__LINE__.".<br>";
            }
        }

    }   // close function color_return_color_names_from_id( $link, $table_name )

    function color_return_color_id_for_this_specimen_this_character( $link, $sid, $character_id )  // works 3-18
    {
        // echo "<p>sid:  $sid - character_id:  $character_id on line ".__LINE__."</p>";
        $query = $link->prepare("SELECT character_value FROM rmqchemy_mrdbid_php.specimen_characters WHERE specimen_id = ? AND character_id = ?");
        $query->bind_param("ii", $sid, $character_id);
        $query->execute();
        $result = $query->get_result(); // get the mysqli result
        $color_id = $result->fetch_row();

        if( $color_id > 0 )
        {
            return $color_id;
        }
        else
        {
            return 0;
        }
    }   // close function color_return_color_id_for_this_specimen_this_character( $link, $sid, $character_name )
    function color_display_thumbnail_for_this_character_of_this_specimen( $link, $sid, $cid ) // works 3-18
    {
        //echo "<p>sid:  $sid - cid:  $cid on line ".__LINE__."</p>";
        $query = $link->prepare("SELECT character_value FROM rmqchemy_mrdbid_php.specimen_characters WHERE specimen_id = ? && character_id = ?");
        $query->bind_param("ii", $sid, $cid);
        $query->execute();
        $result = $query->get_result(); // get the mysqli result
        $color_id = $result->fetch_row();

        if( $color_id > 0 )
        {
          ?><img src="../images/AMS_colors/thumbnail/thumbnail_<?php echo $color_id; ?>.jpg" alt="color <?php echo $color_id; ?> thumbnail" width="128" height="64"><?php
        }
    }   // close function color_display_thumbnail_for_color_id( $link, $color_id )


    function color_image_display_kerrigan_color_blockquote( ):void  // works 3-18
    {
        echo "<blockquote class=\"colors\" cite=\"Kerrigan, R. W. (2016). Agaricus of North America (p. 25). The New York Botanical Garden.\">For general purposes I prefer to present a general color description plus, insofar as possible, one or more faithful color images (realizing that faith in photo reproduction also has its limits--for which a color chart specification can help compensate).<br><br><b>Kerrigan, R. W. (2016). Agaricus of North America (p. 25). The New York Botanical Garden</b></blockquote>\n<!-- line ".__LINE__." -->\n</div>\n";

    }  // close     function color_image_display_kerrigan_color_blockquote( )

    function color_select_COLOR_character_name( $link, $specimen_id,  $single_character_id ):void
    {
        $table_name = 'characters';  // search characters table for data names containing word color
        //
        $col_names_array = $this->color_return_COLOR_names( $link, $table_name );

        $col_names_array_alpha[] = asort($col_names_array); // not used

        $num_color_characters = sizeof( $col_names_array );

        echo "<p>num_color_characters:  $num_color_characters line ".__LINE__.".</p>";

        $num_columns = 8;

        echo "\n<div class=\"center\">\n<table class='p_1'> <!-- anchor tag COLOR table Line ".__LINE__."  -->\n<tr class='p_1'>\n<td class='p_1' colspan='$num_columns'>\nSelect a color character: (current color is shown, if has been input)</td>\n</tr>\n<tr class='p_1'>\n";

        $num_color_characters = $num_color_characters + 1;  // added 1 to get all color characters to display
        for($ct_c=1;$ct_c<$num_color_characters;$ct_c++ )    // for every value in characters table
        {
            $ct_mod = $ct_c % $num_columns;
            $character_name   = $col_names_array[$ct_c-1];   // subtract 1 to get all color characters to display

            $display_character_name = $this->prep_db_word_for_display( $character_name );
            $col_name_w_row_num = $ct_c.'X'.$character_name;   // include column number of mushroom table to match counter

            $color_id_this_character = $this->color_return_color_id_for_this_specimen_this_character( $link, $specimen_id, $character_name );

            //echo "<p>specimen_id:  $specimen_id -col_name_w_row_num: $col_name_w_row_num - color_id_this_character:  $color_id_this_character-  character_name:  $character_name - display_character_name:  $display_character_name on line ".__LINE__."</p>";

            echo "<td class='p_1'><a href=\"member_dashboard.php?a=14&sid=$specimen_id&c=$col_name_w_row_num&c_id=$color_id_this_character\">$display_character_name<br>\n";

            // display thumbnail image for this character
            $thumbnail_image = $this->color_display_thumbnail_for_this_character_of_this_specimen( $link, $specimen_id, $character_name );

            echo "</a></td>\n";


            if( $ct_c > 0 && $ct_mod  == 0)
            {
                echo "</tr>\n<tr class='p_1'>\n";
            }


        }
        echo "\n</tr>\n</table><!-- END COLOR anchor tag table Line ".__LINE__."  -->\n\n";

    }     // close     function color_select_COLOR_character_name( $link ):void


function color_print_banner_select( $link, $pass_row_num, $color_column_mushroom_table, $specimen_id, $selected )
{
    // pass_row_num is only useful as an index for array returned of column names of mushroom table
    // character such as cap_color to set color for - relates to the order of columns in mushroom table
    $num_cols = 25;

    echo "<p>Line ".__LINE__." color_column_mushroom_table:  $color_column_mushroom_table - pass_row_num: $pass_row_num - specimen_id: $specimen_id</p>";

    $anchor_tag = $pass_row_num.'_'.$color_column_mushroom_table;
    echo "<div class=\"center\">\n<table class=\"image_row\"><!--Begin Color Table -->\n<tr class=\"image_row\">\n<td class=\"image_row\" colspan=\"$num_cols\">\n<span id=\"$anchor_tag\"><p>Select the color for the character <b>$color_column_mushroom_table</b> by clicking on the best matching color.</p></span>\n</td>\n</tr>\n";

    $query = "SELECT * FROM color  ORDER BY color_group ASC, sequence ASC";

    $query_color = $link->prepare($query);

    // echo "<br>query: $query<br>";

    $query_color->execute( );
    $result_color = $query_color->get_result();

    if ($result_color === false)
    {
        echo "<p>Problem line ".__LINE__.".</p>";
    }

    $gen_ct = 1;
    while( $rowAnswers = mysqli_fetch_assoc($result_color))
    {
        $table_id     = $rowAnswers['id'];
        $latin        = $rowAnswers['latin_name'];
        $common       = $rowAnswers['common_name'];
        $color_group  = $rowAnswers['color_group'];
        $hex          = $rowAnswers['hex'];
        $sequence     = $rowAnswers['sequence'];
        $r            = $rowAnswers['r_val'];
        $g            = $rowAnswers['g_val'];
        $b            = $rowAnswers['b_val'];
        $cwc          = $rowAnswers['closest_websafe_color'];
        $display_sequence = $sequence;

        if( $table_id != 0 )
        {
            $remainder = $gen_ct % $num_cols;

            if( $remainder ==  1 )
            {
                ?>
                    <tr class="image_row">   <!-- Line <?php echo "".__LINE__.""; ?> -->
                <?php
            }

            if( $gen_ct != 0 )
            {
                $image_file_in = "../images/AMS_colors/banner_50x50/banner_".$table_id.".jpg";
                $pass_color_column_specimens_table = '';
                //$pccst = $pass_color_column_specimens_table = $gen_ct.'X'.$color_column_mushroom_table;
                $pccst = $pass_color_column_specimens_table = $table_id.'X'.$color_column_mushroom_table;


                // echo "<p>selected:  $selected - table_id: $table_id - pccst: $pccst - specimen_id: $specimen_id on line ".__LINE__."</p>";


                if( $selected == $table_id )
                {
                    // give this cell different background color

                ?>
                    <td class="image_row_selected">
                        <a href="member_dashboard.php?a=15&sid=<?php echo $specimen_id; ?>&color=<?php echo $table_id; ?>&p=<?php echo $pccst; ?>#big_image"><img src="<?php echo $image_file_in; ?>" alt="<?php echo $latin; ?>" width="50" height="50"></a>
                    </td>
                <?php
                }
                else
                {
                ?>
                    <td class="image_row">
                        <a href="member_dashboard.php?a=15&sid=<?php echo $specimen_id; ?>&color=<?php echo $table_id; ?>&p=<?php echo $pccst; ?>#big_image"><img src="<?php echo $image_file_in; ?>" alt="<?php echo $latin; ?>" width="50" height="50"></a>
                    </td>
                <?php
                }
            }


            if( $remainder ==  0 && $gen_ct != 0)
            {
            ?>
                </tr>  <!-- Line  <?php echo __LINE__; ?>  -->
            <?php
            }

            $gen_ct = $gen_ct + 1;

            }   // close if( $table_id != 0 )

        }  // close      while

        echo "\n</table></div>  <!-- End Color Table -->\n\n";

}  // close function color_print_banner_select( $link, $pass_character, $mushroom_table_row_number, $specimen_name  )


// color functions above ===============================================================


    function character_edit_ajax_form($link, $specimen_id):void

    {
        //echo "<table class='p_1'>\n<tr class='p_1'>\n<td class='p_1'><form action=\"".$_SERVER['PHP_SELF']."?a=12&sid=".$specimen_id."\" method=\"post\" name=\"select_character\" >\n";

        echo "<table class='p_1'>\n<tr class='p_1'>\n<td class='p_1'><form action=\"edit_character.php\" method=\"post\" name=\"select_character\" >\n";
        ?>
             <br />

       <input type="text" name="characterName" id="characterName" size="40" maxlength="72" value = ""  onkeyup="autocomplete_character()" /> Begin typing the character you want to edit. <b class='redComment'>If the search name includes a space, enter underline instead.</b> If you see it on the list, click on it, then hit "Submit" button. Other option is to look for character in the list below.<br />

      <div id="input_character_name"></div>  <!-- name options will appear here if not exact match -->

      <br />

      <input type="hidden" name="specimen_id" value="<?php echo $specimen_id; ?>" />
      <input type="submit" name = "submit" value="Submit" />

        </form> <!-- close form line <?php echo "__LINE__"; ?>-->
        </td></tr></table><br><br>
      <?php

    }   // close function character_edit_ajax_form()


    function display_max_string_in_db_column( $db, $table, $column )
    {

        // The longest string in MBList: list: Taxon_name: is for ID: 459847 - 96 - Scheffersomyces stipitis (Pignal) Kurtzman & M. Suzuki, Mycoscience 51 (1): 9 (2010) [MB#513473]

        ini_set("memory_limit", "200M");

        $link = mysqli_connect( HOST, USER, PASSWORD, $db);

        // check connection
        if ( mysqli_connect_errno() )
        {
            printf("Connect failed: %s\n", mysqli_connect_errno());
            exit();
        }

        $query_column = $link->prepare("SELECT ID, $column FROM $table");

        $query_column->execute();
        $result_column = $query_column->get_result(); // get the mysqli result

        if(!$result_column)
        {
            echo "Database not available, try again later L".__LINE__.".<br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $result_column );
            if( $rowCt > 0 )
            {
                $max_string_length = 0;

                while( $rowAnswers = mysqli_fetch_row($result_column) )
                {
                    $id           = $rowAnswers[0];
                    $this_string  = $rowAnswers[1];
                    $size_of_this_string = strlen($this_string);

                    // echo "<p>$id:  $this_string</p>";

                    if( $size_of_this_string > $max_string_length )
                    {
                        $max_string_length = $size_of_this_string;
                        $id_with_longest   = $id;
                        $longest_string    = $this_string;
                    }
                }
                echo "<p>The longest string in $db: $table: $column:  is for ID:  $id_with_longest - $max_string_length - $longest_string</p>";
            }
            else
            {
                echo "No return for <b style='color:red;'>$table</b> from function display_max_string_in_db_column( $link, $db, $table ) - Line ".__LINE__.".<br>";
            }
        }
    }      // function display_max_string_in_db_column( $db, $table, $column )
    function specimens_add_new_column_to_specimens_table(   ):void
    {
        $link = mysqli_connect( HOST, ADMIN_USER, ADMIN_PASSWORD, DATABASE );
        $collation = 'utf8mb4_unicode_ci';
        if( isset( $_POST['col_name'] ))
        {
            $new_col_name = $_POST['col_name'];
        }
        else
        {
            echo "<p>No new col name was received line ".__LINE__." of ".__FILE__.".</p>";
            exit( );
        }

        if( isset( $_POST['data_type'] ))
        {
            $new_type = $_POST['data_type'];
        }

        if( isset( $_POST['length'] ))
        {
            $new_length = $_POST['length'];
        }

        if( isset( $_POST['default'] ))
        {
            $new_default = $_POST['default'];
        }

        if( $new_type == 'int' )
        {
            $query = $link->prepare("ALTER TABLE `specimens` ADD $new_col_name INT NOT NULL AFTER `chem_react`");
        }

        if( $new_type == 'varchar' )
        {
            $query = $link->prepare("ALTER TABLE `specimens` ADD $new_col_name VARCHAR(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL AFTER `chem_react`");
        }
        if( $new_type == 'char' )
        {
            $query = $link->prepare("ALTER TABLE specimens` ADD $new_col_name CHAR(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL AFTER `chem_react`");
        }

        $query->execute();
        $result = $query->get_result();
        if ($query->errno) {
            echo "FAILURE!!! " . $query->error;
        }
        else
        {
            echo "Updated {$query->affected_rows} rows";
            echo "<br> <br> <a href=\"reconcile_mushroom_parts.php\">Reconcile Mushroom table with parts and sequence.</a><br>";
            echo "<br> <br> <a href=\"admin_add_column_mushroom_table.php\">Add Another Column to mushroom table?</a><br>";
            echo "<br> <a href=\"../site/member_dashboard.php\">Return to Member Dashboard</a><br>";
        }

    }    // close function specimens_add_new_column_to_specimens_table(  $link )
    function MBList_display_MBList_name_options( ):void
    {
        $edit  = 0;
        $fungi_name = '';
        ?>
            <form name="MBList"  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="MBList"></label><input type="text" name="MBList" id="MBList" size="128" maxlength="128" value = ""  onkeyup="autocomplete_fungi_name()"> Fungi Name<br>

             <div id="input_fungi_name"></div>  <!-- fungi name options will appear here if not exact match -->
             <input type="submit" name = "submit" value="Submit">
            </form>
      <?php

      $edit_for_name = '';
      if(  ( $edit ) && ( $edit_for_name == "fungi" ) )
      {
          // calling old function - double check
       $this->print_similar_fungi_name_options( $fungi_name);
      }

    }   // function MBList_display_MBList_name_options( ):void

    function select_distinct_values( $link, $table_name, $column_name ):void
    {
        $print_query = "SELECT DISTINCT( $column_name ) FROM $table_name";
        echo "This query:  $print_query<br>";
        $query = $link->prepare("SELECT DISTINCT( $column_name ) FROM $table_name");
        $query->execute();
        $result = $query->get_result();

        if(!$result)
        {
            echo "Database not available, try again later L".__LINE__.".<br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $result );
            if( $rowCt > 0 )
            {
                $counter = 1;
                while( $rowAnswers = mysqli_fetch_row($result) )
                {
                    $distinct_value  = $rowAnswers[0];

                    $num_distinct = $this->MBList_return_count( $link, $column_name, $distinct_value );

                    echo "$counter. $distinct_value ($num_distinct)<br>";
                    $counter = $counter + 1;
                }
            }
            else
            {
                //echo "No return from function MBList_genus_names - Line ".__LINE__.".<br>";
            }
        }  // close else
    }  // close function select_distinct_values( $link, $table_name, $column_name )

    function MBList_find_Greek_letters_MBList( $link, $Rank_ ):void
    {
        $array = array("foo", "bar", "hello", "world");
        $greek_alpha = array(
        "Α",
        "α",
        "Β",
        "β",
        "b",
        "Γ",
        "γ",
        "Δ",
        "δ",
        "Ε",
        "ε",
        "Ζ",
        "ζ",
        "Η",
        "η",
        "Θ",
        "θ",
        "Ι",
        "ι",
        "Κ",
        "κ",
        "Λ",
        "λ",
        "Μ",
        "μ",
        "Ν",
        "ν",
        "Ξ",
        "ξ",
        "Ο",
        "ο",
        "Π",
        "π",
        "Ρ",
        "ρ",
        "Σ",
        "σ",
        "ς",
        "Τ",
        "τ",
        "Υ",
        "υ",
        "Φ",
        "φ",
        "Χ",
        "χ",
        "Ψ",
        "ψ",
        "Ω",
        "ω");
        // var_dump($greek_alpha);



        foreach ($greek_alpha as $letter )
         {

             $genus_ct = 1;
             //echo "$letter<br>";

             $letter_ct = 1;

             $search_letter = '% '.$letter.' %';
             echo "search_letter:  <b>$search_letter</b> - Rank_:  $Rank_ on line ".__LINE__.".<br>";

             //$query = $link->prepare("SELECT Taxon_name FROM list_3_21_2023 WHERE Rank_ = ? AND Taxon_name LIKE ? LIMIT 10");
             $query = $link->prepare("SELECT Taxon_name, Rank_ FROM list_3_21_2023 WHERE Taxon_name LIKE ? LIMIT 10");
             //$query->bind_param("ss", $Rank_, $search_letter);
             $query->bind_param("s", $search_letter);
             $query->execute();
             $result = $query->get_result();

             if(!$result)
             {
                 echo "Database not available, try again later L".__LINE__.".<br>";
             }
             else
             {
                 $rowCt =  mysqli_num_rows( $result );
                 if( $rowCt > 0 )
                 {

                     while( $rowAnswers = mysqli_fetch_row($result) )
                     {
                         $genus_name      = $rowAnswers[0];
                         $Rank_           = $rowAnswers[1];

                         if( $Rank_ == 'gen.' )
                         {
                             echo "<hr>Counter: $genus_ct - Genus Name:  $genus_name<hr>";
                         }
                         else
                         {
                             echo "<hr>Counter: $genus_ct - Species Name:  $genus_name<hr>";
                         }
                         $genus_ct = $genus_ct + 1;
                     }
                 }
                 else
                 {
                     //echo "No return from function MBList_genus_names - Line ".__LINE__.".<br>";
                 }
             }  // close else
             $letter_ct = $letter_ct + 1;
        }
        echo "$search_letter count:  $letter_ct on line ".__LINE__.".<br>";
    }   // close function MBList_find_Greek_letters_MBList( $link, $Rank_ ):void

    function MBList_print_genus_names( $link, $Rank_ ):void
    {
        $query = $link->prepare("SELECT * FROM list_3_21_2023 WHERE Rank_ = ? AND (`Name_status` = 'Legitimate' OR `Name_status` = 'Orthographic variant')  LIMIT 100");
        $query->bind_param("s", $Rank_);
        $query->execute();
        $result = $query->get_result();

        if(!$result)
        {
            echo "Database not available, try again later L".__LINE__.".<br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $result );
            if( $rowCt > 0 )
            {
                $genus_ct = 1;
                while( $rowAnswers = mysqli_fetch_assoc($result) )
                {
                    $MBList_id       = $rowAnswers['ID'];
                    $genus_name      = $rowAnswers['Taxon_name'];
                    $auth_abbrev     = $rowAnswers['Authors__abbreviated_'];
                    $rank_           = $rowAnswers['Rank_'];
                    $year_pub        = $rowAnswers['Year_of_effective_publication'];
                    $name_status     = $rowAnswers['Name_status'];
                    $mycobank_num    = $rowAnswers['MycoBank__'];
                    $hyperlink       = $rowAnswers['Hyperlink'];
                    $classification  = $rowAnswers['Classification'];
                    $current_name    = $rowAnswers['Current_name'];

                    echo "<hr><ul> <li>Counter:  $genus_ct.</li>  <li>Table ID:  $MBList_id</li>  <li>Genus Name:  $genus_name</li> <li>Author: $auth_abbrev</li> <li>Rank: $rank_</li> <li>Year Published: $year_pub</li> <li>Name Status:  $name_status</li> <li>Mycobank Number:  $mycobank_num</li> <li>Hyperlink:  $hyperlink</li> <li>Classification:  $classification</li> <li>Current Name:  $current_name</li></ul></p>";

                    $genus_ct = $genus_ct + 1;
                }
            }
            else
            {
                echo "No return from function MBList_genus_names - Line ".__LINE__.".<br>";
            }
        }  // close else
    }   // function MBList_print_genus_names( $link, $Rank_ ):void



    function MBList_return_count( $link, $column_name, $count_value ):int
    {

        $query = $link->prepare("SELECT count(*) as total from list_3_21_2023 WHERE $column_name = ?");

        $query->bind_param("s", $count_value);
        $query->execute();
        $result = $query->get_result();

        $return_count = 0;

        if($result == FALSE)
        {
            echo "Database not available, try again later L".__LINE__." of ".__FILE__.".<br>";
        }
        else
        {
            $data = mysqli_fetch_assoc($result);
            //echo $table_name." has ".$data['total']." rows.<br>";
            return $data['total'];
        }
        return $return_count;
    }  // close function MBList_return_count( $link, $column_name, $count_value )


    function MBList_process_list( $link )
    {
        $query = $link->prepare("SELECT * FROM list_3_21_2023 ORDER BY id LIMIT 100");
        $query->execute();
        $result = $query->get_result();

        if(!$result)
        {
            echo "Database not available, try again later L".__LINE__.".<br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $result );
            if( $rowCt > 0 )
            {
                $genus_ct = 1;
                while( $rowAnswers = mysqli_fetch_assoc($result) )
                {
                    $MBList_id       = $rowAnswers['ID'];
                    $genus_name      = $rowAnswers['Taxon_name'];
                    $auth_abbrev     = $rowAnswers['Authors__abbreviated_'];
                    $rank_           = $rowAnswers['Rank_'];
                    $year_pub        = $rowAnswers['Year_of_effective_publication'];
                    $name_status     = $rowAnswers['Name_status'];
                    $mycobank_num    = $rowAnswers['MycoBank__'];
                    $hyperlink       = $rowAnswers['Hyperlink'];
                    $classification  = $rowAnswers['Classification'];
                    $current_name    = $rowAnswers['Current_name'];

                    echo "<hr><ul> <li>Counter:  $genus_ct.</li>  <li>Table ID:  $MBList_id</li>  <li>Genus Name:  $genus_name</li> <li>Author: $auth_abbrev</li> <li>Rank: $rank_</li> <li>Year Published: $year_pub</li> <li>Name Status:  $name_status</li> <li>Mycobank Number:  $mycobank_num</li> <li>Hyperlink:  $hyperlink</li> <li>Classification:  $classification</li> <li>Current Name:  $current_name</li></ul></p>";

                    $genus_ct = $genus_ct + 1;
                }
            }
            else
            {
                echo "No return from function MBList_genus_names - Line ".__LINE__.".<br>";
            }
        }  // close else
    }   // function MBList_process_list( )


    function MBList_count_taxon_name_parts( $link, $col )
    {
        $query = $link->prepare("SELECT ID, Taxon_name FROM list_3_21_2023 WHERE Rank_ = ? ORDER BY id");
        $query->bind_param("s", $col);
        $query->execute();
        $result = $query->get_result();

        if(!$result)
        {
            echo "Database not available, try again later L".__LINE__.".<br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $result );
            if( $rowCt > 0 )
            {
                $loop_ct = 1;
                while( $rowAnswers = mysqli_fetch_assoc($result) )
                {
                    $MBList_id       = $rowAnswers['ID'];
                    $t_name      = trim($rowAnswers['Taxon_name']);

                    // $name_split = explode( " ", $t_name);  // does not handle more than one space
                    $name_split = preg_split('/\s+/', $t_name);

                    $num_parts = sizeof($name_split);

                    switch ($col) {
                        case 'gen.';
                            $limit = 1;
                            $rank_name = 'Genus';
                            break;
                        case 'sp.';
                            $limit = 2;
                            $rank_name = 'Species';
                            break;
                        default;
                            $limit = 2;
                            $rank_name = $col;
                    }

                    if( $num_parts > $limit )
                    {
                        $name_split_0 = $name_split[0];
                        $name_split_1 = $name_split[1];

                        if( isset($name_split[2]))
                        {
                            $name_split_2 = $name_split[2];
                        }
                        else
                        {
                            $name_split_2 = '';
                        }
                        if( isset($name_split[3]))
                        {
                            $name_split_3 = $name_split[3];
                        }
                        else
                        {
                            $name_split_3 = '';
                        }
                        echo "<ul> <li>Loop Count: $loop_ct. Table ID:  $MBList_id</li>  <li>Rank: $rank_name Name:  $t_name has $num_parts parts: $name_split_0 - $name_split_1 -  $name_split_2 - $name_split_3</li> </ul></p>";
                    }
                    $loop_ct = $loop_ct + 1;
                }
            }
            else
            {
                echo "No return from function MBList_genus_names - Line ".__LINE__.".<br>";
            }
        }  // close else
    }   // function MBList_count_taxon_name_parts( $link, $col )


    function check_duplicate_specimen_name( $link, $proposed_specimen_name, $owner_id ):bool
    {
        // echo "<br>table_name:  $table_name on line ".__LINE__.".";
        $query_duplicate = $link->prepare("SELECT specimen_name FROM specimens WHERE specimen_owner = ?");
        $query_duplicate->bind_param("s", $owner_id);
        $query_duplicate->execute();
        $result_duplicate = $query_duplicate->get_result(); // get the mysqli result

        if(!$result_duplicate)
        {
            echo "Database not available, try again later L".__LINE__.".<br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $result_duplicate );
            if( $rowCt > 0 )
            {
                while( $rowAnswers = mysqli_fetch_row($result_duplicate) )
                {
                    $duplicate_name  = $rowAnswers[0];

                    if( $duplicate_name == $proposed_specimen_name )
                    {
                        return true;
                    }
                }
                return false;
            }
            else
            {
                echo "No return from function return_table_duplicate_names - Line ".__LINE__.".<br>";
                return false;
            }
        }
        return 0;
    }   // close function check_duplicate_specimen_name( $link, $proposed_specimen_name, $owner_id ):bool

    function date_is_leap_year( $year ):bool
    {
        // https://www.calendar.best/leap-years.html - 7-10-2023
        // To check if a year is a leap year, it must be divisible by 4 and not divisible by 100 or divisible by 400.

        $four_remainder         = $year % 4;
        $hundred_remainder      = $year % 100;
        $four_hundred_remainder = $year % 400;

        if( $four_remainder == 0 && $hundred_remainder != 0 && $four_hundred_remainder != 0 )
        {
            echo "<br>$year <b>is</b> a leap year!<br>";
            return 1;
        }
        else
        {
            echo "<br>$year is <b>NOT</b> a leap year!<br>";
            return 0;
        }

    }

    function check_if_existing_EXACT_fungi_name( $pass_fungi_name )
    {
        // db is MBList
        $link = mysqli_connect( HOST, USER, PASSWORD, 'MBList' );


        $query = $link->prepare("SELECT Taxon_Name FROM list_3_21_2023");
        $query->execute( );
        $result = $query->get_result();

        $id = 0;
        if(!$result)
        {
            echo "Database not currently available. Please try again later L".__LINE__.".<br>";
        }
        else
        {

            $nameRowCt = mysqli_num_rows( $result );
            // echo "nameRowCt is $nameRowCt L898.<br>";
            
            if( $nameRowCt == 0 )
            {
                // echo "theCoName is $theCoName  line 902 ckIfExistingExactName of class_form.<br>";
                echo "<p style=\"color:red\">The name as entered is not an EXACT match in our database.</p>";
                return 0;
            }
            else
            {
                $row = mysqli_fetch_row($result);
                $id      = $row[0];
                // echo "row[0]- $row[0] <br> Line 896.<br>";
                // echo " row[0] is $row[0] and id is $id and name is $name on  line 910 ckIfExistingExactName of class_form.<br>";
                return $id;
            }
        }
        return $id;
    }      // close function ck_if_existing_EXACT_fungi_name( $pass_fungi_name )



        function print_similar_fungi_name_options( $fungi_name) // this is OLD function - double  check before rely on
        {
        $testProductName = $fungi_name;


        $returnedLink = mysqli_connect( "localhost", "root", "", "products" );

        // check connection
        if ( mysqli_connect_errno() ) {
        printf("Connect failed: %s\n", mysqli_connect_errno());
        exit();
        }
        else
        {
        //  echo "You are connected L ".__LINE__." ".__FILE__.".<br>";
        // return $link
        }

        // products is from OLD code - update before use!
        $queryName = "SELECT products.products_id, products.products_name  FROM products WHERE products.products_name LIKE '%$testProductName%'";

        $resultName = mysqli_query($returnedLink, $queryName);

        $rowCt =  mysqli_num_rows( $resultName );
        printf("Select returned %d rows.<br>", $rowCt );

        if($resultName == FALSE)
        {
        echo "Database not available, try again later Line".__LINE__." of ".__FILE__.".<br>";
        die(mysqli_error()); // TODO: better error handling
        }
        else
        {
        echo "<p style=\"color:red\">Possible match(es) for your company name:<br>";

        echo "<b>IF</b> a name on the list below is your product, select it, then press the ENTER button below. IF not, <b>press the Enter button below,</b> and the product name you typed in will be entered in the database for the first time.</p>";
        ?>
        <label>
<input type="radio" name="productNameRadio" value="x" checked="checked" />
</label> Please select:
        <br>
        <?php
        while( $row =  mysqli_fetch_row($resultName) )
        {
            $id   = $row[0];
            $name = $row[1];
            $edit = 0;
            $passProductName = '';
            // echo "Company ID is $id and company name is $name.<br >";
            ?>
            <label>
<input type="radio" name="productNameRadio" value="<?php echo $name; ?>" <?php if( $edit && $name  == $passProductName ) { echo "checked='checked'";} ?>>
</label> <?php echo $name; ?>
            <br>
            <?php


        }
        mysqli_free_result($resultName);
    }
}      // close print_similar_fungi_name_options( $fungi_name)
    

    function ck_if_existing_SIMILAR_specimen_name( $pass_name )
    {

        // db is MBList
        $link = mysqli_connect( HOST, USER, PASSWORD, 'MBList' );

        // check connection
        if ( mysqli_connect_errno() )
        {
            printf("Connect failed: %s\n", mysqli_connect_errno());
            exit();
        }
        else
        {
            return $link;
        }
        // only use is test_mushroom_functions?
        $name = '%'.$pass_name.'%';
        //echo "<br>name is $name on line ".__LINE__.".";
        $row_ct = 0;
        
        $query_name = $link->prepare("SELECT id FROM list_3_21_2023 WHERE Taxon_Name LIKE ?");
        $query_name->bind_param("s", $name);
        $query_name->execute( );
        $result_name = $query_name->get_result();
        $row_ct = mysqli_num_rows( $result_name );
        
        if(!$result_name)
        {
            echo "Database not available, try again later L".__LINE__.".<br>";
        }
        else
        {
            return $row_ct;
        }
        return $row_ct;
    }      // close ck_if_existing_SIMILAR_specimen_name( $pass_name )

    // https://gist.github.com/mrmolaei/9b4f744b469f820eda7049631c31d90d
    function hexToRgb_LONG( $hex )
    {
        // Convert hex to RGB
        if (strlen($hex) == 7)
        {
            $rgb = array_map('hexdec', str_split(ltrim($hex, '#'), 2));
        } else
        {
            $hex = '#' . implode( "", array_map( function($digit) {
                    return str_repeat($digit, 2);
                }, str_split(ltrim($hex, '#'), 1)) );
            $rgb = array_map('hexdec', str_split(ltrim($hex, '#'), 2));
        }

        $rgb = 'rgb(' . implode( ", ", $rgb ) . ')';

        return $rgb;
    }

    function hex_to_rgb( $hex )
    {
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");   // convert hex to rgb
        // echo "$hex -> $r $g $b<br>";

    }



    function display_basic_character_table_simple( $link, $member_id ):void
    {
        echo "\n<form action=\"member_dashboard.php?a=8\" method=\"post\" name=\"new_basic\">\n";
        echo "<table class='basic_form'>   <!-- begin basic table -->\n<tr class='basic_form'>\n<td class='basic_form'>\n";

        echo "<p>function display_basic_character_table_simple <b>Basic Characters:</b> This is just the beginning. You can enter many other characters after these basic ones.</p>\n</td>\n</tr>\n";


        $required = 'required';
        $required_label = '<br><b class="redComment">* Required</b>';

        // minimal info required for new specimen entry

        echo "<tr class='basic_form'>\n\n<td class='basic_form'>\n<label for=\"specimen_name\">Specimen Name: This id is created by the specimen owner (you), and can include letters, numbers, mid-line dash, and underscore. It should be unique in your specimen list.<br>\n<br><input type=\"text\" $required name=\"specimen_name\"  id=\"specimen_name\" size=\"48\" maxlength=\"128\" value = \"\">$required_label</label>\n</td></tr>\n";

        echo "<tr class='basic_form'>\n\n<td class='basic_form'>\n<label for=\"common_name\">Common Name: What you call it, or local name.<br>\n<br><input type=\"text\"  name=\"common_name\"  id=\"common_name\" size=\"48\" maxlength=\"128\" value = \"\"></label>\n</td></tr>\n";

        echo "<tr class='basic_form'>\n\n<td class='basic_form'>\n<label for=\"description\">Description<br>\n<br><input type=\"text\" name=\"description\"  id=\"description\" size=\"128\" maxlength=\"128\" value = \"\"></label>\n</td></tr>\n";

        echo "<tr class='basic_form'>\n\n<td class='basic_form'>\n<label for=\"comment\">Comment: Special features, notes to self, etc.<br>\n<br><input type=\"text\" name=\"comment\"  id=\"comment\" size=\"128\" maxlength=\"128\" value = \"\"></label>\n
         </td></tr>\n";

        echo "<tr class='basic_form'>\n<td class='basic_form'>\n Specimen Location Now:";
            $this->admin_print_radio_list_one_LOOKUP_table_EDIT( $link, 'specimen_location_now', $show_button = 0);
            echo "</td>\n</tr>\n";

        echo "<tr class='basic_form'>\n<td class='basic_form'>\n<label for=\"place_found\">Place Found, such as local park, state park, etc..<br>\n<br><input type=\"text\"  name=\"place_found\"  id=\"place_found\" size=\"128\" maxlength=\"128\" value = \"\"></label>\n</td></tr>\n";

        echo "<tr class='basic_form'>\n<td class='basic_form'>\n Location information public?<br><input type=\"radio\" id=\"location_public_y_n\" name=\"location_public_y_n\"  size=\"1\" maxlength=\"1\" value=\"x\" checked=\"checked\"><label for=\"x\"> Select One:</label>\n
                            <input type=\"radio\" id=\"location_public_y_n\" name=\"location_public_y_n\"  size=\"1\" maxlength=\"1\" value=\"y\"><label for=\"1\"> Yes</label>\n
                             <input type=\"radio\" id=\"location_public_y_n\" name=\"location_public_y_n\"  size=\"1\" maxlength=\"1\" value=\"n\"><label for=\"0\"> No</label>\n</td>\n</tr>\n";


        echo "<tr class='basic_form'>\n<td class='basic_form'>\n<label for=\"location_found_city\">City nearest where you found specimen.<br>\n<br><input type=\"text\"  name=\"location_found_city\"  id=\"location_found_city\" size=\"48\" maxlength=\"128\" value = \"\"></label>\n</td></tr>\n";

        echo "<tr class='basic_form'>\n<td class='basic_form'>\n<label for=\"location_found_county\">County where you found specimen.<br>\n<br><input type=\"text\"  name=\"location_found_county\"  id=\"location_found_county\" size=\"48\" maxlength=\"128\" value = \"\"></label>\n</td></tr>\n";

        echo "<tr class='basic_form'>\n<td class='basic_form'>\n State specimen observed:";
            $this->state_print_drop_down_list( 0, 0, '',0, 0);
            echo "</td>\n</tr>\n";

        echo "<tr class='basic_form'>\n<td class='basic_form'>\n Country specimen observed:";
            $this->print_country_drop_down_list( 0, 0, '', 0, 0);
            echo "</td>\n</tr>\n";

        echo "<tr class='basic_form'>\n<td class='basic_form'>\n Month specimen observed:";
             $this->print_month_drop_down_list( 0, 0 );

        echo "<tr class='basic_form'>\n<td class='basic_form'>\n Day of Month specimen observed:";
            $this->print_day_drop_down_list( 0, 0 );
            echo "</td>\n</tr>\n";

        echo "<tr class='basic_form'>\n<td class='basic_form'>\n Year specimen observed:";
            $this->year_print_drop_down_list( 0, 0 );
            echo "</td>\n</tr>\n";

            //echo "<tr class='basic_form'>\n<td class='basic_form'>\n<label for=\"fungus_type\">fungus_type<br>\n<br><input type=\"text\"  name=\"fungus_type\"  id=\"fungus_type\" size=\"48\" maxlength=\"128\" value = \"\"></label>\n</td></tr>\n";

            echo "<tr class='basic_form'>\n<td class='basic_form'>\n";
            echo "Fungus Type:<br>";
            $table_to_edit = 'fungus_type';
            $this->print_radio_list_one_LOOKUP_table_EDIT( $link, $table_to_edit );
            echo "\n</td></tr>\n";

        echo "\n<tr class=\"basic_form\">\n<td class=\"basic_form\">\n
                    <input type=\"submit\" name =\"submit\" value=\"Enter\">\n
                    </td>\n</tr>\n</table>   <!-- end basic table -->\n</form>\n";

    }  // close function display_basic_character_table_simple( $link, $member_id )




    function display_member_dashboard_menu( $link, $member_id )
    {

        $table_name = 'specimens';
        $num_member_specimens    = $this->return_count($link, $member_id, $table_name );

        $table_name = 'specimen_group';
        $num_member_groups       = $this->return_count($link, $member_id, $table_name );

        $table_name = 'specimen_cluster';
        $num_member_clusters     = $this->return_count($link, $member_id, $table_name );

        ?>

        <!-- beginning of member dashboard navigation -->
        <table class='p_1'>
            <tr class='p_1'>
                <td class='p_1'>
                    <nav>
                        <ul class='nav_dash'>
                            <li> <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?a=2"> Specimen List <?php echo "($num_member_specimens)"; ?> </a></li>
                            <li> <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?a=3"> Group List <?php echo "($num_member_groups)"; ?> </a></li>
                            <li> <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?a=4"> Cluster List <?php echo "($num_member_clusters)"; ?> </a></li>
                            <li> <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?a=5"> Add new Specimen </a></li>
                            <li> <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?a=6"> Add new Group </a></li>
                            <li> <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?a=7"> Add new Cluster </a></li>
                        </ul>
                    </nav>
                </td>
            </tr>
        </table>
        <!-- end of member dashboard navigation -->

        <?php
    }   // close     function display_member_dashboard_menu( $link, $member_id )


    function display_member_dashboard_menu_NO_TABLE( $link, $member_id ):void
    {
         // displays horizontal list of action links on green background - 100% width
        $table_name = 'specimens';
        $num_member_specimens    = $this->return_count($link, $member_id, $table_name );

        $table_name = 'specimen_group';
        $num_member_groups       = $this->return_count($link, $member_id, $table_name );

        $table_name = 'specimen_cluster';
        $num_member_clusters     = $this->return_count($link, $member_id, $table_name );

        ?>
            <nav>    <!--  begin member dashboard navigation -->
            <ul class='nav_dash'>
                <li class='nav_dash'> <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?a=2"> Specimen List <?php echo "($num_member_specimens)"; ?> </a></li>
                <li class='nav_dash'> <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?a=3"> Group List <?php echo "($num_member_groups)"; ?> </a></li>
                <li class='nav_dash'> <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?a=4"> Cluster List <?php echo "($num_member_clusters)"; ?> </a></li>
                <li class='nav_dash'> <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?a=5"> Create <b>your</b> new Specimen entry</a></li>
                <li class='nav_dash'> <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?a=6"> Create <b>your</b> new Group </a></li>
                <li class='nav_dash'> <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?a=7"> Create <b>your</b> new Cluster </a></li>
                <li class='nav_dash'> <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?a=24"> Download <b>your</b> Specimen's Data </a></li>
            </ul>
            </nav>    <!-- end of member dashboard navigation -->
        <?php
    }   // close     function display_member_dashboard_menu_NO_TABLE( $link, $member_id ):void

    function group_cluster_display_specimen_membership( $link, $sid ):void
    {
        //$table_name = 'specimens';

        $table_name = 'specimen_group';

        $num_member_groups       = $this->group_cluster_return_number_groups_this_specimen( $link, $sid );

        $table_name = 'specimen_cluster';
        $num_member_clusters     = $this->group_cluster_return_number_clusters_this_specimen( $link, $sid );

        ?>

        <!-- beginning of group cluster status table -->
        <table class='p_1'>
            <tr class='p_1'>
                <td class='p_1'>
                    <nav>
                        <ul class='nav_dash'>
                            <li> This specimen is assigned to <?php echo $num_member_groups; ?> Groups and <?php echo $num_member_clusters; ?> Clusters.</li>
                            <li> <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?a=20&sid=<?php echo $sid; ?>"> Add this specimen to group </a></li>
                            <li> <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?a=21&sid=<?php echo $sid; ?>"> Add this specimen to cluster</a></li>
                        </ul>
                    </nav>
                </td>
            </tr>
        </table>
        <!-- end of of group cluster status table -->

        <?php
    }   // close     function group_cluster_display_specimen_membership( $link, $specimen_id ):void


    function images_display( $link, $id):void
    {

        // echo "<p>In images_display(link, id)  id is $id L ".__LINE__.".</p>";

        $image_query = $link->prepare("SELECT * FROM images WHERE specimen_id = ?");
        $image_query->bind_param("s", $id);
        $image_query->execute();
        $result_image = $image_query->get_result(); // get the mysqli result


        if(!$result_image)
        {
            echo "Database not available, try again later L".__LINE__." ".__FILE__."<br>";
        }
        else
        {
            $row_ct =  mysqli_num_rows( $result_image );
            if( $row_ct > 0 )
            {
                while ($row = $result_image->fetch_assoc())
                    {
                        $id            = $row['id'];
                        $specimen_id   = $row['specimen_id'];
                        $part          = $row['part'];
                        $source        = $row['source'];
                        $description   = $row['description'];
                        $image_width   = $row['image_width'];
                        $image_height  = $row['image_height'];
                        $lens          = $row['lens'];
                        $make          = $row['camera_make'];
                        $model         = $row['camera_model'];
                        $exposure      = $row['exposure'];
                        $aperture      = $row['aperture'];
                        $iso           = $row['iso'];
                        $date_taken    = $row['date_taken'];
                        $entered_by    = $row['entered_by'];
                        $date_entered  = $row['date_entered'];
                        echo "\n<table class='fifty'>\n<tr class='fifty'>\n<td>\n";
                                ?>

<img  id="$specimen_name" src="<?php echo $source;?>" alt="description"  width="<?php echo $image_width;?>" height="<?php echo $image_height;?>" />
</td>
<td>
<?php


echo "\n<ul>
<li> Specimen Id: $specimen_id</li> 
<li> Image Id: $id</li> 
<li> Source: $source</li>
<li> Part: $part</li>
<li> Description: $description</li>
<li> Image Width:  $image_width</li>
<li> Image Height: $image_height</li>
<li> Lens: $lens</li>
<li> Camera Make: $make</li>
<li> Camera Model: $model</li>
<li> Exposure: $exposure</li>
<li> Aperture:  $aperture</li>
<li> ISO: $iso</li>
<li> Date taken:  $date_taken</li>
<li> Entered By:  $entered_by</li>
<li> Date Entered: $date_entered</li>
 </ul>\n";
echo "\n</td>\n</tr>\n</table>\n";

$this->images_toggle_show_link( $specimen_id, 'show' );  // this shows at bottom of every image row
                    }
            }
            else
            {
echo "<b class='redComment'>( You have not entered any images L ".__LINE__.".)</b><br>\n";

            }

        } // close else
    }  //    function images_display( $link, $id)


    function image_create_mrdbid_thumbnail( $link, $sid, $pass_image, $image_name ):void
    {
        // https://www.php.net/manual/en/imagick.thumbnailimage.php

        $output_file = "thumbnails/".$sid."_thumb_".$image_name;

         if(file_exists($output_file))
         {
             echo "$output_file already exists. Please modify or choose another name.<br>";
         }
         else
         {
        // Max vert or horiz resolution
        $maxsize=200;

        // create new Imagick object
        $image = new Imagick($pass_image);

        // Resizes to whichever is larger, width or height
        if($image->getImageHeight() <= $image->getImageWidth())
        {
            // Resize image using the lanczos resampling algorithm based on width
            $image->resizeImage($maxsize,0,Imagick::FILTER_LANCZOS,1);
        }
        else
        {
            // Resize image using the lanczos resampling algorithm based on height
            $image->resizeImage(0,$maxsize,Imagick::FILTER_LANCZOS,1);
        }

        // Set to use jpeg compression
        $image->setImageCompression(Imagick::COMPRESSION_JPEG);
        // Set compression level (1 lowest quality, 100 highest quality)
        $image->setImageCompressionQuality(75);
        // Strip out unneeded meta data
        $image->stripImage();
        // Writes resultant image to output directory
         //$image->writeImage( $output_file );
        file_put_contents($output_file, $image);                                    // save to file
        $this->image_insert_new_THUMBNAIL( $link, $sid, $output_file);              // insert into database
        // Destroys Imagick object, freeing allocated resources in the process
        $image->destroy();
        }  // else of if(file_exists($output_file))

    }  // close function image_create_mrdbid_thumbnail( $pass_image ):void

    function image_display_ONE( $link, $id, $image_source)
    {
        $source = "uploads/".$image_source;

        // echo "<p>id:  $id - source:  $source on line ".__LINE__.",</p>";

        $image_query = $link->prepare("SELECT * FROM images WHERE specimen_id = ? AND source_remote = ?");
        $image_query->bind_param("is", $id, $source);
        $image_query->execute();
        $result_image = $image_query->get_result(); // get the mysqli result


        if(!$result_image)
        {
            echo "Database not available, try again later L".__LINE__." ".__FILE__."<br>";
        }
        else
        {
            $row_ct =  mysqli_num_rows( $result_image );
            if( $row_ct > 0 )
            {
                    $row = $result_image->fetch_assoc();
                    $id              = $row['id'];
                    $specimen_id     = $row['specimen_id'];
                    $part            = $row['part'];
                    $source_remote   = $row['source_remote'];
                    $source_local          = $row['source_local'];
                    $description     = $row['description'];
                    $image_width     = $row['image_width'];
                    $image_height    = $row['image_height'];
                    $lens            = $row['lens'];
                    $make            = $row['camera_make'];
                    $model           = $row['camera_model'];
                    $exposure        = $row['exposure'];
                    $aperture        = $row['aperture'];
                    $iso             = $row['iso'];
                    $date_taken      = $row['date_taken'];
                    $entered_by      = $row['entered_by'];  // need member name
                    $entered_by_name = $this->return_member_name_from_id( $link, $entered_by );
                    $date_entered    = $row['date_entered'];
                    echo "\n<table class='p_1'>\n<tr class='p_1'>\n<td class='p_1'>\n";
                    ?>
                    <img  id="$specimen_name" src="<?php echo $source_remote;?>" alt="description" />
                    <?php


                    echo "\n<ul>
<li> Specimen Id: $specimen_id</li> 
<li> Remote Source: $source_remote</li>
<li> Local Source: $source_local</li>
<li> Part: $part</li>
<li> Description: $description</li>
<li> Image Width:  $image_width</li>
<li> Image Height: $image_height</li>
<li> Lens: $lens</li>
<li> Camera Make: $make</li>
<li> Camera Model: $model</li>
<li> Exposure: $exposure</li>
<li> Aperture:  $aperture</li>
<li> ISO: $iso</li>
<li> Date taken:  $date_taken</li>
<li> Entered By:  $entered_by_name</li>
<li> Date Entered: $date_entered</li>
 </ul>\n";
                    echo "\n</td>\n</tr>\n</table>\n";

                    // $this->toggle_show_images( $specimen_name, 'none' );
                }
            else
            {
                echo "<b class='redComment'>( You have not entered any images L ".__LINE__.".)</b><br>\n";
            }

        } // close else
    }  //    function image_display_ONE( $link, $id, $image_id)




function images_list( $link, $specimen_id)
{
    $query = $link->prepare("SELECT * from images WHERE specimen_id = ?");

    $query->bind_param("i", $specimen_id);
    $query->execute();
    $result = $query->get_result();

    if(!$result)
    {
        echo "Database not available, try again later L".__LINE__." of ".__FILE__.".<br>";
    }
    else
    {
        $row_ct =  mysqli_num_rows( $result );
        if( $row_ct > 0 )
        {
            echo "<h2>Image List:</h2>";
            echo "\n<table class='images'>\n";
            while ($data = mysqli_fetch_assoc($result))
            {
                //echo "<br>var_dump here of data:<br>";
                //var_dump($data);
                //echo "<hr>";

                $table_id      = $data['id'];
                $specimen_id   = $data['specimen_id'];
                $part          = $data['part'];
                $source_remote = $data['source_remote'];
                $source_local  = $data['source_local'];
                $description   = $data['description'];
                $image_width   = $data['image_width'];
                $image_height  = $data['image_height'];
                $lens          = $data['lens'];
                $make          = $data['camera_make'];
                $model         = $data['camera_model'];
                $exposure      = $data['exposure'];
                $aperture      = $data['aperture'];
                $iso           = $data['iso'];
                $date_taken    = $data['date_taken'];
                $entered_by    = $data['entered_by'];
                $date_entered  = $data['date_entered'];
                echo "<tr class='images'>\n
                            <td class='images'>\n";
                echo "L".__LINE__." Image $table_id: $table_id ( $part) $description file:  $source_remote  <a href=\"/site/member_dashboard.php?a=19&sid=$specimen_id&column_name=images&common=images\"> Display this image</a>  - <a href=\"/site/member_dashboard.php?a=20&sid=$specimen_id&column_name=images&common=images\"> Edit</a> - <a href=\"/site/member_dashboard.php?a=21&sid=$specimen_id&column_name=images&common=images\"> Delete</a>";
                $common = '';
                echo "</tr>\n
                            </td>\n";
            }
            echo "\n</table>\n";
        }
        else
        {
            echo "<p><b class='redComment'>You have not entered any images.</b></p>";
        }
    }

}  // close function images_list( $link, $passed_specimen_name)

    function image_delete( $link, $table_id):int
    {
        $success = 0;
        if( !$table_id )
        {
            echo "<p>Did not receive image id.</p>";
        }
        else
        {
            $query = $link->prepare("DELETE FROM images WHERE id =  ?");

            $query->bind_param("i", $table_id);
            $query->execute();

            $success = mysqli_affected_rows($link);

            if( $success )
            {
                echo "<p><b>Image deleted.</b></p>";
            }
            else
            {
                echo "Database not available, try again later L".__LINE__." of ".__FILE__.".<br>";
            }

        }
        return $success;
    }   //     close function image_delete( $link, $table_id)


    function download_saved_specimen_file( $file_path, $file_name ):void
    {

         echo "<p>Working on download of file_path: $file_path - file_name: $file_name on line ".__LINE__.".</p>";

    }   // close function download_saved_specimen_file( $path_to_file ):bool

    function filled_out( $pass_array ):bool
    {
        $filled_out = true;
        foreach ($pass_array as $key => $value)
        {
            if( isset($key) )
            {
                if( (strlen($value)) < 1 )
                {
                    $filled_out = false;
                }
            }
        }
        return $filled_out;
    }  // close function filled_out( $pass_array )

    function image_insert_new( $link, $pass_array, $source_remote, $source_local):void
    {
        $id = '';    // avoid fatal incorrect int value
        $entered_by = 1;

        $specimen_id    = $pass_array['specimen_id'];
        $part           = $pass_array['part'];
        $description    = $pass_array['description'];
        $target_file    = $pass_array['target_file'];

        $image = new Imagick($target_file);
        $image_width  = $image->getImageWidth();
        $image_height =$image->getImageHeight();
        // print "the image width is " . $image_width . " pixels and the image height is " . $image_height . " pixels on line".__LINE__.".";

        //$image_width    = $pass_array['image_width'];
        //$image_height   = $pass_array['image_height'];
        $camera_make    = $pass_array['make'];
        $camera_model   = $pass_array['model'];
        $lens           = $pass_array['lens'];
        $exposure       = $pass_array['exposure'];
        $aperture       = $pass_array['aperture'];
        $iso            = $pass_array['iso'];
        $date_taken     = $pass_array['date'];

        // echo "<p>image_width:  $image_width - image_height: $image_height on line ".__LINE__.".</p>";  // same as original image

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $query = $link->prepare("INSERT INTO images (`id`, `specimen_id`, `part`, `description`, `source_remote`, `source_local`, `image_width`, `image_height`, `camera_make`, `camera_model`,`lens`, `exposure`, `aperture`, `iso`, `date_taken`, `entered_by`, `date_entered`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now() )");


        $query->bind_param("isssssiisssssisi", $id, $specimen_id, $part, $description, $source_remote, $source_local, $image_width, $image_height, $camera_make, $camera_model, $lens, $exposure, $aperture, $iso, $date_taken, $entered_by);
        $success = $query->execute( );
        //$result = $query->get_result();

        // echo "<p>Information for image $target_file was entered into database L".__LINE__." of ".__FILE__.".</p>";
        // echo "<br> <br> <a href=\"/site/upload_form.php?specimen_name=$specimen_name\"> Upload another image?</a>\n<br>";

        //if( $result !== false )
        if( $success )
        {
            $specimen_name_in_mushroom_table = $this->specimen_return_name_from_specimen_id($link, $specimen_id);
            // echo "specimen_id: $specimen_id - specimen_name_in_mushroom_table:  $specimen_name_in_mushroom_table - on line ".__LINE__.".";

            //echo "\n<p>Information for image $target_file was entered into database L".__LINE__." of ".__FILE__.".</p>\n";
            echo "\n<p><a href=\"/site/member_dashboard.php?a=17&sid=$specimen_id\"> Upload another image for <b class='red'>$specimen_name_in_mushroom_table</b></a>\n<p/>\n";
        }
        else
        {
            echo "<p><b>NOTHING ENTERED</b> into database L".__LINE__." of ".__FILE__.".</p>";
        }
    }     // close function image_insert_new( $link, $pass_array)


    function image_insert_new_THUMBNAIL( $link, $specimen_id, $target_file):void
    {
        $id = '';    // avoid fatal incorrect int value
        $entered_by = 1;

        $image = new Imagick($target_file);
        $image_width  = $image->getImageWidth();
        $image_height =$image->getImageHeight();

        // echo "<p>image_width:  $image_width - image_height: $image_height on line ".__LINE__.".</p>";  // same as original image

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $query = $link->prepare("INSERT INTO images_thumbnail (`id`, `specimen_id`, `source_remote`, `image_width`, `image_height`, `entered_by`, `date_entered`) VALUES (?, ?, ?, ?, ?, ?, now() )");


        $query->bind_param("iisiis", $id, $specimen_id, $target_file, $image_width, $image_height, $entered_by);
        $success = $query->execute( );
        //$result = $query->get_result();

        // echo "<p>Information for image $target_file was entered into database L".__LINE__." of ".__FILE__.".</p>";
        // echo "<br> <br> <a href=\"/site/upload_form.php?specimen_name=$specimen_name\"> Upload another image?</a>\n<br>";

        //if( $result !== false )
        if( $success )
        {
            echo "\n<p>Information for <b>THUMBNAIL</b> image $target_file was entered into database L".__LINE__." of ".__FILE__.".</p>\n";
        }
        else
        {
            echo "<p><b>THUMBNAIL NOT ENTERED</b> into database L".__LINE__." of ".__FILE__.".</p>";
        }
    }     // close function image_insert_new_THUMBNAIL( $link, $pass_array)


    function specimen_insert_new_specimen_BASIC_data( $link ):string
    {
        echo "<hr>";
        $table_name  = 'specimens';

        if( isset( $_SESSION['id'] ) )
        {
            $member_id = $added_by  = $_SESSION['id'];
        }
        else
        {
            exit( "You must be logged in.<br>" );
        }

        $next_id = $this->table_return_next_table_id( $link, $table_name);


        $specimen_name          = '';
        $common_name            = '';
        $description            = '';
        $comment                = '';
        $specimen_location_now  = '';
        $place_found            = '';
        $location_found_city    = '';
        $state                  = '';
        $location_found_county  = '';
        $country                = '';
        $location_public_y_n    = '';
        $month_found            = '';
        $day_found              = '';
        $year_found             = '';
        $fungus_type            = '';


        $specimen_name          = $_POST['specimen_name'];
        $common_name            = $_POST['common_name'];
        $description            = $_POST['description'];
        $comment                = $_POST['comment'];
        $specimen_location_now  = $_POST['specimen_location_now'];
        $place_found            = $_POST['place_found'];
        $location_found_city    = $_POST['location_found_city'];
        $state                  = $_POST['state'];
        $location_found_county  = $_POST['location_found_county'];
        $country                = $_POST['country'];
        $location_public_y_n    = $_POST['location_public_y_n'];
        $month_found            = $_POST['month'];
        $day_found              = $_POST['day'];
        $year_found             = $_POST['year'];
        $fungus_type            = $_POST['fungus_type'];

        // print_r($_POST);


        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

       $query = $link->prepare("INSERT INTO `specimens`(`id`, `member_id`, `specimen_name`, `common_name`, `description`, `comment`, `specimen_location_now`, `place_found`,`location_found_city`, `state`, `location_found_county`, `country`, `location_public_y_n`, `month_found`, `day_found`, `year_found`, `fungus_type`, `entered_by`, `date_entered`) VALUES (  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now() )");

        $query->bind_param("iissssiisisiiiiiii", $next_id, $member_id, $specimen_name, $common_name, $description, $comment, $specimen_location_now, $place_found, $location_found_city, $state, $location_found_county, $country, $location_public_y_n, $month_found, $day_found, $year_found, $fungus_type, $added_by );

        $query->execute();
        $result = $query->get_result();

        if ($query->errno)
        {
            echo "FAILURE!!! " . $query->error;
            return 0;
        }
        else
        {
            // add to month group
            $this->auto_add_new_specimen_to_month_group($link, $next_id, $month_found);

            echo "<p>Table $table_name added {$query->affected_rows} row(s) L".__LINE__.".</p>";
            $_SESSION["last_new_specimen"] = $next_id;
            //$s = $_SESSION["last_new_specimen"];
            //echo "<p>session var is $s.</p>";
            return $specimen_name;
        }

    }    // close specimen_insert_new_specimen_BASIC_data( $link )



function print_specimen_action_option_list( $link, $specimen_id, $specimen_name, $common_name ):void
{
    // prints the horizontal list of links (options) for action on each specimen
    //echo "<p>specimen id:  $specimen_id on line ".__LINE__.".</p>";

    $num_groups   = $this->group_cluster_return_number_groups_this_specimen( $link, $specimen_id );
    $num_clusters = $this->group_cluster_return_number_clusters_this_specimen( $link, $specimen_id );

    echo "<tr class='p_1'>\n<td class='p_1'>\n<b>$specimen_name</b>  - $common_name<br>\n <a href=\"/site/member_dashboard.php?a=11&sid=$specimen_id&b=s&c=s\">View/Edit</a>  - <a href=\"/site/member_dashboard.php?a=17&sid=$specimen_id\"> Upload Image</a> - Groups($num_groups) - <a href=\"/site/member_dashboard.php?a=20&sid=$specimen_id\">Add to Group?</a> - Clusters ($num_clusters) - <a href=\"/site/member_dashboard.php?a=21&sid=$specimen_id\">Add to Cluster?</a> - <a href=\"/site/member_dashboard.php?a=26&sid=$specimen_id\">Remove From List</a> - <a href=\"/site/member_dashboard.php?a=25&sid=$specimen_id\">Download Data (This specimen only)</a>\n</td>\n</tr>\n";

}  // close function print_specimen_action_option_list( ):void


    function group_cluster_insert_new_specimen_membership( $link, $sid, $group_or_cluster ):bool
    {
        $id = '';    // avoid fatal incorrect int value
        if( isset( $_SESSION['id']) )
        {
           $added_by   = $_SESSION['id'];
           echo "<p> added_by:  $added_by line ".__LINE__.".</p>";
        }
        else
        {
            exit( "session id is not set L".__LINE__.".<br>" );
        }

        if( isset( $_POST['category'] ) )
        {
            $category  = $_POST['category'];
            echo "<p> category:  $category line ".__LINE__.".</p>";
        }
        else
        {
            exit( "Category is not set L".__LINE__.".<br>" );
        }

        if( $group_or_cluster == 'g')
        {
            $insert_table = 'member_list_groups';
        }
        elseif( $group_or_cluster == 'c')
        {
            $insert_table = 'member_list_clusters';
        }
        else
        {
            echo "<p>Out of Options! line ".__LINE__.".</p>";
        }

        echo "<p>id:  $id - group_or_cluster: $group_or_cluster on line ".__LINE__.".</p>";

        if( $group_or_cluster == 'g')
        {
            $query = $link->prepare("INSERT INTO $insert_table(`id`, `specimen_id`, `group_id`, `entered_by`, `date_entered`) VALUES (  ?, ?, ?, ?, now() )");
        }
        else
        {
            $query = $link->prepare("INSERT INTO $insert_table(`id`, `specimen_id`, `cluster_id`, `entered_by`, `date_entered`) VALUES (  ?, ?, ?, ?, now() )");
        }


        $query->bind_param("iiii", $id, $sid, $category, $added_by );
        $query->execute();
        $result = $query->get_result();

        if ($query->errno) {
            echo "FAILURE!!! " . $query->error;
            return 0;
        }
        else
        {
            echo "<p>Table member_list_groups added {$query->affected_rows} row(s).</p>";
            //$s = $_SESSION["last_new_specimen"];
            //echo "<p>session var is $s.</p>";
            return 1;
        }

    }    // close group_cluster_insert_new_specimen_membership( $link, $sid )




 function auto_add_new_specimen_to_month_group($link, $sid, $month_found):bool
    {
        $id = '';    // avoid fatal incorrect int value
        if( isset( $_SESSION['id']) )
        {
           $added_by   = $_SESSION['id'];
           echo "<p> added_by:  $added_by line ".__LINE__.".</p>";
        }
        else
        {
            exit( "session id is not set L".__LINE__.".<br>" );
        }

        $group_id = $month_found;
/*
                        switch ($month_found)
                {
                    case 'January':
                        $group_id = 1;
                    case 'February':
                        $group_id = 2;
                        break;
                    case 'March':
                        $group_id = 3;
                        break;
                    case 'April':
                        $group_id = 4;
                        break;
                    case 'May':
                        $group_id = 5;
                        break;
                    case 'June':
                        $group_id = 6;
                        break;
                    case 'July':
                        $group_id = 7;
                        break;
                    case 'August':
                        $group_id = 8;
                        break;
                    case 'September':
                        $group_id = 9;
                        break;
                    case 'October':
                        $group_id = 10;
                        break;
                    case 'November':
                        $group_id = 11;
                        break;
                    case 'December':
                        $group_id = 12;
                        break;
                        default:
                            $group_id = 0;
                }
*/
            $query = $link->prepare("INSERT INTO member_list_groups(`id`, `specimen_id`, `group_id`, `entered_by`, `date_entered`) VALUES (  ?, ?, ?, ?, now() )");


        $query->bind_param("iiii", $id, $sid, $month_found, $added_by );
        $query->execute();
        $result = $query->get_result();

        if ($query->errno) {
            echo "FAILURE!!! " . $query->error;
            return 0;
        }
        else
        {
            echo "<p>Table member_list_groups added {$query->affected_rows} row(s).</p>";
            //$s = $_SESSION["last_new_specimen"];
            //echo "<p>session var is $s.</p>";
            return 1;
        }

    }    // close auto_add_new_specimen_to_month_group($link, $sid, $month_found)


    function group_cluster_insert_new_db_category( $link, $member_id ):bool
    {

        foreach($_POST as $key => $val)   // enter POST values into array
        {
            if (is_array($key))
            {
                echo "<p>Is an array on line ".__LINE__." of ".__FILE__.".</p>";
            }
            else
            {
                echo "{$key} - {$val} <br>";
                $enter_var_array[] = $val;
            }
        }

        if( isset( $_GET['t'] ))
        {
            $pass_t  = $_GET['t'];

            if( $pass_t == 'g')
            {
                $table_name = 'specimen_group';
            }
            elseif( $pass_t == 'c')
            {
                $table_name = 'specimen_cluster';
            }
            else
            {
                exit('Bad parameter for group-cluster');
            }
        }
        else
        {
            echo "<p>t is not set on line ".__LINE__." of ".__FILE__.".</p>";
        }


        if( isset( $_SESSION['id'] ) )
        {
            $addedBy  = $_SESSION['id'];
        }
        else
        {
            exit( "You must be logged in.<br>" );
        }

        $col_names_array = $this->table_return_column_names_and_data_types_array( $link, $table_name );

        $size_of_col_names = sizeof($col_names_array);

        /*********************** Enter NEW into table **********************/
        $num_needed = ($size_of_col_names - 1);

        // create the query - create the binding single letter list
        $query_string = "INSERT INTO $table_name (";

        for( $x=0;$x<$size_of_col_names; $x++)
        {
            if( $col_names_array[$x][0] == 'date_entered')
            {
                $string_name = $col_names_array[$x][0];
                $query_string .= " $string_name";
                // do not add to param list because will enter value as now()
            }
            elseif( $col_names_array[$x][0] == 'id')
            {
                $string_name = $col_names_array[$x][0];
                $query_string .= " $string_name,";
                // do not add to param list because will enter value as ''
            }
            elseif( $col_names_array[$x][0] == 'member_id')
            {
                $string_name = $col_names_array[$x][0];
                $query_string .= " $string_name,";
                // do not add to param list because will enter value as addedby
            }
            elseif( $col_names_array[$x][0] == 'entered_by')
            {
                $string_name = $col_names_array[$x][0];
                $query_string .= " $string_name,";
                // do not add to param list because will enter value as loggedin session id
            }
            else
            {
                $string_name = $col_names_array[$x][0];

                $query_string.= " $string_name,";

                //$test_name = $col_names_array[$x][0];
                //$test_type = $col_names_array[$x][1];
                //echo "<br>test_name:  $test_name - test_type: $test_type<br>";

                switch ($col_names_array[$x][1])
                {
                    case 'int':
                    case 'smallint':
                        $a_param_type[] = 'i';
                        // echo "<br>is i<br>";
                        break;
                    case 'decimal':
                        $a_param_type[] = 'd';
                        // echo "<br>is d<br>";
                        break;
                    case 'varchar':
                    case 'char':
                    case 'datetime':
                        $a_param_type[] = 's';
                        // echo "<br>is s<br>";
                        break;
                    default:
                        $a_param_type[] = 's';
                    // echo "<br>is default<br>";
                }
            }
        }

        $next_id = $this->table_return_next_table_id( $link, $table_name);
        $query_string .= " )
                        VALUES ( $next_id, ";

        for( $y=1;$y<$size_of_col_names; $y++)   // minus one since already added one empty above
        {
            if( $col_names_array[$y][0] == 'id' )
            {
                //$query_string .= " $next_id,";  // set directly above
            }
            if( $col_names_array[$y][0] == 'member_id' )
            {
                $query_string .= " $addedBy,";
            }
            elseif( $col_names_array[$y][0] == 'date_entered' )  // always last so NO comma
            {
                $query_string .= " now())";
            }
            elseif( $col_names_array[$y][0] == 'entered_by' )  // always last so NO comma
            {
                $query_string .= " $addedBy,";
            }
            else
            {
                $query_string .= " ?,";
            }
        }
        $param_type = '';
        $n = count($a_param_type);
        for($i = 0; $i < $n; $i++)
        {
            //$param_type[] = $a_param_type[$i];
            $param_type .= $a_param_type[$i];
        }

        /* with call_user_func_array, array params must be passed by reference */
        $a_params[] = & $param_type;

        for($i = 0; $i < $n; $i++)
        {
            /* with call_user_func_array, array params must be passed by reference */
            $a_params[] = & $enter_var_array[$i];
        }

        //  echo "<br>query_string:  $query_string<br>";

        //$size_of_params = sizeof($a_params);
        //for($cp=0; $cp<$size_of_params;$cp++)
        //{
        //    echo "<br>$cp. a_params[cp] - $a_params[$cp]";
        //}


        /* Prepare statement */
        $query = $link->prepare($query_string);
        if($query === false)
        {
            trigger_error('Wrong SQL: ' . $query . ' Error: ' . $link->errno . ' ' . $link->error, E_USER_ERROR);
        }
        /* use call_user_func_array, as $stmt->bind_param('s', $param); does not accept params array */

        call_user_func_array(array($query, 'bind_param'), $a_params);

        $query->execute();
        $result = $query->get_result();

        if ($query->errno) {
            echo "FAILURE!!! " . $query->error;
            return false;
        }
        else
        {
            echo "<p>Table <b>$table_name</b> added {$query->affected_rows} row.</p>\n";

            echo "<p><a href=\"member_dashboard.php?a=6\">Add another Group?</a></p>\n";
            echo "<p><a href=\"member_dashboard.php?a=7\">Add another Cluster?</a></p>\n";

            $this->display_member_dashboard_menu( $link, $member_id );
            return true;

        }
    }  // close group_cluster_insert_new_db_category( $link, $member_id )

    function image_is_duplicate_in_images_table( $link, $sid, $images_saved_name ):bool
    {
        /* create a prepared statement */
        $stmt = $link->prepare("SELECT id FROM images  WHERE specimen_id = ? AND source_remote = ?");

         /* bind parameters for markers */
         $stmt->bind_param("is", $sid, $images_saved_name);

        /* execute query */
        $stmt->execute();

        /* bind result variables */
        $returned_id = '';
        $stmt->bind_result($returned_id);

        /* fetch value */
        $stmt->fetch();

        // echo "<p>id:  $returned_id - name: $images_saved_name</p>";

        if (!$returned_id)
        {
            //echo "<p>Enter this image - NO DUPLICATE on line ".__LINE__.".</p>";
            return false;
        }
        else
        {
            //echo "<p>Do not enter this image - Is DUPLICATE on line ".__LINE__.".</p>";
            return true;
        }
    }    // close function image_is_duplicate_in_images_table( $link, $sid, $images_saved_name ):bool

    function prep_db_word_for_display( $db_word ):string
    {
        $db_word_no_underscore = str_replace( '_', ' ', $db_word);
        $display_name = ucwords($db_word_no_underscore);
        return $display_name;
    }   // function prep_db_word_for_display( $db_word )

    function matchStateCountry( $selectedState, $selectedCountry ):bool
    {
        $countryStateOK = false;
        
        $USA_States = array(
            "AL",
            "AK",
            "AZ",
            "AR",
            "CA",
            "CO",
            "CT",
            "DE",
            "DC",
            "FL",
            "GA",
            "HI",
            "ID",
            "IL",
            "IN",
            "IA",
            "KS",
            "KY",
            "LA",
            "ME",
            "MD",
            "MA",
            "MI",
            "MN",
            "MS",
            "MO",
            "MT",
            "NE",
            "NV",
            "NH",
            "NJ",
            "NM",
            "NY",
            "NC",
            "ND",
            "OH",
            "OK",
            "OR",
            "PA",
            "RI",
            "SC",
            "SD",
            "TN",
            "TX",
            "UT",
            "VT",
            "VA",
            "WA",
            "WV",
            "WI",
            "WY" );
        
        $CAN_States = array(
            "AB",
            "BC",
            "MB",
            "NB",
            "NF",
            "NS",
            "NT",
            "NU",
            "ON",
            "PE",
            "QC",
            "SK",
            "YT" );
        
        $MEX_States = array(
            "AG",
            "BJ",
            "BS",
            "CP",
            "CH",
            "CI",
            "CU",
            "CL",
            "DF",
            "DG",
            "GJ",
            "GR",
            "HG",
            "JA",
            "EM",
            "MH",
            "MR",
            "NA",
            "NL",
            "OA",
            "PU",
            "QA",
            "QR",
            "SL",
            "SI",
            "SO",
            "TA",
            "TM",
            "TL",
            "VZ",
            "YC",
            "ZT" );
        
        $arr = "";
        
        if( $selectedCountry == "USA" )
        {
            $arr = $USA_States;
        }
        elseif( $selectedCountry == "CAN" )
        {
            $arr = $CAN_States;
        }
        elseif( $selectedCountry == "MEX" )
        {
            $arr = $MEX_States;
        }
        else
        {
            //echo "Problem with  country and state input.<br>";
            // exit();
            return $countryStateOK;
        }
        
        foreach ($arr as $value)
        {
            // echo "$value <br>";
            if( $selectedState === $value )
            {
                $countryStateOK = true;
            }
        }
        
        return $countryStateOK;
        
    }  // function matchStateCountry( $selectedState, $selectedCountry )

function thumbnails_exist_this_sid( $link, $specimen_id ):bool
{
    // echo "<p>specimen_id:  $specimen_id line ".__LINE__.".</p>";
    $id = '';
    $query = $link->prepare("SELECT id FROM images_thumbnail WHERE specimen_id = ?");
    $query->bind_param("i", $specimen_id );
    $query->bind_result($id);
    $query->execute();
    $query->fetch();

    if( $id )
    {
        // echo "<p>id:  $id on line ".__LINE__.".</p>";
        return true;
    }
    else
    {
        echo "No id for thumbnails returned for specimen_id:  $specimen_id - Line ".__LINE__.".<br>";
        return false;
    }
}      // close  thumbnails_exist_this_sid( $link, $specimen_id ):bool

function thumbnail_print_banner_select( $link, $sid )
{
    // pass_row_num is only useful as an index for array returned of column names of mushroom table
    // character such as cap_color to set color for - relates to the order of columns in mushroom table
    $num_cols = 8;
    $specimen_name = $this->specimen_return_name_from_specimen_id($link, $sid);

    echo "<div class='center'>\n<table><!--Begin Thumbnail image Table -->\n<tr>\n<td colspan=\"$num_cols\">\n<span id=\"$sid\"><p>Click on the thumbnail below to see larger image for specimen <b class='blueComment'>$specimen_name</b>:</p></span>\n</td>\n</tr>\n";

    $query = "";
    /* create a prepared statement */
    $stmt = $link->prepare("SELECT source_remote, image_width, image_height FROM images_thumbnail WHERE specimen_id = ?");

    /* bind parameters for markers */
    $stmt->bind_param("i", $sid);

    /* execute query */
    $stmt->execute();

    /* bind result variables */
    $thumb_source = $thumb_image_width = $thumb_image_height = '';

    $stmt->bind_result($thumb_source, $thumb_image_width, $thumb_image_height );

    $gen_ct = 1;
    while( $stmt->fetch() )  /* fetch value */
    {
        // echo "<p>source:  $thumb_source - width:  $thumb_image_width - height: $thumb_image_height on line ".__LINE__.".</p>";
        $row_is_closed = 0;
        $remainder = $gen_ct % $num_cols;

        if( $remainder ==  1 )
        {
            ?>
                <tr>   <!-- Line <?php echo __LINE__; ?> -->
            <?php
        }

        if( $gen_ct != 0 )
        {
                $image_source_1 = str_replace( 'thumbnails/', '', $thumb_source);
                $image_source = str_replace( '_thumb', '', $image_source_1);

                ?>
                    <td>
                        <a href="member_dashboard.php?a=19&sid=<?php echo $sid; ?>&i_s=<?php echo $image_source; ?>"><img src="<?php echo $thumb_source; ?>" alt="<?php echo $image_source; ?>" width="<?php echo $thumb_image_width; ?>" height="<?php echo $thumb_image_height; ?>"></a> <!-- Line  <?php echo __LINE__; ?>  -->
                    </td>
                <?php

            }


            if( $remainder ==  0 && $gen_ct != 0)
            {
            ?>
                </tr>  <!-- Line  <?php echo __LINE__; ?>  -->
            <?php
                $row_is_closed = 1;
            }
            $gen_ct = $gen_ct + 1;
        }  // close      while

        if(!$row_is_closed )
        {
            echo "</tr>\n";
        }
        echo "\n</table>\n</div> <!-- End Thumbnail image Table -->\n\n";

}  // close function thumbnail_print_banner_select( $link, $sid  )





    function print_edit_one_character_form( $link, $character_name, $specimen_id, $display_option, $selected ):void
    {
         echo "<p>\n character_name:  $character_name - specimen_id:  $specimen_id - display_type: $display_option - selected:  $selected on  Line ".__LINE__." </p>\n";

        if( !$character_name  )
        {
            echo "<p>No table name was sent Line ".__LINE__.".</p>";
            return;
        }

        if( !$specimen_id  )
        {
            echo "<p>No specimen ID was sent Line ".__LINE__.".</p>";
            return;
        }

        if( $selected == '')
        {
            $selected = 1;
        }

            ?>
                <form action="/site/edit_one_character_processor.php" method="post" name="<?php echo $character_name ?>" >
            <?php
            // echo "line ".__LINE__." Table Name:  $character_name - display_type:  $display_option<br>";

            // all color related characters use the same lookup table
            // all odor related characters use the same lookup table
            // all taste related characters use the same lookup table

            if( ($display_option == 6) || ( $display_option == 7 ) || ( $display_option == 8 ) )  //  6 is color - 7 is taste - 8 is odor
            {
                // select all from fungi database table color and mark selected on  radio list form
                $display_type_query = $link->prepare("SELECT * FROM characters");
                $display_type_query->execute();
                $result_display_type = $display_type_query->get_result(); // get the mysqli result


                if(!$result_display_type)
                {
                    echo "Database not available, try again later L".__LINE__." ".__FILE__."<br>";
                }
                else
                {
                    $row_ct =  mysqli_num_rows( $result_display_type );
                    if( $row_ct > 0 )
                    {
                        echo "\n<table>\n";

                        while ($row = $result_display_type->fetch_assoc())
                        {
                            if( $display_option == 'color' )
                            {
                                $print_name = $row['latin_name'];
                            }
                            else
                            {
                                $print_name = $row['name'];
                            }
                            ?>
                            <tr>
                                <td>
                                    <input type="radio"  id="<?php echo $row['id']; ?>" name="character_value" size="40" maxlength="72" value="<?php echo htmlentities($row['id'] ); ?>" <?php if( $row['id'] == $selected ) { echo "checked='checked'";} ?>> <label for="<?php echo $row['id']; ?>"><?php echo $print_name; ?> </label>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                }
            }
            elseif( $display_option == 9 ) // 9 is radio list
            {
                // select all from  databasetable character_name and mark selected on radio list form
                echo "<p>Table Name:  $character_name - specimen_id:  $specimen_id - display_type: $display_option - selected:  $selected line ".__LINE__."</p>";

                $character_id = $this->get_character_id_from_name( $link, $character_name );

                $query = $link->prepare("SELECT * FROM $character_name");
                //$query->bind_param("i", $character_id );
                $query->execute();
                $result = $query->get_result(); // get the mysqli result

                if(!$result)
                {
                    echo "Database not available, try again later L".__LINE__." ".__FILE__."<br>";
                }
                else
                {
                    $row_ct =  mysqli_num_rows( $result );
                    if( $row_ct > 0 )
                    {
                        echo "\n<table>\n";

                        while ($row = $result->fetch_assoc())
                        {
                            ?>
                            <tr>
                                <td>
                                    <input type="radio"  id="<?php echo $row['id']; ?>" name="character_value" size="40" maxlength="72" value="<?php echo htmlentities($row['id'] ); ?>" <?php if( $row['id'] == $selected ) { echo "checked='checked'";} ?>> <label for="<?php echo $row['id']; ?>"><?php echo $row['name']; ?> </label>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                }

            }
            elseif( $display_option == 5 )  // 5 is text box string
            {
                // get current data from mushroom table column and prefill text box on form
                // select all from fungi database table color and mark selected on  radio list form
                $query = $link->prepare("SELECT $character_name FROM specimens");
                $query->execute();
                $result = $query->get_result(); // get the mysqli result


                if(!$result)
                {
                    echo "Database not available, try again later L".__LINE__." ".__FILE__."<br>";
                }
                else
                {
                    $row_ct =  mysqli_num_rows( $result );
                    if( $row_ct > 0 )
                    {
                        $row = $result->fetch_row();
                        ?>

                       <table>
                        <label for="<?php echo $character_name; ?>"><?php echo $character_name; ?>: </label>  <input type="text" name="<?php echo $character_name; ?>" id="<?php echo $character_name; ?>" size="128" maxlength="128" value="<?php echo $row[0]; ?>">

                                </td>
                            </tr>
                        </table>
                            <?php

                    }
                }

            }
            else
            {
                echo "Check entry for display_type L ".__LINE__.".";
            }


            ?>
            </table>

        <br>
        <input type="hidden" name="character" value="<?php echo $character_name; ?>">
        <input type="hidden" name="character_id" value="<?php echo $character_id; ?>">
        <input type="hidden" name="specimen_id" value="<?php echo $specimen_id; ?>">
        <input type="hidden" name="old_value" value="<?php echo $selected; ?>">
        <input type="hidden" name="tried" value="mydog">
        <input type="submit" name = "submit" value="Submit">
        </form>
        <?php

    }     // close function print_edit_one_character_form( $link, $character_name, $pass_id, $common, $selected )**********************




    function print_edit_specimen_list_by_member_id($link, $member_id ):void
    {
        // displays list of specimens for a member if any
        $mushroomsQuery = $link->prepare("SELECT id, specimen_name, common_name,  comment FROM specimens WHERE member_id = ?");
        $mushroomsQuery->bind_param("s", $member_id);
        $mushroomsQuery->execute();
        $resultMushrooms = $mushroomsQuery->get_result(); // get the mysqli result

        $edit = 0;
        $selected = '';

        if(!$resultMushrooms)
        {
            echo "Database not available, try again later L".__LINE__." ".__FILE__."<br>";
        }
        else
        {
            $row_ct_mushrooms =  mysqli_num_rows( $resultMushrooms );
            if( $row_ct_mushrooms > 0 )
            {
                echo "\n<table class='p_1'>  <!-- begin Specimen List Table line ".__LINE__." -->\n<tr class='p_1'>\n<td class='p_1'>\nThese are your specimens:\n</td>\n</tr>\n";
                    while ($rowMushrooms = $resultMushrooms->fetch_array())
                    {
                        $specimen_id   = $rowMushrooms['id'];
                        $specimen_name = $rowMushrooms['specimen_name'];
                        $common_name   = $rowMushrooms['common_name'];
                        $comment       = $rowMushrooms['comment'];

                        $this->print_specimen_action_option_list($link, $specimen_id, $specimen_name, $common_name );
                    }
                echo "</table> <!-- end Specimen List Table -->\n";
            }
            else
            {
                echo "  <b class='redComment'>( You have not entered any specimens.)</b><br>";
            }

        } // close else
    }  // close function print_edit_specimen_list_by_member_id(  $link, $member_id )


function print_radio_list_one_LOOKUP_table_EDIT( $link, $table_to_edit ):void
    {
        if( $table_to_edit == 'x' )
        {
            echo "No table name was sent Line ".__LINE__." of ".__FILE__.".<br>";
            return;
        }

        $queryName = "SELECT * FROM $table_to_edit";
        $resultLog = mysqli_query($link, $queryName);

        if(!$resultLog)
        {
            echo "Database not available, try again later L".__LINE__.".<br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $resultLog );
            if( $rowCt > 0 )
            {
                ?>

                                <input type="radio" id="x" name="rows_radio"  size="12" value="x" checked="checked"><label for="x"> Select One:</label><br>

                        <?php

                        while( $rowAnswers = mysqli_fetch_assoc($resultLog) )
                        {

                            $row_id = '';
                            if(isset ( $rowAnswers['id']  ) )
                            {
                                $row_id  = $rowAnswers['id'];
                            }

                            $row_name = '';
                            if(isset ( $rowAnswers['name']  ) )
                            {
                                $row_name  = $rowAnswers['name'];
                            }

                            $row_description = '';
                            if(isset ( $rowAnswers['description']  ) )
                            {
                                $row_description  = $rowAnswers['description'];
                            }

                            $row_comments = '';
                            if(isset ( $rowAnswers['comments']  ) )
                            {
                                $row_comments  = $rowAnswers['comments'];
                            }

                            $row_source = '';
                            if(isset ( $rowAnswers['source']  ) )
                            {
                                $row_source  = $rowAnswers['source'];
                            }

                            ?>
                                    <input type="radio"  id="<?php echo $row_id; ?>" name="<?php echo $table_to_edit; ?>" size="40" value="<?php echo htmlentities($row_id ); ?>"> <label for="<?php echo $row_id; ?>"><?php echo "$row_id:  $row_name - $row_description - $row_comments - $row_source"; ?> </label>
                                <br>

                            <?php
                        }
                        ?>
                <?php
            }
            else
            {
                echo "No return from function print_radio_list_one_LOOKUP_table_EDIT - Line ".__LINE__.".<br>";
            }
        }
    }    // close print_radio_list_one_LOOKUP_table_EDIT( $link, $table_to_edit )



    function group_cluster_print_list_by_user_id(  $link, $member_id, $group_r_cluster ):void
    {

        // echo "<p>member_id:  $member_id - group_r_cluster:  $group_r_cluster on line ".__LINE__.".</p>";

        if( $group_r_cluster == 'g' )
        {
            $use_table_name= 'specimen_group';
        }
        elseif( $group_r_cluster == 'c' )
        {
            $use_table_name = 'specimen_cluster';
        }
        else
        {
            //echo "<p>Bad input line ".__LINE__.".</p>";
            exit('Bad Input.');
        }

        $display_name = str_replace( '_', ' ', $use_table_name);
        $display_name = ucwords($display_name);

        $mushroomsQuery = $link->prepare("SELECT id, name, description FROM $use_table_name WHERE member_id = ?");
        $mushroomsQuery->bind_param("s", $member_id);
        $mushroomsQuery->execute();
        $resultMushrooms = $mushroomsQuery->get_result(); // get the mysqli result

        $edit = 0;
        $selected = '';

        if(!$resultMushrooms)
        {
            echo "Database not available, try again later L".__LINE__." ".__FILE__."<br>";
        }
        else
        {
            $row_ct_mushrooms =  mysqli_num_rows( $resultMushrooms );
            if( $row_ct_mushrooms > 0 )
            {


                echo "<table class='fifty'>\n<tr>\n<td>\nYour $display_name list:</td>\n</tr>\n";
                while ($rowMushrooms = $resultMushrooms->fetch_array())
                {
                    // modify for mushroom table
                    $use_table_id      = $rowMushrooms['id'];
                    $name              = $rowMushrooms['name'];
                    $description       = $rowMushrooms['description'];

                    if($use_table_id == 'specimen_group')
                    {
                        $action = 6;
                    }
                    elseif( $use_table_id == 'specimen_cluster')
                    {
                        $action = 7;
                    }
                    else
                    {
                        $action = 'none_specified';
                    }

                    // echo "<tr class='fifty'><td>ID: $use_table_id for  $name - $description</td> <td> <a href=\"/member_dashboard.php?action=$action\"> View</a></td></tr>\n";

                    echo "<tr class='fifty'>\n<td>ID: $use_table_id for  $name - $description</td>\n</td>\n</tr>\n";
                }
                echo "</table>\n";
            }
            else
            {
                echo "  <b class='redComment'>( You have not entered any $display_name items.)</b><br>";
            }

        } // close else
    }     // close    function group_cluster_print_list_by_user_id(  $link, $member_id, $group_r_cluster )



    function print_specimen_basic_info_form( $link, $table_name, $specimen_id, $edit ):void  // only use for specimens table
    {
        $table_name = 'specimens';
        //echo "<p>table_name:  $table_name, specimen_id: $specimen_id, edit: $edit on line ".__LINE__.".</p>";

        $col_names_array = $this->column_return_names( $link, $table_name );
        $this_specimen_db_data = $this->return_data_array_for_this_id( $link, $table_name, $col_names_array, $specimen_id );
        $num_cols = sizeof( $col_names_array );

        echo "<h2>Basic Info:</h2>\n";
        //echo "<p>Table Name:  $table_name  - Specimen ID:  $specimen_id  on line ".__LINE__."</p>";
        echo "\n<table class='p_1'><!-- Big Table -->\n<tr class='p_1'>\n<td class='p_1'>\n<br></td>\n</tr>\n<tr class='p_1'>\n<td class='p_1'>Specimen ID:  $specimen_id (this is database table id)</td>\n</tr>\n<tr class='p_1'>\n<td class='p_1'><br></td>\n</tr>\n<tr class='p_1'>\n<td class='p_1'>\n";
        for($ct_c=0; $ct_c<$num_cols;$ct_c++ )    // for every column in mushroom table currently 97
        {
            $this_column_name   = $col_names_array[$ct_c];
            $selected = $this_specimen_db_data[$ct_c];
            $display_col_name_1 = str_replace( '_', ' ', $col_names_array[$ct_c]);
            $display_col_name = ucwords($display_col_name_1);

            // echo "<p>display_col_name - $display_col_name L".__LINE__.".</p>";   // prints hidden too

            $return_to_one = $ct_c + 1;
            //$return_to_one = $ct_c - 1;

            $u_count = 'c'.$return_to_one;   // double check this
            // $u_count = 'c'.$ct_c;           // and this

            $special_case_table = $this_column_name;

            // echo "<p>this_column_name: $this_column_name - selected:  $selected on Line ".__LINE__."</p>";

            if( ($this_column_name  != 'id') && ($this_column_name != 'date_entered') && ($this_column_name != 'entered_by') && ($this_column_name != 'specimen_owner')  )
            {
                //echo "$this_column_name: line ".__LINE__."<br>\n";
                if( $this->name_contains('color', $this_column_name) )
                {
                    // use same color table for all
                    echo "<tr>\n<td>$this_column_name - Use color table Line ".__LINE__.".<br></td>\n</tr>\n";

                    // return to one is the column number of the mushroom table
                    $this->color_print_banner_select( $link, $this_column_name, $return_to_one, $specimen_id );

                    $special_case_table = 'color';
                }
                elseif( $this->name_contains('taste', $this_column_name) )
                {
                    //use same taste table for all
                    echo "<p>Use taste table for <b>$this_column_name line ".__LINE__."</b>.</p>";
                    $special_case_table = 'taste';
                    $this->print_radio_list_table_data( $link, $specimen_id, $special_case_table, $this_column_name, $u_count, $edit, $selected );
                }
                elseif( $this->name_contains('odor', $this_column_name) )
                {
                    //use same odor table for all
                    //echo "<tr><td>Use odor table.</td></tr>";
                    $special_case_table = 'odor';
                    $this->print_radio_list_table_data( $link, $specimen_id, $special_case_table, $this_column_name, $u_count, $edit, $selected );
                }
                elseif($this_column_name == 'state')
                {
                    $complete = 1;
                    $edit = 1;
                    $this->state_print_drop_down_list( $edit, $selected, $specimen_id, $return_to_one, $complete );
                }
                elseif($this_column_name == 'country')
                {
                    $this->print_country_drop_down_list( $edit, $selected, $specimen_id, $return_to_one, 1 );
                }
                else
                {
                    $this_column_should_print = true;
                    // users do not select input values for id or date_entered or entered_by
                    // if $col_names_array[$ct] is a TABLE name in fungi DATABASE - then show select options

                    $is_a_table = $this->table_return_names( $link );  // currently 37 tables in  db

                    $size_of_is_a_table = sizeof( $is_a_table);

                    //echo "<br>$ct_c - size_of_is_a_table  - $size_of_is_a_table - $col_names_array[$ct_c]< br />";

                    for( $i=0; $i<$size_of_is_a_table;$i++)
                    {
                        if( $is_a_table[$i] == $col_names_array[$ct_c])    // if this column has a lookup table - use it for radio list
                        {
                            //echo "<p><b>i: $i line ".__LINE__."</b></p>";
                            $this->print_radio_list_table_data( $link, $specimen_id, $special_case_table, $this_column_name, $u_count, $edit, $selected );
                                $this_column_should_print = false;
                        }
                    }       // close  for( $i=0; $i<$size_of_is_a_table;$i++)

                    if($this_column_should_print)
                    {
                        $required = '';
                        $required_label = '';
                        if( $col_names_array[$ct_c] == 'specimen_id' )
                        {
                            $required = 'required';
                            $required_label = '<br><b class="redComment">* Required</b>';
                        }

                        $anchor_tag = $col_names_array[$ct_c].'_'.$return_to_one;

                        if( $col_names_array[$ct_c] == 'comment' )
                        {
                            echo "\n<br><br><table class='p_1'><!-- Begin Text Table line ".__LINE__." -->\n<tr class='p_1'>\n<td class='p_1'>\n<form action=\"member_dashboard.php?a=12#comment\" method=\"post\" name=\"$col_names_array[$ct_c]\">\n
                            <span id=\"$anchor_tag\">
                            <label for=\"$col_names_array[$ct_c]\">$display_col_name:
                                <textarea $required name=\"$col_names_array[$ct_c]\"  id=\"$col_names_array[$ct_c]\" rows=\"8\" cols=\"120\" >$this_specimen_db_data[$ct_c]</textarea>
                                $required_label</label>\n</span>\n 
                            <br>\n
                            <input type=\"hidden\" name=\"sid\" value=\"$specimen_id\">\n
                            <input type=\"hidden\" name=\"column_name\" value=\"$col_names_array[$ct_c]\">\n
                            <input type=\"hidden\" name=\"table_name\" value=\"$table_name\">\n
                            <input type=\"submit\" name =\"submit\" value=\"Update\">\n
                        </form>\n<br><br>\n<span><a href=\"#top\">Top of Page</a></span>\n</td>\n</tr>\n</table> <!-- End Text Table  line ".__LINE__." --><br>\n\n";
                        }
                        else
                        {
                            echo "\n<table class='p_1'><!-- Begin Text Table line ".__LINE__." -->\n<tr class='p_1'>\n<td class='p_1'>\n<form action=\"member_dashboard.php?a=12#".$col_names_array[$ct_c]."\" method=\"post\" name=\"$col_names_array[$ct_c]\">\n
                            <span id=\"$anchor_tag\">
                            <label for=\"$col_names_array[$ct_c]\">$display_col_name:
                                <input type=\"text\" $required name=\"$col_names_array[$ct_c]\"  id=\"$col_names_array[$ct_c]\" size=\"64\" maxlength=\"120\" value = \"$this_specimen_db_data[$ct_c]\"> 
                                $required_label</label>\n</span>\n
                            <br>\n
                            <input type=\"hidden\" name=\"sid\" value=\"$specimen_id\">\n
                            <input type=\"hidden\" name=\"column_name\" value=\"$col_names_array[$ct_c]\">\n
                            <input type=\"hidden\" name=\"table_name\" value=\"$table_name\">\n
                            <input type=\"submit\" name =\"submit\" value=\"Update\">\n    
                        </form>\n<br><br>\n<span><a href=\"#top\">Top of Page</a></span>\n</td>\n</tr>\n</table> <!-- End Text Table - end form line ".__LINE__." --><br>\n\n";
                        }  // close else

                    }   // close  if($this_column_should_print)
                }    // close else of color taste odor
            }     // close if( ($this_column_name  != 'id') && ($this_column_name != 'date_entered') && ($this_column_name != 'entered_by') && ($this_column_name != 'specimen_owner')  )

        }        // close for($ct_c=0; $ct_c<$num_cols;$ct_c++ )
            echo "</td>\n</tr>\n</table><!-- End Big Table  line ".__LINE__." -->\n";
        
    }     // close function print_specimen_basic_info_form( $link, $table, $edit )**********************


    function group_cluster_print_new_cluster_text( $link )
    {

        echo "\n<div class=\"w3-left-align\">\n<h2>About clusters:</h2>\n";
       echo "<div class='left'>\n";
        echo "\n<p>This is <b>your</b> cluster. You can use it however you like. Name it whatever helps you. Perhaps name your clusters for the month you found the specimen, or location, or possible genus or species, or \"backyard\", it is up to you.</p>\n

       \n<p>Since each specimen is intended to be <b>one</b> mushroom so that measurements and other specific characters can be meaningful, the best use of cluster will be for organizing them into one cluster containing specimens of what seems at the time to be multiple specimens of the same type.</p>\n
       
              \n<p>Example:<br>
                <ul>
                <li>User - me and my specimens</li>
                     <ul>
                         <li>Group:  Front Yard</li>
                             <ul>
                                 <li>Cluster:  Red Ones</li>
                                 <li>Cluster:  Brown Ones</li>
                              </ul>
                         <li>Group:  Back Yard</li>
                             <ul>
                                 <li>Cluster:  Orange Ones</li>
                                 <li>Cluster:  Yellow Ones</li>
                             </ul>
                     </ul>
                <li>User - you and your specimens</li>
                    <ul>
                         <li>Group:  Spring</li>
                             <ul>
                                 <li>Cluster:  Gilled</li>
                                 <li>Cluster:  Non-Gilled</li>
                             </ul>
                         <li>Group:  Summer</li>
                             <ul>
                                 <li>Cluster:  Growing in grass</li>
                                 <li>Cluster:  Growing On wood</li>
                             </ul>
                     </ul>
                </ul>.\n</div>\n</div>\n";

        $group_cluster = 'cluster';
        $edit = 0;
        $this->group_cluster_print_new_group_cluster_category_form( $link, $group_cluster, $edit );
    }   // close group_cluster_print_new_cluster_text( $link )

    function group_cluster_print_new_group_text( $link )
    {

        echo "\n</div>\n<h2>About groups:</h2>";

        echo "<div class='left'>";

        echo "\n<p>This is <b>your</b> group. You can use it however you like. Name it whatever helps you. Perhaps name your groups for the month you found the specimen, or location, or possible genus or species, or \"backyard\", it is up to you.</p>\n

     \n<p>My original idea was that this would be organizational, such as location or possible genus, but this will be determined by future uses.</p>\n</div>\n";

        $group_cluster = 'group';
        $edit = 0;
        $this->group_cluster_print_new_group_cluster_category_form( $link, $group_cluster, $edit );
    }   // close     function group_cluster_print_new_group_text( $link )

    function group_cluster_print_new_group_cluster_category_form( $link, $group_cluster, $edit ):void
    {
        $selected = '';
        echo "<p>group_cluster is $group_cluster on line ".__LINE__.".</p>";
        $t = '';
        if( $group_cluster == 'group')
        {
            $table_name = 'specimen_group';
            $t = 'g';
        }
        elseif( $group_cluster == 'cluster')
        {
            $table_name = 'specimen_cluster';
            $t = 'c';
        }
        else
        {
            exit('Wrong input received.');
        }
            $col_names_array = $this->column_return_names( $link, $table_name );

            $num_cols = sizeof( $col_names_array );
            $num_cols = $num_cols - 4;   // subtract 4 for id, member_id, date_entered, entered_by

            // echo "<p>Table Name:  $table_name</p>";
            echo "<p>Add a new $group_cluster t=$t:</p>";


            ?>

                <form action="new_group_cluster_processor.php?t=<?php echo $t ?>" method="post" name="<?php echo $table_name ?>" >
                <table class="lookup">
                    <tr class="lookup">
                        <td>
                            <label for="name">Name: </label>  <input type="text" name="name" id="name" size="128" maxlength="128" value = "" required>
                        </td>
                    </tr>

                    <tr class="lookup">
                        <td>
                            <label for="description">Description: </label>  <input type="text" name="description" id="description" size="128" maxlength="128" value = "" required>
                       </td>
                           </tr>

                       <tr class="lookup">
                           <td>
                               <label for="comments">Comments: </label>  <input type="text" name="comments" id="comments" size="128" maxlength="128" value = "">
                           </td>
                       </tr>
                </table>
                <br>
                <input type="submit" name = "submit" value="Submit">
            </form>
            <?php


    }     // close function group_cluster_print_new_group_cluster_category_form( $link, $group_cluster, $edit ):void





    function print_radio_list_table_data( $link, $specimen_id, $special_case_table, $this_column_name, $sequence, $edit, $selected )
    {
        // $special_case_table    = color or odor or taste
        // $this_column_name =  column name - character
        // $sequence is counter used to keep big table order consistent - not needed where every character has its own table

        $this_column_name_NO_DASH = str_replace( '_', ' ', $this_column_name );
        $this_column_name_NO_DASH = ucwords($this_column_name_NO_DASH);

        $special_case_table_NO_DASH = str_replace( '_', ' ', $special_case_table );
        $special_case_table_NO_DASH = ucwords($special_case_table_NO_DASH);


        $anchor_num = str_replace( "c", "", $sequence);
        // echo "<p>anchor_num:  $anchor_num - sequence: $sequence on ".__LINE__."</p>";
        $anchor_tag = $this_column_name.'_'.$anchor_num;

        //echo "<p>Line ".__LINE__." in function print_radio_list_table_data, <b>pass_table_name</b>: $special_case_table - <b>display_table_name</b>: $special_case_table_NO_DASH - <b>sequence</b>:  $sequence - <b>edit</b>: $edit - <b>selected</b>: $selected</p>";

        if( $special_case_table == 'color' )
        {
            $query_string = "SELECT * FROM color ORDER BY color_group, sequence";
        }
        else
        {
            $query_string = "SELECT * FROM $special_case_table";  // odor or taste IS what I want here
            // $query_string = "SELECT * FROM $this_column_name";     // one of the specimens character tables should NOT be used here
            //echo "<p>query_string:  $query_string on line ".__LINE__.".</p>";
        }

        $query_column = $link->prepare( $query_string );
        $query_column->execute();
        $result_column = $query_column->get_result(); // get the mysqli result

        if(!$result_column)
        {
            echo "Database not available, try again later L".__LINE__.".<br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $result_column );
            if( $rowCt > 0 )
            {
                echo "\n\n<br><table class='p_1'>  <!-- Begin Radio Table ".__LINE__." -->\n<tr class='p_1'>\n<td class='p_1'>\n";

                if( $special_case_table === 'color' || $special_case_table === 'odor' || $special_case_table === 'taste')
                {
                    // echo "Line ".__LINE__." Table <b>$this_column_name:</b><br>";
                    echo "<br><span id=\"$anchor_tag\"><b>$this_column_name_NO_DASH: line".__LINE__."</b></span><br>\n\n";
                }
                else
                {
                    // echo "Line ".__LINE__." Table <b>$special_case_table:</b><br>";
                    echo "<br><span id=\"$anchor_tag\"><b>$special_case_table_NO_DASH:</b></span><br>\n\n";
                }

                echo "<form action=\"member_dashboard.php?a=12#$anchor_tag\" method=\"post\" name=\"$this_column_name\">\n";

                while( $rowAnswers = mysqli_fetch_assoc($result_column) )
                {
                    $form_id  = $rowAnswers['id'];

                    if( $special_case_table === 'color')
                    {
                        $form_name  = $rowAnswers['common_name'];
                        $latin_name = $rowAnswers['latin_name'];
                    }
                    else
                    {
                        $form_name        = $rowAnswers['name'];
                        $form_description = $rowAnswers['description'];
                        //$form_comments    = $rowAnswers['comments'];
                    }

                    // echo "<p>pass_table_name:  $special_case_table - display_table_name $this_column_name - form_id:  $form_id </p>";

                    if( $special_case_table === 'color')   // color table has a '1' assigned to a color so use zero as Not Entered
                    {
                        $color_num = $form_id;

                        if($form_id != '0')
                        {
                            // takes up LOTS of space to include row of 50 color chips for every color selection
                            // will include one copy of entire color chart at top of page
                            ?>

                            <p>
                                <!-- color prints here -->
                                <input type="radio"  id="<?php echo $this_column_name; ?>" name="<?php echo $this_column_name; ?>" size="40"  <?php if($form_id == 0 ) echo 'checked'; ?> <?php if($form_id == $selected) echo 'checked'; ?> value="<?php echo $form_id; ?>"> <label for="<?php echo $this_column_name; ?>"><?php echo "$latin_name - $form_name L 3512"; ?>  <img src="../images/AMS_colors/thumbnail/thumbnail_<?php echo $form_id ?>.jpg" width="140" height="70" /> </label>
                            </p>

                            <?php
                        }
                        else
                        {
                            $id_unique = $anchor_tag."_form_id";
                            ?>

                            <p>
                                <input type="radio"  id="<?php echo $id_unique; ?>" name="<?php echo $this_column_name; ?>" size="40"  <?php if( ( $form_id == '0') && ( $form_id == $selected) ) echo 'checked'; ?>  value="<?php echo htmlentities($selected); ?>"> <label for="<?php echo $id_unique; ?>"><?php echo "$form_id: $latin_name - $form_name"; ?> </label>

                            </p>
                            <?php
                        }
                    }
                    else
                    {
                        //$id_unique = $special_case_table."_".$form_id."_form_id";
                        $id_unique = $anchor_tag."_".$form_id."_form_id";
                        // echo "<p>id_unique:  $id_unique - form_id:  $form_id - selected:  $selected on line ".__LINE__.".</p>";
                        ?>
                        <br>
                        <input type="radio"  id="<?php echo $id_unique ?>" name="<?php echo $this_column_name; ?>" size="40"  <?php if($form_id == $selected) echo 'checked'; ?> value="<?php echo $form_id; ?>"> <label for="<?php echo $id_unique; ?>"> <?php echo "$form_name -  $form_description"; ?> </label> <!-- Line  <?php echo " ".__LINE__." "; ?>  --><br>

                        <?php
                                    }
                }    // close while
                        $sid = $id = $specimen_id;
                        echo "\n<br>\n
                        <input type=\"hidden\" name=\"id\" value=\"$specimen_id\">\n  <!-- line  ".__LINE__."  -->\n
                        <input type=\"hidden\" name=\"column_name\" value=\"$this_column_name\">\n
                        <input type=\"hidden\" name=\"sid\" value=\"$sid\">\n
                        <input type=\"hidden\" name=\"id\" value=\"$sid\">\n
                        <input type=\"hidden\" name=\"specimen_id\" value=\"$sid\">\n
                        <input type=\"hidden\" name=\"table_name\" value=\"specimens\">\n                                                   
                        <input type=\"submit\" name =\"submit\" value=\"Update\">\n
                        </form>\n<br><br><span><a href=\"#top\">Top of Page</a></span>\n</td>\n</tr>\n</table>  <!-- End Radio Table  ".__LINE__." -->\n\n";
            }
            else
            {
                // echo "No return for <b style='color:red;'>$special_case_table</b> from function print_radio_list_table_data - Line ".__LINE__.".<br>";
            }
        }
    }    // close print_radio_list_table_data( $link, $special_case_table, $this_column_name, $sequence, $edit)
    

    function tables_print_show_tables( $link, $db )
    {
        // displays ul list of table names
        $queryName = "SHOW tables FROM $db";
        
        $resultLog = mysqli_query($link, $queryName);
        
        if(!$resultLog)
        {
            echo "Database not available, try again later L".__LINE__.".<br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $resultLog );
            if( $rowCt > 0 )
            {
                echo "Database <b>".DATABASE."</b> tables:";
                echo "<ul>";
                while( $rowAnswers = mysqli_fetch_row($resultLog) )
                {
                    $tableName  = $rowAnswers[0];
                    echo "<li>$tableName</li>";
                }
                echo "</ul><br>";
            }
            else
            {
                echo "No return from function show_tables - Line ".__LINE__.".<br>";
            }
        }
    }   // close tables_print_show_tables( $link, $db)

     function print_month_drop_down_list( $edit, $selected )
    {
        if( $edit  )
        {
            $month = $selected;
        }
        ?>

        <select name="month" id="month">

            <option value="x" <?php if(  $edit  && $month == "x") {echo "selected='selected'";}elseif( !$edit ){ echo "selected='selected'";}?>>Select</option>
            <option value="1"  <?php if( $edit   && $month == "1")  { echo "selected='selected'";} ?>>1 - January</option>
            <option value="2"  <?php if( $edit   && $month == "2")  { echo "selected='selected'";} ?>>2 - February</option>
            <option value="3"  <?php if( $edit   && $month == "3")  { echo "selected='selected'";} ?>>3 - March</option>
            <option value="4"  <?php if( $edit   && $month == "4")  { echo "selected='selected'";} ?>>4 - April</option>
            <option value="5"  <?php if( $edit   && $month == "5")  { echo "selected='selected'";} ?>>5 - May</option>
            <option value="6"  <?php if( $edit   && $month == "6")  { echo "selected='selected'";} ?>>6 - June</option>
            <option value="7"  <?php if( $edit   && $month == "7")  { echo "selected='selected'";} ?>>7 - July</option>
            <option value="8"  <?php if( $edit   && $month == "8")  { echo "selected='selected'";} ?>>8 - August</option>
            <option value="9"  <?php if( $edit   && $month == "9")  { echo "selected='selected'";} ?>>9 - September</option>
            <option value="10" <?php if( $edit   && $month == "10") { echo "selected='selected'";} ?>>10 - October</option>
            <option value="11" <?php if( $edit   && $month == "11") { echo "selected='selected'";} ?>>11 - November</option>
            <option value="12" <?php if( $edit   && $month == "12") { echo "selected='selected'";} ?>>12 - December</option>
        </select>
        <?php
    }    // close function print_month_drop_down_list( $edit, $selected )


    function print_day_drop_down_list( $edit, $selected )
    {
        if( $edit )
        {
            $day = $selected;
        }
        else
        {
            $day = '';
        }

        ?>

        <select name="day" id="day">

            <option value="x" <?php if( $edit  && $day == "x") {echo "selected='selected'";}elseif( !$edit ){ echo "selected='selected'";}?>>Select</option>
            <?php
            for($d=1;$d<32;$d++)
            {
                if( $edit  && $day == $d)
                { "selected='selected'";
                  echo "<option value=\"$d\" selected='selected'>  $d</option>\n";
                }
                else
                {
                    echo "<option value=\"$d\"> $d</option>\n";
                }

            }
            ?>
        </select>
        <?php
    }    // close function print_day_drop_down_list( $edit, $selected )


    function year_print_drop_down_list( $edit, $selected )
    {
        if( $edit  )
        {
            $year = $selected;
        }
        else
        {
            $year = '';
        }

        ?>

        <select name="year" id="year">

            <option value="x" <?php if( $edit   && $year == "x") {echo "selected='selected'";}elseif( !$edit ){ echo "selected='selected'";}?>>Select</option>
            <?php
            for($y=2000;$y<2025;$y++)
            {
                if ($edit && $year == "$y")
                {
                    echo "<option value=\"$y\" selected='selected'> $y</option>\n";
                }
                else
                {
                    echo "<option value=\"$y\"> $y</option>\n";
                }
            }
            ?>
        </select>
        <?php
    }    // close function year_print_drop_down_list( $edit, $selected )

    function state_print_drop_down_list( $edit, $selected, $sid, $tag_sequence, $complete )
    {
        // if complete is set - then form is complete with update button
        // echo "<p>edit:  $edit - selected: $selected - sid: $sid - tag_sequence: $tag_sequence - complete -$complete on line ".__LINE__.".</p>";
        $state = '';
        if( $edit  )
        { $state = $selected ; }

        if( $complete )
        {

            echo "\n<span id=\"state_".$tag_sequence."\"><b>State:</b></span><br><table class='p_1'><!-- Text Table -->\n<tr class='p_1'>\n<td class='p_1'>\n<form action=\"member_dashboard.php?a=12#state_".$tag_sequence."\" method=\"post\" name=\"state\">\n
             <span id=\"$tag_sequence\">
             <label for=\"state\"></label>\n</span>\n 
                            <br>\n";
        }
        ?>

        <select name="state" id="state">

            <option value="x"  <?php if(  $edit    && $state == "x") {echo "selected='selected'";}elseif( $edit ){ echo "selected='selected'";}?>>Select</option>
            <option value="1"  <?php if(  $edit    && $state == "1") { echo "selected='selected'";} ?>>Alabama</option>
            <option value="2"  <?php if(  $edit    && $state == "2") { echo "selected='selected'";} ?>>Alaska</option>
            <option value="3"  <?php if(  $edit    && $state == "3") { echo "selected='selected'";} ?>>Arizona</option>
            <option value="4"  <?php if(  $edit    && $state == "4") { echo "selected='selected'";} ?>>Arkansas</option>
            <option value="5"  <?php if(  $edit    && $state == "5") { echo "selected='selected'";} ?>>California</option>
            <option value="6"  <?php if(  $edit    && $state == "6") { echo "selected='selected'";} ?>>Colorado</option>
            <option value="7"  <?php if(  $edit    && $state == "7") { echo "selected='selected'";} ?>>Connecticut</option>
            <option value="8"  <?php if(  $edit    && $state == "8") { echo "selected='selected'";} ?>>Delaware</option>
            <option value="9"  <?php if(  $edit    && $state == "9") { echo "selected='selected'";} ?>>District of Columbia</option>
            <option value="10" <?php if(  $edit    && $state == "10") { echo "selected='selected'";} ?>>Florida</option>
            <option value="11" <?php if(  $edit    && $state == "11") { echo "selected='selected'";} ?>>Georgia</option>
            <option value="12" <?php if(  $edit    && $state == "12") { echo "selected='selected'";} ?>>Hawaii</option>
            <option value="13" <?php if(  $edit    && $state == "13") { echo "selected='selected'";} ?>>Idaho</option>
            <option value="14" <?php if(  $edit    && $state == "14") { echo "selected='selected'";} ?>>Illinois</option>
            <option value="15" <?php if(  $edit    && $state == "15") { echo "selected='selected'";} ?>>Indiana</option>
            <option value="16" <?php if(  $edit    && $state == "16") { echo "selected='selected'";} ?>>Iowa</option>
            <option value="17" <?php if(  $edit    && $state == "17") { echo "selected='selected'";} ?>>Kansas</option>
            <option value="18" <?php if(  $edit    && $state == "18") { echo "selected='selected'";} ?>>Kentucky</option>
            <option value="19" <?php if(  $edit    && $state == "19") { echo "selected='selected'";} ?>>Louisiana</option>
            <option value="20" <?php if(  $edit    && $state == "20") { echo "selected='selected'";} ?>>Maine</option>
            <option value="21" <?php if(  $edit    && $state == "21") { echo "selected='selected'";} ?>>Maryland</option>
            <option value="22" <?php if(  $edit    && $state == "22") { echo "selected='selected'";} ?>>Massachusetts</option>
            <option value="23" <?php if(  $edit    && $state == "23") { echo "selected='selected'";} ?>>Michigan</option>
            <option value="24" <?php if(  $edit    && $state == "24") { echo "selected='selected'";} ?>>Minnesota</option>
            <option value="25" <?php if(  $edit    && $state == "25") { echo "selected='selected'";} ?>>Mississippi</option>
            <option value="26" <?php if(  $edit    && $state == "26") { echo "selected='selected'";} ?>>Missouri</option>
            <option value="27" <?php if(  $edit    && $state == "27") { echo "selected='selected'";} ?>>Montana</option>
            <option value="28" <?php if(  $edit    && $state == "28") { echo "selected='selected'";} ?>>Nebraska</option>
            <option value="29" <?php if(  $edit    && $state == "29") { echo "selected='selected'";} ?>>Nevada</option>
            <option value="30" <?php if(  $edit    && $state == "30") { echo "selected='selected'";} ?>>New Hampshire</option>
            <option value="31" <?php if(  $edit    && $state == "31") { echo "selected='selected'";} ?>>New Jersey</option>
            <option value="32" <?php if(  $edit    && $state == "32") { echo "selected='selected'";} ?>>New Mexico</option>
            <option value="33" <?php if(  $edit    && $state == "33") { echo "selected='selected'";} ?>>New York</option>
            <option value="34" <?php if(  $edit    && $state == "34") { echo "selected='selected'";} ?>>North Carolina</option>
            <option value="35" <?php if(  $edit    && $state == "35") { echo "selected='selected'";} ?>>North Dakota</option>
            <option value="36" <?php if(  $edit    && $state == "36") { echo "selected='selected'";} ?>>Ohio</option>
            <option value="37" <?php if(  $edit    && $state == "37") { echo "selected='selected'";} ?>>Oklahoma</option>
            <option value="38" <?php if(  $edit    && $state == "38") { echo "selected='selected'";} ?>>Oregon</option>
            <option value="39" <?php if(  $edit    && $state == "39") { echo "selected='selected'";} ?>>Pennsylvania</option>
            <option value="40" <?php if(  $edit    && $state == "40") { echo "selected='selected'";} ?>>Rhode Island</option>
            <option value="41" <?php if(  $edit    && $state == "41") { echo "selected='selected'";} ?>>South Carolina</option>
            <option value="42" <?php if(  $edit    && $state == "42") { echo "selected='selected'";} ?>>South Dakota</option>
            <option value="43" <?php if(  $edit    && $state == "43") { echo "selected='selected'";} ?>>Tennessee</option>
            <option value="44" <?php if(  $edit    && $state == "44") { echo "selected='selected'";} ?>>Texas</option>
            <option value="45" <?php if(  $edit    && $state == "45") { echo "selected='selected'";} ?>>Utah</option>
            <option value="46" <?php if(  $edit    && $state == "46") { echo "selected='selected'";} ?>>Vermont</option>
            <option value="47" <?php if(  $edit    && $state == "47") { echo "selected='selected'";} ?>>Virginia</option>
            <option value="48" <?php if(  $edit    && $state == "48") { echo "selected='selected'";} ?>>Washington</option>
            <option value="49" <?php if(  $edit    && $state == "49") { echo "selected='selected'";} ?>>West Virginia</option>
            <option value="50" <?php if(  $edit    && $state == "50") { echo "selected='selected'";} ?>>Wisconsin</option>
            <option value="51" <?php if(  $edit    && $state == "51") { echo "selected='selected'";} ?>>Wyoming</option>
            <option value="52" <?php if(  $edit    && $state == "52") { echo "selected='selected'";} ?>>Alberta</option>
            <option value="53" <?php if(  $edit    && $state == "53") { echo "selected='selected'";} ?>>British Columbia</option>
            <option value="54" <?php if(  $edit    && $state == "54") { echo "selected='selected'";} ?>>Manitoba</option>
            <option value="55" <?php if(  $edit    && $state == "55") { echo "selected='selected'";} ?>>New Brunswick</option>
            <option value="56" <?php if(  $edit    && $state == "56") { echo "selected='selected'";} ?>>Newfoundland</option>
            <option value="57" <?php if(  $edit    && $state == "57") { echo "selected='selected'";} ?>>Nova Scotia</option>
            <option value="58" <?php if(  $edit    && $state == "58") { echo "selected='selected'";} ?>>Northwest Territories</option>
            <option value="59" <?php if(  $edit    && $state == "59") { echo "selected='selected'";} ?>>Nunavut</option>
            <option value="60" <?php if(  $edit    && $state == "60") { echo "selected='selected'";} ?>>Ontario</option>
            <option value="61" <?php if(  $edit    && $state == "61") { echo "selected='selected'";} ?>>Prince Edward Island</option>
            <option value="62" <?php if(  $edit    && $state == "62") { echo "selected='selected'";} ?>>Quebec</option>
            <option value="63" <?php if(  $edit    && $state == "63") { echo "selected='selected'";} ?>>Saskatchewan</option>
            <option value="64" <?php if(  $edit    && $state == "64") { echo "selected='selected'";} ?>>Yukon</option>
            <option value="65" <?php if(  $edit    && $state == "65") { echo "selected='selected'";} ?>>Aguascalientes</option>
            <option value="66" <?php if(  $edit    && $state == "66") { echo "selected='selected'";} ?>>Baja California</option>
            <option value="67" <?php if(  $edit    && $state == "67") { echo "selected='selected'";} ?>>Baja California Sur</option>
            <option value="68" <?php if(  $edit    && $state == "68") { echo "selected='selected'";} ?>>Campeche</option>
            <option value="69" <?php if(  $edit    && $state == "69") { echo "selected='selected'";} ?>>Chiapas</option>
            <option value="70" <?php if(  $edit    && $state == "70") { echo "selected='selected'";} ?>>Chihuahua</option>
            <option value="71" <?php if(  $edit    && $state == "71") { echo "selected='selected'";} ?>>Coahuila</option>
            <option value="72" <?php if(  $edit    && $state == "72") { echo "selected='selected'";} ?>>Colima</option>
            <option value="73" <?php if(  $edit    && $state == "73") { echo "selected='selected'";} ?>>Distrito Federal</option>
            <option value="74" <?php if(  $edit    && $state == "74") { echo "selected='selected'";} ?>>Durango</option>
            <option value="75" <?php if(  $edit    && $state == "75") { echo "selected='selected'";} ?>>Guanajuato</option>
            <option value="76" <?php if(  $edit    && $state == "76") { echo "selected='selected'";} ?>>Guerrero</option>
            <option value="77" <?php if(  $edit    && $state == "77") { echo "selected='selected'";} ?>>Hidalgo</option>
            <option value="78" <?php if(  $edit    && $state == "78") { echo "selected='selected'";} ?>>Jalisco</option>
            <option value="79" <?php if(  $edit    && $state == "79") { echo "selected='selected'";} ?>>Mexico</option>
            <option value="80" <?php if(  $edit    && $state == "80") { echo "selected='selected'";} ?>>Michoacan</option>
            <option value="81" <?php if(  $edit    && $state == "81") { echo "selected='selected'";} ?>>Morelos</option>
            <option value="82" <?php if(  $edit    && $state == "82") { echo "selected='selected'";} ?>>Nayarit</option>
            <option value="83" <?php if(  $edit    && $state == "83") { echo "selected='selected'";} ?>>Nuevo Leon</option>
            <option value="84" <?php if(  $edit    && $state == "84") { echo "selected='selected'";} ?>>Oaxaca</option>
            <option value="85" <?php if(  $edit    && $state == "85") { echo "selected='selected'";} ?>>Puebla</option>
            <option value="86" <?php if(  $edit    && $state == "86") { echo "selected='selected'";} ?>>Queretaro</option>
            <option value="87" <?php if(  $edit    && $state == "87") { echo "selected='selected'";} ?>>Quintana Roo</option>
            <option value="88" <?php if(  $edit    && $state == "88") { echo "selected='selected'";} ?>>San Luis Potosi</option>
            <option value="89" <?php if(  $edit    && $state == "89") { echo "selected='selected'";} ?>>Sinaloa</option>
            <option value="90" <?php if(  $edit    && $state == "90") { echo "selected='selected'";} ?>>Sonora</option>
            <option value="91" <?php if(  $edit    && $state == "91") { echo "selected='selected'";} ?>>Tabasco</option>
            <option value="92" <?php if(  $edit    && $state == "92") { echo "selected='selected'";} ?>>Tamaulipas</option>
            <option value="93" <?php if(  $edit    && $state == "93") { echo "selected='selected'";} ?>>Tlaxcala</option>
            <option value="94" <?php if(  $edit    && $state == "94") { echo "selected='selected'";} ?>>Veracruz</option>
            <option value="95" <?php if(  $edit    && $state == "95") { echo "selected='selected'";} ?>>Yucatan</option>
            <option value="96" <?php if(  $edit    && $state == "96") { echo "selected='selected'";} ?>>Zacatecas</option>
        </select>
        
        <?php
        if( $complete )
        {
        echo "<br>\n<input type=\"hidden\" name=\"specimen_id\" value=\"$sid\">\n    
                            <input type=\"hidden\" name=\"column_name\" value=\"state\">\n
                            <input type=\"hidden\" name=\"sid\" value=\"$sid\">\n
                            <input type=\"hidden\" name=\"id\" value=\"$sid\">\n
                            <input type=\"hidden\" name=\"table_name\" value=\"specimens\">\n
                            <input type=\"submit\" name =\"submit\" value=\"Update\">\n


               </form>\n<br><br>\n<span><a href=\"#top\">Top of Page</a></span>\n</td>\n</tr>\n</table><!-- End State Table -->\n\n";
        }
        
    }  // close function state_print_drop_down_list( $edit, $selected )


    function print_country_drop_down_list( $edit, $selected, $sid, $tag_sequence, $complete )
    {
        // if complete is set - then form is complete with update button
        //echo "<p>edit:  $edit - selected: $selected - sid: $sid - tag_sequence: $tag_sequence - complete -$complete on line ".__LINE__.".</p>";
        $country = '';
        if( $edit  )
        { $country = $selected ; }

        if( $complete )
        {

            echo "\n<span id=\"country_".$tag_sequence."\"><b>Country:</b></span><br><table class='p_1'><!-- Country Drop Down -->\n<tr class='p_1'>\n<td class='p_1'>\n<form action=\"member_dashboard.php?a=12#country_".$tag_sequence."\" method=\"post\" name=\"country\">\n
             <span id=\"$tag_sequence\">
             <label for=\"country\"></label>\n</span>\n 
                            <br>\n";
        }
        ?>

        <select name="country" id="country">

            <option value="x" <?php if( $edit   && $country == "x") {echo "selected='selected'";}elseif( !$edit){ echo "selected='selected'";}?>>Select</option>
            <option value="1" <?php if( $edit   && $country == "1") { echo "selected='selected'";} ?>>United States</option>
            <option value="2" <?php if( $edit   && $country == "2") { echo "selected='selected'";} ?>>Canada</option>
            <option value="3" <?php if( $edit   && $country == "3") { echo "selected='selected'";} ?>>Mexico</option>
        </select>

        <?php
        if( $complete )
        {
        echo "<br>\n<input type=\"hidden\" name=\"specimen_id\" value=\"$sid\">\n    
                            <input type=\"hidden\" name=\"column_name\" value=\"country\">\n
                            <input type=\"hidden\" name=\"sid\" value=\"$sid\">\n
                            <input type=\"hidden\" name=\"id\" value=\"$sid\">\n
                            <input type=\"hidden\" name=\"table_name\" value=\"specimens\">\n
                            <input type=\"submit\" name =\"submit\" value=\"Update\">\n


               </form>\n<br><br>\n<span><a href=\"#top\">Top of Page</a></span>\n</td>\n</tr>\n</table><!-- End Country Table -->\n\n";
        }

    }  // close function print_country_drop_down_list( $edit, $selected )



    
    function table_return_names( $passLink ):array
    {
        // below query will return table name for each column - such as id, name, etc in INFORMATION_SCHEMA.COLUMNS.
        // $queryName = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE INFORMATION_SCHEMA.COLUMNS.TABLE_SCHEMA = 'mrdbid_php'";

        // below query uses default database as defined in info/define.php
        $queryName = "SHOW TABLES";
    
        $resultLog = mysqli_query($passLink, $queryName);
    
        if(!$resultLog)
        {
            echo "Database not available, try again later L".__LINE__.".<br>";
        }
        else
        {
            $array_tables = [];
            $rowCt =  mysqli_num_rows( $resultLog );
            if( $rowCt > 0 )
            {
               // echo "Database <b>mrdbid_php</b> tables:";
                while( $rowAnswers = mysqli_fetch_row($resultLog) )
                {
                    $name = $rowAnswers[0];
                    $array_tables[]  = $name;
                    //echo "<br>$name<br>";
                }
                return $array_tables;
            }
            else
            {
                echo "No return from function return_array_tables - Line ".__LINE__.".<br>";
                return $array_tables;
            }
        }
        // $nameX = $array_tables[0];
        // echo "$name<br>";
        // return $array_tables;
    }   // close table_return_names( $passlink, $queryName)




    function return_lookup_values_by_id( $link, $table, $table_id ):array
    {
        // echo "<br>table: $table - table_id: $table_id on line ".__LINE__."<br>";

        $query = "SELECT * FROM $table WHERE id = ?";

        $query_lookup = $link->prepare($query);
        $query_lookup->bind_param("i", $table_id);
        // echo "<br>query: $query<br>";

        $query_lookup->execute( );
        $result_lookup = $query_lookup->get_result();

        if ($result_lookup === false)
        {
            echo "<p>Problem line ".__LINE__.".</p>";
        }
        $return_val_array = [];

        $rowCt =  mysqli_num_rows( $result_lookup );
        if( $rowCt > 0 )
        {
            $rowAnswers = mysqli_fetch_assoc($result_lookup );

            $return_val_array[] = $rowAnswers['name'];
            $return_val_array[] = $rowAnswers['description'];
            $return_val_array[] = $rowAnswers['comments'];

            return $return_val_array;
        }
        else
        {
            //echo "<p>No return for that id Line ".__LINE__.".</p>";
            $return_val_array[] = 'Not entered?';
            $return_val_array[] = 'Not entered?';
            $return_val_array[] = 'Not entered?';
            return $return_val_array;
        }

    }    // close return_lookup_values_by_id( $link, $table, $table_id ):array

    function return_count( $link, $user_id, $table_name )
    {

        $col_name = 'member_id';

        if( $table_name == 'characters_basic' )
        {
            $col_name = 'specimen_owner';
        }

        // echo "<br>return_count - - table_name:  $table_name - col_name: $col_name - user_id: $user_id on line ".__LINE__."<br>";

        $query = $link->prepare("SELECT count(*) as total from $table_name WHERE $col_name = ?");

        $query->bind_param("i", $user_id);
        $query->execute();
        $result = $query->get_result();

        $return_count = 0;

        if($result == FALSE)
        {
            echo "Database not available, try again later L".__LINE__." of ".__FILE__.".<br>";
        }
        else
        {
            $data = mysqli_fetch_assoc($result);
            //echo $table_name." has ".$data['total']." rows.<br>";
            return $data['total'];
        }
        return $return_count;
    }  // close function return_count( $link, $user_id, $table_name )

        function return_row_count_fabulator( $link, $specimen_table_column_name ):int
    {
        if( $this->is_a_lookup_table($link, $specimen_table_column_name))
        {
            $query_text = "SELECT count(id) as total from $specimen_table_column_name";

            //echo "<br>query_text:  $query_text  on line ".__LINE__."<br>";

            $query = $link->prepare( $query_text);
            // $query->bind_param("i", $specimen_table_column_name);
            $query->execute();
            $result = $query->get_result();

            $return_count = 0;

            if($result == false)
            {
                echo "Database not available, try again later L".__LINE__." of ".__FILE__.".<br>";
            }
            else
            {
                $data = mysqli_fetch_assoc($result);
                //echo $specimen_table_column_name." has ".$data['total']." rows on line ".__LINE__.".<br>";
                return $data['total'];
            }
            return $return_count;
        }   // close if( $this->is_a_lookup_table($specimen_table_column_name))
        else
        {
            // echo "- Not a lookup table.<br>";
            return 0;
        }
    }  // close function return_row_count_fabulator( $link, $specimen_table_column_name ):int

    function image_resize_one( $image_in, $width, $height ):void
    {
        $image_file_in   = $image_in;
        $image_file_out  = $image_in;  // overwrite same file

        $aspect_ratio = $width/$height;

        if($aspect_ratio >= 1)
        {
            $new_width  = 800;
            $new_height = 800/ $aspect_ratio;
        }
        else
        {
            //$new_width  = 800;
            //$new_height = 800/ $aspect_ratio;
            $new_width  = 400;
            $new_height = 400 / $aspect_ratio;
        }

        try
        {
            $document = new Imagick($image_file_in);
        } catch (ImagickException $e)
        {
            echo "<br>var dump line ".__LINE__.":  <br>";
           // var_dump($e);
        }

        try {

        /*
          public Imagick::resizeImage(
          int $columns,           // Width of the image
          int $rows,              // Height of the image
          int $filter,            // FILTER constants
                                  // imagick::FILTER_UNDEFINED (int)
                                  // imagick::FILTER_POINT (int)
                                  // imagick::FILTER_BOX (int)
                                  // imagick::FILTER_TRIANGLE (int)
                                  // imagick::FILTER_HERMITE (int)
                                  // imagick::FILTER_HANNING (int)
                                  // imagick::FILTER_HAMMING (int)
                                  // imagick::FILTER_BLACKMAN (int)
                                  // imagick::FILTER_GAUSSIAN (int)
                                  // imagick::FILTER_QUADRATIC (int)
                                  // imagick::FILTER_CUBIC (int)
                                  // imagick::FILTER_CATROM (int)
                                  // imagick::FILTER_MITCHELL (int)
                                  // imagick::FILTER_LANCZOS (int)
                                  // imagick::FILTER_BESSEL (int)
i                                 // magick::FILTER_SINC (int)
          float $blur,            // The blur factor where > 1 is blurry, < 1 is sharp.
          bool $bestfit = false,  // Optional fit parameter.
          bool $legacy = false    //  no idea
          ): bool                 // Returns true on success.
         */
                $document->resizeImage(  $new_width, $new_height, Imagick::FILTER_LANCZOS, 1); // blur .2 put new lines in image
                //$resized_y_n = $document->resizeImage(1600, 800, Imagick::FILTER_LANCZOS, 1);  // for large
                // $resized_y_n = $document->resizeImage(350, 80, Imagick::FILTER_LANCZOS, 1);  // for AMS color picker group
                //$resized_y_n = $document->resizeImage(70, 70, Imagick::FILTER_LANCZOS, 1);  // for AMS color picker group
                //$resized_y_n = $document->resizeImage(50, 50, Imagick::FILTER_LANCZOS, 1);  // for color banner
            }
            catch (ImagickException $e)
            {
                echo "<br>var dump line ".__LINE__.":  <br>";
               // var_dump($e);
            }

            try
            {
                if(  $good_file = fopen ($image_file_out, 'wb') )
                {
                    $document->writeImage($image_file_out);
                }
                else
                {
                    echo "<p>good_file is $good_file - did not open or create $image_file_out.</p>";
                }

            }
            catch (ImagickException $e)
            {
                echo "<br>var dump line ".__LINE__.":  <br>";
               // var_dump($e);
            }
    }  // close function image_resize_one( $image_in


    function image_return_exif_data($imagePath)
    {
        // echo "<p>imagepath:  $imagePath exists on line ".__LINE__.".</p>";
        // Check if the variable is set and if the file itself exists before continuing
        if ((isset($imagePath)) and (file_exists($imagePath)))
        {

            // There are 2 arrays which contains the information we are after, so it's easier to state them both
            //$exif_ifd0 = read_exif_data($imagePath ,'IFD0' ,0);
            //$exif_exif = read_exif_data($imagePath ,'EXIF' ,0);

            $exif_ifd0 = exif_read_data($imagePath ,'IFD0' ,0);
            $exif_exif = exif_read_data($imagePath ,'EXIF' ,0);


            //$exif = exif_read_data($imagePath, 0, true);
            //foreach ($exif as $key => $section) {
            //    foreach ($section as $name => $val) {
            //        echo "$key.$name: $val<br>\n";
            //    }
            //}

            //error control
            $notFound = "Unavailable";

            // Make
            if (@array_key_exists('Make', $exif_ifd0))
            {
                $camMake = $exif_ifd0['Make'];
            } else { $camMake = $notFound; }

            // Model
            if (@array_key_exists('Model', $exif_ifd0))
            {
                $camModel = $exif_ifd0['Model'];
            } else { $camModel = $notFound; }

            // Exposure
            if (@array_key_exists('ExposureTime', $exif_ifd0))
            {
                $camExposure = $exif_ifd0['ExposureTime'];
            } else { $camExposure = $notFound; }

            // Aperture
            if (@array_key_exists('ApertureFNumber', $exif_ifd0['COMPUTED']))
            {
                $camAperture = $exif_ifd0['COMPUTED']['ApertureFNumber'];
            } else { $camAperture = $notFound; }

            // Date
            if (@array_key_exists('DateTime', $exif_ifd0))
            {
                $camDate = $exif_ifd0['DateTime'];
            } else { $camDate = $notFound; }

            // ISO
            if (@array_key_exists('ISOSpeedRatings',$exif_exif))
            {
                $camIso = $exif_exif['ISOSpeedRatings'];
            } else { $camIso = $notFound; }

            $return_array = array();
            $return_array['make']     = $camMake;
            $return_array['model']    = $camModel;
            $return_array['exposure'] = $camExposure;
            $return_array['aperture'] = $camAperture;
            $return_array['date']     = $camDate;
            $return_array['iso']      = $camIso;

            return $return_array;
        }
        else
        {
            return false;
        }
    }   // close image_return_exif_data($imagePath)


    function table_return_next_table_id( $link, $table_name):int
    {

        $queryName = "SELECT MAX(`id`) AS 'total' from $table_name";

        $result = mysqli_query($link, $queryName);

        $return_count = 0;

        if($result == FALSE)
        {
            echo "Database not available, try again later L".__LINE__." of ".__FILE__.".<br>";
            return 0;
        }
        else
        {
            $data = mysqli_fetch_assoc($result);
            //echo $table_name." has ".$data['total']." rows.<br>";
            $return_count =  $data['total'];
            $next_id = $return_count + 1;
            // echo "<p>Next id is $next_id on line ".__LINE__." of ".__FILE__."</p>";
            return $next_id;
        }
    }  // function table_return_next_table_id( $link, $table_name):int

    function table_return_next_lookup_table_id( $link, $table):int
    {
        $queryName = "SELECT MAX(`id`) AS 'total' from $table";

        $result = mysqli_query($link, $queryName);

        $return_count = 0;

        if($result == FALSE)
        {
            echo "Database not available, try again later L".__LINE__." of ".__FILE__.".<br>";
            return 0;
        }
        else
        {
            $data = mysqli_fetch_assoc($result);
            //echo $table_name." has ".$data['total']." rows.<br>";
            $return_count =  $data['total'];
            $next_id = $return_count + 1;
            // echo "<p>Next id is $next_id on line ".__LINE__." of ".__FILE__."</p>";
            return $next_id;
        }
    }  // function table_return_next_lookup_table_id( $link, $table):int


  function column_return_names( $link, $table_name ):array
    {
        // original
        $db = 'rmqchemy_mrdbid_php';

        // echo "<br>column_return_names - - table_name:  $table_name on line ".__LINE__.".<br>";

        $query_column = $link->prepare("SELECT COLUMN_NAME, DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = ? AND TABLE_SCHEMA = ? ORDER BY ORDINAL_POSITION"); // ORDER BY displays in same order as structure
        $query_column->bind_param("ss", $table_name, $db);
        $query_column->execute();
        $result_column = $query_column->get_result(); // get the mysqli result

        if(!$result_column)
        {
            echo "Database not available, try again later L".__LINE__.".<br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $result_column );
            $column_name = [];
            if( $rowCt > 0 )
            {
                while( $rowAnswers = mysqli_fetch_row($result_column) )
                {
                    $column_name[]  = $rowAnswers[0];
                }

                return $column_name;
            }
            else
            {
                echo "No return from function return_table_column_names - Line ".__LINE__.".<br>";
                return 0;
            }
        }
        return 0;
    }   // close function column_return_names( $link, $table_name )




    function return_data_array_for_this_id( $link, $table, $col_names_array, $pass_id ):array
    {
        // returns saved characters for this specimen if any
        //echo "<br>In function return_data_array_for_this_id, table: $table - pass_id: $pass_id on line ".__LINE__." of ".__FILE__.".";

        if( !isset( $col_names_array ) )
        {
            $col_names_array = $this->column_return_names( $link, $table );
        }

        $data_array = [];

        $query_column = $link->prepare("SELECT * FROM $table WHERE id = ?");
        // $query_column = $link->prepare("SELECT * FROM $table");
        
        $query_column->bind_param("s", $pass_id);
        
        $query_column->execute();
        $result_column = $query_column->get_result(); // get the mysqli result
        $size_column = mysqli_num_fields($result_column);
        if(!$result_column)
        {
            echo "Database not available, try again later L".__LINE__.".<br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $result_column );
            if( $rowCt > 0 )
            {
                //echo "<br>rowCt: $rowCt on line ".__LINE__.".";

                $rowAnswers = mysqli_fetch_array($result_column);


                //$num_col = sizeof($col_names_array);
                                //echo "<br>num_col: $num_col on line ".__LINE__.".";
                for($i=0;$i<$size_column;$i++)
                {
                    $data_array[] = $rowAnswers[$i];
                     //echo "<br>rowAnswers[".$col_names_array[$i]."] is $rowAnswers[$i] on line ".__LINE__."<br>";
                }
            }
            else
            {
                // echo "No return from function return_data_array_for_this_id( $link, $table, $col_names_array, $pass_id ):array - Line ".__LINE__.".<br>";
                return $data_array;
            }
            //$size_return = sizeof($data_array );
            //echo "<br>Size of return array is $size_return on line ".__LINE__.".<br>";
            return $data_array;
        }
        return $data_array;
    }  // close function return_data_array_for_this_id( $link, $table, $col_names_array, $pass_id ):array

    function table_return_column_names_and_data_types_array( $link, $table_name )
    {
         $db = 'rmqchemy_mrdbid_php';

         //echo "<p>$table_name - $db</p>";
        // which database? may have multiple databases with same table and column names
        $query_column = $link->prepare("SELECT COLUMN_NAME, DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = ? AND TABLE_SCHEMA = ? ORDER BY ORDINAL_POSITION"); // ORDER BY displays in same order as structure

        $query_column->bind_param("ss", $table_name, $db);
        $query_column->execute();
        $result_column = $query_column->get_result(); // get the mysqli result
        
        if(!$result_column)
        {
            echo "Database not available, try again later L".__LINE__.".<br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $result_column );
            if( $rowCt > 0 )
            {
                $column_data = [];
                while ($rowAnswers = mysqli_fetch_row($result_column))
                {
                    $column_data[] = $rowAnswers;
                }
                return $column_data;
            }
            else
            {
                echo "No return from function column_return_names - Line ".__LINE__.".<br>";
            }
        }
        
    }   // close function table_return_column_names_and_data_types_array( $link, $table_name )

    function return_member_name_from_id( $link, $entered_by ):string
    {
        // echo "<p>entered_by:  $entered_by line ".__LINE__.".</p>";
        $query = $link->prepare("SELECT member_name FROM member WHERE member_id = ?");
        $query->bind_param("i", $entered_by );
        $query->execute();
        $result = $query->get_result(); // get the mysqli result

        if(!$result)
        {
            echo "Database not available, try again later L".__LINE__.".<br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $result );
            if( $rowCt > 0 )
            {
                return mysqli_fetch_row( $result )[0];
            }
            else
            {
                echo "No return from function return_member_name_from_id - entered_by:  $entered_by - Line ".__LINE__.".<br>";
                return '';
            }

        }
            return '';
    }   // end function return_member_name_from_id( $link, $entered_by )

    function group_cluster_return_number_groups_this_specimen( $link, $sid ):int
    {
        $query = $link->prepare("SELECT count(*) as total from member_list_groups WHERE specimen_id = ?");

        $query->bind_param("i", $sid);
        $query->execute();
        $result = $query->get_result();

        $return_count = 0;

        if($result == FALSE)
        {
            echo "Database not available, try again later L".__LINE__." of ".__FILE__.".<br>";
        }
        else
        {
            $data = mysqli_fetch_assoc($result);
            //echo $table_name." has ".$data['total']." rows.<br>";
            return $data['total'];
        }
        return $return_count;
    }  // close function group_cluster_return_number_groups_this_specimen( $link, $sid ):int

    function group_cluster_return_number_clusters_this_specimen( $link, $sid )
    {
        $query = $link->prepare("SELECT count(*) as total from member_list_clusters WHERE specimen_id = ?");

        $query->bind_param("i", $sid);
        $query->execute();
        $result = $query->get_result();

        $return_count = 0;

        if($result == FALSE)
        {
            echo "Database not available, try again later L".__LINE__." of ".__FILE__.".<br>";
        }
        else
        {
            $data = mysqli_fetch_assoc($result);
            //echo $table_name." has ".$data['total']." rows.<br>";
            return $data['total'];
        }
        return $return_count;
    }   // close     function group_cluster_return_number_clusters_this_specimen( $link, $sid )

    function group_cluster_add_specimen_to_group_or_cluster_form( $link, $sid, $member_id, $group_or_cluster ):void
    {
       if( $group_or_cluster == 'g' )
       {
           $table_to_edit = 'specimen_group';
           $switch_num = 22;
       }
       elseif( $group_or_cluster == 'c' )
       {
           $table_to_edit = 'specimen_cluster';
           $switch_num = 23;
       }
       $queryName = "SELECT * FROM $table_to_edit WHERE member_id = $member_id";
        $resultLog = mysqli_query($link, $queryName);

        if(!$resultLog)
        {
            echo "Database not available, try again later L".__LINE__.".<br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $resultLog );
            if( $rowCt > 0 )
            {
                ?>
                <div class="left">
                <p>Select category:</p>

                <form name="category"  method="post" action="<?php echo "member_dashboard.php?a=$switch_num&sid=$sid"; ?>">
                    <table>
                        <tr>
                            <td>
                                <input type="radio" id="x" name="category"  size="12" value="x" checked="checked"><label for="x"> Select One:</label>
                            </td>
                        </tr>
                        <?php

                        while( $rowAnswers = mysqli_fetch_assoc($resultLog) )
                        {


                        foreach( $rowAnswers as $key=>$val )
                        {
                            //echo "<br> $key: $val<br>";
                        }

//var_dump($rowAnswers);
                            $category           = $rowAnswers['id'];
                            $name               = $rowAnswers['name'];

                            ?>
                            <tr>
                                <td>

                                    <input type="radio"  id="<?php echo $category; ?>" name="category" size="40" value="<?php echo htmlentities($category ); ?>"> <label for="<?php echo $category; ?>"><?php echo "category:  $category - member:  $member_id - name: $name"; ?> </label>

                                </td>
                            </tr>

                            <?php
                        }
                        ?>
                        <tr>
                            <td>
                                <p>Double-check your information. If all is correct click the "Submit" Button.</p>

                                <br>
                                <input type="hidden" name="table" value="member_list_group">
                                <input type="hidden" name="tried" value="mydog">
                                <input type="submit" name = "submit" value="Submit">
                            </td>
                        </tr>
                    </table>
                </form>
</div>
                <?php

            }
            else
            {
                echo "No return from function show_radio_list_tables - Line ".__LINE__.".<br>";

            }
        }
    }  // group_cluster_add_specimen_to_group_or_cluster_form( $link, $sid):bool

    function specimen_return_name_from_specimen_id($link, $specimen_id)
    {
        // echo "<p>specimen_id:  $specimen_id line ".__LINE__.".</p>";
        $query_specimen_name = $link->prepare("SELECT specimen_name FROM specimens WHERE id = ?");
        $query_specimen_name->bind_param("i", $specimen_id );
        $query_specimen_name->execute();
        $result_specimen_name = $query_specimen_name->get_result(); // get the mysqli result

        if(!$result_specimen_name)
        {
            echo "Database not available, try again later L".__LINE__.".<br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $result_specimen_name );
            if( $rowCt > 0 )
            {
                $rowAnswers = mysqli_fetch_row( $result_specimen_name );
                $specimen_name = $rowAnswers[0];
                return $specimen_name;
            }
            else
            {
                echo "No return from function specimen_return_name_from_specimen_id - specimen_id:  $specimen_id - Line ".__LINE__.".<br>";
            }
        }

    }   // close function specimen_return_name_from_specimen_id($link, $specimen)

    function specimens_save_my_specimens_to_file( $link, $member_id ):bool
    {
        // save to BOTH text and xml files
        // echo "member_id:  $member_id line ".__LINE__."<br>";
        // get all of the specimens from specimens table that belong to member_id

        $table_name = 'specimens';

        $column_names_type = $this->table_return_column_names_and_data_types_array( $link, $table_name );

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $query = $link->prepare("SELECT * from $table_name WHERE member_id = ?");

        $query->bind_param("i", $member_id);
        $query->execute();
        $result = $query->get_result();

                //echo "table_name: $table_name - specimen_owner:  $member_id line ".__LINE__."<br>";

        if($result == false)
        {
            echo "Database not available, try again later L".__LINE__." of ".__FILE__.".<br>";
        }
        else
        {
            $size_column = mysqli_num_fields($result);
            //echo "<p>size_column: $size_column  line ".__LINE__.".</p>";
            $col_ct = 0;

            $text_file_string ='';
            $xml_file_string = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<specimen_list>\n";

            $table_name = 'specimens';
            while($data = mysqli_fetch_row($result))  // loop through each row
            {
                $xml_file_string .= "\n<specimen>\n";
                for( $i=0;$i<$size_column;$i++)    // loop through each column
                {
                    $column_name = $column_names_type[$i][0];
                    // returns the current value of this character from the specimens table - still need the name
                    $data_returned = $this->return_current_value( $link, $table_name, $column_name, $data[0] );

                    //echo "<div class=\"align left\">i: <b>$i</b> - col_ct: <b>$col_ct</b> - column_name: $column_name Line ".__LINE__.".</div>";

                    // echo "<p> table_name:  $table_name - column_name:  $column_name - data[0]:  $data[0] line ".__LINE__.".</p>";

                    //echo "<p>$column_name - $data[$i] line ".__LINE__.".</p>";

                     //echo "<p>Line ".__LINE__." table_name: $table_name - column_name:  $column_name - data_returned:  $data_returned.</p>";

                    if( $this->is_a_lookup_table( $link, $column_name ) )
                    {
                        // get data from lookup table

                        $string_data = $this->return_lookup_values_by_id( $link, $column_name, $data_returned );

                         // echo "\n<p>Line ".__LINE__." calling return_lookup_values_by_id( link, $column_name, $data_returned ) ** string_data:  $string_data[0] $string_data[1] $string_data[2].</p>\n";
                        $column_name_show = $this->prep_db_word_for_display( $column_name );
                        $text_file_string .=  "\n 5750 ".$column_name_show.": ".$string_data[0]." ".$string_data[1]." ".$string_data[2]."\n";
                        $xml_file_string .=  "\n 5751<".$column_name_show.">".$string_data[0]." ".$string_data[1]." ".$string_data[2]."</".$column_name."> 5751\n";

                        // $text_file_string .=  "\n".$column_name.": ".$string_data."\n";
                    }
                    elseif( $this->name_contains('color', $column_name) )
                    {
                        //echo "<p>In color - Line ".__LINE__." column_name:  $column_name - data_returned:  $data_returned.</p>";
                            $color_data_returned = $this->color_return_color_names_from_id($link, $data_returned);

                            $display_column_name = $this->prep_db_word_for_display( $column_name );
                            $text_file_string .=  "\n".$display_column_name.": ".$color_data_returned[0]." - ".$color_data_returned[1]." - ".$color_data_returned[2]." Line ".__LINE__."\n";
                            $xml_file_string .=  "\n 5762 <".$column_name.">".$color_data_returned[0]." * ".$color_data_returned[1]." * ".$color_data_returned[2]."</".$column_name.">\n";
                    }
                    elseif( $this->name_contains('y_n', $column_name) )
                    {
                        $display_column_name = $this->prep_db_word_for_display( $column_name );
                        if( $data_returned == 'n' || $data_returned == 0 )
                            {
                                $y_n = 'No';
                            }
                        else
                            {
                                $y_n = 'Yes';
                            }
                        $text_file_string .= "\n".$display_column_name.": ".$y_n." Line ".__LINE__."\n";
                        $xml_file_string .=  "\n 5776 <".$column_name.">".$y_n."</".$column_name.">\n";
                    }
                    else
                    {
                            $data_returned = $data[$i];

                            //  echo "\n<p>Line ".__LINE__." column_name:  $column_name does NOT equal ''.</p>\n";
                            //$text_file_string .= "<".$column_name.">".$data_returned."</".$column_name."> on line ".__LINE__."\n";

                            $display_column_name = $this->prep_db_word_for_display( $column_name );
                            if($data_returned != '0' && ($data_returned == '' || $data_returned == null) )
                            {
                                $text_file_string .=  "\n5788 ".$display_column_name.": Not Entered?\n";
                                $xml_file_string .=  "\n5789 <".$column_name.">Not Entered?</".$column_name.">\n";
                            }
                            else
                            {
                                $data_returned_clean = htmlentities($data_returned);
                                $text_file_string .=  "\n5794 ".$display_column_name.": ".$data_returned_clean."\n";
                                $xml_file_string .=  "\n5795 <".$column_name.">".$data_returned_clean."</".$column_name.">\n";
                            }

                    }
                }   $text_file_string .= "\n==================================================\n==================================================\n";
                $xml_file_string .= "</specimen>\n==================================================\n==================================================\n";// end for( $i=0;$i<$size_column;$i++)
            }  $xml_file_string .= "</specimen_list>\n";

             //echo $text_file_string;

             // save to text file
             $file_out_txt = "../temp/my_mrdbid_specimens.txt";

             $num_bytes_saved_txt = file_put_contents( $file_out_txt, $text_file_string);
             echo "<div class=\"align left\">";
              echo nl2br($text_file_string );
             echo "</div>";

             if( $num_bytes_saved_txt == 0 )
             {
                 echo "<br><b>NO</b> bytes were written to $file_out_txt.<br>";
             }
             else
             {
                 echo "<br><b>$num_bytes_saved_txt bytes were written to $file_out_txt.</b><br>";
             }

             echo "\n<hr>\n<hr>\n";

             // save to xml file
             $file_out_xml = "../temp/my_mrdbid_specimens.xml";
             $num_bytes_saved_xml = file_put_contents( $file_out_xml, $xml_file_string);
             echo "<div class=\"align left\">";
              echo nl2br($xml_file_string );
             echo "</div>";

             if( $num_bytes_saved_xml == 0 )
             {
                 echo "<br><b>NO</b> bytes were written to $file_out_xml.<br>";
             }
             else
             {
                 echo "<br><b>$num_bytes_saved_xml bytes were written to $file_out_xml.</b><br>";
             }
        }
            return '';
    }  // close specimens_save_my_specimens_to_file( $link, $member_id ):bool





    function name_contains( $pass_needle, $pass_haystack):bool
    {
        //echo "<br>Line ".__LINE__." pass_needle:  $pass_needle - pass_haystack:  $pass_haystack<br>";
        if (strpos($pass_haystack, $pass_needle) !== false)
        {
            //echo "<p>Line ".__LINE__." name_contains is true.</p>";
            return true;
        }
        else
        {
            //echo "<p>Line ".__LINE__." name_contains is false.</p>";
            return false;
        }
    }       // close     function name_contains( $pass_needle, $pass_haystack):bool




    function specimens_update_character($link ):bool
    {
        if( isset( $_POST['sid'] ) )
        {
            $edit_id             = $_POST['sid'];   // specimen to update
            $column_from_post    = $_POST['column_name'];  // character to update
            $table_from_post     = $_POST['table_name'];
        }
        else
        {
            echo "Update not loaded line ".__LINE__.".";
        }

        $new_value_from_post = '';
        if( isset( $_POST[$column_from_post] ) )
        {
            $new_value_from_post = $_POST[$column_from_post];
        }

        //var_dump($_POST);
        // edit=1 is set on member_dashboard page within the print_edit_specimen_list_by_member_id function option of Edit
        // where it links back to calling page with GET edit variable

         //echo "<p>edit_id:  $edit_id -Table Name: $table_from_post - Column Name: $column_from_post - new_value: $new_value_from_post line ".__LINE__.".</p>";

        $query_update = "UPDATE specimens SET $column_from_post = ? WHERE id = ?";

         echo "<p>L ".__LINE__." query_update:  $query_update</p><p></p>";

        $query_update = $link->prepare($query_update);
        $query_update->bind_param("si", $new_value_from_post, $edit_id);

        // echo "<br>query: $query<br>";

        $query_update->execute( );
        $result_update = $query_update->get_result();

        if ($query_update->errno)
        {
            // echo "<p>FAILURE!!! " . $query_update->error."</p>";
            return 0;
        }
        else
        {
             // -  {$query_update->affected_rows} row(s) updated.
            echo "<p>ID:  $edit_id  Character variable <b class=\"red\">$column_from_post</b>  for table $table_from_post updated to: \"$new_value_from_post\".</p>";
            return 1;
        }

    }   // close     function specimens_update_character( $link, $pass_id, $pass_character, $pass_new ):bool


    function specimen_view( $link, $specimen_name, $table_name )  // only use as of 2-4-2023 is site/view_specimen.php
    {
        $query = $link->prepare("SELECT * from $table_name WHERE id = ?");

        $query->bind_param("i", $specimen_name);
        $query->execute();
        $result = $query->get_result();

        if(!$result)
        {
            echo "Database not available, try again later L".__LINE__." of ".__FILE__.".<br>";
        }
        else
        {
            $data = mysqli_fetch_assoc($result);

            //echo "<br>var_dump here of data:<br>";
            //var_dump($data);
            //echo "<hr>";

            echo "\n<h2>Data List:</h2>\n";
            echo "\n<table id='specimen'>\n";

            foreach( $data as $column_name=>$value ) // key is column name - value is stored data
            {
                if( $column_name != 'id' && $column_name != 'entered_by' && $column_name != 'date_entered')
                {
                    echo "<tr id='specimen'>\n
                            <td id='specimen'>\n";

                    if( $this->name_contains('color', $column_name) )
                    {
                        // use same color table for all
                        //echo "Use color table.";
                        $common = 'color';
                        // $selected = $this->return_current_value( $link, $table_name, $column_name, $specimen_name );  // get the selected value before retrieve from odor
                        // $this_column_color = $this->return_common_by_id( $link, $common, $selected);
                        $this_common = $this->return_common_by_id( $link, $common, $value);

                        //echo "\n<p>selected for $common is $value and this_column_color: $this_column_color Line ".__LINE__."</p>\n";

                        // choose colors from color table and store color number in specific character table
                        // value is the current selected color number
                        // column_name is specific character table
                        // specimen_name is this specimen id in the mushroom table
                        echo "$column_name: <b>$this_common</b> <a href=\"/site/edit_one_character_form.php?specimen_name=$specimen_name&column_name=$column_name&selected=$value&common=$common\"> Edit</a>";
                    }
                    elseif( $this->name_contains('taste', $column_name) )
                    {
                        //use same taste table for all
                        //echo "Use taste table.";
                        $common = 'taste';
                        //$selected = $this->return_current_value( $link, $table_name, $column_name, $specimen_name );  // get the selected value before retrieve from odor
                        $this_common = $this->return_common_by_id( $link, $common, $value);
                        //echo "\n<p>selected for $common is $value and this_column_taste: $this_column_taste Line ".__LINE__."</p>\n";

                        // choose taste from taste table and store taste number in specific character table
                        echo "$column_name: <b>$this_common</b> <a href=\"/site/edit_one_character_form.php?specimen_name=$specimen_name&column_name=$column_name&selected=$value&common=$common\"> Edit</a>";

                    }
                    elseif( $this->name_contains('odor', $column_name) )
                    {
                        //use same odor table for all
                        //echo "Use odor table.";
                        $common = 'odor';
                        //$selected = $this->return_current_value( $link, $table_name, $column_name, $specimen_name );  // get the selected value before retrieve from odor
                        $this_common = $this->return_common_by_id( $link, $common, $value);
                        //echo "\n<p>selected for $common is $value and this_column_odor: $this_column_odor Line ".__LINE__."</p>\n";

                        // choose odor from odor table and store odor number in specific character table
                        echo "$column_name: <b>$this_common</b> <a href=\"/site/edit_one_character_form.php?specimen_name=$specimen_name&column_name=$column_name&selected=$value&common=$common\"> Edit</a>";
                        $common = '';
                    }
                    elseif( $column_has_lookup_table = $this->does_this_table_exist( $link, $column_name ) )
                    {
                        $common = 'lookup';
                        $selected = $this->return_current_value( $link, $table_name, $column_name, $specimen_name );  // get the selected value
                        echo "$column_name(line ".__LINE__.": ";  // this is column name AND lookup table name
                        // look_up_data_this_id( $link, $id, $table )
                        $data_array = $this->look_up_data_this_id( $link, $value, $column_name );

                        // echo "<br>var_dump here of data_array:<br>";
                        // var_dump($data_array);
                        // echo "<hr>";

                        foreach( $data_array as $key2=>$value2)
                        {
                            echo "<b>$value2</b> ";  // This is the set option for this column
                        }
                        echo " <a href=\"/site/edit_one_character_form.php?specimen_name=$specimen_name&column_name=$column_name&common=$common&selected=$selected\"> Edit</a>";
                        $common = '';
                    }
                    else
                    {
                        // text box type column
                        $common = 'text';
                        echo "$column_name:  <b>$value</b> <a href=\"/site/edit_one_character_form.php?specimen_name=$specimen_name&column_name=$column_name&common=$common\"> Edit</a>";
                        $common = '';
                    }

                    echo "</td>\n
                            </tr>\n";
                }   // if( $column_name != 'id' && $column_name != 'entered_by' && $column_name != 'date_entered')

            }       // foreach
            echo "\n</table>\n";
        }   // else
    }    //  function specimen_view( $link, $specimen_name, $table_name )

    function look_up_data_this_id( $link, $id, $table )
    {
        // echo "<br>id:  $id - table:  $table on line ".__LINE__.".<br>";
        $query = $link->prepare("SELECT * from $table WHERE id = ?");

        $query->bind_param("i", $id);
        $query->execute();
        $result = $query->get_result();

        if($result == FALSE)
        {
            echo "Database not available, try again later L".__LINE__." of ".__FILE__.".<br>";
        }
        else
        {
            $name = $description = $comments = '';

            $return_data = [];

            while($data = mysqli_fetch_assoc($result))
            {
                if(isset($data['name']) )
                {
                    $name = $data['name'];
                    $return_data[]  = $name;
                    //echo "<br>name is $name on line ".__LINE__.".<br>";
                }
                if(isset($data['description']) )
                {
                    $description = $data['description'];
                    $return_data[]  = $description;
                    //echo "<br>description is $description on line ".__LINE__.".<br>";
                }
                if(isset($data['comments']) )
                {
                    $comments = $data['comments'];
                    $return_data[]  = $comments;
                    //echo "<br>comments is $comments on line ".__LINE__.".<br>";
                }
                if(isset($data['source']) )
                {
                    $source = $data['source'];
                    $return_data[]  = $source;
                    //echo "<br>source is $source on line ".__LINE__.".<br>";
                }
            }
             return $return_data;
        }
    }   // close function look_up_data_this_id( $link, $id, $table )

    function is_a_lookup_table( $link, $column_name_that_may_have_lookup_table ):bool
    {
        // if data in the species table comes from a lookup table - use that data
        $match = false;
        $return_a_table[ ] = '';
        $return_a_table = $this->table_return_names( $link );  // currently 37 tables in fungi db

        $size_of_return_a_table = sizeof($return_a_table);
        //echo "<p>size_of_return_a_table:  $size_of_return_a_table line ".__LINE__."</p>";
        //$match = in_array( $column_name_that_may_have_lookup_table, $return_a_table );
        foreach( $return_a_table as $key=>$val)
        {
            if( $column_name_that_may_have_lookup_table == $val)
           {
                $match = true;

                //echo "<br>match: $match - column_name_that_may_have_lookup_table: $column_name_that_may_have_lookup_table - key: $key - val: $val - line ".__LINE__."<br>";
            }
        }
        return $match;
    }    // close is_a_lookup_table( $column_name_that_may_have_lookup_table )

    function does_this_table_exist( $link, $column_name ):bool
    {
        // this assumes that using specimens table in WHICH database?
        $sql = "SHOW TABLES LIKE '$column_name'";

        $result = $link->query($sql);

        if ($result->num_rows > 0)
        {
            // echo "Table exists";
            return true;
        }
        else
        {
            // echo "Table does not exist";
            return false;
        }
    }      //     function does_this_table_exist( $column_name ):bool




function return_current_value( $link, $table_name, $column, $id )
{
    // returns integer usually i - still need string name
    // echo "<br>id:  $id - table_name:  $table_name - column: $column on line ".__LINE__.".<br>";

    $query = $link->prepare("SELECT $column from $table_name WHERE id = ?");

     //echo "<br>query:  SELECT $column from $table_name WHERE id = $id on line ".__LINE__.".<br>";

    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();

    if($result == FALSE)
    {
        echo "Database not available, try again later L".__LINE__." of ".__FILE__.".<br>";
    }
    else
    {
        $data = mysqli_fetch_assoc($result);
//var_dump($data);
        if(isset( $data[$column] ) )
        {
           // echo "<p>data[$column]:  $data[$column] on line ".__LINE__.".</p>";
            return $data[$column];
        }
        else
        {
            // echo "<p>NOT RETURNED! data[$column]:  on line ".__LINE__.".</p>";
            return NULL;
        }
    }
}  // return_current_value( $link, $column, $id )


function return_common_by_id( $link, $common, $selected)
{
    // echo "<br>common:  $common - selected:  $selected on line ".__LINE__.".<br>";

    if( str_contains(  $common, 'color' ) )
    {
        $query = $link->prepare("SELECT common_name from $common WHERE id = ?");
    }
    else
    {
        $query = $link->prepare("SELECT name from $common WHERE id = ?");
    }

    $query->bind_param("i", $selected);
    $query->execute();
    $result = $query->get_result();

    if($result == FALSE)
    {
        echo "Database not available, try again later L".__LINE__." of ".__FILE__.".<br>";
    }
    else
    {
        $data = mysqli_fetch_row($result);

        if(isset($data[0]) )
        {
            return $data[0];
        }
    }
}  // close function return_common_by_id( $link, $common, $selected)


    function image_upload( $link, $sid ):int
    {

        $images_saved_name = basename($_FILES["fileToUpload"]["name"]);

        if( $duplicate_image_name = $this->image_is_duplicate_in_images_table( $link, $sid, $images_saved_name ) )
        {
            echo "<p>That is a duplicate image for this specimen. Do not proceed and return 0.</p>";
            return 0;
        }
        else
        {
            clearstatcache();  // Clears file status cache - https://www.php.net/manual/en/function.clearstatcache.php

            $target_dir = "uploads/";

            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

             //echo "<br>images_saved_name: $images_saved_name - target_file: $target_file on line ".__LINE__." of ".__FILE__.".<br>";

            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            //echo "<p>imageFileType is $imageFileType on line ".__LINE__." of ".__FILE__.".</p>";

            // Check if image file is an actual image or fake image
            if(isset($_POST["submit"]))
            {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

                $image_width  = $check[0];
                $image_height = $check[1];

                // echo "<p>width:  $image_width - height:  $image_height on line ".__LINE__.".</p>";

                // foreach ($check as $key => $value)
                //{
                //    echo "<br>$key - $value<br>";
                //}

                if($check !== false)
                {
                    // echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                }
                else
                {
                    echo "File is not an image.<br>";
                    $uploadOk = 0;
                }
            }

            // Check if file already exists IN IMAGES DIRECTORY
            // echo "<p>target_file:  $target_file on line ".__LINE__.".</p>";
            // if (file_exists($target_file))   // does not work consistently on Bluehost

            if($this->image_is_duplicate_in_images_table( $link, $sid, $images_saved_name ) )
            {
                echo "Sorry, file already exists line ".__LINE__.".<br>";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 40000000)
            {
                //$print_size = $_FILES["fileToUpload"]["size"];
                //echo "<p>size is $print_size on line ".__LINE__." of ".__FILE__.".</p>";
                echo "Sorry, your file is too large.<br>";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" )
            {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0)
            {
                echo "Sorry, your file was not uploaded on line ".__LINE__.".<br>";
                return 0;
            }
            else
            {
                // if everything is ok, try to upload file

                $part        = '';
                $description = '';

                if( isset( $_GET['sid'] ) )
                {
                    $specimen_id = $_GET['sid'];

                    if( isset( $_POST['part'] ) )
                    {
                        $part = $_POST['part'];
                    }

                    if( isset( $_POST['description'] ) )
                    {
                        $description = $_POST['description'];
                    }

                    if( isset( $_POST['lens'] ) )
                    {
                        $lens = $_POST['lens'];
                    }

                     //$this->image_create_mrdbid_thumbnail( $specimen_id, $target_file, $images_saved_name );

                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))   // after this - original file now in uploads
                    {

                        $this->image_resize_one( $target_file, $image_width, $image_height );  // resizing to same wid

                        $pass_array = $this->image_return_exif_data($target_file);  // refers to image just moved to uploads - AFTER resized above

                        $this->image_create_mrdbid_thumbnail( $link, $specimen_id, $target_file, $images_saved_name );

                        // echo "<p>line ".__LINE__>".</p>";

                        if( $pass_array !== false )
                        {
                            $pass_array['specimen_id']   = $specimen_id;
                            $pass_array['part']          = $part;
                            $pass_array['description']   = $description;
                            $pass_array['target_file']   = $target_file;
                            $pass_array['image_width']   = $image_width;
                            $pass_array['image_height']  = $image_height;
                            $pass_array['lens']          = $lens;

                            // echo "<p>width:  $image_width - height:  $image_height on line ".__LINE__>".</p>";

                            $save_source = basename($_FILES["fileToUpload"]["name"]);
                            $save_source_with_id = "uploads/".$specimen_id."_".$save_source;
                            $local_source = $images_saved_name;

                            $this->image_insert_new( $link, $pass_array, $save_source_with_id, $local_source);    // insert image data into database
                            //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been UPLOADED to $target_file (L".__LINE__." of ".__FILE__.").";

                            $rename_success = rename ($target_file, $save_source_with_id );   // after all said and done - add sid to beginning

                            if( !$rename_success )
                            {
                                 echo "Image file $target_file was <b>NOT</b> successfully renamed to $save_source_with_id L".__LINE__.".";
                            }
                            return 1;
                        }
                        else
                        {
                            echo "<p>pass array is false on line ".__LINE__>".</p>";
                            return 0;
                        }
                    }
                    else
                    {
                        echo "Sorry, there was an error uploading your file.<br>";
                        return 0;
                    }
                }
                else
                {
                    echo "<p>Can not save to database without specimen_id.</p>";
                    return 0;
                }
            }  // close else
        }  // close if( $duplicate_image_name = $this->is_duplicate_image( $images_saved_name ) )
    } // close function image_upload( $link ):int

    function image_upload_form( $link, $sid):int
    {
        // echo "<p>sid: $sid line ".__LINE__."</p>";

        $specimen_name = $this->specimen_return_name_from_specimen_id($link, $sid);
        if( PRODUCTION == 'no' )
        {
            ?>
                <form action="member_dashboard.php?a=18&sid=<?php echo $sid; ?>" method="post" enctype="multipart/form-data">
            <?php
        }
        else
        {
            ?>
                <form action="https://www.mrdbid.com/site/member_dashboard.php?a=18&sid=<?php echo $sid; ?>" method="post" enctype="multipart/form-data">
            <?php
        }
            ?>

            <table>
                <tr>
                    <td>
                        Select image to upload: <input type="file" name="fileToUpload" id="fileToUpload">
                    </td>
                </tr>

                <tr>
                    <td>
                        Part or action, such as cap top view, stem split, koh reaction, etc.:  <input type="text" name="part" id="part">
                    </td>
                </tr>

                <tr>
                    <td>
                        Description:  <input type="text" name="description" id="description">
                    </td>
                </tr>

                <tr>
                    <td>
                        Lens Used:  <input type="text" name="lens" id="lens">
                    </td>
                </tr>

                <tr>
                     <td>
                         <input type="hidden" value="<?php echo $specimen_name; ?>" name="specimen_name"><br>
                         <input type="submit" value="Upload Image" name="submit"><br>
                     </td>
                </tr>

            </table>
            </form>
            <?php
            return 1;
    }   // close function image_upload_form( $link, $image_name):int


    function images_toggle_show_link( $specimen_id, $now ):void
    {
        // echo "<p>In toggle_show_images( specimen_name, now ) now is $now L ".__LINE__.".</p>";
        ?>
        <table class="fifty">
            <tr class="fifty">
                <td>

                        <?php
                        if( $now == 'no')
                        {
                            ?>
                            <a href="/site/member_dashboard.php?a=11&sid=<?php echo $specimen_id; ?>&n=s"> Show Images L <?php echo __LINE__; ?></a>    -
                            <a href="/site/member_dashboard.php?a=11&sid=<?php echo $specimen_id; ?>&n=l"> List Images L <?php echo __LINE__; ?> </a>

                            <?php
                        }
                        elseif( $now == 'show')
                        {
                            ?>
                            <a href="/site/member_dashboard.php?a=11&sid=<?php echo $specimen_id; ?>&n=n"> Do Not Show Images L <?php echo __LINE__; ?></a>    -
                            <a href="/site/member_dashboard.php?a=11&sid=<?php echo $specimen_id; ?>&n=l"> List Images L <?php echo __LINE__; ?></a>
                            <?php
                        }
                        elseif( $now == 'list')
                        {
                            ?>
                            <a href="/site/member_dashboard.php?a=11&sid=<?php echo $specimen_id; ?>&n=n"> Do Not Show Images  L <?php echo __LINE__; ?></a>    -
                            <a href="/site/member_dashboard.php?a=11&sid=<?php echo $specimen_id; ?>&n=s"> Show Images L <?php echo __LINE__; ?></a>
                            <?php
                        }
                        else
                        {
                            ?>
                            <a href="/site/member_dashboard.php?a=11&sid=<?php echo $specimen_id; ?>&n=s"> Show Images L <?php echo __LINE__; ?></a>    -
                            <a href="/site/member_dashboard.php?a=11&sid=<?php echo $specimen_id; ?>&n=n"> Do Not Show Images L <?php echo __LINE__; ?></a>  -
                            <a href="/site/member_dashboard.php?a=11&sid=<?php echo $specimen_id; ?>&n=l"> List Images L <?php echo __LINE__; ?></a>
                            <?php
                        }
                        ?>
                </td>
            </tr>
        </table>
        <?php

    }   //function images_toggle_show_link( $specimen_name ):void


function toggle_basic_info( $link, $specimen_id, $now_basic, $now_character, $table_name, $edit):void
    {
         //echo "<p>In toggle_basic( specimen_id, now ) now_basic is $now_basic L ".__LINE__.".</p>";
        ?>
        <br><br>
        <table class="p_1">
            <tr class="p_1">
                <td>
                        <?php
                        if( $now_basic == 's')
                        {
                            ?>
                            <a href="/site/member_dashboard.php?a=11&sid=<?php echo $specimen_id; ?>&b=n&c=<?php echo $now_character; ?>"> Hide Basic Info Form</a>
                            <?php
                            $this->print_specimen_basic_info_form( $link, $table_name, $specimen_id, $edit );
                        }
                        else
                        {
                            ?>
                            <a href="/site/member_dashboard.php?a=11&sid=<?php echo $specimen_id; ?>&b=s&c=<?php echo $now_character; ?>"> Show Basic Info</a>
                            <?php
                        }
                        ?>
                </td>
            </tr>
        </table>
                <br><br>
        <?php

    }   //function toggle_basic_info( $link, $specimen_id, $now_basic, $now_character, $table_name, $edit)

    function toggle_characters_list( $link, $specimen_id, $now_character, $now_basic, $table_name, $edit):void
    {
        // echo "<p>In toggle_characters_list( $link, $specimen_id, $now_character, $table_name, $edit ) now is $now L ".__LINE__.".</p>";
        ?>
        <br><br>
        <table class="p_1">
            <tr class="p_1">
                <td>
                        <?php
                        if( $now_character == 's')
                        {
                            ?>
                            <a href="/site/member_dashboard.php?a=11&sid=<?php echo $specimen_id; ?>&b=<?php echo $now_basic; ?>&c=n">Hide Character List</a>
                            <?php
                            $this->list_all_characters_lookup( $link, $specimen_id );
                        }
                        else
                        {
                            ?>
                            <a href="/site/member_dashboard.php?a=11&sid=<?php echo $specimen_id; ?>&b=<?php echo $now_basic; ?>&c=s">Show Character List</a>
                            <?php
                        }
                        ?>
                </td>
            </tr>
        </table>
                <br><br>
        <?php

    }   //function toggle_characters_list( $link, $specimen_id, $now_character, $now_basic, $table_name, $edit  ):void

    function var_dump_pre($mixed = null)
    {
    // automatically adds the PRE tags around the var_dump output so you get nice formatted arrays
        echo '<pre>';
        var_dump($mixed);
        echo '</pre>';
        return null;
    }


    function var_dump_ret($mixed = null)
    {
        // returns the value of var_dump instead of outputting it.
        ob_start();
        var_dump($mixed);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

}         // close mushroom class