<?php
session_start();
include 'config.php';
$usrtype = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile =$_POST['mobile-no'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    // Check if the email already exists in the database
    $checkQuery = "SELECT * FROM register WHERE email='$email'";
    $checkResult = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Email already exists, show an error message or redirect to a registration page
        echo "Error: Email already exists.";
    } else {
        // Email is unique, proceed with registration
        $query = "INSERT INTO register (name, email, contact, password, usrtype) VALUES ('$name', '$email','$mobile', '$password', '$type')";

        if (mysqli_query($con, $query)) {
            header("Location: login.php");
            exit();
        } else {
            //echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Form</title>
    <style>
         body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: url('image/register.png') center center fixed; 
            background-size: cover;
        }

        h1 {
            text-align: center;
        }

        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .button-container a {
            margin-bottom: 10px;
        }
        h1 {
            color: red;
        }
        .inputlavel {
            width: 25%;
        }
        
        h1{
            color:blue;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <h1>Register Yourself</h1>
    <form method="post">
        <div>
            <label class="inputlavel" for="">Name</label>
            <input type="text" name="name" placeholder="Enter your name">
        </div>
        <div>
            <label class="inputlavel" for="">Email</label>
            <input type="email" name="email" placeholder="Enter your email">
        </div>
        <div>
            <label class="inputlavel" for="">Mobile</label>
            <input type="number" name="mobile-no" placeholder="Enter your no">
        </div>
        <div>
            <label class="inputlavel" for="">Password</label>
            <input type="password" name="password" placeholder="Enter your password">
        </div>
        <div>
            <label class="inputlavel" for="">Type</label>
            <input type="text" name="type" placeholder="A||E">
        </div>
        <div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
    </form>
</body>
</html>
