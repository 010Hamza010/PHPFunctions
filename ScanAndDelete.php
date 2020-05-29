<?php

/*
      ///////////////////////////////////////////////////////////////////
     //                                                               //
    //                Scan file and delete php script                //
   //                  Created By: Hamza -__-                       //
  ///////////////////////////////////////////////////////////////////
*/
function ScanAndDelete($file)
{
  //read the file
  $file_content1 = fopen($file, 'r');
  //put all the file content in 1 var
  $content = '';
  while ($file_content_read = fgets($file_content1)) {
    $content .= $file_content_read;
  }
  //delete php script
  $content = preg_replace('#<\?php[\S\s]*?\?>|<\?php[\S\s]*#', '', $content);
  //close file

  fclose($file_content1);

  //write in the file

  $file_content2 = fopen($file, 'w');

  fputs($file_content2, $content);

  //close the file

  fclose($file_content2);

}

?>
