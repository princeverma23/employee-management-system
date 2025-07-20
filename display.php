<?php
session_start();
include 'config.php';
error_reporting(0);

// Check if the user is logged in
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit(); // Stop further execution
}

$query="select * from register where usrtype=1";
$data=mysqli_query($con,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Data</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<h1> Employees List</h1>
<a href="logout.php"><button type="submit" name="logout" value="submit">Logout</button></a>
<table class="table table-hover">
  <thead>
    <tr>
    <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contact</th>
      <th scope="col">Salary</th>
    </tr>
  </thead>
  <tbody>
  <?php
            while ($row = mysqli_fetch_assoc($data)) {
                echo '<tr>';
                echo '<th scope="row">' . $row['id'] . '</th>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['contact'] . '</td>';
                echo '<td>' . $row['salary'] . '</td>';
                echo '</tr>';
            }
            ?>
 
  </tbody>
</table>
    
</body>
</html>