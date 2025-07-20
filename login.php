<?php
session_start();
error_reporting(0);
include 'config.php';
 if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $type=$_POST['type'];

    $query="select * from register where email='$email' && password ='$password' && usrtype ='1'";
    $data= mysqli_query($con,$query);

   $total=mysqli_num_rows($data);
   //echo $total;
    if($total == 1){
     // Session destroy added here
     $_SESSION['user_type'] = 'admin';
    
         header("Location: display.php");
   }
   else{
    echo 'Email and password is incorrect';
   }
 }
 

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <style>
         body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: url('image/login.jpg') center center fixed; 
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
    <form action="" method="post">
        <div class="login-container">
            <h1>Welcome to Employee Login</h1>
            <div>
                <label class="inputlavel" for="email">Email</label>
                <input type="text" name="email" class="textfield" id="email" placeholder="Enter your email" required>
            </div>
            <div>
                <label class="inputlavel" for="password">Password</label>
                <input type="text" name="password" class="textfield" id="password" autocomplete="off" placeholder="Enter your password" required>
            </div>
            <div>
                <input type="submit" name="login" value="Login" class="btn btn-primary">
                            <!-- <a href="register.php">Register</a> -->
            </div>
        </div>
    </form>
</body>
</html>
 