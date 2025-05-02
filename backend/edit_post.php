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
    <link href="../frontend/assets/img/logo.png" rel="icon">
    <style>
    .image-collage {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
        margin-top: 10px;
    }

    .collage-image {
        width: calc(33.33% - 10px); /* 3 images per row with gap */
        height: auto;
        border-radius: 8px;
        object-fit: cover;
        max-width: 100%; /* Ensure images scale properly */
    }

    @media (max-width: 768px) {
        .collage-image {
            width: calc(50% - 10px); /* 2 per row on tablets */
        }
    }

    @media (max-width: 480px) {
        .collage-image {
            width: 100%; /* Stack images on smaller screens */
        }
    }

    .return {
            color: #04550A;
            text-decoration: none;
            float: right;
            position: relative;
            bottom: 20px;
            right: 110px;
        }

        .return {
            margin-left: auto; /* Push to the right */
            font-family: "Poppins",  sans-serif;
            color: #04550A; /* Text color */
            text-decoration: none; /* Remove underline */
            position: relative;
            top: 1px;
        }

        .return:hover{
            color: #000; /* Text color */
        }



    </style>
</head>
<body>
    <div class="container">
    <a class="return" href="dashboard.php" style="position: relative; left: 0">Back ><br></a>
        <h2 class="form-title">Edit Post</h2>

        <form method="POST" action="update_post.php" enctype="multipart/form-data" class="form">
            <input type="hidden" name="id" value="<?php echo $post['id']; ?>">

            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>

            <label for="author">Author</label>
            <input type="text" name="author" id="author" value="<?php echo htmlspecialchars($post['author']); ?>" required>

            <label for="content">Content</label>
            <textarea name="content" id="content" rows="8" required><?php echo htmlspecialchars($post['body']); ?></textarea>

            <?php if (!empty($post['image'])): ?>
                <label>Current Images</label><br>
                <div class="image-collage">
                    <?php
                        $images = explode(',', $post['image']);
                        foreach ($images as $img):
                            $img = trim($img); // Remove extra spaces
                            if (!empty($img)):
                    ?>
                        <img src="../uploads/<?php echo htmlspecialchars($img); ?>" alt="Post Image" class="collage-image">
                    <?php
                            endif;
                        endforeach;
                    ?>
                </div>
            <?php endif; ?>



            <label for="image">Change Image</label>
            <input type="file" name="image[]" multiple id="image">

            <label for="link">Image Link</label>
            <input type="text" name="link" id="link" value="<?php echo htmlspecialchars($post['link']); ?>">

            <button type="submit" name="update" class="btn">Update Post</button>
        </form>
    </div>
</body>
</html>
