<?php
  

      $returnedLink = mysqli_connect( "localhost", "root", "moon1Dog", "MBList" );
      
      // check connection       
      if ( mysqli_connect_errno() ) {
      printf("Connect failed: %s\n", mysqli_connect_errno());
      exit();
      }
      else 
      {
         //echo "You are connected.<br>";
      // return $link
      }
    
   //$keyword = $_POST['keyword'].'%';
   $keyword = $_POST['keyword'];
   
    // echo "keyword is $keyword Line ".__LINE__.".<br>";   
   
   
   $sql = "SELECT * FROM list  WHERE Taxon_name LIKE '$keyword%' ORDER BY Taxon_name ASC LIMIT 0, 24";
   
   $result = mysqli_query( $returnedLink, $sql);
                     
      if(!$result)
      {
         echo "Database not currently available. Please try again later L".__LINE__.".<br>";
      }
      else
      { 
         // var_dump($result); 
         
         while ($row = $result->fetch_row())
         {
            // printf ("%s (%s)\n", $row[0], $row[1]);
            $Id   = $row[0];
            $input_fungi_name = $row[1];
            
            echo '<p class="fungi_name" onclick="set_fungi_name(\''.str_replace("'", "\'", $input_fungi_name).'\')">'.$input_fungi_name.'</p>';

         }
      }  
?>