<?php

    require_once("../../info/define.php");
    require_once("../../info/class_db.php");
    $o_db        = new db();
    $link = $o_db->connect_database(  );

    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error()." Line ".__LINE__." of ".__FILE__."<br>";
    }
    
    //$keyword = $_POST['keyword'].'%';
    $keyword = $_POST['keyword'];
   
    // echo "keyword is $keyword Line ".__LINE__.".<br>";
   
   
   $sql = "SELECT * FROM color  WHERE id = $keyword";
   
   $result = mysqli_query( $link, $sql);
                     
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
            $id   = $row[0];
            $latin_name = $row[1];
            
            echo '<p> onclick="set_color(\''.str_replace("'", "\'", $id).'\')">'.$id.'</p>';

         }
      }  
?>