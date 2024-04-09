<?php
// File Name:  class_db.php
/**
 * Creates db class and functions
 * @author Will Johnston
 * @version 1.0
 * @since 1.0
 * @access public
 * @copyright Will Johnston
 * edited 5-30-2022
 */

require_once("define.php");


class db
{              
     
    function connect_database(  )
    {
        if( PRODUCTION === 'no')
        {
            ini_set('max_execution_time', 0);        
            mysqli_report( MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT ); 
        } 
               
        $link = mysqli_connect( HOST, USER, PASSWORD, DATABASE );
         
        // check connection       
        if ( mysqli_connect_errno() )
        {
            printf("Connect failed: %s\n", mysqli_connect_errno());
            exit();
        }
        else 
        {
            return $link;
        }
     }
    
}