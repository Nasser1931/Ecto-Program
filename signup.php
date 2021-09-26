<head>
    <meta charset="utf-8" />
    <title>ETCO Competition</title>
    <link rel="icon" href="assets/favicon-32x32.png" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
        integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous">
    </script>
    <link rel='icon' href='images\favicon.png' type='image/x-icon' />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS\styles.css" type="text/css" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
    </script>
</head>

<script>
$(document).ready(function() {
    $.validator.addMethod("checklower", function(value) {
        return /[a-z]/.test(value);
    });
    $.validator.addMethod("checkupper", function(value) {
        return /[A-Z]/.test(value);
    });
    $.validator.addMethod("checkdigit", function(value) {
        return /[0-9]/.test(value);
    });
    $.validator.addMethod("pwcheck", function(value) {
        return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) && /[a-z]/.test(value) && /\d/.test(
                value) &&
            /[A-Z]/.test(value);
    });

    //console.log("hi");

    $('#lol').validate({ // initialize the plugin
        rules: {
            pass1: {
                required: true,
                minlength: 8,
                pwcheck: true,
                checkdigit: true,
                checklower: true,
                checkupper: true

            },
            pass2: {
                required: true,
                equalTo: "#pass1"
            },
            email: {
                required: true,

            },
            name: {
                required: true,
                minlength: 3,
                numeric: false // default
            },
            select: {
                required: true
            }
        },
        messages: {

            pass1: {
                required: '<div class="alert alert-danger"><i class="bi bi-x-circle"></i><span style="color:red;text-align:center;">Please enter your password </span></div>',
                minlength: '<div class="alert alert-danger"><i class="bi bi-x-circle"><span style="color:red;text-align:center;">Please Enter at least 8 characters </span></div>',
                pwcheck: '<div class="alert alert-danger"><i class="bi bi-x-circle"><span style="color:red;text-align:center;">your Password is not strong enough </span></div>',
                checkupper: '<div class="alert alert-danger"><i class="bi bi-x-circle"><span style="color:red;text-align:center;"><ul><li>your Password is not strong enough</ul></li> </span></div>'

            },
            pass2: {
                required: '<div class="alert alert-danger"><i class="bi bi-x-circle"><span style="color:red;text-align:center;">Please confirm your password </span></div>',
                equalTo: '<div class="alert alert-danger"><i class="bi bi-x-circle"><span style="color:red;text-align:center;">Password should Match! </span></div>'
            },
            email: {
                required: '<div class="alert alert-danger"><i class="bi bi-x-circle"></i><span style="color:red;text-align:center;">Please enter your Email </span></div>',
            },
            name: {
                required: '<div class="alert alert-danger"><i class="bi bi-x-circle"></i><span style="color:red;text-align:center;">Please enter your valid Email </span></div>',
                minlength: '<div class="alert alert-danger"><i class="bi bi-x-circle"><span style="color:red;text-align:center;">Please Enter at least 3 characters </span></div>'

            },
            select: {
                required: '<div class="alert alert-danger"><i class="bi bi-x-circle"></i><span style="color:red;text-align:center;">Please select your Gender </span></div>'
            }



        },
        submitHandler: function(form) {
            form.submit();

        }
    });

});
</script>

<form id="lol" method="post" <?php echo $_SERVER['PHP_SELF']; ?>>

    <div class="container">
        <div class="mb-3">
            <label for="emailaddress" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="" name="email">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="pass1" name="pass1">
        </div>
        <div class="mb-3">
            <label for="password2" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="pass2" name="pass2">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Gender</label>

            <div class="dropdown">
                <select class="form-select" aria-label="Default select example" name="select">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        </div>
        <p>Already have an account ? <a href="login.php">

                login
                here</a>.</p>

        <button type="submit" class="btn mb-2" name="register">Register</button>
    </div>
</form>



<?php
include('DB\connect.php');
if (isset($_REQUEST['register'])) {
    $email = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $password = $_REQUEST['pass1'];
    $select = $_REQUEST['select'];
    $get_users = "SELECT * FROM users where 
    email='$email'";
    $search_query = mysqli_query($conn, $get_users);
    $get_rows = mysqli_affected_rows($conn);
    if ($get_rows > 0) {
        echo '<script language="javascript">';
        echo 'alert("user already registered")';
        echo '</script>';
    } else {

        $fpass = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
        $sql = "INSERT INTO users (email, name, gender, password) 
            VALUES ('$email', '$name', '$select', '$fpass')";
        if ($conn->query($sql) == TRUE) {
            echo '<script>alert("user registered!")</script>';
            echo "<script>window.location.href='index.php'</script>";
        } else {
            echo "filed to connect" . $conn->error;
        }
    }
}

?>