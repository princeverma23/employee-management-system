<?php
// session_start();
// error_reporting(0);
// include 'config.php';
// $type='';
//  if(isset($_POST['login'])){
//     $email=$_POST['email'];
//     $password=$_POST['password'];
//     $type=$_POST['$type'];

//     $query="select * from register where email='$email' && password ='$password' && usrtype ='2'";
//    $data= mysqli_query($con,$query);

//    $total=mysqli_num_rows($data);
//    //echo $total;
//    if($total ==1){
//     session_destroy();
//     session_start();
//     $_SESSION['user_type'] = 'employee';
//          header("Location: admindisplay.php");
//    }
   
//    elseif($password == $password){
//     echo 'password is incorrect';
//    }
//    else{
//     echo 'Email is incorrect';
//    }
//  }

session_start();
error_reporting(0);
include 'config.php';
$type ='';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
     $type=$_POST['$type'];

    // Step 1: Check if email exists
    $checkEmailQuery = "SELECT * FROM register WHERE email='$email' AND usrtype='2'";
    $emailResult = mysqli_query($con, $checkEmailQuery);

    if (mysqli_num_rows($emailResult) == 0) {
        echo "Email is incorrect";
    } else {
        // Email exists, now check password
        $user = mysqli_fetch_assoc($emailResult);

        if ($user['password'] != $password) {
            echo "Password is incorrect";
        } else {
            // Correct login
            session_destroy();
            session_start();
            $_SESSION['user_type'] = 'employee';
            header("Location: admindisplay.php");
            exit();
        }
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
            background: url('image/admin.jpg') center center fixed; 
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
    </style>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        </head>
        <body>
        <form action="" method="post">
        <div class="container">
            <h1>Welcome</h1>
            <div>
                <label class="inputlavel" for="email">Email</label>
                <input type="text" name="email" class="textfield" id="email" placeholder="" required>
            </div>
            <div>
                <label class="inputlavel" for="password">Password</label>
                <input type="password" name="password" class="textfield" id="password" autocomplete="off" placeholder="" required>
            </div>
            <div>
                <input type="submit" name="login" value="Login" class="btn btn-primary">
                    
            </div>
        </div>
    </form>
</body>
</html>
