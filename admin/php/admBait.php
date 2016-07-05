<?php
   $bait = getResultAsArray($mysqli, "SELECT * FROM `BAIT` ORDER BY `CODE`");

   if(isset($_POST['newBaitSubmit'])) {
      $sql = "INSERT INTO `BAIT` (`NAME`, `CODE`, `PRODUCER`, `COLOR`, `LENGTH`, `WEIGHT`, `MISC`) 
                          VALUES ('".$_POST['newBaitName']."', 
                                  '".$_POST['newBaitCode']."',
                                  '".$_POST['newBaitProducer']."',
                                  '".$_POST['newBaitColor']."',
                                  '".$_POST['newBaitLength']."',
                                  '".$_POST['newBaitWeight']."',
                                  '".$_POST['newBaitMISC']."')";
      $mysqli->query($sql);
   }
   elseif(isset($_POST['delBaitSubmit'])) {
#      $sql = "DELETE FROM `Bait` WHERE `BID`='".$_POST['delBaitID']."'";
      $mysqli->query($sql);
   }
   elseif(isset($_POST['saveBaitSubmit'])) {
#      $sql = "UPDATE `FISH` SET `NAME`='".$_POST['saveBaitName']."', `CODE`='".$_POST['saveBaitCode']."' WHERE `FID`='".$_POST['saveBaitID']."'";
      $mysqli->query($sql);
   }

?>

<form action="" method="post" name="admType">
  <h4>New Bait</h4>
  Name: <input type="text" name="newBaitName" /><br />
  Producer: <input type="text" name="newBaitProducer" /><br />
  Code: <input type="text" name="newBaitCode" /><br />
  Color: <input type="text" name="newBaitColor" /><br />
  Length: <input type="text" name="newBaitLength" /><br />
  Weight: <input type="text" name="newBaitWeight" /><br />
  MISC: <input type="text" name="newBaitMISC" /><br />
  <input type="submit" name="newBaitSubmit" value="Add" /><br />

  <h4>Delete Bait</h4>
  <?php genSelect("delBaitID", $bait, 0, 1); ?>
  <input type="submit" name="delBaitSubmit" value="Delete" /><br />

  <h4>Edit Bait</h4>
  <?php genSelect("editBaitID", $bait, 0, 1);
     echo " <input type=\"submit\" name=\"editBaitSubmit\" value=\"Edit\" /><br />\r\n";

     if(isset($_POST['editBaitSubmit'])) {
        foreach($fishes as $fish) {
           if($fish['FID'] == $_POST['editBaitID']) {
              echo "<input type=\"text\" name=\"saveBaitName\" value=\"".$fish['NAME']."\" /><br />\r\n";
              echo "<input type=\"text\" name=\"saveBaitCode\" value=\"".$fish['CODE']."\" /><br />\r\n";
              echo "<input type=\"hidden\" name=\"saveBaitID\" value=\"".$fish['FID']."\" />\r\n";
              echo "<input type=\"submit\" name=\"saveBaitSubmit\" value=\"Save\" />\r\n";
           }
        }
     }
  ?>
</form>
