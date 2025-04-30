<?php
include 'config.php';

if (!isset($_GET['id'])) {
    echo "No post ID provided.";
    exit();
}

$id = (int)$_GET['id'];
$sql = "SELECT * FROM posts WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows != 1) {
    echo "Post not found.";
    exit();
}

$post = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($post['title']); ?></title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <div class="container">
        <a href="news.php" class="back-btn">← Back to News</a>
        
        <div class="full-post">
            <h1><?php echo htmlspecialchars($post['title']); ?></h1>
            <p class="news-meta">
                By <?php echo htmlspecialchars($post['author']); ?> on 
                <?php echo date("F j, Y", strtotime($post['date_posted'])); ?>
            </p>

            <?php if (!empty($post['image'])): ?>
                <img src="../uploads/<?php echo $post['image']; ?>" alt="Post image" class="full-post-image">
            <?php endif; ?>

            <div class="post-body">
                <?php echo nl2br(htmlspecialchars($post['body'])); ?>
            </div>

            <?php if (!empty($post['link'])): ?>
                <p class="external-link">
                    <a href="<?php echo htmlspecialchars($post['link']); ?>" target="_blank">External Link</a>
                </p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
