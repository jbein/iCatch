<?php
   $mysqli = new mysqli($db['hostname'], $db['username'], $db['password'], $db['database']);
   if($mysqli->connect_errno)
      die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);

   $sql = "SELECT * FROM `CATCH`
           LEFT JOIN `FISH` ON `CATCH`.`FID`=`FISH`.`FID`
           LEFT JOIN `WATER` ON `CATCH`.`WID`=`WATER`.`WID`";

   if(!$res = $mysqli->query($sql)) {
      die("ERROR: " . $mysqli->error);
   }
?>

<div class="panel panel-default">
  <div class="panel-heading">Catches</div>

  <!-- Table -->
  <table class="table">
    <tr>
      <th>#</th>
      <th>Species</th>
      <th>Length</th>
      <th>Weight</th>
      <th>Water</th>
      <th>Date/Time</th>
      <th></th>
    </tr>
<?php
   $i=1;
   while($row = $res->fetch_row()){
      echo "<tr>";
      echo "  <td>".str_pad($i++, 3, 0, STR_PAD_LEFT)."</td>";
      echo "  <td>".$row[12]."</td>";
      echo "  <td>".number_format($row[7]/10, 1, ',', '.')." cm</td>";
      echo "  <td>".number_format($row[8], 0, ',', '.')." g</td>";
      echo "  <td>".$row[15]."</td>";
      echo "  <td>".date('d-m-Y H:m',strtotime($row[4]))."</td>";
      echo "  <td>";
      echo "    <a class=\"btn btn-default btn-sm\" data-toggle=\"modal\" data-target=\"#modalCatchDetail\" data-cid=\"".$row[0]."\">";
      echo "      <span class=\"glyphicon glyphicon-eye-open\" aria-hidden=\"true\"></span>";
      echo "    </a>";
      echo "  </td>";
      echo "</tr>";
   }
?> 
  </table>
</div>
