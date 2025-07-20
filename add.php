<?php
session_start(); 
include 'config.php';
$usrtype='';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password =$_POST['password'];
    $contact=$_POST['contact'];
    $salary=$_POST['salary'];
    $type=$_POST['type'];

    // Check if the email already exists in the database
    $checkQuery = "SELECT * FROM register WHERE email='$email'";
    $checkResult = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Email already exists, show an error message or redirect to a registration page
        echo "Error: Email already exists.";
    } else {
   // $password = password_hash($_POST["password"], PASSWORD_BCRYPT); // Hash the password
    
   $query = "INSERT INTO register (name, email, password, contact, salary, usrtype) VALUES ('$name', '$email', '$password', '$contact', '$salary', '$type')";

    
    if (mysqli_query($con, $query)) {
        header("Location: admindisplay.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
}

mysqli_close($con);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add New Employee</title>
    <style>
        .inputlavel {width: 8%;}
        .container{
            text-align: center;
        }
        .container h1{
            color:chartreuse ;
        }
        button {
                color: red;
                  margin-top: 10px!important;
              margin-right: 14%!important;
            }
    </style>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
    <form method="post">
        <h1>Add New Employee</h1>
        <div>
            <label class="inputlavel" for="">Name</label>
            <input type="text" name="name" placeholder="Enter employee name">
        </div>
        <div>
            <label class="inputlavel" for="">Email</label>
            <input type="email" name="email" placeholder="Enter employee email">
        </div>
        <div>
            <label class="inputlavel" for="">Password</label>
            <input type="password" name="password" placeholder="Enter employee password">
        </div>
             <div>
            <label class="inputlavel" for="">Contact</label>
            <input type="text" name="contact" placeholder="Enter employee mobile no">
        </div>
         <div>
            <label class="inputlavel" for="">Salary</label>
            <input type="text" name="salary" placeholder="Enter employee Salary">
        </div>
         <div>
            <label class="inputlavel" for="">Type</label>
            <input type="text" name="type" placeholder="Enter type">
        </div>
        
        <div>
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>
    </div>
</body>
</html>
