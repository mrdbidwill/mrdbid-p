<?php
session_start();
// last edit 6-2-2023

require_once("../../info/define.php");
require_once("../../info/class_page.php");
require_once("../../info/class_mushroom.php");
require_once("../../info/class_db.php");

$new_page  = new page( );
$new_mr    =  new mushroom( );
$new_db    =  new db( );
$index = 2;   // NOT index

$title  = "New Color Form Layout";
$author = "Will Johnston";
$keyWords = "New Color Form Layout";
$description = "New Color Form Layout";
$heading = "New Color Form Layout";

$showAds = 'n';
$css = 'y';
$character_comments = 1;

$new_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );
?>
    <div>
    <table><tr><td>
<?php
if( isset( $_SESSION['member'] )  )
{
    $member =  $_SESSION['member'];
    $member_id   = $_SESSION['id'];
    // echo "member is $member.<br>";

    $link = $new_db->connect_database();

    $edit = '';

    $update_message = '';

    if(isset( $_GET['e'] ))
    {
        $edit = $_GET['e'];
    }

    if(isset($_POST['id'] ))   // UPDATE id for specimen and column to update with new value - POST id is set below -
    {
        $edit_id = $_POST['id'];
        $column  = $_POST['column'];
        $success = $new_mr->specimens_update_character( $link, $edit_id );

        if( $success )
        {
            $update_message =  "<p>$column was successfully updated.</p>";

             header('Location: '."new_color_form_layout.php?u=$edit_id&e=1");  // using this updates without any message saying updated

        }
        else
        {
            $update_message = "<p>$column was NOT updated.</p>";
        }
    }
    elseif(isset($_GET['t_id'] ))   // t id is table id for THIS specimen in mushroom table set on member_dashboard.php when click on edit specimen
    {
        $pass_id = $_GET['t_id'];
        $new_mr->display_character_table($link, $member_id, $pass_id );
    }  // close     if( isset( $_GET['table_id'] ))
    elseif( isset( $_GET['n'] ) )  // n for new
    {
        $n  = $_GET['n'];
        if(isset( $_GET['c'] ) ) // for complete new form - so insert into db
        {

            $id = $new_mr->table_return_next_table_id( $link, 'mushroom');

            $specimen_name             = $_POST['specimen_name'];
            $comment                 = $_POST['comment'];
            $common_name             = $_POST['common_name'];
            $location_found_city     = $_POST['location_found_city'];
            $location_found_state    = $_POST['state'];
            $location_found_county   = $_POST['location_found_county'];
            $location_found_country  = $_POST['country'];
            $location_public_y_n     = $_POST['location_public_y_n'];
            $month_found             = $_POST['month'];
            $day_found               = $_POST['day'];
            $year_found              = $_POST['year'];

            if( $new_mr->check_duplicate_specimen_name($link, $specimen_name, $member_id))
            {
                echo "<p><b class=\"redComment\">You already have a specimen_name named $specimen_name. Please select another name.</b></p>";

                $success = $new_mr->display_basic_character_table( $link,  $member_id  );
            }
            else
            {
                $query = $link->prepare("INSERT INTO mushroom (`id`, `specimen_name`, `specimen_owner`, `comment`, `common_name`, `location_found_city`, `location_found_state`, `location_found_county`, `location_found_country`, `location_public_y_n`, `month_found`, `day_found`, `year_found`, `entered_by`, `date_entered`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now() )");


                $query->bind_param("isisssisiiiiii", $id, $specimen_name, $member_id, $comment, $common_name, $location_found_city, $location_found_state, $location_found_county, $location_found_country, $location_public_y_n, $month_found, $day_found, $year_found, $member_id);

                $return_success = $query->execute( );

                if($return_success)
                {
                    echo "<p>Success! Your specimen <b class='blueComment'>$specimen_name</b> was entered into mushroom table. Enter more character data if you wish.</p>";
                    $pass_id = '';
                    $new_mr->display_member_dashboard_menu( );
                    $new_mr->display_character_table( $link, $member_id, $pass_id );
                }
                else
                {
                    echo "<p>NOT result line ".__LINE__.".</p>";
                }
            }
        }
        else
        {
            $success = $new_mr->display_basic_character_table( $link,  $member_id  );
        }
    }
    elseif( isset( $_GET['u'] ) )    // u for updated
    {
        $new_mr->display_basic_character_table( $link,  $member_id  );
    }
    else
    {
        echo "Not accessible Line ".__LINE__.".";
        $success = $new_mr->display_basic_character_table( $link,  $member_id  );
    }
}
else
{
    echo "You must be registered <b>AND</b> logged in to use this form.<br>";
}
?>
</td>
</tr>
</table>
</div>
<?php
$new_page->close_page($index);
?>