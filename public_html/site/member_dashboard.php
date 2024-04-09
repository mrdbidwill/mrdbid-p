<?php
session_start();
$receivedTime = time();   // for robot check
// last edit 4-3-2024

    require_once("../../info/define.php");
    require_once("../../info/class_member.php");
    require_once("../../info/class_db.php");
    require_once("../../info/class_page.php");
    require_once("../../info/class_mushroom.php");
    
    $o_page      = new page();
    $o_db        = new db();
    $o_member    = new member();
    $o_mr        = new mushroom();
    
    $index = 2;
    $title  = "MRDBID Member Dashboard Page";
    $author = "Will Johnston";
    $keyWords = "MRDBID, mushroom comparison";
    $description = "MRDBID Member Dashboard Page";
    $heading = "MRDBID Member Dashboard Page";
    $showAds = 'n';

    $o_db = new db();
    $link = $o_db->connect_database(  );
   
    // Check connection
    if (mysqli_connect_errno())
    {
       echo "Failed to connect to MySQL: " . mysqli_connect_error()." Line ".__LINE__." of ".__FILE__."<br>";
    }
    $css = 'y';

   $o_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );


    //echo "<div  class='center'>\n<table class='p_1'> <!-- begin member dashboard table -->\n<tr class='p_1'>\n<td class='p_1'>\n<h3>Member Dashboard:</h3>\n</td>\n</tr>\n<tr class='p_1'>\n<td class='p_1'>\n";

echo "<div  class='center'>\n<h3>Member Dashboard:</h3>\n";

