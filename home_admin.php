<?php
session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] != "admin") {
    header("Location: login.php");
}


$fp = fopen("./data/users.txt", "r");

$roles = array();
$usernames = array();
$emails = array();
$passwords = array();
$serial = 1;
while ($line = fgets($fp)) {
    $values = explode(",", $line); // role, username, email, password

    array_push($roles, trim($values[0]));
    array_push($usernames, trim($values[1]));
    array_push($emails, trim($values[2]));
    array_push($passwords, trim($values[3]));
}

fclose($fp);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
    <div class="container">
        <div class="row">
            <div class="col-10">
                <h1 class="pb-4">Admin Panel</h1>
            </div>
            <div class="col-2 ">
                <a href="logout.php" class="btn btn-primary mx-2 text-right">Logout</a>
            </div>
        </div>
        <div class="card align-content-center">
            <div class="card-body">
                <h3 class="card-title fs-2">Welcome! <?php echo $_SESSION["username"]; ?></h3>
                <hr>
                <p class="card-text">
                <h4>Role: <?php echo $_SESSION["role"];  ?></h4>
                <hr>
                <table class="table">
                    <th>Serial</th>
                    <th>Role</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                    <tr>
                        <?php
                        for ($i = 0; $i < count($roles); $i++) {
                        ?>
                            <td><?php echo $serial; ?></td>
                            <td><?php echo $roles[$i]; ?> </td>
                            <td><?php echo $usernames[$i]; ?></td>
                            <td><?php echo $emails[$i]; ?></td>
                            <td><a href="edit.php?edit=<?php echo $emails[$i]; ?>" class="btn btn-success">Edit</a><span><a href="#" class="btn btn-danger mx-2">Delete</a></span></td>
                    </tr>
                <?php $serial++;
                        }

                ?>

                </table>

                </p>
            </div>
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