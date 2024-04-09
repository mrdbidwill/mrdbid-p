<?php
session_start();
$receivedTime = time();   // for robot check
// original edit 10-25-2022  - copied here 7-30-2023
//last edit 4-5-2024

    require_once("../../info/define.php");
    require_once("../../info/class_member.php");
    require_once("../../info/class_db.php");
    require_once("../../info/class_page.php");
    
    
    $o_page      = new page();
    $o_db        = new db();
    $o_member    = new member();
    
    $index = 2;
    $title  = "MRDBID Member Page";
    $author = "Will Johnston";
    $keyWords = "mushroom database identification, fungi database, mushroom database, mushroom identification, fungi identification";
    $description = "MRDBID Member Page";
    $heading = "MRDBID Member Page";
    $showAds = 'n';
    $css     = 'y';
   
    $printMayBeRobot          = 0;
    $printRegistrationRetry   = 0;
    $thatNameNotAvailable     = 0;
    $thatEmailNotAvailable    = 0;
    $passwordNotValid         = 0;
    $passwordErr              = 0;
    $nameRegistered           = 0;
    $unsuccessfulRegistration = 0;
    $couldNotBeLoggedIn       = 0;
    $notAuthorized            = 0;
    $successfulRegister       = 0;
    
    
    $admin_regular_login_submitted      = 0;
    $admin_login_remember_me_submitted  = 0;
    $admin_did_not_set_new_cookie       = 0;
    
    $captchaResult = 1;   // review this later

    $o_db = new db();
    $link = $o_db->connect_database(  );
   
    // Check connection
    if (mysqli_connect_errno())
    {
       echo "Failed to connect to MySQL: " . mysqli_connect_error()." Line ".__LINE__." of ".__FILE__."<br />";
    }
    else
    {
        // echo "<br /> Connected to database Line ".__LINE__." of ".__FILE__.".<br />";
    }
  

    if( (isset( $_POST['submitRegister'] ))  ) // check for new registration
    {
      
       // echo "Registering on  ".__LINE__." of ".__FILE__.".<br />";
      
      $submittedTime = $_POST['timestamp'];
      //echo "Submitted time is $submittedTime.<br/>";      
      // received time is set at top of this page right after session start
      // echo "Received time is $receivedTime.<br/>"; 
      
      $elapsedTime = ( $receivedTime - $submittedTime ) ;
      
      if( $elapsedTime < 6 ) // must be robot  - had 5 but still got through
      { 
         $printMayBeRobot = 1;  // print out robot form below
      }   
       //echo "Elapsed time is $elapsedTime seconds.<br />";    
      
      // echo "Register submitted on line ".__LINE__." of ".__FILE__.".<br />";
   
      if( ( $_POST['registerMemberName'] == "") || ( $_POST['registerMemberEmail'] == "" ) ){ 
         // member did not enter anything in name OR email
         $printRegistrationRetry = 1;
      }
      else
      { 
         // check for duplicate name and email 
         if( (isset( $_POST['registerMemberName'] ) ) && (isset(  $_POST['registerMemberEmail']  ) ) && (isset(  $_POST['registerMemberPassword']  ) ) && (isset(  $_POST['registerConfirmMemberPassword']  ) ) )
         {
         
          // echo "Register form variables are set, and NOT empty on line ".__LINE__." of ".__FILE__.".<br />";
            
            $memberName   = $_POST['registerMemberName'];
            $memberEmail  = $_POST['registerMemberEmail'];
      
            if( !$o_member->check_name_available( $link, $memberName ) )  // name already taken print message out below
            {
               //echo "Member name:  $memberName is not available, please select another.<br /> ";
               $thatNameNotAvailable  = 1;
            }
            elseif( !$o_member->check_email_available( $link, $memberEmail ) )  // email already taken print message out below
            {
               //echo "Member email:  $memberEmail not available, please select another.<br /> ";
               $thatEmailNotAvailable  = 1;
            } 
            elseif( !$o_member->validate_password( ) )  
            {
               // $val_pw_return = $o_member->validate_password( );
               //echo "returned from validate password is $val_pw_return.<br />";
               
               //echo "Member password is not valid on line ".__LINE__." of ".__FILE__.".<br />";
               $passwordNotValid  = 1;
            }                    
            else
            {
               if( $o_member->add_member( $link ) )
               { 

                  // if successful this far - do not log in here
                  // advise member to check email and respond -
                  // link will take new member to log in page
                  
                  // if successfully added register the member id
                  // $_SESSION['member'] = $memberName;
 
                  // test
                  // $loggedIn = $_SESSION['member']; 
               
                  // if( isset( $_POST['rememberMe']  ) )  // if want to keep logged in - set cookie
                 // {
                    // echo "Register AND rememberME ".__LINE__." of ".__FILE__.".<br />";
                     // get member id
                 //    $memberID = $o_member->get_member_id( $memberEmail );
                 //    $o_page->set_new_cookie($memberID); 
                 //    $_SESSION['id'] = $memberID;
                 // } 
                    
                  //$nameRegistered = 1;
                  //echo "$memberName is registered.<br />";

                  // get member id
                  $memberID = $o_member->get_member_id( $link, $memberEmail );
                  
                  //$_SESSION['id'] = $memberID;
            
                  $successfulRegister = 1;  // print message below in body
                   
                   //echo "<p><b>Thank you!</b></p>
                  // <p>Your member registration information has been entered.</p>
                  //<p>You will receive an email sent to the address you just entered. Click on the link in the email to complete your registration.</p>";
                 
                  // all done below approx line 328  
                  $toAddressSelf   = $memberEmail;
                  $subjectSelf     = " Registration Response";
                  $mailContentSelf = "You're almost done!
                    
                  <a href=\"https://www.mrdbid.com/site/validateMember.php?mid=<?php echo $memberID; ?>\">Click here to complete your registration.</a>";
                  
                  if( PRODUCTION == "yes" )
                  {
                     $fromAddressSelf = "From:  comment@mrdbid.com";
                  }
                  else
                  {
                     $fromAddressSelf = "From:  willgb9999@gmail.com";
                  }
                  
                  // mail($toAddressSelf, $subjectSelf, $mailContentSelf, $fromAddressSelf);
               }   
               else
               {
                  // unsuccessful registration
         
                  $unsuccessfulRegistration = 1;
                  //echo "<p>You could not be registered - Line ".__LINE__.".</p>";
               }  
            }  // close else line 83
         }     // close if((isset($_POST['registerMemberName']))&& more L60
      }    // close else line 57
   }   // close if( isset( $_POST['submitRegister'] ) )
   elseif( isset( $_POST['submitLogin'] ) )     // regular login
   {
       $admin_regular_login_submitted  = 1;
       // echo "<p><b>Regular Login</b> submitted ".__LINE__." of ".__FILE__.".</p>";
   
      if( ( isset( $_POST['memberPassword'] ) ) && ( isset( $_POST['memberEmail'] )     ) )
      {
         $memberPassword = $_POST['memberPassword']; 
         $memberEmail    = $_POST['memberEmail']; 
            
         $memberName = $o_page->get_member_name_from_email( $link, $memberEmail );

      
         // echo "memberEmail is $memberEmail ".__LINE__." of ".__FILE__.".<br />";
         if( !$o_member->login( $link, $memberPassword, $memberEmail ) )
         { 
            $couldNotBeLoggedIn = 1;     
             // echo "<p>You could not be logged in on line ".__LINE__." of ".__FILE__.".<br/>
            // You must be logged in to view this page.</p>";
         }
         else
         {  
            // echo "Should be logged in before ck rememberMe ".__LINE__." of ".__FILE__.".<br />";
         
            // log in and set session 
            $_SESSION['member'] = $memberName;
            
            $memberID = $o_page->get_member_id_by_name_page_version( $link, $memberName );
            $_SESSION['id'] = $memberID;            
            
            // create cookie IF selected remember me
            if( isset( $_POST['rememberMe'] ) )  
            {
               // echo "Login AND rememberMe ".__LINE__." of ".__FILE__.".<br />";
                $admin_login_remember_me_submitted = 1;

                $o_page->set_new_cookie(  $link, $memberID );  // ?
                
               $o_member = new member();
               //$memberID = $o_member->get_member_id( $memberEmail );
               
               if( !$o_page->fetch_token_by_userID( $link, $memberID ) )  // token is NOT cookie - need token to set cookie
               {                                                 // do not set NEW cookie
                  $o_page->set_new_cookie(  $link, $memberID );
                  // echo "Set new cookie ".__LINE__." of ".__FILE__.".<br />";
                   // go to member page
                   header('Location: member_dashboard.php');
               }
               else
               {
                  //  echo "Did <b>NOT</b> set new cookie ".__LINE__." of ".__FILE__.".<br />";
                  $admin_did_not_set_new_cookie = 1;
               }
               
            }
         }
     }
       $member_type = $o_page->get_member_type(  $link, $memberID );
      
  
       if( $member_type == 1 )  // is admin
       {
           // go to admin page
           header('Location: ../admin/admin_dashboard.php');
       }
       else
       {
           // go to member dashboard page
           header('Location: member_dashboard.php');
       }
  
   }   // close       if( isset( $_POST['submitLogin'] ))  -- regular login
   elseif( isset( $_COOKIE['mrdbid'] ) )
   {
       echo "Cookie mrdbid is ALREADY set ".__LINE__." of ".__FILE__.".<br />";
   
      // all we know is A cookie exists at this point
      //  so have to verify if it is same as stored in db
                       
      $cookieInfo = $_COOKIE['mrdbid'];
                  //    echo "cookieInfo is $cookieInfo.  ".__LINE__." of ".__FILE__."<br />";

                 //     echo "match_cookie called from line ".__LINE__." of ".__FILE__.".<br >";      
      // match browser cookie to db for this member
      if( $loggedIn = $o_page->match_cookie(  $link, $cookieInfo ) )
      {
          $name = $o_member->get_member_name_by_id(  $link, $loggedIn );
          
          $_SESSION['member'] = $name; 
          $_SESSION['id']     = $loggedIn;    
          // echo "You are logged in as $name  with id of $loggedIn ".__LINE__." of ".__FILE__."<br />"; 
      }
      else
      {
         // unset everything if a cookie for mrdbid was set
         // and does NOT match THIS user
         // echo "Deleting cookie on ".__LINE__." of ".__FILE__."<br />";
         // delete cookie using same as set - except time
         setcookie( "mrdbid", "", 1, "/", "", 0 );
         session_unset();
         session_destroy();
         
      }
   }           // close if is set $_COOKIE
   elseif( isset( $_SESSION['member'] ) )
   {
      //echo "Session is set ".__LINE__." of ".__FILE__." and it is ".$_SESSION['member'].".<br />";
      
      $sessionInfo = $_SESSION['member'];
      
      echo "<br />sessionInfo:  $sessionInfo on line ".__LINE__." of ".__FILE__."<br />";

       $memberID    = $o_page->get_member_id_by_name_page_version(  $link, $sessionInfo );
       $memberEmail = $o_page->get_member_email_from_id(  $link, $memberID );

      $_SESSION['id'] = $memberID;

      $member_type = $o_page->get_member_type(  $link, $memberID );

      if( $member_type === '1' )
          {
              echo "<br />You are <b>ADMIN USER</b> on line ".__LINE__." of ".__FILE__."<br >";
              $_SESSION['admin_user'] = $memberID;
          }
      
      // echo "You are logged in as $sessionInfo  with id of $memberID ".__LINE__." of ".__FILE__."<br />";       
      // echo "session member variable is $sessionInfo on line ".__LINE__." of ".__FILE__.".<br />";
   }  // close if( isset( $_SESSION['member'] ) )
   else
   {
      echo "You are not logged in on line (".__LINE__." ).<br />";
      
   }

    $o_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );
