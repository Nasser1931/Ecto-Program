<?php
$conn = mysqli_connect("localhost", "root", "", "etco");

if (!$conn) {
    die("Error in connection") . mysqli_connect_error();
}