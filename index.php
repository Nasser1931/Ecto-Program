<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>ETCO Competition</title>
    <link rel="icon" href="assets/favicon-32x32.png" />
    <link href="css/styles.css" rel="stylesheet" />
</head>
<?php
ob_start();
session_start();
include('DB\connect.php');
?>

<body>
    <header class="masthead d-flex align-items-center">
        <div class="container px-4 px-lg-5 text-center">
            <h1 class="mb-1">ETCO Competition</h1>
            <?php
            if (isset($_SESSION['user'])) {
                $email = $_SESSION['user'];
                $sql = "SELECT * FROM users WHERE email='$email'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                $name = $row['name'];;
            ?>
            <?php echo '<h3 class="mb-5"><em>Welcome ' . $name . '</em></h3>'; ?>
            <form class="d-flex" method="post" <?php echo $_SERVER['PHP_SELF']; ?>>
                <button type="submit" class="btn btn-out" name="log">Logout</button>
            </form>
            <?php } else {
            ?>
            <h3 class="mb-5"><em>Not logged in</em></h3>
            <form class="d-flex" method="post" <?php echo $_SERVER['PHP_SELF']; ?>>
                <a class="btn mb-2" href="signup.php">Register</a>
                <a class="btn btn-log" href="login.php">Login</a>
            </form>
            <?php }
            ?>
        </div>
    </header>


</body>

<?php

if (isset($_POST['log'])) {
    session_destroy();
    header("refresh:1;");
}
?>

</html>