<?php

// File Name:  class_page.php
/**
 * Creates page class and functions
 * @author Will Johnston
 * @version 1.0
 * @since 1.0
 * @access public
 * @copyright Will Johnston
  * edited 4-5-2024
 */
require_once("class_db.php");

class page{

function open_page( $indexIn, $titleIn, $authorIn, $keyWordsIn, $descriptionIn, $headingIn, $showAds, $css ):void
{
$o_db = new db();
$link =   $o_db->connect_database(  );

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
{
     // echo "<br> Connected to database line ".__LINE__." of ".__FILE__.".";
}
    ?><!DOCTYPE html>
    <html lang="en">
    <head>
        <?php
            if( $showAds == 'y' )
            {
                ?>
                    // ad script would be here
                <?php
            }
        ?>
    <meta charset="utf-8">
    <title><?php echo $titleIn; ?></title>
    <meta name="author" content="<?php echo $authorIn; ?>">
    <meta name="description" content="<?php echo $descriptionIn; ?>">
    <meta name="keywords" content="<?php echo $keyWordsIn; ?>">
    <meta name=viewport content="width=device-width, initial-scale=1">
        
        <?php

        if( PRODUCTION === 'no')
        {
            if( $indexIn == 1 )             // index page
            {
                $libAddress    = "_lib";
                $imageAddress  = "images";
                $linkAddress   = "../";
            }
            elseif( $indexIn == 2 )         // one deep
            {
                $libAddress    = "../_lib";
                $imageAddress  = "../images";
                $linkAddress   = "../../";
            }
             elseif( $indexIn == 3 )         // two deep
            {
                $libAddress    = "../../_lib";
                $imageAddress  = "../../images";
                $linkAddress   = "../../../";
            }
            elseif( $indexIn == 4)         // above public_html - info
            {
                $libAddress    = "../_lib";
                $imageAddress  = "../images";
                $linkAddress   = "../";
            }
            else
            {
                echo "Could not process your request right now. Please try again later L".__LINE__." of ".__FILE__.".<br>";
            }
        } // close if( PRODUCTION === 'no'
        else
        {
            $libAddress    = "https://www.mrdbid.com/_lib";
            $imageAddress  = "https://www.mrdbid.com/images";
            $linkAddress   = "https://www.mrdbid.com/";
        }

            if( $css == 'y')
            {
            ?>
                <link rel="stylesheet" type="text/css" href="<?php echo $libAddress;?>/mushroom.css">
                <link rel="stylesheet" type="text/css" href="<?php echo $libAddress;?>/specimen.css">
                <link rel="stylesheet" href="<?php echo $libAddress;?>/w3.css">
                <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <?php
            }
            ?>

            <script src="<?php echo $libAddress;?>/mushroom.js"></script>
            <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <link rel="Shortcut Icon" href="<?php echo $imageAddress;?>/favicon.ico" type="image/x-icon">

    </head>       
    <body>
    <!-- beginning of navigation --> 
    <div class='center'>

        <nav>
      
        <ul class='nav'>
        <?php 
        if( $indexIn != 1  )
        {
        ?>
             <li><a href="<?php echo $linkAddress;?>index.php">Home</a></li>
        <?php 
        }
        ?>
        <li> <a href="<?php echo $linkAddress;?>trees/trees.php">Trees</a></li>
        <li> <a href="<?php echo $linkAddress;?>contact/contact_links.php">Contact</a></li>

        <!-- insert admin and member login logged in links -->
        <?php

        if(isset($_SESSION['member']))
        {
            $name = $_SESSION['member'];
            $id =  $this->get_member_id_by_name_page_version( $link, $name);
            $is_admin = $this->get_member_type( $link, $id, );

            if( $is_admin === 1 )
            {
                ?>
                <li><a href="<?php echo $linkAddress;?>admin/admin_dashboard.php">Admin Dashboard</a></li>
                <?php
            }
            
            ?>
            <li><a href="<?php echo $linkAddress;?>site/member_dashboard.php">Dashboard</a></li>
            <?php

                ?>
                <li><a href="<?php echo $linkAddress;?>site/member_logout.php">Log Out</a> </li>

                <li class='fit_menu_top'>
                    <?php
                    echo "You are logged in as $name. ";
                    echo "If you are not $name, click ";?><a href="<?php echo $linkAddress;?>site/member_not_login.php">HERE</a>
                </li>
                <?php
            }
            else
            {
                ?>
                    <li><a href="<?php echo $linkAddress;?>site/member_login.php">Log In</a></li>
                    <li><a href="<?php echo $linkAddress;?>site/member_register.php">Register</a></li>
                <?php
            }
            ?>

            <!-- end insert admin and member login logged in links -->
      </ul>
  </nav>

   </div> <!-- end of navigation -->

<div>    <!-- beginning of logo and title -->  

                    <br> <br>
                    <span id='top'>
                    <a href="<?php echo $linkAddress;?>index.php">
                    <img  id='logo' src="<?php echo $imageAddress;?>/mushroom_100x100_MOD.png" alt="Mushroom">
                    <b class="greenCommentLarge">MRDBID</b>
                    <b class='greenComment'>M</b>ush<b class='greenComment'>R</b>oom <b class='greenComment'>D</b>ata<b class='greenComment'>B</b>ase <b class='greenComment'>ID</b>entification</a>
                    </span>
                    <br>
     <!-- end of logo and title -->

    <?php
        if( $indexIn == 1 )
        {
            $this->echo_before_main_content(  );
        }
        
    ?>

</div>


      <!-- beginning of Main Data Space -->

   <?php
  
}                      // end function open_page

/*************************************************************************************/

function close_page(  $indexIn ):void
{

    if( PRODUCTION === 'yes' )
   {
       $linkAddress = 'https://www.mrdbid.com/';
   }
   else
   {
    if( $indexIn == 1 )             // index page
    {
        $linkAddress   = "";  
    }
    elseif( $indexIn == 2 )         // one off
    {
        $linkAddress   = "../";      
    }
    elseif( $indexIn == 3 )         // two off
    {
        $linkAddress   = "../../";
    }   
    else
    {
        echo "Could not process your request right now. Please try again later L".__LINE__." of ".__FILE__.".<br>";
    }
   }   // close else

    if( $indexIn == 1 )
    {
        $this->echo_after_main_content(  );
    }
    ?>
    
    
    
    <br><!-- end of Main Data Space -->
    <hr>
    <p>While every effort is made to provide accuracy, it is not guaranteed by mrdbid.com. See all  <a href="<?php echo $linkAddress ?>legal/disclaimers.php">Disclaimers</a>.</p>
    <hr>    
    </body>
    </html>
    <?php   
}   // close function close_page


function create_sitemap(  )
{
    
    // set the default timezone to use. Available since PHP 5.1
    date_default_timezone_set('America/Chicago');
    
    $updatedDate = date('m/d/Y');  
    
    $newSiteMap = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
    
    <!--Created by Will Johnston -->
    <!--Updated by wj $updatedDate  -->
    
    <urlset xmlns=\"https://www.sitemaps.org/schemas/sitemap/0.9\" xmlns:xsi=\"https://www.w3.org/2001/XMLSchema-instance\" xsi:schemaLocation=\"https://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">
    
    <url>
        <loc>https://www.mrdbid.com/</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    
    
    <url>
        <loc>https://www.mrdbid.com/index.php</loc>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>
 
    <url>
        <loc>https://www.mrdbid.com/contact/contact_links</loc>
        <changefreq>weeklyly</changefreq>
        <priority>0.9</priority>
    </url>   
          
    <url>
        <loc>https://www.mrdbid.com/contact/contact_problem.php</loc>
        <changefreq>yearly</changefreq>
        <priority>0.2</priority>
    </url>
      
    <url>
        <loc>https://www.mrdbid.com/contact/contact.php</loc>
        <changefreq>yearly</changefreq>
        <priority>0.5</priority>
    </url>
     
    <url>
        <loc>https://www.mrdbid.com/contact/contact_will.php</loc>
        <changefreq>yearly</changefreq>
        <priority>0.5</priority>
    </url>";
    
    $outFile = "";        
    // fastest way - does not reload entire string - only adds to end
    $outFile .= $newSiteMap;  
   
    $outFile .= "\n</urlset>"; 
      
     // echo "$outFile<br>";
         
    $success = file_put_contents( "../sitemap_NEW.xml", $outFile );
    
    if( $success )
    {
        echo "File successfully saved to sitemap_NEW.xml<br>";
    }
    else
    {
        echo " File was NOT saved.<br>";
    }      
    }  // close function  create_sitemap(  )
  
 
  function echo_before_main_content(  )
 {
     // placed inside supplement before main content for future use
     // if $indexIn == 8;
     //echo "<br>Check back often. More mushrooms are coming soon.<br>";
 }
 
