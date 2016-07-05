<?php
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   echo mysql_error();

   require_once("../lib/conf.inc.php");
   require_once("../lib/html.lib.php");
   require_once("../lib/stuff.lib.php");

   $mysqli = new mysqli($db['hostname'], $db['username'], $db['password'], $db['database']);
   if($mysqli->connect_errno)
      die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
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
  <a href="index.php?adm=bait">Bait</a> | 
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
         case "bait":
            require_once("php/admBait.php");
            break;
         default:
            require_once("php/admFish.php");
      }
   }
   else {
      require_once("php/admFish.php");
   }
?>
 
  <script src="js/iCatchAdmin.js"></script>
</body>
</html>

