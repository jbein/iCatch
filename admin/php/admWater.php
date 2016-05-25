<?php
   $waters = $mysqli->query("SELECT * FROM `WATER` ORDER BY `NAME`");

   if(isset($_POST['newWaterSubmit'])) {
      $sql = "INSERT INTO `WATER` (`NAME`, `CODE`) VALUES ('".$_POST['newWaterName']."', '".$_POST['newWaterCode']."')";
      $mysqli->query($sql);
   }
   elseif(isset($_POST['delWaterSubmit'])) {
      $sql = "DELETE FROM `WATER` WHERE `WID`='".$_POST['delWaterID']."'";
      $mysqli->query($sql);
   }
   elseif(isset($_POST['saveWaterSubmit'])) {
      $sql = "UPDATE `WATER` SET `NAME`='".$_POST['saveWaterName']."', `CODE`='".$_POST['saveWaterCode']."' WHERE `WID`='".$_POST['saveWaterID']."'";
      $mysqli->query($sql);
   }

?>

<form action="" method="post" name="admType">
  <h4>New Water</h4>
  Name: <input type="text" name="newWaterName" /><br />
  Code: <input type="text" name="newWaterCode" /><br />
  <input type="submit" name="newWaterSubmit" value="Add" /><br />

  <h4>Delete Water</h4>
  <?php genSelect("delWaterID", $waters, "WID", "NAME"); ?>
  <input type="submit" name="delWaterSubmit" value="Delete" /><br />

  <h4>Edit Water</h4>
  <?php genSelect("editWaterID", $waters, "WID", "NAME");
     echo " <input type=\"submit\" name=\"editWaterSubmit\" value=\"Edit\" /><br />\r\n";

     if(isset($_POST['editWaterSubmit'])) {
        foreach($waters as $water) {
           if($water['WID'] == $_POST['editWaterID']) {
              echo "<input type=\"text\" name=\"saveWaterName\" value=\"".$water['NAME']."\" /><br />\r\n";
              echo "<input type=\"text\" name=\"saveWaterCode\" value=\"".$water['CODE']."\" /><br />\r\n";
              echo "<input type=\"hidden\" name=\"saveWaterID\" value=\"".$water['WID']."\" />\r\n";
              echo "<input type=\"submit\" name=\"saveWaterSubmit\" value=\"Save\" />\r\n";
           }
        }
     }
  ?>
</form>
