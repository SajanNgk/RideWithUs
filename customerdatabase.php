<?php 
$con = pg_connect("host=127.0.0.1 port=5432 dbname=bikesDB user=postgres password=1234 ");
if(!$con){
die('Error in connection'. pg_result_error($con));
}
$search = !empty($_GET['search'])?$_GET['search']:'';
$sql = "SELECT * from customerinfo";

if($search){
	$sql = "SELECT * from customerinfo where c_name like '%{$search}%' ";
}
$result = pg_query($con, $sql);
?>

<div>
<div style="float:left;width:40%">
<a href="create.php">Create</a>
</div>
<div style="float:right;width:60%">
<form>
<input type="text" name="search" value="<?php echo $search;?>"><input type="submit" value="search">
</form>
</div>
</div>
<table border="2" width="100%" >
<tr><th>Fullname</th><th>Username</th><th>password</th>
<th>email</th><th>phone</th> </tr>
<?php
while($row=pg_fetch_assoc($result)){
  echo"<tr>";
 
echo "<td>$row[c_fullname]</td>";
echo "<td>$row[username]</td>";
echo "<td>$row[password]</td>";
echo "<td>$row[email]</td>";
echo "<td>$row[phone]</td>";
echo "<td>
<a href='edit.php?id=$row[c_id]'>
 <button class='success' style='background:green;color:#fff'>
  Edit
</button>
</a>
<a href='delete.php?id=$row[c_id]'>
<button class='danger' style='background:red;color:#ffff'>
DELETE</button>
</a>
</td>";
  echo"</tr>";
}
?>
</table>

