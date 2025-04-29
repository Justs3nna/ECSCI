<?php
session_start();
include 'config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (int)$_POST['id'];  // Safely cast ID
    $title = $_POST['title'];
    $author = $_POST['author'];
    $content = $_POST['content'];
    $image_link = $_POST['link'];

    // Check if a new image is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Handle file upload
        $image = $_FILES['image'];
        $imageName = time() . '_' . basename($image['name']); // Prevent filename conflicts
        $uploadDir = 'uploads/'; // Make sure this folder exists and is writable
        $uploadFilePath = $uploadDir . $imageName;

        if (move_uploaded_file($image['tmp_name'], $uploadFilePath)) {
            // Update post with the new image and other fields
            $sql = "UPDATE posts SET title = ?, author = ?, body = ?, image = ?, link = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssi", $title, $author, $content, $imageName, $image_link, $id);

            if ($stmt->execute()) {
                header("Location: dashboard.php?message=updated");
            } else {
                echo "Error updating post.";
            }
        } else {
            echo "Error uploading image.";
        }
    } else {
        // No new image uploaded, just update the post without changing the image
        $sql = "UPDATE posts SET title = ?, author = ?, body = ?, link = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $title, $author, $content, $image_link, $id);

        if ($stmt->execute()) {
            header("Location: dashboard.php?message=updated");
        } else {
            echo "Error updating post.";
        }
    }
}
?>
