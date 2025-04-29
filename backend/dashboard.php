<?php
session_start();
include 'config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$result = $conn->query("SELECT * FROM posts ORDER BY date_posted DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel=stylesheet href="../assets/styles.css">

</head>
<body>

    <h2>Admin Dashboard</h2>

    <div class="dashboard-container">
        <div class="action-links">
            <a href="add_post.php">Add New Post</a> |
            <a href="logout.php" class="logout">Logout</a>
        </div>

        <?php if (isset($_GET['message']) && $_GET['message'] === 'updated'): ?>
            <div class="message">Post updated successfully!</div>
        <?php endif; ?>

        <?php while($row = $result->fetch_assoc()): ?>
            <div class="post">
                <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                <p><?php echo htmlspecialchars($row['body']); ?></p>
                <?php if ($row['image']): ?>
                    <img src="../uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="Post Image">
                <?php endif; ?>
                <small>By <?php echo htmlspecialchars($row['author']); ?> on <?php echo $row['date_posted']; ?></small>
                <div class="edit-delete-links">
                    <a href="edit_post.php?id=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="delete_post.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

</body>
</html>
