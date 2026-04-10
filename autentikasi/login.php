<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>

<body>
    <h1>Halaman Login</h1>

    <a href="index.php">Home</a>
    <a href="login.php">Login</a>

    <?php if (isset($_SESSION['error'])): ?>
        <p>
            <?php echo $_SESSION['error']; ?>
        </p>
    <?php endif; ?>

    <form action="ceklogin.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <button type="submit">Login</button>
    </form>
    <?php
    unset($_SESSION['error']);
    ?>
</body>

</html>