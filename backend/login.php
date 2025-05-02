<?php
session_start();
include 'config.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin'] = $admin['username'];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "No admin found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../assets/styles.css">
    <link href="../frontend/assets/img/logo.png" rel="icon">
</head>
<body>

<img src="../frontend/assets/img/logo.png" style="position: relative; left: 45%; top: 50px">
<div class="login-container">
    <h2>Admin Login</h2>

    <?php if (isset($error)): ?>
        <div class="error-message"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="input-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div class="input-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit" name="login" style="background-color: green">Login</button>
    </form>
</div>

</body>
</html>