 function echo_after_main_content(  )
 {
     // placed inside supplement pages before main content for future use
     // if $indexIn == 8;
     //echo "<br>Check back often. More mushrooms are coming soon.<br>";
 }
 
 
  
    function set_new_cookie( $link, $userID ):bool
    {
        //set_new_cookie generates a random token - stores it in db -
        // and sets the cookie

        $token = $this->generate_random_token(); // generate a token, should be 128 - 256 bit

        $time =  ( time()+ (60*60*24*365 ) );
        $timeExpire = date( 'Y-m-d H:i:s', $time );

        if( $this->fetch_token_by_userID($link, $userID ) )   // only one token per user - check if existing
        {
            // echo "Only one token per user machine  on Line ".__LINE__." of ".__FILE__.".<br>";
            return false;
        }
        else
        {
            if( $this->store_token_for_user($link,  $userID, $token ) )
            {
                $was_stored  = $this->store_token_for_user($link,  $userID, $token );
                echo "was_stored:  $was_stored - Token was stored on Line ".__LINE__." of ".__FILE__.".<br>";
                return true;
            }
        }

        $cookieValue = $userID . ':' . $token;

        // echo "<br><br>cookieValue:  $cookieValue line ".__LINE__.".<br>";

        $mac = hash_hmac('sha256', $cookieValue, SECRET_KEY);
        $cookieValue .= ':' . $mac;

        //echo "cookieValue:  $cookieValue line ".__LINE__.".<br>";

        $cookieValueLength = strlen($cookieValue);
        //echo "Cookie value length is $cookieValueLength and cookieValue is $cookieValue on Line ".__LINE__." of ".__FILE__.".<br>";

        $cookieName = "mrdbid";

    // function setcookie(string $name, $value = "", $expires_or_options = 0, $path = "", $domain = "", $secure = false, $httponly = false): bool {}
        $cookie_success = setcookie( $cookieName, $cookieValue, $time, "/", "", 0 );
        
        if( !$cookie_success )
        {
            // echo "<br>Cookie $cookieName was NOT set  on line ".__LINE__." of ".__FILE__.".<br>";
            return 0;
        }
        else
        {

            $is_validated = $this->validate_cookie( $link );
            // echo "<br>Cookie is_validated: $is_validated on line ".__LINE__." of ".__FILE__.".<br>";
            return 1;
        }

        //$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
        // setcookie('mrdbid', '$cookieValue', time()+60*60*24*365, '/', $domain, false);

    }  // close function set_new_cookie($userName, $userEmail)

