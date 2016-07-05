<?php

class MySQL {
   var $hostname;
   var $username;
   var $password;
   var $database;
   var $connection;

   function __construct($hostname, $username, $password, $database) {
      $this->hostname = $hostname;
      $this->username = $username;
      $this->password = $password;
      $this->database = $database;
   }

   function connect() {
      $this->connection = new mysqli($this->hostname, $this->username, $this->password, $this->database);
      
   }
}

$mysqli = new mysqli($db['hostname'], $db['username'], $db['password'], $db['database']);
   if($mysqli->connect_errno)
      die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);



   if(!$res = $mysqli->query($sql)) {
      die("ERROR: " . $mysqli->error);
   }


?>
