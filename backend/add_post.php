<?php
session_start();
include 'config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $body = $_POST['body'];
    $link = $_POST['link'];
    $date_posted = date('Y-m-d H:i:s');

    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $sql = "INSERT INTO posts (title, author, date_posted, body, image, link) 
            VALUES ('$title', '$author', '$date_posted', '$body', '$image', '$link')";

    if ($conn->query($sql)) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Post</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>

    <h2>Add New Post</h2>

    <div class="form-container">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" required>
            </div>

            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" name="author" id="author" required>
            </div>

            <div class="form-group">
                <label for="body">Body:</label>
                <textarea name="body" id="body" required></textarea>
            </div>

            <div class="form-group">
                <label for="link">Link:</label>
                <input type="text" name="link" id="link">
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" accept="image/*">
            </div>

            <button type="submit" name="submit" class="submit-btn">Post</button>
        </form>
    </div>

</body>
</html>