    function generate_random_token( ):string
    {
        $length = 128;   // should be 128-256

        $token = bin2hex(openssl_random_pseudo_bytes($length));

        return $token;
    }  // close function generate_random_token( )


    function store_token_for_user($link, $userID, $token ):int
    {
         $id = '';

         $token_length = strlen($token);
         // echo "<p>On line ".__LINE__." of ".__FILE__." token is $token_length long:  $token .</p>";

        $insertQuery =  $link->prepare("INSERT INTO tokens   (    token_id,
                                                   token_user,
                                                   token_token,
                                                   token_date_entered )
                                         VALUES ( ?,
                                                  ?,
                                                  ?,
                                                   now() )");

        $insertQuery->bind_param("iis", $id, $userID, $token);
        $insertQuery->execute( );
        $result = $insertQuery->get_result();

        if( $result )
        {
            echo "<p>On line ".__LINE__." of ".__FILE__." Successful.</p>";
            echo "Successfully inserted " . mysqli_affected_rows($link) . " row on line ".__LINE__." of ".__FILE__.".<br>";
            return 1;
        }
        else
        {
            echo "<p>On line ".__LINE__." of ".__FILE__." <b>NOT</b>Successful.</p>";
            echo "Error occurred: " . mysqli_error($link);
            return 0;
        }

    }  // close store_token_for_user($userEmail, $token, $link)

