<?php
   function dprint_r($var) {
      echo "<pre>";
      print_r($var);
      echo "</pre>";
   }

   function getResultAsArray($mysqli, $sql) {
      $result = $mysqli->query($sql);
      $array = array();
      while($row = $result->fetch_row())
         $array[] = $row;
      return $array;
   }

?>
