<?php 
include "dataconnect.php";
if(!$conn){
die('Error in connection');
}
$sql = "SELECT * from logininfo";
$result = pg_query($conn, $sql);
?>
<div>
<a href="create.php">Create</a>
</div>
<table border="1">
<tr><th>c_id</th><th>c_fullname</th>
<th>username</th>
<th>password</th>
<th>email</th>
<th>phone</th>
<th>usertype</th></tr>
<?php
while($row=pg_fetch_assoc($result)){
  echo"<tr>";
  echo "<td>$row[c_id]</td>";
echo "<td>$row[c_fullname]</td>";
echo "<td>$row[username]</td>";
echo "<td>$row[password]</td>";
echo "<td>$row[email]</td>";
echo "<td>$row[usertype]</td>";
echo "<td>
<a href='edit.php?c_id=$row[c_id]'>
 <button class='success' style='background:green;color:#fff'>
  Edit
</button>
</a>
<a href='delete.php?c_id=$row[c_id]'>
<button class='danger' style='background:red;color:#ffff'>
DELETE</button>
</a>
</td>";
  echo"</tr>";
}
?>
</table>

