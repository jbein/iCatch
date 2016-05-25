<?php
class MySQL {
   var $hostname;       //MySQL Server
   var $username;       //MySQL Username
   var $password;       //MySQL Password
   var $database;       //MySQL Database
   var $connection;

   var $lastSQL;
   var $result;
   var $resultArray;
   var $resultRaw;
   var $records;
   var $affected;

   public function MySQL($_hostname='localhost', $_username, $_password, $_database) {
      $this->hostname = $_hostname;
      $this->username = $_username;
      $this->password = $_password;
      $this->database = $_database;
   }

   public function connect($_persistant = false) {
      if($_persistant)
         $this->connection = mysql_pconnect($this->hostname, $this->username, $this->password);
      else
         $this->connection = mysql_connect($this->hostname, $this->username, $this->password);

      if($this->connection === false) {
         $error  = "ERROR: Could not connect to server! <br />\n";
         $error .= mysql_error($this->connection);

         trigger_error($error);
         return false;
      }

      return $this->selectDB();
   }

   public function disconnect() {
      if($this->connection) {
         mysql_close($this->connection);
      }
   }
   
   private function selectDB() {
      if(mysql_select_db($this->database, $this->connection) === false) {
         $error  = "ERROR: Database ist not present!";
         $error .= mysql_error($this->connection);

         trigger_error($error);
         return false;
      }

      return true;
   }

   private function SecureData($data) {
      if(is_array($data)) {
         foreach($data as $key=>$val) {
            if(!is_array($data[$key])) {
               $data[$key] = mysql_real_escape_string($data[$key], $this->connection);
            }
         }
      }
      else {
         $data = mysql_real_escape_string($data, $this->connection);
      }

      return $data;
   }

   public function sQuery($_sql) {
      $this->lastSQL = $_sql;
      
      if($this->resultRaw = mysql_query($_sql, $this->connection)) {
         $this->result = array();
         $this->records  = @mysql_num_rows($this->resultRaw);
         while($this->result[] = mysql_fetch_row($this->resultRaw));
         array_pop($this->result);
 
         return $this->result;
      }
   }

   public function doSQL($_sql, $_assoc=true) {
      $this->lastSQL = $_sql;

      if($this->result = mysql_query($_sql, $this->connection)){
         $this->records  = @mysql_num_rows($this->result);
         $this->affected = @mysql_affected_rows($this->connection);
         
         if($this->records > 0) {
            $this->toArray($_assoc);
            return $this->resultArray;
         }
         else {
            return true;
         }
      }
      else {
         $error  = "ERROR: Some Error occurs while executing the SQL-Statement! <br />\n";
         $error .= mysql_error($this->connection);
         trigger_error($error);
         return false;
      }
   }

   private function toArray($_assoc=true) {
      $this->resultArray = array();
      if($_assoc) {
         while($this->resultArray[] = mysql_fetch_assoc($this->result));
      }
      else {
         while($this->resultArray[] = mysql_fetch_row($this->result));
      }

      array_pop($this->resultArray);
      return $this->resultArray;
   }
}
?>
