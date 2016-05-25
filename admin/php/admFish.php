<?php
   $fishes = $mysqli->query("SELECT * FROM `FISH` ORDER BY `NAME`");

   if(isset($_POST['newFishSubmit'])) {
      $sql = "INSERT INTO `FISH` (`NAME`, `CODE`) VALUES ('".$_POST['newFishName']."', '".$_POST['newFishCode']."')";
      $mysqli->query($sql);
   }
   elseif(isset($_POST['delFishSubmit'])) {
      $sql = "DELETE FROM `FISH` WHERE `FID`='".$_POST['delFishID']."'";
      $mysqli->query($sql);
   }
   elseif(isset($_POST['saveFishSubmit'])) {
      $sql = "UPDATE `FISH` SET `NAME`='".$_POST['saveFishName']."', `CODE`='".$_POST['saveFishCode']."' WHERE `FID`='".$_POST['saveFishID']."'";
      $mysqli->query($sql);
   }

?>

<form action="" method="post" name="admType">
  <h4>New Fish</h4>
  Name: <input type="text" name="newFishName" /><br />
  Code: <input type="text" name="newFishCode" /><br />
  <input type="submit" name="newFishSubmit" value="Add" /><br />

  <h4>Delete Fish</h4>
  <?php genSelect("delFishID", $fishes, "FID", "NAME"); ?>
  <input type="submit" name="delFishSubmit" value="Delete" /><br />

  <h4>Edit Fish</h4>
  <?php genSelect("editFishID", $fishes, "FID", "NAME");
     echo " <input type=\"submit\" name=\"editFishSubmit\" value=\"Edit\" /><br />\r\n";

     if(isset($_POST['editFishSubmit'])) {
        foreach($fishes as $fish) {
           if($fish['FID'] == $_POST['editFishID']) {
              echo "<input type=\"text\" name=\"saveFishName\" value=\"".$fish['NAME']."\" /><br />\r\n";
              echo "<input type=\"text\" name=\"saveFishCode\" value=\"".$fish['CODE']."\" /><br />\r\n";
              echo "<input type=\"hidden\" name=\"saveFishID\" value=\"".$fish['FID']."\" />\r\n";
              echo "<input type=\"submit\" name=\"saveFishSubmit\" value=\"Save\" />\r\n";
           }
        }
     }
  ?>
</form>
