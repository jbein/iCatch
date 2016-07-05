<?php
   require_once("../lib/conf.inc.php");

   $mysqli = new mysqli($db['hostname'], $db['username'], $db['password'], $db['database']);
   if($mysqli->connect_errno)
      die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);

   $sql = "INSERT INTO `CATCH` (`FID`, `WID`, `BID`, `LAT`, `LNG`, `LENGTH`, `WEIGHT`, `MISC`, `BDETAIL`) 
                        VALUES ('".$_POST['fish']."', 
                                '".$_POST['water']."',
                                '".$_POST['bait']."',
                                '".$_POST['lat']."',
                                '".$_POST['lng']."',
                                '".$_POST['length']."',
                                '".$_POST['weight']."',
                                '".$_POST['misc']."',
                                '".$_POST['bdetail']."')";
   $mysqli->query($sql);
?>
