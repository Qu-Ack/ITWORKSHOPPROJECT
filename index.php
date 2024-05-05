<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problem Registration</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <img src="probhub_logo.png" alt="ProbHub">
            </div>
            <nav>
                <ul>
                    <?php if(isset($_SESSION['email'])): ?>
                        <li>Welcome, <?php echo $_SESSION['name']; ?>!</li>
                        <li><a href="problems.php">Your Problems</a></li>
                        <li><a href="logout.php">Sign Out</a></li>
                        
                    <?php else: ?>
                        <li><a href="signup.php">Sign Up</a></li>
                        <li><a href="login.php">Log In</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <h1>Problem Registration</h1>
        <form action="register.php" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <label for="problem">Problem Description:</label>
            <textarea id="problem" name="problem" rows="4" required></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
