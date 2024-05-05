<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect to login page if user is not logged in
    echo '<div id="message">You need to Log In First. Redirecting in 4 seconds...</div>';
    echo '<script>setTimeout(function() { window.location.href = "index.php"; }, 4000);</script>';
    exit;
}

// Include database connection
include "./db_conn.php";

// Get user ID from session
$user_id = $_SESSION['id'];

// Retrieve user's problems from database
$sql = "SELECT * FROM problems WHERE userid = '$user_id'";
$result = mysqli_query($con, $sql);

// Check if problems exist
if (mysqli_num_rows($result) > 0) {
    // Display problems
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Problems</title>
    <link rel="stylesheet" href="problems.css">
</head>
<body>
    <div class="container">
        <h1>Your Problems</h1>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="problem">';
        echo '<div class="problem-title">' . $row['title'] . '</div>';
        echo '<div class="problem-description">' . nl2br($row['descrip']) . '</div>';
        echo '</div>';
    }
    echo '</div>
</body>
</html>';
} else {
    echo "You have not submitted any problems yet.";
}
?>