<?php

/*
      ////////////////////////////////////////////////////////////////////
     //                                                                //
    //                Get a unuque key php script                     //
   //                  Created By: Hamza -__-                        //
  //                                                                //
 ////////////////////////////////////////////////////////////////////
*/

function GetUniqueKey($file_extension, $database, $table, $column, $lenght=60)
{
  $str = "abcdefghijklmnopqrstuvwxyz0123456789"; //Write your strings here
  while (1) {
      $Key = '';
      for ($i=0; $i < $lenght; $i++) { 
        $Key .= $str[mt_rand(0,strlen($str)-1)];
      }
      $Name = $Key . "." . $file_extension;
      $check = $database->prepare('SELECT * FROM ' . $table . ' WHERE ' . $column . ' = ?'); //Check if the key exist in the database or not
      $check->execute(array($Name));

      if ($check->rowCount() == 0) {
        break; //Oh great! new key
      }
  }
  return $Name;

}
?>
