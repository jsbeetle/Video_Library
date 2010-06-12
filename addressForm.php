<?php
       
       echo" <html>
                 <head><title> User Name</title></head>
                 <body>";
  
       echo " <p align='center'>
                 <form action='validateForm.php'  method='POST' >
                 <table width='95%' border='0' cellspacing='0' cellpadding='2'> \n";
 
                  foreach ($labels as $fields=>$value)
                 {
                      if (isset($_POST[$field] ) )
                      { $value = $_POST[$field];
                      }
                      else 
                      {
                     $value = "";
                      }
                      echo "<tr><td align='right'> {$labels[$field]} </br></td>
                                 <td><input type='text' name '$field' size '65' maxlength='65' value='$value'> </td></tr>";
                }
                echo " </table>
                  <div align='center'>
                <p><input type='Submit' name='Submit' value='Send'></p></div>
                </form>";
>
                   </body></html>