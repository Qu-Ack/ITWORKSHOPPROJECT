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
                        <li><a href="logout.php">Sign Out</a></li>
                        <li><a href="problems.php">Your Problems </a></li>
                    <?php else: ?>
                        <li><a href="signup.php">Sign Up</a></li>
                        <li><a href="login.php">Log In</a></li>
                    <?php endif; ?>
                    <!-- Add scroll down link -->
                    <li><a href="#register">Register a Problem</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero section -->
    <section class="hero">
        <div class="container">
            <h1>Register A Problem of Your College On ProbHub</h1>
            <p>Solve your problems with ease.</p>
            <a href="#register" class="cta-button">Register Now</a>
        </div>
    </section>


    <!-- Register a Problem section -->
    <section id="register" class="register-section">
        <div class="container">
            <h2>Register a Problem</h2>
            <form action="problem_register.php" method="post">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
                <label for="problem">Problem Description:</label>
                <textarea id="problem" name="problem" rows="4" required></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
    </section>

    <!-- Add more sections as needed -->

    <script>
        // Smooth scroll functionality
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>
