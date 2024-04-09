<?php
session_start();

// last edit 7-19-2023
   require_once("../../info/define.php");
   require_once("../../info/class_page.php");
   
$new_page = new page( );
$index = 2;

$title  = "MRDBID Upload Image Form";
$author = "Will Johnston";
$keyWords = "";
$description = "MRDBID Upload Image Form";
$heading = "MRDBID Upload Image Form";
$showAds = 'n';
$css = 'y'; $new_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );

if( isset($_GET['specimen_name'] ) )
{
    $specimen_name = $_GET['specimen_name'];

?>
    <form action="upload.php" method="post" enctype="multipart/form-data">

    <table>
        <tr>
            <td>
                Select image to upload: <input type="file" name="fileToUpload" id="fileToUpload">
            </td>
        </tr>

        <tr>
            <td>
                Part or action, such as cap top view, stem split, koh reaction, etc:  <input type="text" name="part" id="part">
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
        </form>
    </table>
    <?php
}
else
{
    echo "<p>You must have specimen id to land here.</p>";
}

$new_page->close_page( $index );
