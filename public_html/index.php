<?php
session_start();
// Last Edit 4-4-2024

require_once("../info/class_page.php");
$new_page  = new page( );

$index = 1; //this index variable identifies that this is THE index page

$title  = "MRDBID Home Page";
$author = "Will Johnston";
$keyWords = "MRDBID, mushroom, mushrooms, fungi, fungus, identification, mushroom identification";
$description = "MRDBID Home Page";
$heading = "MRDBID Home Page";
$showAds = 'n';
$css = 'y';

$new_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );
?>
    <p>This website is a tool for storing and organizing <u>data</u> for mushrooms that you observed and/or collected. Hopefully, it will provide a process that simplifies storing and retrieving <u>your</u> mushroom specimen <b>data</b> in order to compare it to other mushrooms that you and others have observed. Once your initial information is stored in the database, you can edit it as needed and add more character details as you discover them.</p>

    <p>The fact you observed a mushroom means you have some visual, time and location data. That is enough to start. You name this specimen "something" that is meaningful to <b>you,</b> like "myinitials_1" or "myinitials_2", etc. with comment  "brown mushroom - backyard". There you go. A beginning. Any clear photo is a plus.</p>

     <p>If you did not retrieve a specimen, when you get to the option of selecting where a specimen is currently located, you can select "Observation Only - No specimen collected". </p>

    <p>If nothing more, now you know when and where you saw "it". This time next year, you may see it again, same place?</p>

    <p>This is not a "key" identification process, like <a href="https://www.mushroomexpert.com">https://www.mushroomexpert.com</a>. You can use MushroomExpert.Com and/or other identification experts to match up <b>your</b> specimen <u>data</u> that is stored here. In the future, perhaps enough positive identifications will result in a match within the mrdbid.com <b>database.</b></p>

    <p>Again, a specimen need not be collected to be entered here. These entries will be recorded as an "observation", not a "specimen".</p>

    <p>Register or login, then go to <b>Dashboard</b> to get started. The process will take it from there, hopefully. <u>The link to Dashboard will NOT appear until you register and log in.</u></p>

    <p>PS The "Trees" link began from photographs of the informational signs at Blakely State Park, Baldwin County, Alabama. It is the beginning of a tool for identifying the trees associated with mushrooms.</p>

    <p><b>About Images:</b> I am not a photographer, an artist, or a scientist. My goal in observing or collecting specimens is to provide documentation of its facts that can be preserved for any future study. Good photographs make that possible.</p>

     <p>This website's upload process will reduce some pictures in size, if needed. Otherwise, any editing, cropping, etc. should be done before uploading.</p>

     <p>As part of the specimen collection process, my intention is to take the best picture I can <u>from the beginning</u> following a plan like outlined in the "Citizen Science How To Take Scientifically Useful Observations" link below.</p>

    <p>The most useful pictures will clearly document mushroom characters and measurements, along with surroundings (trees, etc.). If this is successfully done, anyone looking at the collection of pictures can confirm the data at any future date.</p>

    <p>This website is <b>not</b> a "field guide". You need to collect pictures and information where mushrooms are found, then transfer the data one time here for your records.</p>

    <h2>Where to begin?</h2>

    <p>If you do not know where to start, click on this link:  <a href="https://alabamamushroomsociety.org/Citizen-Science">Citizen Science How To Take Scientifically Useful Observations</a></p>

    <p>Use this form. You can get it at link above: <img  id="field_data_sheet" src="images/AMS_Field_Data_Sheet_400x298.png" alt="AMS Field Data Sheet"></p>

    <p>After completing the form <u>in the field</u>, take a picture of it. Then, once home and when you get around to it, add the data and the pictures you took of the specimen, including this form, to your specimen list. You then have it to refer to online whereever you are, and update as needed while you identify your specimen.</p>

<?php
$new_page->close_page($index);

