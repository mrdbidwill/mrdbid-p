<?php
session_start();
// last edit 1-18-2024

require_once("../../info/define.php");
require_once("../../info/class_page.php");
require_once("../../info/class_mushroom.php");
require_once("../../info/class_member.php");
require_once("../../info/class_db.php");

$new_page  = new page( );
$new_mr =  new mushroom( );
$o_member    = new member();
$new_db =  new db( );

    $index = 2;

    $title  = "New Group Cluster Processor";
    $author = "Will Johnston";
    $keyWords = "New Group Cluster Processor";
    $description = "New Group Cluster Processor";
    $heading = "New Group Cluster Processor";
    $showAds = 'n';
    
    $css = 'y'; $new_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );

if ( $o_member->check_member_session())
{
    $member_name = $_SESSION['member'];
    $member_id   = $_SESSION['id'];

    $link = $new_db->connect_database();
    
    // check connection
    if (mysqli_connect_errno())
    {
        printf("Connect failed: %s\n", mysqli_connect_errno());
        exit();
    }
    echo "<hr>";

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

        $next_id = $new_mr->table_return_next_table_id( $link, $table_name);
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
        }
        else
        {
            echo "<p>Table <b>$table_name</b> added {$query->affected_rows} row.</p>\n";

            echo "<p><a href=\"member_dashboard.php?a=6\">Add another Group?</a></p>\n";
            echo "<p><a href=\"member_dashboard.php?a=7\">Add another Cluster?</a></p>\n";

            $new_mr->display_member_dashboard_menu( $link, $member_id );

        }
}    // if ( $o_member->check_member_session())
else
{
    $notAuthorized = 1;
    echo "<p>You must be registered <b>and</b> logged in to enter the  Member area.</p>";
}
   	$new_page->close_page( $index );

?>