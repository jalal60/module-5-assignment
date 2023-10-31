<?php

$username = $_POST["username"] ?? "";
$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? "";

$role = "user";

$errorMessage = "";
if (isset($_POST['register'])) {
    if ($username != "" && $email != "" && $password != "") {
        $fp = fopen("./data/users.txt", "a");

        fwrite($fp, "\n{$role}, {$username}, {$email}, {$password}");
        fclose($fp);

        header("Location: login.php");
    } else {
        $errorMessage = "Please enter you email and password!";
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
        <h1 class="text-center">Registration Form</h1>

        <form action="register.php" method="POST">

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>

            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>

            </div>

            <div class="form-group">
                <label for="email">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
            </div>

            <p class="text-error">
                <?php echo $errorMessage; ?>
            </p>

            <button type="submit" class="btn btn-primary" name="register">Register</button>
            <p class="pt-2"><span> Already have an Account? <a href="login.php">Login Now</a></span></p>
        </form>
    </div>

    <section class="padding-gap"></section>
    <footer class="footer-gap">
        <p>Copyright © 2023 Developed by Md. Shahjalal, Ostad Php & Laravel Batch-2</p>
    </footer>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>