?> 
   <h2>Member Page</h2>

   <?php
   
   if($printMayBeRobot )
   {
      ?>
         <form action="member_register.php" method="post" name="exit" >
         
         Are you human?<br/><br/>
         <input type="radio" name="exitBot" value="y" />  Yes
         <br />      <br /> <br />    
         <input type="submit" name = "submit" value="Submit" />
         </form>
      <?php      
   }
    
     $edit = 0; 
     // edit is zero first time meaning NO edit
     // 1 is issue with name - so do not fill it in
     // 2 is issue with pass word
     // 3 is issue with email
   
    if( $printRegistrationRetry )
    {
         echo "Please enter all fields ( ".__LINE__." ).<br />";
      
         $o_member = new member();
         // no need to pre-fill form since nothing entered
         $o_member->display_registration_form( $edit);
    }
    
    if( $thatNameNotAvailable  )
    {
       echo "Member name  <b>$memberName</b> is not available, please select another ( ".__LINE__." ) .<br /> ";
       $o_member = new member();
       $edit = 1;
       // will not pre-fill name on form
       $o_member->display_registration_form( $edit);
    }
    
    
    if( $passwordNotValid  )
    {
        echo "Member password is not valid ( ".__LINE__." ).<br /> ";
       $o_member = new member();
       $edit = 2;
       // will not pre-fill password on form
       $o_member->display_registration_form( $edit);       
    }    
    
    if( $thatEmailNotAvailable  )
    {
        echo "Member email:  $memberEmail is already registered.<br /> If that is your email, sign in with that existing account. If not, input your correct email address. ( ".__LINE__."  ) .<br />)";
       $o_member = new member();
       $edit = 3;
       // will not pre-fill email on form
       $o_member->display_registration_form( $edit);       
    } 
       
    
    if( $nameRegistered )
    {
       echo "$memberName is registered ( ".__LINE__." ).<br />";
    }
    
    
    if( $unsuccessfulRegistration )
    {
       echo "<p>You could not be registered ( ".__LINE__." ).<br/>";
    } 
    
    if( $couldNotBeLoggedIn )
    {
       echo "<p>You could not be logged in.<br/>You must be logged in to view this page( ".__LINE__." ).</p>";
    }
    
    if( $notAuthorized )
    {
       echo "<p>You are not authorized to enter the  Member area ( ".__LINE__." ).</p>";
    }

    if( $admin_regular_login_submitted && $member_type === '1' )
    {
        echo "<p><b>Regular Login</b> submitted ( ". __LINE__ ." ).</p>";
    }

    if( $admin_login_remember_me_submitted && $member_type === '1' )
    {
        echo "Set new cookie ( ".__LINE__." ).<br />";
    }

    if( $admin_did_not_set_new_cookie && $member_type === '1' )
    {
        echo "Did <b>NOT</b> set new cookie ( ".__LINE__." ).<br />";
    }

   
   if(  $successfulRegister )
   {
      echo "<p><b>Thank you!</b></p>
      <p>Your   member registration information has been entered.</p>
      <p>You will receive an email sent to the address you just entered. Click on the link in the email to complete your registration and log in.</p>"; 
      
      ini_set('SMTP','localhost');
      ini_set('smtp_port',465);
                  
      $toAddress   = $memberEmail;
      $subject     = "  Registration Response";

      
      if( PRODUCTION == "yes" )
      {
         $mailContent = "You're almost done! Click here to complete your    registration:  
      http://www.mrdbid.com/site/validate_member.php?mid=".$memberID." .";
         $fromAddress = "From:  comment@mrdbid.com";
      }
      else
      {
         $mailContent = "You're almost done! Click here to complete your registration:  
      http://localhost/public_html/site/validate_member.php?mid=".$memberID." .";
         $fromAddress = "From:  willgb9999@gmail.com";
      }
      
      $mailMember =  mail($toAddress, $subject, $mailContent, $fromAddress); 
      
      // echo "Mail to member returned: $mailMember on line ".__LINE__." of ".__FILE__.".<br />";
      
      
      $toAddressSelf   = "willgb54@yahoo.com";
      $subjectSelf     = "New Member";
      $mailContentSelf = "Registered, but not yet validated";
      
      if( PRODUCTION == "yes" )
      {
         $fromAddressSelf = "From:  comment@mrdbid.com";
      }
      else
      {
         $fromAddressSelf = "From:  willgb9999@gmail.com";
      }
      
      $mailSelf = mail($toAddressSelf, $subjectSelf, $mailContentSelf, $fromAddressSelf);       
      
      //echo "Mail to self returned: $mailSelf on line ".__LINE__." of ".__FILE__.".<br />";
   }
   else
   {
      $notAuthorized = 1;
      // only setting the variable here
   }
    
      
?>   

<?php
   $o_page->close_page( $index );
?>