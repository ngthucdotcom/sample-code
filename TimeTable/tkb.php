<?php
/* Example
+--------------------------------------------------------------------+
| STT |    TEN_MON     |   PHONG   |   THU   |  TIET_BD   | SO_TIET  |
|  1  |     LTCB       |  101/C1   |    2    |     1      |    4     |
|  2  |     THCB       |  201/C1   |    3    |     6      |    3     |
+--------------------------------------------------------------------+
*/

//Bien $monhoc la mang chua cac dong trong bang du lieu tren
include 'tkb_array.php';

$tkb = array(
    array(),
    array(),
    array(),
    array(),
    array(),
    array()
);

foreach ($monhoc as $mon) {
    $THU = $mon["THU"];
    $TIET_DAU = $mon["TIET_BD"];
    $TIET_CUOI = $mon["TIET_BD"] + $mon["SO_TIET"] - 1;
    for ($i = $TIET_DAU; $i <= $TIET_CUOI; $i++) {
        $tkb[$THU-2][$i-1] = $mon["TEN_MON"];
    }
}


echo '<table id="tkb" class="table table-bordered">
  <thead>
    <tr>
      <th>Thứ 2</th>
      <th>Thứ 3</th>
      <th>Thứ 4</th>
      <th>Thứ 5</th>
      <th>Thứ 6</th>
      <th>Thứ 7</th>
    </tr>
  </thead>
  <tbody>';

for ($tiet = 0; $tiet < 12; $tiet++) {
    echo "<tr>";
    for ($thu = 0; $thu < 6; $thu++) {
        echo "<td data-toggle='modal' data-target='#mhModal'>";
        echo isset($tkb[$thu][$tiet]) ? $tkb[$thu][$tiet] : "_____";
        echo "</td>";
    }
    echo "</tr>";
}

echo '</tbody>
</table>';
?>
