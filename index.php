<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: url('image/1.jpg') center center fixed; 
            background-size: cover;
        }

        h1 {
            text-align: center;
            color: blue;
            font-size: 3.5em;
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
    </style>
</head>
<body>
    <h1>Employee Management Database System</h1>

    <!-- Buttons for Admin, Register, and Login -->
    <div class="button-container">
        <a href="admin.php"><button class="btn btn-primary">Admin Login</button></a>
        <a href="register.php"><button class="btn btn-success">Register Employee || Admin</button></a>
        <a href="login.php"><button class="btn btn-info">Employee Login</button></a>
    </div>
</body>
</html>