// echo "<div  class='content'>\n<table> <!-- begin member dashboard table -->\n<tr>\n<td>\n<h3>Member Dashboard:</h3>\n</td>\n</tr>\n<tr>\n<td>\n";

    if ( $o_member->check_member_session())
    {
        $member_name = $_SESSION['member'];
        $member_id   = $_SESSION['id'];
        $member_type = $o_page->get_member_type( $link, $member_id);

        // what do I know and when do I know it
        // $o_mr->var_dump_pre(get_defined_vars());
        //$o_mr->var_dump_pre( $_SESSION );

        $do = '';

        // member dashboard menu options - action via address GET
        // Specimen List - action = s_l
        // Group List    - action - g_l
        // Cluster List  - action - c_l
        // new Specimen  - action - s_n
        // new Group     - action - g_n
        // new Cluster   - action - c_l
        // insert new specimen - action - e_n_s

        //if( isset( $_SESSION['a'] ) )

        $action = '';

        if( isset( $_GET['a'] ) )
        {
            //$action      = $_SESSION['a'];
            $action      = $_GET['a'];

            if( isset( $_GET['sid'] ))
            {
                $specimen_id = $_GET['sid'];
                // echo "specimen_id: $specimen_id on line ".__LINE__." of ".__FILE__.".";
                $specimen_name = $o_mr->specimen_return_name_from_specimen_id($link, $specimen_id);
                //echo "<p>specimen_id:  $specimen_id line ".__LINE__.".</p>";
                // echo "<p>This specimen name: <b>$specimen_name</b> for if isset GET sid on line ".__LINE__." .</p>";
            }
        }
        else
        {
            $action = 1;
        }
            switch ($action)
            {
                case 1:   // default action
                     echo "<p>case 1: default - display member dashboard menu</p>";
                    $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id );  // displays horizontal list of action links on green background - 100% width
                    break;
                case 2:    // s_l show specimen list for this member
                    // echo "<p>case 2:  s_l display member dashboard menu - show specimen list for this member</p>";
                    $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id );  // displays horizontal list of action links on green background - 100% width
                    $o_mr->print_edit_specimen_list_by_member_id( $link, $member_id);
                    break;
                case 3:    // g_l  show group list for this member
                    // echo "<p>case 3: g_l display member dashboard menu - show group list for this member</p>";
                    $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id );  // displays horizontal list of action links on green background - 100% width
                    $group_r_cluster = 'g';
                    // echo "<p>member_id:  $member_id - group_r_cluster:  $group_r_cluster on line ".__LINE__.".</p>";
                    $o_mr->group_cluster_print_list_by_user_id(  $link, $member_id, $group_r_cluster );
                    break;
                case 4:   // c_l show cluster list for this member
                    // echo "<p>case 4: c_l display member dashboard menu - show cluster list for this member</p>";
                    $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id );  // displays horizontal list of action links on green background - 100% width
                    $group_r_cluster = 'c';
                    // echo "<p>member_id:  $member_id - group_r_cluster:  $group_r_cluster on line ".__LINE__.".</p>";
                    $o_mr->group_cluster_print_list_by_user_id(  $link, $member_id, $group_r_cluster );
                    break;
                case 5:  // s_n - show add new specimen (basic character) form - display member dashboard menu
                    // echo "<p>case 5: show add new specimen (basic character) form - display member dashboard menu</p>";
                    $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id );  // displays horizontal list of action links on green background - 100% width
                    // $o_mr->display_basic_character_table( $link, $member_id );

                    $edit = 0;
                    $member_id   = $_SESSION['id'];
                    $o_mr->display_basic_character_table_simple( $link, $member_id );
                    //$specimen_id = '';
                    //$o_mr->display_basic_character_table_EDIT( $link, $member_id, $specimen_id, $edit );

                    break;
                case 6:  // g_n - show add new group form
                    // echo "<p>case 6: display member dashboard menu - print new group text</p>";
                    $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id );  // displays horizontal list of action links on green background - 100% width
                    //$o_mr->print_edit_specimen_list_by_member_id( $member_id, $link );
                    $group_cluster = 'group';
                    $edit = 0;
                    $o_mr->group_cluster_print_new_group_text( $link );
                    break;
                case 7: // c_n - show add new cluster form
                    // echo "<p>case 7: display member dashboard menu - print new cluster text</p>";
                    $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id );  // displays horizontal list of action links on green background - 100% width
                    // $o_mr->print_edit_specimen_list_by_member_id( $member_id, $link );
                    $group_cluster = 'cluster';
                    $edit = 0;
                    $o_mr->group_cluster_print_new_cluster_text( $link );
                    break;
                case 8:  // enter new specimen
                    // echo "<p>case 8: enter new specimen</p>";
                    $success_returned_new_specimen_name = $o_mr->specimen_insert_new_specimen_BASIC_data( $link );
                    if( $success_returned_new_specimen_name )
                    {
                        echo "<p><b>New specimen <b class='blueComment'>$success_returned_new_specimen_name</b> was added.</b></p>";
                    }
                    if(  isset( $_SESSION['last_new_specimen'] ) )  // set in function specimen_insert_new_specimen_BASIC_data
                    {
                        $last_new_id = $_SESSION['last_new_specimen'];
                        // echo "<p>The last specimen entered was ID:  $last_new_id ".__LINE__.".</p>";
                        unset($_SESSION['last_new_specimen']);
                        $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id ); // displays horizontal list of action links on green background - 100% width
                    }
                    break;
                case 9:    // enter new group
                    // echo "<p>case 9: enter new group</p>";
                    $success = $o_mr->group_cluster_insert_new_db_category( $link, $member_id );
                    if( $success )
                    {
                        echo "<p><b>New group was added.</b></p>";
                    }
                    if(  isset( $_SESSION['last_new_group'] ) )  // check this
                    {
                        $last_new_group = $_SESSION['last_new_group'];
                        echo "<p>The last group entered was ID:  $last_new_group</p>";
                        unset($_SESSION['last_new_group']);
                        $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id ); // displays horizontal list of action links on green background - 100% width
                    }
                    break;
                case 10: // enter new cluster
                    // echo "<p>case 10: enter new cluster</p>";
                    $success = $o_mr->group_cluster_insert_new_db_category( $link, $member_id );
                    if( $success )
                    {
                        echo "<p><b>New cluster was added.</b></p>";
                    }
                    if(  isset( $_SESSION['last_new_cluster'] ) )  // check this
                    {
                        $last_new_cluster = $_SESSION['last_new_cluster'];
                        echo "<p>The last cluster entered was ID:  $last_new_cluster</p>";
                        unset($_SESSION['last_new_cluster']);
                        $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id );  // displays horizontal list of action links on green background - 100% width
                    }
                    break;
                case 11:  // display member dashboard menu - anchor tag to column name - print specimen manager form
                     echo "<p>case 11:  display member dashboard menu - list character names - print specimen manager form</p>";
                    //$specimen_name = $o_mr->specimen_return_name_from_specimen_id( $link, $specimen_id );
                    //echo "<p>This specimen name: <b>$specimen_name</b> for case 11 on line ".__LINE__." .</p>";

                    $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id );  // displays horizontal list of action links on green background - 100% width

                    if( isset( $_GET['sid'] )  )
                    {
                        $specimen_id = $_GET['sid'];

                        $o_mr->group_cluster_display_specimen_membership( $link, $specimen_id );

                        if( $o_mr->thumbnails_exist_this_sid( $link, $specimen_id) )
                        {
                            // echo "<hr>\n<b>Any <b>uploaded</b> image's thumbnail will display now. line ".__LINE__." of ".__FILE__."</b><hr>\n";
                            $o_mr->thumbnail_print_banner_select( $link, $specimen_id );
                        }
                        $o_mr->character_edit_ajax_form($link, $specimen_id);  //display form for editing specimen

                        $o_mr->color_display_color_character_edit_here_link($specimen_id);  //display link to form for editing color characters

                        //$o_mr->anchor_tag_to_character_name( $link, $specimen_id );
                        $table_name = 'specimens';
                        $edit = 0;

                        if(isset( $_GET['b'] ))
                        {
                            $now_basic = $_GET['b'];
                            // echo "now_basic: $now_basic on line ".__LINE__.".<br>";
                        }
                        else
                        {
                            $now_basic = 's';
                        }

                        if(isset( $_GET['c'] ))
                        {
                            $now_character = $_GET['c'];
                            // echo "now_character: $now_character on line ".__LINE__.".<br>";
                        }
                        else
                        {
                            $now_character = 's';
                        }

                        if(isset( $_GET['b'] ))
                        {   // function print_specimen_basic_info_form is called in  function toggle_basic_info if b is set to show basic info
                            $o_mr->toggle_basic_info( $link, $specimen_id, $now_basic, $now_character, $table_name, $edit );
                        }

                        if(isset( $_GET['c'] ))
                        {
                            // function list_all_characters_lookup is called in  function toggle_characters_list if c is set to show characters
                            $o_mr->toggle_characters_list( $link, $specimen_id, $now_character, $now_basic, $table_name, $edit);
                        }

                    }  // close if( isset( $_GET['sid'] )  )
                    else
                    {
                        echo "<p>Case 11 - No specimen ID was set.</p>";
                    }
                    break;
                case 12:   // update specimens character - then display member dashboard menu - anchor tag to column name - print specimen manager form
                    // echo "<p>case 12:  update specimens character - then display member dashboard menu - anchor tag to column name - print specimen manager form</p>";
                    if( isset( $_POST['characterName'])  )
                    {
                        $character_name = $_POST['characterName'];   // which is same as column_name listed below
                        echo "<p>character_name: $character_name and specimen_id:  $specimen_id on line ".__LINE__.".</p>";
                        // get current value of this character included in the form
                    }

                    if( isset( $_POST['column_name'] ))    // NO longer needed?
                    {
                        $specimen_id   = $_POST['sid'];
                        $column_name   = $_POST['column_name'];
                        //$specimen_name = $_POST['specimen_id'];
                        echo "<p>POST[column_name] = column_name = $column_name and specimen_name = ** and specimen_id = $specimen_id line ".__LINE__.".</p>";
                        $o_mr->specimens_update_character( $link );

                        $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id );  // displays horizontal list of action links on green background - 100% width
                        //$o_mr->anchor_tag_to_character_name( $link, $specimen_id );
                        $table_name = 'specimens';
                        $edit = 0;
                        $o_mr->print_specimen_basic_info_form( $link, $table_name, $specimen_id, $edit );
                    }
                    break;
                case 13:  // print Kerrigan quote - select color column name to edit
                    // echo "<p>case 13:  print Kerrigan quote - select color column name to edit</p>";
                    if( isset( $_GET['sid'] )  )
                    {
                        $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id ); // displays horizontal list of action links on green background - 100% width
                        // Color Selection Step 1
                        $specimen_id = $_GET['sid'];
                        echo "<p>Specimen ID:  <b class='red'>$specimen_id - Color Selection Step ONE</b></p>";

                        $o_mr->color_image_display_kerrigan_color_blockquote( );

                        $single_character_id = '';
                        $o_mr->color_select_COLOR_character_name($link, $specimen_id, $single_character_id);
                    }   // close         if( isset( $_GET['sid'] )  )
                break;
                case 14:   // print color banner select
                    $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id ); // displays horizontal list of action links on green background - 100% width
                    // echo "<p>case 14: print color banner select</p>";
                    if( isset( $_GET['c']  ) && !isset( $_GET['color'] ) )
                    {
                        // Color Selection Step 1
                        //$specimen_name = $_GET['sid'];


                        if( isset( $_GET['c_id'] )  )
                        {
                            $selected_color = $_GET['c_id'];
                        }
                        else
                        {
                            $selected_color = 0;
                        }

                        $specimen_name = '';
                        $color_column_mushroom_table = $_GET['c'];
                        $specimen_id = $_GET['sid'];
                        //$col_name_w_row_num = $ct_c.'X'.$column_name;
                        $row_num_and_col_name = explode( 'X', $color_column_mushroom_table);
                        $pass_row_num = $row_num_and_col_name[0];
                        echo "<br>color_column_mushroom_table: $color_column_mushroom_table  -pass_row_num:  $pass_row_num line ".__LINE__.".<br>";
                        $color_column_table = $row_num_and_col_name[1];

                        echo "<p>Color Selection Step TWO.</p>\n";

                        $o_mr->color_print_banner_select( $link, $pass_row_num, $color_column_table, $specimen_id , $selected_color);
                    }   // close if( isset( $_GET['c']  ) )
                    break;
                case 15:  // Display big image and save option.
                    $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id ); // displays horizontal list of action links on green background - 100% width
                    // echo "<p>case 15: Display big image and save option.</p>";
                    if( isset( $_GET['color']  ) )
                    {
                        //$specimen_name = $_GET['sid'];

                        $specimen_id      = $_GET['sid'];
                        // echo "specimen_id: $specimen_id on line ".__LINE__.".";
                        $specimen_name    = $o_mr->specimen_return_name_from_specimen_id($link, $specimen_id);
                        $color_column_mushroom_table = $_GET['p'];
                        $selected_color = $_GET['color'];

                        $row_num_and_col_name = explode( 'X', $color_column_mushroom_table);

                        $pass_row_num = $row_num_and_col_name[0];
                        //echo "<br>color_column_mushroom_table: $color_column_mushroom_table  -pass_row_num:  $pass_row_num line ".__LINE__.".<br>";
                        $color_column_table = $row_num_and_col_name[1];

                        $show = $selected_color;

                        $last_color = $show - 1;
                        $next_color = $show + 1;

                        echo "<div class=\"center\"><table class=\"p_1\"><tr  class=\"p_1\">\n";
                        $this_color = $o_mr->color_return_one_color_data_by_id( $link, $show );

                        //var_dump($this_color);

                        $color_id              = $this_color[0];
                        $latin_name            = $this_color[1];
                        $common_name           = $this_color[2];
                        $color_group           = $this_color[3];
                        $hex                   = $this_color[4];
                        $sequence              = $this_color[5];
                        $r_val                 = $this_color[6];
                        $g_val                 = $this_color[7];
                        $b_val                 = $this_color[8];
                        $closest_websafe_color = $this_color[9];
                        $cwc_r                 = $this_color[10];
                        $cwc_g                 = $this_color[11];
                        $cwc_b                 = $this_color[12];
                        $image_file            = $this_color[13];

                        //echo "<p>$color_id - $latin_name - $common_name - $color_group - $hex - $sequence - $r_val - $g_val - $b_val - $closest_websafe_color - $cwc_r - $cwc_g - $cwc_g, $image_file</p>";

                        $display = "../images/AMS_colors/color_big/color_big_".$show.".jpg";
                        // echo "<img src=\"$display\" alt=\"Mushroom Color\"> $show \n";
                        // echo "</td>\n<td>\nNext</td>\n</tr>\n";

                        echo "<td>\n<span id=\"big_image\">To save <b class=\"red\">$latin_name</b> as color for  <b class=\"red\">$color_column_table</b> select <a href=\"member_dashboard.php?a=16&sid=$specimen_id&p=$color_column_mushroom_table&e=1\">HERE</a>.</span>\n</td>\n</tr>\n
              <tr>\n<td>\n<p>This image for <b>$latin_name</b> ( $color_id ) is 1600 pixels x 800 pixels.</p>\n <p><b> $latin_name </b> is the Latin name from the Alabama Mushroom Society (AMS) Latin Colors chart. Hex value is $hex. RGB value is $r_val:$g_val:$b_val. Another name, <b>$common_name</b>  was obtained from using this derived rbg value using <a href=\"https://rgbcolorcode.com/color/converter/\">https://rgbcolorcode.com/color/converter</a>. <b>$closest_websafe_color </b> is the \"closest websafe color\" from the same website. For more information on these colors see <a href=\"about_mushroom_colors.php\"> About Mushroom Colors.</a></p>\n<p><div class=\"center\"><img src=\"$display\" alt=\"Latin Name\"></div></p>\n</td>\n</tr>\n";
                    }  // close if( isset($_GET['color']
                    break;
                case 16:   // update specimens color character
                    $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id ); // displays horizontal list of action links on green background - 100% width
                    // echo "<p>case 16:  update specimens color character</p>";
                    if( ( isset( $_GET['e']  ) ) AND ( '1' === $_GET['e']) )
                    {

                        //$o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id );
                        $specimen_id      = $_GET['sid'];
                        // echo "specimen_id: $specimen_id on line ".__LINE__.".";
                        $specimen_name    = $o_mr->specimen_return_name_from_specimen_id($link, $specimen_id);
                        $color_column_mushroom_table = $_GET['p'];

                        $selected_color_and_col_name = explode( 'X', $color_column_mushroom_table);

                        $selected_color = $selected_color_and_col_name[0];
                        $color_column_table = $selected_color_and_col_name[1];

                        $character_id = $o_mr->get_character_id_from_name( $link, $color_column_table );

                        //echo "<br>e is set and e equals 1. specimen_name:  $specimen_name - color_column_table: $color_column_table - selected_color: $selected_color.<br>";

                        $specimen_character_exists = '';

                        $specimen_character_exists = $o_mr->color_return_color_id_for_this_specimen_this_character( $link, $specimen_id, $character_id );

                        if( $specimen_character_exists )
                        {
                            $success = $o_mr->color_update_specimens_character( $link, $character_id, $selected_color, $specimen_id );
                        }
                        else
                        {
                            $success = $o_mr->color_insert_specimens_character( $link, $character_id, $selected_color, $specimen_id , $member_id );
                        }

                        // save selected color for character color_column_mushroom table for specimen number specimen_name - then display something helpful

                    } // close if( isset($_GET['']
                    break;
                case 17:    // upload images form
                    $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id ); // displays horizontal list of action links on green background - 100% width
                    $specimen_id      = $_GET['sid'];
                    // echo "<p>case 17:  upload image form for specimen_id:  $specimen_id</p>";
                    $o_mr->image_upload_form( $link, $specimen_id );

                    break;
                case 18:
                    $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id );  // displays horizontal list of action links on green background - 100% width
                    $specimen_id      = $_GET['sid'];
                    // echo "<p>case 18: upload image</p>";
                    $o_mr->image_upload( $link, $specimen_id );
                    break;
                case 19:
                    $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id );  // displays horizontal list of action links on green background - 100% width
                    $specimen_id = $_GET['sid'];
                    $image_source    = $_GET['i_s'];
                    // echo "<p>case 19:  Display this image:</p>";
                    $o_mr->image_display_ONE($link, $specimen_id, $image_source );
                    if( $o_mr->thumbnails_exist_this_sid( $link, $specimen_id) )
                    {
                        $o_mr->thumbnail_print_banner_select( $link, $specimen_id );
                    }
                    // $o_mr->anchor_tag_to_character_name( $link, $specimen_id );
                    $table_name = 'specimens';
                    $edit = 0;
                    $o_mr->print_specimen_basic_info_form( $link, $table_name, $specimen_id, $edit );
                    break;
                case 20:
                    $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id );  // displays horizontal list of action links on green background - 100% width
                    $specimen_id      = $_GET['sid'];
                    //Add to group form
                    echo "<p>Case 20 - specimen_id:  $specimen_id - print add to group form.</p>";
                    $group_or_cluster = 'g';
                    $o_mr->group_cluster_add_specimen_to_group_or_cluster_form( $link, $specimen_id, $member_id, $group_or_cluster );
                    break;
                case 21:
                    $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id );  // displays horizontal list of action links on green background - 100% width
                    $specimen_id = $_GET['sid'];
                    //add to cluster form
                    echo "<p>Case 21 - specimen_id:  $specimen_id - print add to cluster form.</p>";
                    $group_or_cluster = 'c';
                    $o_mr->group_cluster_add_specimen_to_group_or_cluster_form( $link, $specimen_id, $member_id, $group_or_cluster );
                    break;
                case 22:
                    $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id );  // displays horizontal list of action links on green background - 100% width
                    $specimen_id      = $_GET['sid'];
                    // process form for group
                    $group_or_cluster = 'g';
                    echo "<p>Case 22 - specimen_id:  $specimen_id - add to group.</p>";
                    $o_mr->group_cluster_insert_new_specimen_membership( $link, $specimen_id, $group_or_cluster );
                    break;
                case 23:
                    $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id );  // displays horizontal list of action links on green background - 100% width
                    $specimen_id      = $_GET['sid'];
                    // process form for cluster
                    $group_or_cluster = 'c';
                    echo "<p>Case 23 - specimen_id:  $specimen_id - add to cluster.</p>";
                    $o_mr->group_cluster_insert_new_specimen_membership( $link, $specimen_id, $group_or_cluster );
                    break;
                case 24:
                    $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id );  // displays horizontal list of action links on green background - 100% width
                    // Download all specimen data for this member
                    echo "<p>Case 24 - Download all specimen data for this member.</p>";
                    //$o_mr->file_download_form( $link, $member_id );
                    $o_mr->specimens_save_my_specimens_to_file( $link, $member_id ); // save to BOTH text and XML files

                    break;
                case 25:
                    $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id );  // displays horizontal list of action links on green background - 100% width
                    $specimen_id      = $_GET['sid'];
                    // Download this specimen's data for this member
                    echo "<p>Case 25 - Download all specimen's data for this member.</p>";
                    $o_mr->specimens_save_my_specimens_to_file( $link, $member_id );  // save to BOTH text and XML files

                    // Remote download URL
                    //$remoteURL = 'https://www.example.com/files/project.zip';
                    $remoteURL = '/var/www/mrdbid_php/public_html/temp/my_mrdbid_specimens.txt';

                   // Force download
                    header("Content-type: application/x-file-to-save");
                    header("Content-Disposition: attachment; filename=".basename($remoteURL));
                    ob_end_clean();
                    readfile($remoteURL);


                    break;
                case 26:
                    $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id );  // displays horizontal list of action links on green background - 100% width
                    $specimen_id      = $_GET['sid'];
                    // Remove this specimen from this list.
                    echo "<p>Case 26 - Remove this specimen from this list.</p>";

                    break;
                default:
                    $o_mr->display_member_dashboard_menu_NO_TABLE( $link, $member_id );   // displays horizontal list of action links on green background - 100% width
                    //echo "<p>case default:</p>";
                    break;
            }     // close switch

    }    // if ( $o_member->check_member_session())
    else
    {
        $notAuthorized = 1;
        echo "<p>You must be registered <b>and</b> logged in to enter the  Member area.</p>";
    }
//echo "\n</td>\n</tr>\n</table><!-- end member dashboard table -->\n</div>\n";
    echo "</div>\n";
$o_page->close_page( $index );
