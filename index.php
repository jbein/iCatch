<?php
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   echo mysql_error();

   require_once("lib/conf.inc.php");
   require_once("lib/stuff.lib.php");

   require_once("html/head.html");

   if(!empty($_GET["event"])) {
      $e = strtolower($_GET["event"]);
      switch($e) {
         case "list":
            require_once("php/list.php");
            break;
         case "about":
            require_once("html/about.html");
            break;
         default:
            require_once("php/list.php");
      }
   }
   else {
      require_once("php/list.php");
   }

   require_once("html/modals.html");
   require_once("html/foot.html");
?>
