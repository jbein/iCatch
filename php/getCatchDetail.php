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
   $img = "http://maps.googleapis.com/maps/api/staticmap?center=".$row[5].",".$row[6]."
           &zoom=15&size=400x300&sensor=true&markers=color:red|label:C|".$row[5].",".$row[6];

   echo "<div class=\"modal-header panel-heading\">";
   echo "  <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>";
   echo "  <h4 class=\"modal-title\">Catch Details (#".str_pad($row[0], 7, 0, STR_PAD_LEFT).")</h4>";
   echo "</div>";

   echo "<div class=\"modal-body\">";
   echo "  <div class=\"row\">";
   echo "    <div class=\"col-sm-6 col-md-4\">";
   echo "      <div class=\"thumbnail\">";
   echo "        <img src=\"gallery/fish/".$row[13]."-".$row[16]."-".strtotime($row[4]).".jpg\" alt=\"ZAN-FIX-001\" />";
   echo "        <div class=\"caption\">";
   echo "          <div class=\"form-group\">";
   echo "            <label for=\"catchSpecies\" class=\"control-label\">Species:</label> ".$row[12]."<br />";
   echo "            <label for=\"catchLength\" class=\"control-label\">Length:</label> ".number_format($row[7]/10, 1, ',', '.')." cm<br />";
   echo "            <label for=\"catchWeight\" class=\"control-label\">Weight:</label> ".number_format($row[8], 0, ',', '.')." g<br />";
   echo "            <label for=\"catchWater\" class=\"control-label\">Water:</label> ".$row[15]."<br />";
   echo "            <label for=\"catchDate\" class=\"control-label\">Date:</label> ".date('d-m-Y H:m',strtotime($row[4]))."<br />";
   echo "            <label for=\"catchMisc\" class=\"control-label\">Misc:</label> ".$row[9]."<br />";
   echo "          </div>";
   echo "        </div>";
   echo "      </div>";   
   echo "    </div>";   
   echo "    <div class=\"col-sm-6 col-md-4\">";
   echo "      <div class=\"thumbnail\">";
   echo "        <img src=\"gallery/bait/".$row[19]."".$row[22].".jpg\" alt=\"".$row[20]." ".$row[18]." ".$row[21]."\">";
   echo "        <div class=\"caption\">";
   echo "          <div class=\"form-group\">";
   echo "            <label for=\"baitName\" class=\"control-label\">Name:</label> ".$row[18]."<br />";
   echo "            <label for=\"baitProducer\" class=\"control-label\">Producer:</label> ".$row[20]."<br />";
   echo "            <label for=\"baitColor\" class=\"control-label\">Color:</label> ".$row[21]."<br />";
   echo "            <label for=\"baitLength\" class=\"control-label\">Length:</label> ".number_format($row[22]/10, 1, ',', '.')." cm<br />";
   echo "            <label for=\"baitWeight\" class=\"control-label\">Weight:</label> ".number_format($row[23], 0, ',', '.')." g<br />";
   echo "            <label for=\"baitMisc\" class=\"control-label\">Misc:</label> ".$row[24]."<br />";
   echo "            <label for=\"baitMisc\" class=\"control-label\">Catch-Detail:</label> ".$row[10]."<br />";
   echo "          </div>";
   echo "        </div>";
   echo "      </div>";
   echo "    </div>";   
   echo "    <div class=\"col-sm-6 col-md-4\">";
   echo "      <div class=\"thumbnail\">";
   echo "        <img src=\"".$img."\" alt=\"\" />";
   echo "        <div class=\"caption\">";
   echo "          <div class=\"form-group\">";
   echo "            <label for=\"locationLat\" class=\"control-label\">Latitude:</label> ".$row[5]."<br />";
   echo "            <label for=\"locationLng\" class=\"control-label\">Longitude:</label> ".$row[6]."<br />";
   echo "          </div>";
   echo "        </div>";
   echo "      </div>";
   echo "    </div>";   
   echo "  </div>";   
   echo "</div>";   

   echo "<div class=\"modal-footer\">";
   echo "  <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>";
   echo "</div>";
?>
