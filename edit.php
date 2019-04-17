<?php
include "student.php";
$id=$_GET['updateid'];
$studentobject= new student();
$detail=$studentobject->display($id);//display functions fetching fromdb
$detail=$detail[0];
if(isset($_POST['update'])){
  print_r($_POST);
  $_POST['id']=$id;
  $studentobject->setDebug(1);
  $values=$studentobject->update($_POST);
  header('Location: list.php');
}  
?>

<!DOCTYPE html>
<html>
<head>
	<title>1st work</title>
</head>
<body>
  <form method="post">  
  Name:<br>
  <input type="text" name="name" value="<?php echo $detail['name']; ?>"><br>
  Email :<br>
  <input type="email" name="email" value="<?php echo $detail['email']; ?>"><br>
  Dob:<br>
  <input type="date" name="dob" value="<?php echo $detail['dob']; ?>"><br>
  Status:<br>
  <input type="text" name="status" value="<?php echo $detail['status']; ?>"><br>
  <input type="submit" value="update" name="update">
  </form> 
</body>
</html>