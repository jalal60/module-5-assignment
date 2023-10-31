<?php
session_start();


$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? "";

$errorMessage = "";


$fp = fopen("./data/users.txt", "r");

$roles = array();
$usernames = array();
$emails = array();
$passwords = array();

while ($line = fgets($fp)) {
    $values = explode(",", $line);  // role, username, email, password

    array_push($roles, trim($values[0]));
    array_push($usernames, trim($values[1]));
    array_push($emails, trim($values[2]));
    array_push($passwords, trim($values[3]));
}

fclose($fp);


if (isset($_POST['login'])) {
    for ($i = 0; $i < count($roles); $i++) {
        if ($email == $emails[$i] && $password == $passwords[$i]) {
            $_SESSION["role"] = $roles[$i];
            $_SESSION["username"] = $usernames[$i];
            $_SESSION["email"] = $emails[$i];
            $_SESSION["password"] = $passwords[$i];
            header("Location: index.php");
        } else {
            $errorMessage = "Wrong email or password";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="header display-6 text-center p-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    User Authentication and Role Management System
                </div>
            </div>
        </div>

    </header>
    <section class="padding-gap"></section>
    <div class="container mt-5">
        <h1 class="text-center">Login to you account</h1>
        <p class="text-bold text-center">Admin:: email=admin@gmail.com and password=1234</p>
        <form action="login.php" method="POST">
            <div class="form-group my-2">
                <label for="email my-2">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>

            </div>
            <div class="form-group my-2">
                <label for="password my-1">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Enter Password" required>
            </div>
            <div class="form-group form-check my-2">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>

            <p class="text-danger">
                <?php echo $errorMessage; ?>
            </p>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
        </form>

        <p>Don't have an account? <a href="register.php">Signup now</a></p>
    </div>

    <section class="padding-gap"></section>
    <footer class="footer-gap">
        <p>Copyright © 2023 Developed by Md. Shahjalal, Ostad Php & Laravel Batch-2</p>
    </footer>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>