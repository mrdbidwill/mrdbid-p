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
        echo "<p>Table name is $table_name on line ".__LINE__." of ".__FILE__.".</p>";
    }


    $all_empty = 1;
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
            if( $val != '' && $key != $table_name && $key != 'submit')
            {
                echo "<p>key:val: $key:$val is NOT empty on line ".__LINE__." of ".__FILE__.".</p>";
                $all_empty = 0;
            }
            else
            {
                echo "<p>key:val: $key:$val  is empty on line ".__LINE__." of ".__FILE__.".</p>";
            }

        }
    }
        if( $all_empty == 1 )
        {
            echo "<p>I got nothing (all_empty = $all_empty )".__LINE__." of ".__FILE__.".</p>";
            exit( );
        }

    // $table_name  = $_POST['table'];

    if( isset( $_SESSION['id'] ) )
    {
         $addedBy  = $_SESSION['id'];
    }
    else
    {
        exit( "You must be logged in.<br>" );
    }


        $col_names_array = $new_mr->table_return_column_names_and_data_types_array( $link, $table_name );
        
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
            elseif( $col_names_array[$x][0] == 'entered_by')
            {
                $string_name = $col_names_array[$x][0];
                $query_string .= " $string_name,";
               // do not add to param list because will enter value as logged in session id
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
                            //echo "<br>is i<br>";
                            break;
                        case 'decimal':
                            $a_param_type[] = 'd';
                            //echo "<br>is d<br>";
                            break;
                        case 'varchar':
                        case 'char':
                        case 'datetime':
                            $a_param_type[] = 's';
                            //echo "<br>is s<br>";
                            break;
                        default:
                            $a_param_type[] = 's';
                            //echo "<br>is default<br>";
                    }
               }
        }

        $next_id = '';
        $next_id = $new_mr->table_return_next_lookup_table_id( $link, $table_name);
        $query_string .= " )
                        VALUES ( $next_id, ";
    
        for( $y=1;$y<$size_of_col_names; $y++)   // minus one since already added one empty above
        {
            if( $col_names_array[$y][0] == 'id' )
            {
                //$query_string .= " $next_id,";  // set directly above
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
        
          echo "<br>query_string:  $query_string<br>";

        //$size_of_params = sizeof($a_params);
        //for($cp=0; $cp<$size_of_params;$cp++)
        //{
            //echo "<br>$cp. a_params[cp] - $a_params[$cp]";
        //}


        /* Prepare statement */
        $query = $link->prepare($query_string);
        if($query === false)
        {
            trigger_error('Wrong SQL: ' . $query . ' Error: ' . $link->errno . ' ' . $link->error, E_USER_ERROR);
        }
        /* use call_user_func_array, as $stmt->bind_param('s', $param); does not accept params array */

         call_user_func_array(array($query, 'bind_param'), $a_params);

        $latest_next_id = $new_mr->table_return_next_lookup_table_id( $link, $table_name);

        echo "<p>latest_next_id:  $latest_next_id - next_id:  $next_id.</p>";


            $query->execute();
            $result = $query->get_result();

            if ($query->errno)
            {
                echo "FAILURE!!! " . $query->error;
            }
            else
            {
                echo "<p>Table $table_name added {$query->affected_rows} rows</p>";

                header("Location: /admin/admin_dashboard.php?success=$table_name" );
                exit;
            }

   	$new_page->close_page( $index );

?>