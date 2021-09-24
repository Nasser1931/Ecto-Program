<link rel='icon' href='images\favicon.png' type='image/x-icon' />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="CSS\styles.css" type="text/css" />

<form method="post" <?php echo $_SERVER['PHP_SELF']; ?>>

    <div class="container">
        <div class="mb-3">
            <label for="emailaddress" class="form-label">Email Address</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <p>Back <a href="index.php">
                Home</a></p>

        <button type="submit" class="btn btn-log" name="login">Login</button>
    </div>
</form>


<?php
include('DB\connect.php');
if (isset($_REQUEST['login'])) {

    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (password_verify($_POST['password'], $row['password'])) {
        session_start();
        $_SESSION['user'] = $row['email'];
        header("refresh:2;");
        header('Location: ' . 'index.php');
    } else {
        echo '<script language="javascript">';
        echo 'alert("invalid username or password")';
        echo '</script>';
    }


    $res = mysqli_fetch_assoc($result);
}
?>