<?php include "student.php";
$studentobject= new student();
if(isset($_GET['deleteid']))
{
$id=$_GET['deleteid'];
print_r($id);
$delete=$studentobject->delete($id);
}
$tbvalues=$studentobject->display();
?>


<!DOCTYPE html>
<html>
<body>

<h2>STUDENTS LIST</h2>

<table style="width:100%">
  <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>EMAIL</th> 
    <th>DOB</th>
    <th>STATUS</th>
    <th>Edit</th>
    <th>DELETE</th>
  </tr>
    <?php foreach ($tbvalues as $fetch) {
    echo '<tr>';
    $id=$fetch['id'];
    echo "<td>".$fetch['id']."</td>";
    echo "<td>".$fetch['name']."</td>";
    echo "<td>".$fetch['email']."</td>";
    echo "<td>".$fetch['dob']."</td>";
    echo "<td>".$fetch['status']."</td>";
    echo '<td> <a href="edit.php?updateid='.$id.'" onclick= "return confirm(\'Are u sure ?\');">Edit</a></td> ';
    echo '<td> <a href="list.php?deleteid='.$id.'" onclick= "return confirm(\'Are u sure ?\');">Delete</a></td> ';
    echo  '</tr>';
    }?>
</table>
</body>
</html>
