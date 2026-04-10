<?php session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protected</title>
</head>

<body>
    <h1>Halaman Protected</h1>

    <a href="index.php">Home</a>
    <?php if (isset($_SESSION['username'])): ?>
        <a href="protected.php">Protected</a>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <a href="login.php">Login</a>
    <?php endif; ?>

    <?php if (isset($_SESSION['username'])): ?>
        <p>Selamat datang,
            <?php echo $_SESSION['username']; ?>!
        </p>
    <?php else: ?>
        <p>Anda belum login</p>
    <?php endif; ?>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A nobis nostrum soluta ad corporis voluptates unde
        maxime architecto eveniet iste tempore nulla ipsum dolorem, quis praesentium modi necessitatibus quisquam porro,
        at, harum atque aut id commodi? Animi nulla quidem rerum laudantium sed dicta magni voluptate sapiente earum,
        placeat vitae porro minima quos, accusantium magnam corporis quae eos doloribus ab debitis! Laudantium commodi
        vel est minus error vitae suscipit expedita aperiam officiis amet, modi quis natus blanditiis deleniti impedit,
        debitis eos aspernatur praesentium totam quisquam consectetur dicta et maxime a! Atque quidem rem numquam non
        magni, eos itaque modi ratione blanditiis?</p>
</body>

</html>