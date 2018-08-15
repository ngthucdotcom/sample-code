<?php
// Include connect file
include 'connect.php';

function getChild($idparent){
    $findChild = "SELECT * FROM organizations WHERE parent = '$idparent'";
    $resultFind = mysql_query($findChild);
    $i=0;
    while (true) {
      $child = mysql_fetch_array($resultFind);
      if (!$child) break;
      if ($i == 0) echo "<ul>";
      $i = 1;
      echo '<li>'.$child['id'].' | '.$child['text'].' | '.$child['description'].' | '.$child['parent'].'</li>';
      getChild($child['id']);
    }
    if ($i>0) echo '</ul>';
}

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  getChild($id);
} else {
  echo 'It work!';
}
?>
