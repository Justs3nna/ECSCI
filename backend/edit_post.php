<?php
session_start();
include 'config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$id = (int)$_GET['id'];
$sql = "SELECT * FROM posts WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $post = $result->fetch_assoc();
} else {
    echo "Post not found!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <div class="container">
        <h2 class="form-title">Edit Post</h2>
        <form method="POST" action="update_post.php" enctype="multipart/form-data" class="form">
            <input type="hidden" name="id" value="<?php echo $post['id']; ?>">

            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>

            <label for="author">Author</label>
            <input type="text" name="author" id="author" value="<?php echo htmlspecialchars($post['author']); ?>" required>

            <label for="content">Content</label>
            <textarea name="content" id="content" rows="8" required><?php echo htmlspecialchars($post['body']); ?></textarea>

            <?php if ($post['image']): ?>
                <label>Current Image</label>
                <img src="../uploads/<?php echo $post['image']; ?>" alt="Current Post Image" class="preview-img">
            <?php endif; ?>

            <label for="image">Change Image</label>
            <input type="file" name="image" id="image">

            <label for="link">Image Link</label>
            <input type="text" name="link" id="link" value="<?php echo htmlspecialchars($post['link']); ?>">

            <button type="submit" name="update" class="btn">Update Post</button>
        </form>
    </div>
</body>
</html>
