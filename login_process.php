<?php
session_start();

include "./db_conn.php";

$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);

$email = filter_var($email, FILTER_SANITIZE_EMAIL);

$sql = "SELECT * FROM Users WHERE email='$email'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id']; // Storing the name in session
        header("Location: index.php");
        exit;
    } else {
        echo "Incorrect password";
    }
} else {
    echo '<div id="message">User Not Found. Redirecting in 2 seconds ...</div>';
        echo '<script>setTimeout(function() { window.location.href = "login.php"; }, 2000);</script>';
        exit;
}
