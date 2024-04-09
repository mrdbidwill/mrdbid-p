<?php
session_start();

// last edit 2-8-2023

require_once("../../info/class_page.php");

$new_page = new page( );
$index = 2;

$title  = "MRDBID Privacy Policy";
$author = "Will Johnston";
$keyWords = "MRDBID Privacy Policy";
$description = "MRDBID Privacy Policy";
$heading = "MRDBID Privacy Policy";

$showAds = 'n';

$css = 'y'; $new_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );
?>

<!-- 11-25-19 https://www.serprank.com/privacy-policy-generator-success -->

<h1> Privacy Policy for MRDBID</h1>

<p> If you require any more information or have any questions about our privacy policy, please feel free to contact us by email at <b>MRDBID.</b></p>

<p>At <b>MRDBID</b>, the privacy of our visitors is of extreme importance to us. This privacy policy document outlines the types of personal information is received and collected by MRDBID and how it is used.</p>

<p><b>Log Files</b><br> Like many other Websites, <b>MRDBID</b> makes use of log files. The information inside the log files includes internet protocol ( IP ) addresses, type of browser, Internet Service Provider ( ISP ), date/time stamp, referring/exit pages, and number of clicks to analyze trends, administer the site, track users movement around the site, and gather demographic information. IP addresses, and other such information are not linked to any information that is personally identifiable.</p>

<p><b>Cookies and Web Beacons</b><br> <b>MRDBID</b> does use cookies to store information about visitors preferences, record user-specific information on which pages the user access or visit, customize Web page content based on visitors browser type or other information that the visitor sends via their browser. </p>

<h3>DoubleClick DART Cookie</h3>
<ul>
<li>Google, as a third party vendor, may use cookies to serve ads on <b>MRDBID</b>.</li>
<li>Google's use of the DART cookie enables it to serve ads to your users based on their visit to <b>MRDBID</b> and other sites on the Internet. </li>
<li>Users may opt out of the use of the DART cookie by visiting the Google ad and content network privacy policy at the following URL - http://www.google.com/privacy_ads.html</li></ul>

<p> Some of our advertising partners may use cookies and web beacons on our site. Our advertising partners include: Google Adsense.
</p>

<p> These third-party ad servers or ad networks use technology to the advertisements and links that appear on <b>MRDBID</b> send directly to your browsers. They automatically receive your IP address when this occurs. Other technologies ( such as cookies, JavaScript, or Web Beacons ) may also be used by the third-party ad networks to measure the effectiveness of their advertisements and / or to personalize the advertising content that you see.</p>

<p><b>MRDBID</b> has no access to or control over these cookies that are used by third-party advertisers.</p>

<p> You should consult the respective privacy policies of these third-party ad servers for more detailed information on their practices as well as for instructions about how to opt-out of certain practices. <b>MRDBID's</b> privacy policy does not apply to, and we cannot control the activities of, such other advertisers or websites. </p>

<p>If you wish to disable cookies, you may do so through your individual browser options. More detailed information about cookie management with specific web browsers can be found at the browsers' respective websites.</p>
   
<?php
$new_page->close_page( $index );
?>