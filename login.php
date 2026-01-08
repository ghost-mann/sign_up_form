<?php

//db variables
$host = 'localhost';
$user = 'postgres';
$password = 'root';
$database = 'postgres';

// data source name - connection - username and password are in pdo

$dsn = "pgsql:host=$host;port=5432;dbname=$database";

// pdo - php data object
try {
    $pdo = new PDO($dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
}   catch (PDOException $e) {
    echo "Connection failed: " . htmlspecialchars($e->getMessage());
}

// submission of entered email and password
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars(($_POST['email']));
    $password = htmlspecialchars(($_POST['password']));

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
    }   else {
        $error = "Invalid credentials";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<h1>Welcome! Kindly Enter Your Details </h1>

<div class="container">
    <form class="form-group">
        <div class="form-group">
            Name:<input id="name" type="text">
        </div>
        <div class="form-group">
            Email:<input id="email" type="email">
        </div>
        <div class="form-group">
            Password:<input id="password" type="password">
        </div>
        <div class="form-group">
            <a class="button" id="login" type="button" href="register.php">Sign Up</a>
            <button class="second-button" id="signup" type="submit">Submit</button>
        </div>
    </form>
</div>
</body>
</html>
