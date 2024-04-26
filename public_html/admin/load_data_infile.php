<?php session_start();
   // last edit 6-17-2023
   
   require_once("../../info/define.php");
   require_once("../../info/class_db.php");
   require_once("../../info/class_page.php");
   
   $newPage = new page( );
   $index = 2;
   
   $title  = "";
   $author = "Will Johnston";
   $keyWords = "";
   $description = "Load Data Infile";
   $heading = "";
   $showAds = 'n';
   $css = 'y';

   $newPage->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );
   
?>
   <br>                <br>               <br>
   <h1>Load Data Infile</h1>
   <p>Right now, only loads one table at time.</p>

<form name="continueToFunction"  method="post" target="_self">

<input type="radio" name="runFunction" checked="checked" value="no" id="rFn"  /> <label for="rFn">No</label><br>

<input type="radio" name="runFunction" value="yes" id="rFy"  /> <label for="rFy">Yes</label><br>
<br>
<input type="submit" name = "submit" value="Run Function" />

</form>

<?php


if( isset( $_POST['runFunction'] )&& ( $_POST['runFunction'] === "yes" ) )
{


    $time_start = microtime(true);
    $link_load = mysqli_connect('localhost', 'root', 'moon1Dog', 'MBList');

    // file path must be from data file where mysql looks for it

    //$file = "mushroom.sql";
    // $file = 'MBList_data.csv';
    $file = 'MBList_3_21_2023.csv';
    $table_name = "list_3_21_2023";

    $query_load = "LOAD DATA INFILE '/var/lib/mysql-files/$file'
    
INTO TABLE `$table_name`
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '\"'
LINES TERMINATED BY '\n'
IGNORE 1 LINES";

//INTO TABLE `$tableName`
//FIELDS TERMINATED BY ','
//LINES TERMINATED BY '\n'
//IGNORE 1 LINES";


    $result_load = mysqli_query($link_load, $query_load) or trigger_error("Query Failed! SQL: $query_load - Error: " . mysqli_error($link_load), E_USER_ERROR);


    $time_end = microtime(true);
    // dividing by 60 will give the execution time in minutes otherwise seconds
    // $execution_time = ($time_end - $time_start)/60;

    $execution_time = ($time_end - $time_start);

    //execution time of the script
    echo '<b>Total Execution Time:</b> ' . $execution_time . ' Seconds';

    if ($result_load == FALSE)
    {
        echo " table <b>$table_name</b> NOT loaded.<br>";
        return FALSE;
    } else
    {
        echo " table <b>$table_name</b> was loaded.<br>";
        return TRUE;
    }

    /*

    LOAD DATA INFILE '../../htdocs/public_html/census/2010/$state/$file'
     INTO TABLE $tableName
     FIELDS TERMINATED BY ','
     OPTIONALLY ENCLOSED BY '\"'
     LINES TERMINATED BY '\\n'
     $columns_list;

        LOAD DATA INFILE '../../htdocs/public_html/census/MCD/testMCD/Alabama_MCD.csv'
    TO TABLE al
    FIELDS TERMINATED BY ','
    OPTIONALLY ENCLOSED BY '"'
    LINES TERMINATED BY '\r\n'
    IGNORE 1 LINES

    */


}
                                        
$newPage->close_page( $index );
