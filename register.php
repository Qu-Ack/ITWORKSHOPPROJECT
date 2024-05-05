<?php 

include './db_conn.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);

$name = htmlspecialchars($name);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO Users (name, email, password) VALUES ('$name', '$email', '$password')";

if (mysqli_query($con, $sql)) {
    echo '<div id="message">Record inserted successfully. Redirecting in 2 seconds...</div>';
        echo '<script>setTimeout(function() { window.location.href = "index.php"; }, 2000);</script>';
        exit;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

