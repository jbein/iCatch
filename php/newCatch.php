<?php
   $mysqli = new mysqli($db['hostname'], $db['username'], $db['password'], $db['database']);
   if($mysqli->connect_errno)
      die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);

   $fish = getResultAsArray($mysqli, "SELECT * FROM `FISH` ORDER BY `NAME`");
   $water = getResultAsArray($mysqli, "SELECT * FROM `WATER` ORDER BY `NAME`");
   $bait = getResultAsArray($mysqli, "SELECT * FROM `BAIT` ORDER BY `CODE`");

   function genCatchSelect($array, $id, $label) {
      echo "<div class=\"form-group\">";
      echo "  <label for=\"newCatch".$id."\" class=\"col-sm-2 control-label\">".$label.":</label>";
      echo "  <div class=\"col-sm-7\">";
      echo "    <select class=\"form-control\" id=\"newCatch".$id."\">";
      foreach($array as $a) {
         if($id == "Bait")
            echo "  <option value=\"".$a[0]."\">".$a[1]." (".$a[4].", ".$a[5]." mm)</option>";
         else
            echo "  <option value=\"".$a[0]."\">".$a[1]."</option>";
      }
      echo "    </select>";
      echo "  </div>";
      echo "</div>";
   }
?>

<div class="panel panel-default">
  <div class="panel-heading">New Catch</div>
  <div class="panel-body">
    <form class="form-horizontal" role="form" id="newCatchForm">
<?php 
   genCatchSelect($fish, "Fish", "Species"); 
   genCatchSelect($water, "Water", "Water"); 
   genCatchSelect($bait, "Bait", "Bait"); 
?>
      <div class="form-group">
        <label for="newCatchWeight" class="col-sm-2 control-label">Weight:</label>
        <div class="col-xs-7">
          <input type="number" class="form-control" id="newCatchWeight" required />
        </div>
      </div>
      <div class="form-group">
        <label for="newCatchLength" class="col-sm-2 control-label">Length:</label>
        <div class="col-xs-7">
          <input type="number" class="form-control" id="newCatchLength" required />
        </div>
      </div>
      <div class="form-group">
        <label for="newCatchMISC" class="col-sm-2 control-label">MISC:</label>
        <div class="col-xs-7">
          <textarea class="form-control" rows="3" id="newCatchMISC"></textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="newCatchMISC" class="col-sm-2 control-label">BaitDetail:</label>
        <div class="col-xs-7">
          <textarea class="form-control" rows="3" id="newCatchBDetail"></textarea>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-7">
          <button type="reset" id="newCatchClear" class="btn btn-default" value="Clear">Clear</button>
          <button type="submit" id="newCatchSubmit" class="btn btn-primary" value="Submit">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
