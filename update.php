<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $salary = $_POST['salary'];

    $update_query = "UPDATE register SET name='$name', email='$email', contact='$contact', salary='$salary' WHERE id=$id";

    if (mysqli_query($con, $update_query)) {
        echo "Record updated successfully";
         header('Location: admindisplay.php');
    } else {
        echo "Not updated record";
    }
     
}

   // Fetch the details of the employee to be updated
    if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select_query = "SELECT * FROM register WHERE id=$id";
    $result = mysqli_query($con, $select_query);
    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];
    $email = $row['email'];
    $contact = $row['contact'];
    $salary = $row['salary'];
} else {
    // If no ID is provided in the URL, you can handle it accordingly.
    // For example, redirect to another page or display an error message.
    // You can customize this part based on your requirements.
    echo "Employee ID not provided.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
    	.inputlavel{
    		width:15%;
    	}
        .container{
            text-align: center ;
        }
        button {
        margin-right: 166px;
        color: red;
        background-color: azure;
        }
      .h1, h1 {
            color: #0000ff;
             font-size: 28px!important;
            margin-bottom: 20px;
            /* font-size: 2.5rem; */
            }
    </style>
</head>
<body>
<div class="container mt-5">
<h1>Update Employee</h1>
<form method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div>
        <label class="inputlavel" for="">Name</label>
        <input type="text" name="name" placeholder="Enter your name" value="<?php echo $name; ?>">
    </div>
    <div>
        <label class="inputlavel" for="">Email</label>
        <input type="email" name="email" placeholder="Enter your email" value="<?php echo $email; ?>">
    </div>
    <!-- Add other form fields with their values as needed -->
    <div>
        <label class="inputlavel" for="">Contact</label>
        <input type="text" name="contact" placeholder="Enter your no" value="<?php echo $contact; ?>">
    </div>
    <div>
        <label class="inputlavel" for="">Salary</label>
        <input type="text" name="salary" placeholder="Enter your salary" value="<?php echo $salary; ?>">
    </div>
    <div class="btn">
        <button type="submit" name="submit">Update</button>
    </div>
    </div>
</form>
</body>
</html>
