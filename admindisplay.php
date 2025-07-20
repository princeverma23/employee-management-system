

<?php

include 'config.php';
session_start();
error_reporting(0);
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'employee') {
  // Redirect to the login page if not logged in
  header("Location: admin.php");
  exit(); // Stop further execution
}
$query="select * from register where usrtype=1";
$result=mysqli_query($con,$query);
//echo '<pre>';
//print_r($result);
//die;
?>

<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
}
.table {
    width: 95%!important;
    margin-left: 30px!important;
   
}
h1, h2 {
    margin-left: 14px;
}
.container-fluid {
    justify-content: space-between;
    display: flex;
}
</style>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<h1>Employee Management</h1>
<div class="container-fluid">
<a href="add.php">Add New Employee</a>
<br>
<a href="logout.php"><button type="submit" name="logout" value="submit">Logout</button></a>
</div>
<h2> Employee Data</h2>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contact</th>
      <th scope="col">Salary</th>
      <th scope="col">Action 1</th>
      <th scope="col">Action 2</th>
      
      
    </tr>
  </thead>
  <tbody>
      <?php
           while($fetchdata=mysqli_fetch_assoc($result)){?>
             <tr>
                <td><?php echo $fetchdata['id'];?></td>
                <td><?php echo $fetchdata['name']?></td>
                <td><?php echo $fetchdata['email'];?></td>
                <td><?php echo $fetchdata['contact'];?></td>
                <td><?php echo $fetchdata['salary'];?></td>
                <td><a href="update.php?id=<?php echo $fetchdata['id'];?>" class="btn btn-primary">Edit</a></td>
                <td><a href="delete.php?id=<?php echo $fetchdata['id'];?>"  class="btn btn-danger">Delete</a></td>
                            </tr>
                            <?php }?>
   
  </tbody>
</table>