<?php 
/**
 * Created by Abijith ap.
 * User: vinam
 * Date: 11/4/19
 * Time: 3 30pm 
 */
include_once "student.php"; 
$studentobject= new student(); 
if(isset($_POST['save'])){
  $studentobject->setDebug(1);
  $values=$studentobject->insert1($_POST);
  if($values) {
    header('Location: list.php');
  }
  print_r($values);
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
  <input type="text" name="name"><br>
  Email :<br>
  <input type="email" name="email"><br>
  Dob:<br>
  <input type="date" name="dob"><br>
  Status:<br>
  <input type="text" name="status"><br>
  <input type="submit" value="save" name="save">
</form> 
</body>
</html>