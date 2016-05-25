<?php
   require_once("../lib/conf.inc.php");
   require_once("../lib/stuff.lib.php");

   $mysqli = new mysqli($db['hostname'], $db['username'], $db['password'], $db['database']);
   if($mysqli->connect_errno)
      die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);

   $sql = "SELECT * FROM `CATCH`
           LEFT JOIN `FISH` ON `CATCH`.`FID`=`FISH`.`FID`
           LEFT JOIN `WATER` ON `CATCH`.`WID`=`WATER`.`WID`
           LEFT JOIN `BAIT` ON `CATCH`.`BID`=`BAIT`.`BID`
           WHERE `CATCH`.`CID`='".$_POST['CID']."'";

   if(!$res = $mysqli->query($sql)) {
      die("ERROR: " . $mysqli->error);
   }

   $row = $res->fetch_row();

/*
   echo "<div class=\"modal-header panel-heading\">";
   echo "  <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>";
   echo "  <h4 class=\"modal-title\">Catch Details (#".str_pad($row[0], 7, 0, STR_PAD_LEFT).")</h4>";
   echo "</div>";
   echo "<div class=\"modal-body\">";
   echo "  <div class=\"form-group\">";
   echo "    <label for=\"species\" class=\"control-label\">Species:</label> ".$row[9];
   echo "  </div>";
   echo "  <div class=\"form-group\">";
   echo "    <label for=\"length\" class=\"control-label\">Length:</label> ".number_format($row[5]/10, 1, ',', '.')." cm";
   echo "  </div>";
   echo "  <div class=\"form-group\">";
   echo "    <label for=\"weight\" class=\"control-label\">Weight:</label> ".number_format($row[6], 0, ',', '.')." g";
   echo "  </div>";
   echo "  <div class=\"form-group\">";
   echo "    <label for=\"water\" class=\"control-label\">Water:</label> ".$row[12];
   echo "  </div>";
   echo "  <div class=\"form-group\">";
   echo "    <label for=\"date\" class=\"control-label\">Date:</label> ".date('d-m-Y H:m',strtotime($row[4]));
   echo "  </div>";
   echo "</div>";
   echo "<div class=\"modal-footer\">";
   echo "  <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>";
   echo "</div>";
*/
?>


<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="..." alt="...">
      <div class="caption">
        <h3>Thumbnail label</h3>
        <p>...</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
</div>
