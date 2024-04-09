<?php
session_start();

// last edit 3-29-2022
   require_once("../../info/define.php");
   require_once("../../info/class_form.php");
   require_once("../../info/class_db.php");
   require_once("../../info/class_member.php");
   require_once("../../info/class_page.php");

 
   $page  = new page( );
   $o_member = new mushroom_member();

   $index = 2;

   // echo "Production is ".PRODUCTION." ******.";
   $title  = "Form  Page";
   $author = "Will Johnston";
   $keyWords = ", fungi, fungus";
   $description = "Form  Page";
   $heading = " 2016";
   $showAds = 'n';

   $css = 'y'; $new_page->open_page( $index, $title, $author, $keyWords, $description, $heading, $showAds, $css );

   $o_form = new mushroom_form();
   $o_member = new mushroom_member();
   $o_db   = new mushroom_db();
   
   
   // check for completion and error check in filledOut function
   // only check for company name is check that something has been entered
   
   $allComplete = $o_form->filledOut( $_POST );
   
   // echo "allComplete is $allComplete on line 36 of form_driver.<br>";   
  
   if( !$allComplete  )
   {
      $edit = "yes";
      $editForName = "no";
      // echo "because allComplete is $allComplete, calling create_driver_form from line 42 form_driver.<br>";
      $o_form->create_driver_form( $edit, $editForName );      
   }
   else
   {     
   
   // check to see if the company name entered is an EXACT match for existing company
   // name in database - if so keep as input - this name is done
 
   // if no exact match - check if similar name exists
 
   // if NO similar name options exist in db AND NO exact name - use original - done
 
   // if similar name option or options exist
   // set editForName variable to company1 and recall create_driver_form 
   // with edit equals yes  print radio list of options near text box
 
   // user can click on one of list OR not which keeps name as originally entered
   //  for a new company  name that will then be entered into db for first time 
   // editForName can be no or company1 or dedicated1 

   $coName               = addslashes(trim($_POST['driverCoName']));
   $editForName          = "no";  // review this
   $exactNameDoesExist   = "";
   $similarNameDoesExist = "";
   $companyNameFinal     = "no";   // company name issues all resolved

   $exactNameDoesExist = $o_form->ckIfExistingExactName( $coName ); 
  
   // see if similar names exist in the database
   //echo "calling ckIFExistingSimilarName on line 74 of class_form.inc.<br >";
   $similarNameDoesExist = $o_form->ckIfExistingSimilarName( $coName );
 
   if( !$exactNameDoesExist && $similarNameDoesExist && $companyNameFinal == "yes"  )
   {
      echo "<p style=\"color:red\">The company name as entered is not an EXACT match in our database. See Company Name Options below. If one of them is not what you want, just click on SUBMIT button at bottom of form, and your company name will be entered as a new company just as you entered it.</p> <br>";
   }
 
   //echo "coName is $coName, coNameRadio is $coNameRadio, editForName is $editForName, exactNameDoesExist is $exactNameDoesExist, similarNameDoesExist is $similarNameDoesExist, companyNameFinal is $companyNameFinal  line 77 of form_driver BEFORE any ifs.<br>";   
   
   $coNameRadio = "Not Set";
   if( isset($_POST['driverCoNameRadio']) )
   {
      $coNameRadio      = addslashes(trim($_POST['driverCoNameRadio']));
      
      if(
        ( $coNameRadio != "x" ) && 
        ( $coNameRadio != "" )  && 
        ( $coNameRadio != "Not Set" )
        )
      { 
         // echo "coNameRadio is $coNameRadio on line 85 of form_driver.<br>";
         $coName = $coNameRadio;
         // user has selected a radio button to use as company name
      }
   }
   
     

   if( $exactNameDoesExist ) 
   {
       // echo "if Number 1 on line 91 of form_driver.<br>";
       // echo "exactNameDoesExist is $exactNameDoesExist.<br>";
       // echo "We have an exact company name on line 91 of form_driver.<br>";
       // echo " editForName is $editForName, exactNameDoesExist is $exactNameDoesExist, similarNameDoesExist is $similarNameDoesExist, companyNameFinal is $companyNameFinal, coName is $coName and coNameRadio is $coNameRadio line 91 of form_driver.<br>";
         
         
       // use it as company name for this driver
       // coName variable is final 
       $companyNameFinal     = "yes";
       
   }
   elseif( ( !$exactNameDoesExist ) && ( !$similarNameDoesExist )   )
   {
      // echo "if Number 2 on line 104 of form_driver.<br>";
      // no exact match  OR similar names in db
      // so will use name as user input in text box
      $companyNameFinal  = "yes";
      // echo " editForName is $editForName, exactNameDoesExist is $exactNameDoesExist, similarNameDoesExist is $similarNameDoesExist, companyNameFinal is $companyNameFinal, coName is $coName and coNameRadio is $coNameRadio line 106 of form_driver.<br>";      
   }
   elseif( ( !$exactNameDoesExist ) && ( $similarNameDoesExist ) && ( $editForName == "company1" )&& ( ( $coNameRadio != "")  || ( $coNameRadio != "Not Set") )  )
   {
      // echo "if Number 3 on line 112 of form_driver.<br>";
      // echo " editForName is $editForName, exactNameDoesExist is $exactNameDoesExist, similarNameDoesExist is $similarNameDoesExist, companyNameFinal is $companyNameFinal, coName is $coName and coNameRadio is $coNameRadio line 111 of form_driver.<br>"; 
   
      // user has selected a radio button option to use as name
      $coName = $coNameRadio;
      $companyNameFinal     = "yes";
      
      //  echo " editForName is $editForName, exactNameDoesExist is $exactNameDoesExist, similarNameDoesExist is $similarNameDoesExist, companyNameFinal is $companyNameFinal, coName is $coName and coNameRadio is $coNameRadio line 117 of form_driver.<br>"; 
   }
   elseif( $coName == $coNameRadio )
   {
           //echo "if Number 4 on line 132 of form_driver.<br>";
      // user has selected radio button and it now matches input text
      $companyNameFinal = "yes";
   
   }   
   elseif(  ( !$exactNameDoesExist ) && ( $similarNameDoesExist ) && ( $coNameRadio != "x") && ( $coNameRadio == "Not Set"  ) )
   {
      //echo "if Number 5 on line 137 of form_driver.<br>";
      // need to edit and offer radio button options to user

      //  echo " editForName is $editForName, exactNameDoesExist is $exactNameDoesExist, similarNameDoesExist is $similarNameDoesExist, companyNameFinal is $companyNameFinal, coName is $coName and coNameRadio is $coNameRadio line 123 of form_driver.<br>";  
       
      $edit = "yes";
      $editForName = "company1";
       
      $o_form->create_driver_form( $edit, $editForName );
       
      // not making any final decision here 
    
   }
   elseif( ( !$exactNameDoesExist ) && ( $similarNameDoesExist ) && ( $coNameRadio == "x") )
   {
      //echo "if Number 6 on line 145 of form_driver.<br>";
      // user has had an opportunity to select a radio button option to use as name
      // but DID NOT so use original input
      $companyNameFinal     = "yes";
      
      // echo " editForName is $editForName, exactNameDoesExist is $exactNameDoesExist, similarNameDoesExist is $similarNameDoesExist, companyNameFinal is $companyNameFinal, coName is $coName and coNameRadio is $coNameRadio line 139 of form_driver.<br>";       
      
   }      
   else
   {
      //echo "if Number 7 on line 159 of form_driver.<br>";
      // error? should not get here
      echo " editForName is $editForName, exactNameDoesExist is $exactNameDoesExist, similarNameDoesExist is $similarNameDoesExist, companyNameFinal is $companyNameFinal, coName is $coName and coNameRadio is $coNameRadio line 161 of form_driver in error?<br>";      
   } 
   
   if( $allComplete && ( $companyNameFinal == "yes") )
   {
      
   if( isset( $_SESSION['id'] ) )
   {   
      $driverMemberID  = $_SESSION['id'];
   }
   else
   {
      exit( "You must be logged in.<br>" );   
   }
   
       
   $driverTaxYear             = addslashes(trim($_POST['driverTaxYear'])); 
   $driverNormalYear          = addslashes(trim($_POST['driverNormalYear'])); 
   $driverExpYears            = addslashes(trim($_POST['driverExpYears'])); 
   $driverAge                 = addslashes(trim($_POST['driverAge']));
   $driverMf                  = addslashes(trim($_POST['driverMf']));  
   $driverCountry             = addslashes(trim($_POST['driverCountry']));
   $driverCitizen             = addslashes(trim($_POST['driverCitizen']));  
   $driverCDLState            = addslashes(trim($_POST['driverCDLState']));  
   // $driverCoName           = addslashes(trim($_POST['driverCoName']));
   $driverCoNameRadio         = "";    // company name is settled by now           
   $driverTypeEmp             = addslashes(trim($_POST['driverTypeEmp']));         
   $driverIncome              = addslashes(trim($_POST['driverIncome']));
   $driverSoloTeam            = addslashes(trim($_POST['driverSoloTeam']));
   $driverPayMethod           = addslashes(trim($_POST['driverPayMethod']));
   $driverTypeJob             = addslashes(trim($_POST['driverTypeJob']));
   $driverUnitPay             = addslashes(trim($_POST['driverUnitPay']));
   $driverLoadType            = addslashes(trim($_POST['driverLoadType']));
   $driverTypeJob             = addslashes(trim($_POST['driverTypeJob']));
   $driverTypeTrlr            = addslashes(trim($_POST['driverTypeTrlr']));
   $driverUnionYn             = addslashes(trim($_POST['driverUnionYn']));  
   $driverAnnualMiles         = addslashes(trim($_POST['driverAnnualMiles']));
   $driverPerDiemDays         = addslashes(trim($_POST['driverPerDiemDays']));
   $driverPDpaid              = addslashes(trim($_POST['driverPDpaid']));   
   $driverValidInfo  = 'y';     // not a form variable - valid until test otherwise
   $jobValidInfo     = 'y';     // not a form variable - valid until test otherwise
   $driverResponded  = 'n';     // not a form variable -  
   

        // get the company IDs 

        $driverCompanyId = "";                     
        $driverCompanyId = $o_form->getCoID($coName );
        $line = __line__; $file = __file__;
        // echo "Company ID is $driverCompanyId on line $line of $file.<br>";  
        
               
        $driverEndZero = "n";       // leave open option to know if all input numbers end in 000 that indicates made up numbers

              $resultIncome  = fmod($driverIncome, 1000 );
              $resultTotalMiles   = fmod($driverAnnualMiles, 1000 );              
              if( ( $resultIncome == 0  ) && ( $resultTotalMiles == 0 )   )
              {
                 $driverEndZero = "y";
                //  echo "This company driver is full of ...<br>";  
              }
          
        /*********************** Enter info into driver table **********************/
			   $query = "INSERT INTO driver   (   driver_id,
                                               driver_member_id,
			                                      driver_tax_year,
                                               driver_normal_year,
                                               driver_experience,
                                               driver_age,
                                               driver_male_female,
                                               driver_country,
                                               driver_citizen,
                                               driver_state,                         driver_company_id,
                                               driver_type_employee,
                                               driver_income,
                                               driver_solo_team,
                                               driver_pay_method,
                                               driver_unit_pay,
                                               driver_load_type,
                                               driver_type_job,
                                               driver_type_trlr,
                                               driver_union_y_n,
                                               driver_annual_miles,
                                               driver_per_diem_days,
                                               driver_per_diem_paid,
                                               driver_responded,
                                               driver_valid,
                                               driver_end_zero,                        driver_date_entered )
			                             VALUES ( '',
                                                  '$driverMemberID',
			                                         '$driverTaxYear',
                                                  '$driverNormalYear', 
                                                  '$driverExpYears',
                                                  '$driverAge',
                                                  '$driverMf',
                                                  '$driverCountry',
                                                  '$driverCitizen',
                                                  '$driverCDLState',
                                                  '$driverCompanyId',
                                                  '$driverTypeEmp',
                                                  '$driverIncome',
                                                  '$driverSoloTeam',
                                                  '$driverPayMethod',
                                                  '$driverUnitPay',
                                                  '$driverLoadType',
                                                  '$driverTypeJob',
                                                  '$driverTypeTrlr',
                                                  '$driverUnionYn',
                                                  '$driverAnnualMiles', 
                                                  '$driverPerDiemDays',
                                                  '$driverPDpaid', 
	                                               '$driverResponded',
                                                  '$driverValidInfo',
                                                  '$driverEndZero',                        now() )";

//---------------------------------------------------------------  
   $o_db = new mushroom_db();   
   $returnedLink =   $o_db->connect_database(  );
         
   $resultInput = mysqli_query( $returnedLink, $query );
      
   if($resultInput == FALSE)
   { 
      echo "Database not available, try again later L".__LINE__." form_driver.</br>";

   }
   else
   {
       
      $line = __line__;  $file = __file__;
      // echo mysqli_affected_rows( $returnedLink )." rows inserted into driver table line $line of $file.<br>";

      $queryID = "SELECT driver.driver_id FROM driver WHERE driver.driver_email = '$driverEmail'"; 
      $resultQueryID = mysqli_query( $returnedLink, $queryID );
      $row =  mysqli_fetch_row($resultQueryID);
      $id = $row[0];
      
      echo "<p><b>Thank you!</b></p>
      <p>Your  driver pay survey information has been entered.</p>
      <p>You will receive an email sent to the address you just entered. Click on the link in the email to complete your survey.</p>";


      $year = $driverTaxYear;
                   
      $toAddressSelf   = $driverEmail;
      $subjectSelf     = " Survey Response";
      $mailContentSelf = "Please click on this link or paste it into your browser window:  
      http://www.webAddress.com/site/validate.php?did=".$id."&year=".$year." .";
      $fromAddressSelf = "From:  comment@webAddress.com";
      mail($toAddressSelf, $subjectSelf, $mailContentSelf, $fromAddressSelf); 
      
      $toAddressSelf   = "willgb54@yahoo.com";
      $subjectSelf     = "TDPay Survey Response";
      $mailContentSelf = "New Survey completed";
      $fromAddressSelf = "From:  comment@webAddress.com";
      mail($toAddressSelf, $subjectSelf, $mailContentSelf, $fromAddressSelf);       
       
   }        
      mysqli_free_result($resultQueryID);
      mysqli_close($returnedLink); 
      //--------------------------------------------------------------------------------                             
    }  // (if $allComplete && ( $companyNameFinal == "yes") ) L190?
    
      
    } // close else from line 57 
   
	$page->close_page( $index );

?>