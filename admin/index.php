<?php
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   echo mysql_error();

   require_once("../lib/mysql.class.php"); 
   require_once("../lib/html.lib.php"); 

   $db['hostname'] = "localhost";
   $db['username'] = "icatch";
   $db['password'] = "icatch";
   $db['database'] = "iCatch";

   $mysqli = new mysqli($db['hostname'], $db['username'], $db['password'], $db['database']);
   if($mysqli->connect_errno)
      die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);

   #$mysql = new MySQL($db['hostname'], $db['username'], $db['password'], $db['database']);
   #$mysql->connect();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
  <title>iCatch - Administration</title>

  <link type="text/css" rel="stylesheet" href="css/style.css" />
</head>

<body>
<div id="menu">
  <a href="index.php?adm=fish">Fish</a> |
  <a href="index.php?adm=water">Water</a> |
  <a href="index.php?adm=catch">Catch</a> | 
</div>

<?php
   if(isset($_GET["adm"])) {
      $a = $_GET["adm"];
      switch($a) {
         case "fish":
            require_once("php/admFish.php");
            break;
         case "water":
            require_once("php/admWater.php");
            break;
         case "catch":
            require_once("php/admCatch.php");
            break;
         default:
            require_once("php/admFish.php");
      }
   }
   else {
      require_once("php/admFish.php");
   }
?>

</body>

</html>

