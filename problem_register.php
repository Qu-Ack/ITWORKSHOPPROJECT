<?php
session_start();


include './db_conn.php';

if (!isset($_SESSION['id'])) {
    // Redirect to login page if user is not logged in
    echo '<div id="message">You need to Log In First. Redirecting in 4 seconds...</div>';
    echo '<script>setTimeout(function() { window.location.href = "index.php"; }, 4000);</script>';
    exit;
}

$title = mysqli_real_escape_string($con, $_POST['title']);
$description = mysqli_real_escape_string($con, $_POST['problem']);
$user_id = $_SESSION['id'];

$sql = "INSERT INTO problems (title, descrip, userid) VALUES ('$title', '$description', '$user_id')";
if (mysqli_query($con, $sql)) {
    // Redirect to index page if problem is successfully submitted
    echo '<div id="message">Your Problem was successfully submitted. Redirecting in 4 seconds...</div>';
    echo '<script>setTimeout(function() { window.location.href = "index.php"; }, 4000);</script>';
    exit;
} else {
    // Error handling if insertion fails
    echo "Error: " . mysqli_error($con);
}