    function validate_cookie( $link ):bool
    {
        //  tests that a cookie has been set - then matches the token
        // from the browser cookie to the token stored in the db for that user
        // uses the reverse of process used to create the cookie to break it down

        //echo "Inside function validate_cookie, cookieName is $cookieName, and userEmail is $userEmail on line ".__LINE__." of ".__FILE__.".<br>";

        $longCookie = $this->get_active_cookie('mrdbid');

        if( $longCookie )
        {
            // echo "<br>Line ".__LINE__." of ".__FILE__." unedited cookie:<br> $longCookie<br>";

            // using get_active_cookie function so do not have to  wait for page reload to
            // find out if cookie is set - it returns cookie plus from browser

            list( $userID, $token, $mac) = explode(':', $longCookie);

            // echo "userID is $userID, token is:<br> $token<br>and mac is:<br> $mac<br>   on Line ".__LINE__." of ".__FILE__."<br>";
        }

        $secretKey = SECRET_KEY;

        //created with this process
        //  $cookieValue = $userEmail . ':' . $token;
        //  $mac = hash_hmac('sha256', $cookieValue, SECRET_KEY);
        //  $cookieValue .= ':' . $mac;

        if (!hash_equals(hash_hmac('sha256', $userID . ':' . $token, SECRET_KEY), $mac))
        {
            // echo "NOT hash_equals, so NOT OK to log in on ".__LINE__.".<br>";
            return false;
        }
        else
        {
            return true;
        }

        $usertoken = $this->fetch_token_by_userID($link, $userID );

        // userToken is from database
        // token is from browser
        //echo "on line ".__LINE__." usertoken;<br>$usertoken<br>$token.<br>";

        if (hash_equals($usertoken, $token))
        {
            // echo "hash_equals, so OK to log in on ".__LINE__.".<br>";
            return 1;
        }
        else
        {
            return 0;
        }

    }  // close function validate_cookie


    function fetch_token_by_userID($link, $userID ):string
    {
        //echo "in function, fetch_token_by_userID, UserID is $userID ".__LINE__.".<br>";

        /*
        Note: Do not use the token or combination of user and token to look up a record in your database. Always be sure to fetch a record based on the user and use a timing-safe comparison function to compare the fetched token afterwards. The hash_equals() is to prevent timing attacks.
        */
        $returnedToken = '';


        $query = "SELECT tokens.token_token FROM tokens WHERE tokens.token_user = '$userID'";

        $result = mysqli_query( $link, $query);

        if(!$result)
        {
            echo "Database not currently available. Please try again later L".__LINE__.".<br>";
        }
        else
        {
            // $row = mysqli_fetch_row($resultPolls);

            $rowNum = mysqli_num_rows( $result );
            // echo "rowNumPolls is $rowNumPolls L".__LINE__.".<br>";

            if( $rowNum == 0 )
            {
                // echo "No token was returned L".__LINE__.".<br>";
                return $returnedToken;
            }
            else
            {
                //echo "rowNum is $rowNum on line ".__LINE__.".<br>";
                $rowAnswers = mysqli_fetch_row($result);
                $returnedToken  = $rowAnswers[0];

                $tokenLength = strlen($returnedToken);
                // echo "Returned token: $returnedToken <br> Length is $tokenLength on Line ".__LINE__." of ".__FILE__." <br>";
                return $returnedToken;
            }
        }
    }    // close  function fetch_token_by_userID($link, $userID )




    function get_active_cookie($name)
    {
        $cookies = array();
        $headers = headers_list();
        // see http://tools.ietf.org/html/rfc6265#section-4.1.1
        foreach($headers as $header)
        {
            if (strpos($header, 'Set-Cookie: ') === 0)
            {
                $value = str_replace('&', urlencode('&'), substr($header, 12));
                parse_str(current(explode(';', $value, 1)), $pair);
                $cookies = array_merge_recursive($cookies, $pair);
            }
            // echo "header $header on line ".__LINE__." of ".__FILE__.".<br>";
        }

        //echo "After loop header $header on line ".__LINE__." of ".__FILE__.".<br>";
        // if no cookie is set - will return Set-Cookie
        return $header;
    }  // close function get_active_cookie($name)





