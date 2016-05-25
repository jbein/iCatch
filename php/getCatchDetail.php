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

   echo "<div class=\"modal-header panel-heading\">";
   echo "  <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>";
   echo "  <h4 class=\"modal-title\">Catch Details (#".str_pad($row[0], 7, 0, STR_PAD_LEFT).")</h4>";
   echo "</div>";

   echo "<div class=\"modal-body\">";
   echo "  <div class=\"row\">";
   echo "    <div class=\"col-sm-6 col-md-7\">";
   echo "      <div class=\"thumbnail\">";
   echo "        <img src=\"gallery/fish/".$row[10]."-".$row[13]."-".strtotime($row[4]).".jpg\" alt=\"ZAN-FIX-001\" />";
   echo "        <div class=\"caption\">";
   echo "          <div class=\"form-group\">";
   echo "            <label for=\"catchSpecies\" class=\"control-label\">Species:</label> ".$row[9]."<br />";
   echo "            <label for=\"catchLength\" class=\"control-label\">Length:</label> ".number_format($row[5]/10, 1, ',', '.')." cm<br />";
   echo "            <label for=\"catchWeight\" class=\"control-label\">Weight:</label> ".number_format($row[6], 0, ',', '.')." g<br />";
   echo "            <label for=\"catchWater\" class=\"control-label\">Water:</label> ".$row[12]."<br />";
   echo "            <label for=\"catchDate\" class=\"control-label\">Date:</label> ".date('d-m-Y H:m',strtotime($row[4]))."<br />";
   echo "            <label for=\"catchMisc\" class=\"control-label\">Misc:</label> ".$row[7]."<br />";
   echo "          </div>";
   echo "        </div>";
   echo "      </div>";   
   echo "    </div>";   
   echo "    <div class=\"col-sm-6 col-md-5\">";
   echo "      <div class=\"thumbnail\">";
   echo "        <img src=\"gallery/bait/".$row[16]."".$row[19].".jpg\" alt=\"".$row[17]." ".$row[15]." ".$row[18]."\">";
   echo "        <div class=\"caption\">";
   echo "          <div class=\"form-group\">";
   echo "            <label for=\"baitName\" class=\"control-label\">Name:</label> ".$row[15]."<br />";
   echo "            <label for=\"baitProducer\" class=\"control-label\">Producer:</label> ".$row[17]."<br />";
   echo "            <label for=\"baitColor\" class=\"control-label\">Color:</label> ".$row[18]."<br />";
   echo "            <label for=\"baitLength\" class=\"control-label\">Length:</label> ".number_format($row[19]/10, 1, ',', '.')." cm<br />";
   echo "            <label for=\"baitWeight\" class=\"control-label\">Weight:</label> ".number_format($row[20], 0, ',', '.')." g<br />";
   echo "            <label for=\"baitMisc\" class=\"control-label\">Misc:</label> ".$row[21]."<br />";
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
