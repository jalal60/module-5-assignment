<?php
session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] != "user") {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
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
    <div class="card w-50 align-content-center">
        <div class="card-body">
            <h1 class="card-title fs-2">User Panel</h1>
            <hr>
            <p class="card-text">

            <h3>Welcome! <?php echo $_SESSION["username"]; ?></h3>
            <h4>Role: <?php echo $_SESSION["role"];  ?></h4>
            <br>
            <a href="logout.php" class="btn btn-primary">Logout</a>
            </p>
        </div>
    </div>




    <section class="padding-gap"></section>
    <section class="padding-gap"></section>
    <section class="padding-gap"></section>
    <section class="padding-gap"></section>

    <footer class="footer-gap">
        <p>Copyright © 2023 Developed by Md. Shahjalal, Ostad Php & Laravel Batch-2</p>
    </footer>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>