    function match_cookie( $link, $browserInfo )
    {
        // match_cookie checks that a cookie from the browser
        // matches a token stored in the db for that user
        // returns userid if matches

        //echo "Inside function match_cookie, browserInfo is $browserInfo on line ".__LINE__." of ".__FILE__.".<br>";

        list ($userID, $browserToken, $mac) = explode(':', $browserInfo);

        // echo "after explode, userID is $userID,<br>  browserToken is:<br> $browserToken<br> and mac is:$mac<br> on Line ".__LINE__." of ".__FILE__."<br>";

        //if (!hash_equals(hash_hmac('sha256', $userID . ':' . $browserToken, SECRET_KEY), $mac))
        //{
        //    echo "NOT hash_equals, so NOT OK to log in on ".__LINE__.".<br>";
        //   return false;
        // }

        if (!hash_equals(hash_hmac('sha256', $userID . ':' . $browserToken, SECRET_KEY), $mac))
        {
            echo "NOT hash_equals on Line ".__LINE__." of ".__FILE__.".<br>";
            return 0;
        }
        else
        {
            // echo "hash_equals YES on Line ".__LINE__." of ".__FILE__.".<br>";
        }

        $databaseToken = $this->fetch_token_by_userID( $link, $userID );

        if( !$databaseToken )
        {
            // echo "No databaseToken returned  on Line ".__LINE__." of ".__FILE__.".<br>";
            return 0;   // no match has been entered into database
        }

        // databaseToken is from database
        // echo "on line ".__LINE__." of ".__FILE__." token;<br>$databaseToken<br>$browserToken.<br>";

        // $dbTokenLength      = strlen( $databaseToken);
        //$browserTokenLength = strlen( $browserToken);
        //echo "Token from database: $dbTokenLength<br>
        //      Token from browser:  $browserTokenLength.<br>";

        if (hash_equals($databaseToken, $browserToken))
        {
            // echo "hash_equals and userID is $userID, so OK to log in on ".__LINE__.".<br>";
            return $userID;
        }
        else
        {
            //echo "NOT hash_equals and userID is $userID, so NOT OK to log in on ".__LINE__.".<br>";
            return 0;
        }
        // echo "Gets to end and nothing?<br>";

    }  // close function match_cookie($link)

    function all_page_pre_open_check( $link )
    {
        if( isset($_SESSION['member'])  )
        {
            $sessionMember =  $_SESSION['member'];

            //echo "Session member is $sessionMember on line ".__LINE__." of ".__FILE__.".<br>";

            $o_member = new member();
            $id = $o_member->get_member_id_by_name( $link, $sessionMember );
            $_SESSION['id'] = $id;
        }
        elseif( isset( $_COOKIE['mrdbid'] ) )
        {
            //echo "checking in all_page_pre_open_check on line ".__LINE__." of ".__FILE__.".<br>";
            // all we know is cookie info at this point - so have to get it
            //echo "cookie is set! on line ".__LINE__." of ".__FILE__."<br>";

            $cookieInfo = $_COOKIE['mrdbid'];
            //echo "cookieInfo is $cookieInfo on line ".__LINE__." of ".__FILE__.".<br>";

            // match browser cookie to db for this member
            if( $loggedIn = $this->match_cookie( $cookieInfo, $cookieInfo) )
            {
                $o_member = new member();
                $memberName = $o_member->get_member_name_by_id( $loggedIn );

                // echo "memberName is $memberName on line ".__LINE__." of ".__FILE__.".<br>";
                $_SESSION['member'] = $memberName;  // matches so set session
                $_SESSION['id'] = $loggedIn;

                 //echo "match_cookie called from line ".__LINE__." of ".__FILE__.".<br >";
                //echo "You are logged in as $loggedIn on Line ".__LINE__." of ".__FILE__."<br>";
            }
            else
            {
                 echo "Cookie is set, but does not match current user on line ".__LINE__." of ".__FILE__.".<br>";
            }


        }
    }      // close function all_page_pre_open_check(  )


    function delete_active_token_from_user( $link, $userID ):int
    {
        // sql to delete a record
        $sql = "DELETE FROM tokens WHERE token_user = '$userID'";

        if ($link->query($sql) === TRUE )
        {
             //echo "Token deleted successfully on line ".__LINE__." of ".__FILE__."";
            return 1;

        }
        else
        {
            //echo "Error deleting token: " . $link->error;
            return 0;
        }
    }  // close delete_active_token_from_user( $link, $userID )



