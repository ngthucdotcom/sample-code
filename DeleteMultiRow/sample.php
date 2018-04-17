<?php
// Include connect file
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="vi" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Delete Multiple Rows</title>
    <script type="text/javascript">
      // Checkall Function for checkbox
      function checkall(source,name) {
        checkboxes = document.getElementsByName(name);
        for(var i=0, n=checkboxes.length;i<n;i++) {
          checkboxes[i].checked = source.checked;
        }
      }
    </script>
  </head>
  <body>
    <form method="post">
      <button type="submit" name="delete">Delete Multiple</button>
      <table border="1">
        <thead>
          <tr>
            <th>
              <input type="checkbox" onClick="checkall(this,'field[]')" />
            </th>
            <th>ID</th>
            <th>Sample Field</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql_qry_sample = "SELECT * FROM sample_table_1";
            $result_qry_sample = mysql_query($sql_qry_sample);
            while ($row_sample = mysql_fetch_array($result_qry_sample)) {
              echo "<tr>
                <td>
                  <input type='checkbox' name='field[]' value='{$row_sample['id']}' />
                </td>
                <td>
                  {$row_sample['id']}
                </td>
                <td>
                  {$row_sample['sample_field']}
                </td>
              </tr>";
            }
          ?>
        </tbody>
      </table>
    </form>
  </body>
</html>

<?php
// Processing delete multiple
if(isset($_POST['delete'])) {
  // Loop in array field in post array
  foreach ($_POST['field'] as $key => $id) {
    $sql_del_multi = "DELETE FROM sample_table_1 WHERE id={$id}";
    $status_delete = mysql_query($sql_del_multi);
  }

  // Notifi for action delete multiple
  if($status_delete) {
    echo "<script>alert('Delete Success!')</script>";
  } else echo "<script>alert('Delete Failed!')</script>";

  // Reload page
  echo '<meta http-equiv="refresh" content="0">';
}
?>
