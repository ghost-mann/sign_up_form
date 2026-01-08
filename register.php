<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome! Kindly Enter your Details!</h1>

<div class="container">
    <form class="form-group">
        <div class="form-group">
            Name:<input id="name" type="text">
        </div>
        <div class="form-group">
            Email:<input id="email" type="text">
        </div>
        <div class="form-group">
            Password:<input id="password" type="password">
        </div>
        <div class="form-group">
            Repeat Password:<input id="r_passport" type="password">
        </div>
        <div>
        <a class="button" id="signup" type="submit">Submit</a>
        <a class="button" id="login" type="button" href="login.php">Login</a>
        </div>

    </form>

</div>
</body>
</html>