    function get_userID_from_cookie(  )
    {
        $cookieValue = $_COOKIE['mrdbid'];

        list ($userID, $token, $mac) = explode(':', $cookieValue);

        //echo "after explode, cookieValue is $cookieValue,<br> userID is $userID,<br>  token is:<br> $token<br> and mac is:$mac<br> on Line ".__LINE__." of ".__FILE__."<br>";

        return $userID;
    }  // close function get_userID_from_cookie()

    function get_member_type( $link, $memberID):int
    {
        $queryName = "SELECT member.member_type  FROM member WHERE member.member_id = '$memberID'";

        $resultName = mysqli_query($link, $queryName);

        $rowCt =  mysqli_num_rows( $resultName );
        // printf("Select returned %d rows on Line 933 ckIfExistingSimilarName.<br>", $rowCt );

        if($resultName == FALSE)
        {
            echo "Database not available, try again later L".__LINE__.".</br>";
            
        }
        else
        {
            if( $rowCt > 0 )
            {
                $rowAnswers = mysqli_fetch_row($resultName);
                return $rowAnswers[0];
            }
            else
            {
                echo "No match in database to member ID: $memberID.<br>";
                return 0;
            }
        }
    }  // close function get_member_type( $link, $memberID )

    function get_member_id_by_name_page_version( $link, $name )
    {
        $queryName = "SELECT member_id FROM member WHERE member_name = '$name'";

        $resultLog = mysqli_query($link, $queryName);

        if($resultLog == FALSE)
        {
            echo "Database not available, try again later L".__LINE__.".</br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $resultLog );
            if( $rowCt > 0 )
            {
                $rowAnswers = mysqli_fetch_row($resultLog);
                $memberID  = $rowAnswers[0];
                return $memberID;
            }
            else
            {
                echo "No match in database to name: $name.<br>";
                return 0;
            }
        }
    }  // close function get_member_id_by_name_page_version( $link, $name )

    function get_member_name_from_id( $link, $id )
    {
        $queryName = "SELECT member_name FROM member WHERE member_id = '$id'";
    
        $resultLog = mysqli_query($link, $queryName);
    
        if($resultLog == FALSE)
        {
            echo "Database not available, try again later L".__LINE__.".</br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $resultLog );
            if( $rowCt > 0 )
            {
                $rowAnswers = mysqli_fetch_row($resultLog);
                $memberName  = $rowAnswers[0];
                return $memberName;
            }
            else
            {
                echo "No match in database to id: $id.<br>";
                return 0;
            }
        }
    }  // close function get_member_name_from_id( $link, $id )

    function get_member_name_from_email( $link, $email )
    {
        $queryName = "SELECT member_name FROM member WHERE member_email = '$email'";
    
        $resultLog = mysqli_query($link, $queryName);
    
        if($resultLog == FALSE)
        {
            echo "Database not available, try again later L".__LINE__.".</br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $resultLog );
            if( $rowCt > 0 )
            {
                $rowAnswers = mysqli_fetch_row($resultLog);
                $memberName  = $rowAnswers[0];
                return $memberName;
            }
            else
            {
                echo "No match in database to email: $email.<br>";
                return 0;
            }
        }
    }  // close function get_member_name_from_email( $link, $email )

    function get_member_email_from_id( $link, $id )
    {
        $queryName = "SELECT member_email FROM member WHERE member_id = '$id'";
    
        $resultLog = mysqli_query($link, $queryName);
    
        if($resultLog == FALSE)
        {
            echo "Database not available, try again later L".__LINE__.".</br>";
        }
        else
        {
            $rowCt =  mysqli_num_rows( $resultLog );
            if( $rowCt > 0 )
            {
                $rowAnswers = mysqli_fetch_row($resultLog);
                $memberID  = $rowAnswers[0];
                return $memberID;
            }
            else
            {
                echo "No match in database to id: $id.<br>";
                return 0;
            }
        }
    }  // close function get_member_email_from_id( $link, $id )
    
    function save_server_data( ): void
    {
       
       $server_self = $_SERVER['PHP_SELF'];
        echo "<br>server_self: $server_self<br>";

    }

    function getUserIpAddr()
    {
        // 10-17-2022 https://www.w3docs.com/snippets/php/how-to-get-the-client-ip-address-in-php.html
        // $ip_address = gethostbyname("www.google.com");
        
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }  // close function getUserIpAddr()


    
}  // close class page