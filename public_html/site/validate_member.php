<?php
 session_start();
 
// last edit 4-5-2024
   require_once("../../info/define.php");
   require_once("../../info/class_db.php");
   require_once("../../info/class_page.php");

$o_page     = new page();
$o_db       = new db();

$index = 2;
$title  = "MRDBID Member Validation Page";
$author = "Will Johnston";
$keyWords = "MRDBID, fungi, fungus, average  driver pay, average  driver salary, how much does a  driver earn, how much does a  driver make";
$description = "MRDBID Member Validation Page";
$heading = "MRDBID Validation Page";
$showAds = 'n';

$css = 'y';
$o_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );

   $o_db = new db();
   $link =   $o_db->connect_database(  );
         
   $memberID   = $_GET['mid'];
   // echo "memberID is $memberID on line ".__LINE__." of ".__FILE__."<br>";
   
   $query = $link->prepare("UPDATE member SET member_responded = 'y', member_valid = 'y' WHERE member_id = ? ");
   $query->bind_param("i", $memberID);
   $query->execute();
   $resultValidateQuery = $query->get_result(); // get the mysqli result

    // echo "Line ".__LINE__." resultValidateQuery:  $resultValidateQuery.";

    if ($query->errno)
    {
    echo "FAILURE!!! " . $query->error;
    }
    else
    {
        // $line = __line; $file = __file__;
        // $displayCt = mysqli_affected_rows( $returnedLink );
        //echo "There were $displayCt rows affected  on line ".__LINE__." of ".__FILE__.".<br>";

        echo "<p><b>Thank you!</b></p>
        <p>MRDBID member information has been validated! Sign in with your email and password.</p>";

        $toAddressSelf   = "willgb54@yahoo.com";
        $subjectSelf     = "MRDBID New member validated";
        $mailContentSelf = "MRDBID Validation complete for id ".$memberID.".";
        $fromAddressSelf = "From:  comment@mrdbid.com";
        mail($toAddressSelf, $subjectSelf, $mailContentSelf, $fromAddressSelf);
    }

$o_page->close_page( $index );
