<?php
session_start();

// last edit 2-8-2023
   require_once("../../info/define.php");
   require_once("../../info/class_member.php");
   require_once("../../info/class_db.php");
   require_once("../../info/class_page.php");

$o_page     = new page();
$o_db       = new db();
$o_member   = new member();

$index = 2;
$title  = "MRDBID Member Registration Page";
$author = "Will Johnston";
$keyWords = "";
$description = "MRDBID Member Registration Page";
$heading = "MRDBID Member Registration Page";
$showAds = 'n';

$css = 'y';
$o_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );
$edit = 0;
$o_member->display_registration_form( $edit );
$o_page->close_page( $index );

