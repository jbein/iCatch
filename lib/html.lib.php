<?php
   function genSelectSelected($_name, $_array, $_id, $_value, $_selectedID) {
      echo "<select name=\"".$_name."\">\r\n";
      foreach($_array as $a) {
         if($a[$_id] == $_selectedID) {
            echo "  <option value=\"".$a[$_id]."\" selected=\"selected\">".$a[$_value]."</option>\r\n";
         }
         else {
            echo "  <option value=\"".$a[$_id]."\">".$a[$_value]."</option>\r\n";
         }
      }
      echo "</select><br />\r\n";
   }

   function genSelect($_name, $_array, $_id, $_value) {
      echo "<select name=\"".$_name."\">\r\n";
      foreach($_array as $a) {
         echo "  <option value=\"".$a[$_id]."\">".$a[$_value]."</option>\r\n";
      }
      echo "</select><br />\r\n";
   }
?>
