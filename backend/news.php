<?php
include 'config.php';

$result = $conn->query("SELECT * FROM posts ORDER BY date_posted DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News & Updates</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <div class="container">
        <h1 class="page-title">Latest News & Updates</h1>

        <div class="news-wrapper">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="news-card">
                        <?php if (!empty($row['image'])): ?>
                            <img src="../uploads/<?php echo $row['image']; ?>" alt="Blog image" class="news-image">
                        <?php endif; ?>

                        <div class="news-content">
                            <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                            <p class="news-meta">
                                By <?php echo htmlspecialchars($row['author']); ?> on 
                                <?php echo date("F j, Y", strtotime($row['date_posted'])); ?>
                            </p>

                            <p class="preview">
                                <?php
                                    $text = strip_tags($row['body']);
                                    $preview = strtok($text, ".!?") . '.';
                                    echo htmlspecialchars($preview);
                                ?>
                            </p>

                            <a href="post.php?id=<?php echo $row['id']; ?>" class="read-more-btn">Read More</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No posts available.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
