<?php
session_start();
$receivedTime = time();   // for robot check
// last edit 7-6-2023

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
    $title  = "MRDBID About Colors";
    $author = "Will Johnston";
    $keyWords = "MRDBID About Colors";
    $description = "MRDBID About Colors";
    $heading = "MRDBID About Colors";
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
    if ( $o_member->check_member_session())
    {
        $member_name = $_SESSION['member'];
        $member_id   = $_SESSION['id'];
        $member_type = $o_page->get_member_type( $link, $member_id);

        $show = 33; // for this example only
        $this_color = $o_mr->return_one_color_data_by_id( $link, $show );

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

        $show = 33;
        $display = "../images/AMS_colors/color_big/color_big_".$show.".jpg";

        echo "<table>\n<tr>\n<td>\n<blockquote class=\"colors\" cite=\"Kerrigan, R. W. (2016). Agaricus of North America (p. 25). The New York Botanical Garden.\">For general purposes I prefer to present a general color description plus, insofar as possible, one or more faithful color images (realizing that faith in photo reproduction also has its limits--for which a color chart specification can help compensate).<br><br><b>Kerrigan, R. W. (2016). Agaricus of North America (p. 25). The New York Botanical Garden</b></blockquote>\n</td>\n</tr>\n<tr>\n<td>\n<div class=\"center\">The original Alabama Mushroom Latin Color Chart:<br><img src=\"../images/AMS_colors/Latin_Colors_ORIGINAL.jpg\" width=\"754\" height=\"720\" /></div></td>\n</tr>\n</table>\n<tr>\n<td>\nThe next row is the same colors as the original, after editing to reduce to one color <b>but</b> <u>are arranged in a different order.</u></td>\n</tr>\n</table>\n";

        $pass_character = $mushroom_table_row_number = $specimen_name = '';

        $o_mr->print_color_banner_NO_select($link, $pass_character, $mushroom_table_row_number, $specimen_name);  // has its own table

        echo "<table>\n<tr>\n<td>\n<p>Some people may find it easier to tell color from a larger image. The below image($color_id) is 1600 pixels x 800 pixels. <b>$latin_name</b> is the Latin name from the Alabama Mushroom Society (AMS) Latin Colors chart. I edited each image to sample colors outside the original white and black markup lettering for the number and Latin name on the AMS chart to reduce the number of colors to one.</p><p> Hex value for this color is $hex. The RGB value is $r_val:$g_val:$b_val. The second name, <b>$common_name</b>  was obtained from using this derived rbg value at <a href=\"https://rgbcolorcode.com/color/converter/\">https://rgbcolorcode.com/color/converter</a>. <b>$closest_websafe_color</b> is the \"closest websafe color\" from the same website, for what it is worth.</p>\n<p>There are several instances where two different Alabama Mushroom Society Latin Colors reduce to the same Common and/or Closest Websafe Color.</p></td>\n</tr>\n<tr><td><div class=\"center\"><img src=\"$display\"></div>\n</td>\n</tr>\n</table>";

    }    // if ( $o_member->check_member_session())
    else
    {
        $notAuthorized = 1;
        echo "<p>You must be registered <b>and</b> logged in to enter the  Member area.</p>";
    }
echo "\n</table><!-- end main table -->\n</div>\n";
$o_page->close_page( $index );
