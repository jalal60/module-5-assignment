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

$emailVaue;
$userValue;
$roleValue;
$passValue;
if (isset($_SESSION['username'])) {
    for ($i = 0; $i < count($roles); $i++) {
        if ($_GET['edit'] == $emails[$i]) {
            $roleValue = $roles[$i];
            $userValue = $usernames[$i];
            $emailVaue = $emails[$i];
            $passValue = $passwords[$i];
        }
    }
}

if (isset($_POST['save'])) {
    if ($_GET['edit'] == $emailVaue) {
        header("Location: home_admin.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Panel</title>
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
            <div class="col-12">
                <h1 class="pb-4">Update User Role</h1>
            </div>
        </div>
        <div class="card align-content-center">
            <div class="card-body">
                <h3 class="card-title fs-2"><?php echo $userValue; ?></h3>
                <hr>
                <p class="card-text">
                <table class="table">
                    <form action="edit.php" method="post">
                        <label class="form-label" name="email">Email: <?php echo $emailVaue; ?></label>
                        <br>
                        <hr>
                        <label class="form-label">Role:</label>
                        <select class="form-select" name="role" id="">
                            <option value="<?php echo $roleValue; ?>" selected><?php echo $roleValue; ?></option>
                            <?php if ($roleValue == 'admin') {
                                echo "<option value='manger'>manager</option>";
                                echo "<option value='user'>user</option>";
                            } else if ($roleValue == 'user') {
                                echo "<option value='admin'>admin</option>";
                                echo "<option value='manger'>manager</option>";
                            } else if ($roleValue == 'manager') {
                                echo "<option value='admin'>admin</option>";
                                echo "<option value='user'>user</option>";
                            }
                            ?>
                        </select>
                        <br>
                        <a href="index.php" class="btn btn-danger">Close</a>
                        <button type="submit" name="save" class="btn btn-success mx-2">Save</button>
                    </form>

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