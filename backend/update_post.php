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

   // Check if images are uploaded
if (isset($_FILES['image']) && count($_FILES['image']['name']) > 0) {
    $imageNames = []; // Array to hold names of the uploaded images
    $uploadDir = '../uploads/'; // Make sure this folder exists and is writable

    // Loop through each uploaded file
    for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
        if ($_FILES['image']['error'][$i] === UPLOAD_ERR_OK) {
            $image = $_FILES['image'];
            $imageName = time() . '_' . basename($image['name'][$i]); // Prevent filename conflicts
            $uploadFilePath = $uploadDir . $imageName;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($image['tmp_name'][$i], $uploadFilePath)) {
                // Add the image name to the array
                $imageNames[] = $imageName;
            } else {
                echo "Error uploading image: " . $image['name'][$i];
                exit;
            }
        } else {
            echo "Error uploading image: " . $_FILES['image']['name'][$i];
            exit;
        }
    }

    // Convert the image names array to a comma-separated string
    $imageNamesStr = implode(',', $imageNames);

    // Update the post with the new images and other fields
    $sql = "UPDATE posts SET title = ?, author = ?, body = ?, image = ?, link = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $title, $author, $content, $imageNamesStr, $image_link, $id);

    if ($stmt->execute()) {
        header("Location: dashboard.php?message=updated");
    } else {
        echo "Error updating post.";
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

        if ($stmt->execute()) {
            header("Location: dashboard.php?message=updated");
        } else {
            echo "Error updating post.";
        }
    }

?>
