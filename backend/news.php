<?php
include 'config.php';

$result = $conn->query("SELECT * FROM posts ORDER BY date_posted DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News & Updates</title>
    <link href="../frontend/assets/img/logo.png" rel="icon">
    <link rel="stylesheet" href="../assets/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/14e875ec8f.js" crossorigin="anonymous"></script>
    <script src="../fron"></script>
    <style>
        body {
            font-family: 'Raleway', sans-serif;
            overflow-x: hidden;
        }

        .containers {
            display: flex;
            background-color: #132a2c;
            justify-content: space-between;
            align-items: flex-start; /* Align items to the top */
            padding: 2% 5% 2% 5%;
            color: white;
            margin-top: 40px;
            gap: 2px;
        }

        .info {
            width: 40%; /* Adjust width as needed */
            padding-left: 40px;
        }

        .links {
            width: 20%; /* Adjust width as needed */
            text-align: left;
        }

        .services {
            width: 40%; /* Adjust width as needed */
            text-align: left;
            margin-right: 190px;
        }

        .links > p, .services > p {
            margin-bottom: 10px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 5px;
            font-size: 14px;
        }

        .footer {
            text-align: center;
            margin-top: -30px;
            font-size: 0.8em;
            background-color: #132a2c;
            color: white;
            overflow: hidden;
        }

        .social-icon {
            margin-top: 20px;
        }

        .fa {
            font-size: 2em;
            color: #f2f2f2;
        }

        .links a, .services a {
            color:rgb(205, 205, 205);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .links a:hover, .services a:hover{
            color: #ffc451;
        }
        
        span {
            color: #ffc451;
        }

        .social-icon{
            width: 40px; 
            height: 40px; 
            background-color: #374a4c; 
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            transition: background-color 0.4s ease; /* Add transition property */
        }

        .social-icon:hover{
            background-color: #ffc451;
            cursor: pointer;
        }

        i {
            color: #f2f2f2;
            font-size: 15px;
            transition: color 0.4s ease; /* Add transition for icon color */
        }

        .social-icon:hover i { /* Add this to change the icon color on hover */
            color: black;
        }

        .return {
            color: #04550A;
            text-decoration: none;
            float: right;
            position: relative;
            bottom: 20px;
            right: 110px;
        }

        header {
            display: flex;
            align-items: center; /* Vertically align items */
            height: 75px; /* Match logo height */
            background-color: white; /* Background color */
            padding: 10px 20px 10px 110px; /* Add some padding */
        }

        header img {
            width: 80px;
            margin-right: 14px; /* Space between logo and text */
        }

        .title-ecsci {
            font-size: 20px;
            font-weight: bold;
            color: #04550A; /* Text color */
            background-color:rgba(80, 85, 4, 0);
            margin: 0; /* Remove default margin */
            position: relative;
            top: 3px;
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

        .news-content h2 {
            color: white;
            font-size: 25px;
            text-align: center;
            background-color: #155724;
            padding: 10px 15px;
            margin: -10px 0 -1px 0;
        }

        header a{
            text-decoration: none;
        }

        .preview {
            margin-top: 0px;
        }
        
        .news-image-container {
            width: 100%;
            height: 200px; /* or any fixed height */
            display: flex;
            align-items: center;
            overflow: hidden;
            border-radius: 8px; /* optional */
        }

        .news-image {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            display: block;
        }

        .news-wrapper {
            display: flex;
            flex-direction: column;
            gap: 20px;
            padding: 2rem;
            margin-top: -30px;
            background-color: #fff;
            position: relative;
            bottom: 10px;
        }

        .news-item {
            display: flex;
            align-items: flex-start;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            gap: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .news-thumbnail img {
            width: 180px;
            height: auto;
            margin-top: 5px;
            border-radius: 6px;
            object-fit: cover;
        }

        .news-content {
            flex: 1;
        }

        .news-title {
            margin: 0;
            font-size: 1.1rem;
            font-weight: bold;
            color: #222;
        }

        .news-meta {
            font-size: 0.9rem;
            color: #777;
            margin: 4px 0;
        }

        .news-preview {
            margin-top: 8px;
            font-size: 0.95rem;
            color: #444;
        }

        .read-more-container {
            display: flex;
            align-self: center;
            margin-left: auto;
        }

        .read-more-link {
            color: green;
            font-weight: bold;
            text-decoration: none;
            font-size: 0.95rem;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .read-more-link:hover {
            color: #000;
        }

        .bread{
            font-family: "Roboto", sans-serif;
        }

        .bread p {
            font-size:16px;
            color: #ffc451;
            position: relative;
            left: 130px;
            top: 5px;
        }

        .page-title{
            background-color: #fff;
            position: relative;
        }

        .page-title h1 {
            padding: 20px 10px;
            font-size: 35px;
        }
        </style>
</head>
<body>

    <header style="position: sticky; top: 0; z-index: 2">
        <img src="../frontend/assets/img/logo.png" alt="">
        <a href="../frontend/index.html"><h2 class="title-ecsci">ENFANT CHERI STUDY CENTRE, INC.</h2></a>
        <a class="return" href="../frontend/index.html">Return to Home ><br></a>
    </header>

    <div class="bread">
        <p>The Cherian News</p>
    </div>

    <div class="page-title">
        <h1>Latest News & Updates</h1>
    </div>

    <div class="news-wrapper">
    <?php if ($result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="news-item">
            <?php
                // Handle only the first image
                if (!empty($row['image'])) {
                    $images = explode(',', $row['image']);
                    $firstImage = trim($images[0]);
            ?>
                <div class="news-thumbnail">
                    <img src="../uploads/<?php echo htmlspecialchars($firstImage); ?>" alt="Blog image">
                </div>
            <?php } ?>

            <div class="news-content">
                <h3 class="news-title"><?php echo htmlspecialchars($row['title']); ?></h3>
                <p class="news-meta">
                    Author: <?php echo htmlspecialchars($row['author']); ?> 
                    (<?php echo date("F j, Y", strtotime($row['date_posted'])); ?>)
                </p>

                <p class="news-preview">
                    <?php
                        $text = strip_tags($row['body']);
                        $minLength = 350;

                        if (strlen($text) <= $minLength) {
                            $preview = $text;
                        } else {
                            $pos = strpos($text, '.', $minLength);
                            if ($pos !== false) {
                                $preview = substr($text, 0, $pos + 1);
                            } else {
                                $preview = substr($text, 0, $minLength) . '...';
                            }
                        }

                        echo htmlspecialchars($preview);
                    ?>
                </p>
            </div>

            <div class="read-more-container">
                <a href="post.php?id=<?php echo $row['id']; ?>" class="read-more-link">Read More →</a>
            </div>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>No posts available.</p>
<?php endif; ?>

    </div>
    
    <div class="outer">
        <div class="containers">
            <div class="info">
                <h1>Enfant Cheri Study Center, Inc</h1>
                <p style="margin-bottom: 20px;">P-1 Upper Doongan, Butuan City</p>
                <p style="margin-bottom: 20px;"><span style="font-weight: 600; color: white;">Telephone:</span> 817-0264/225-1534</p>
                <p><span style="font-weight: 600; color: white;">Phone:</span> 09079258780</p>
                <p><span style="font-weight: 600; color: white;">Email:</span> ecscig2@yahoo.com</p>
                <div class="social-icon">
                    <a href="https://www.facebook.com/enfant.cheri.9" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                </div>
            </div>
            <div class="links">
                <h3>Useful Links</h3>
                <a href="#" style="font-size: 14px" ><span>&gt;</span>  San Franz Branch</a>
            </div>
            <div class="services">
                <h3>Our Services</h3>
                <a href="../frontend/index.html#academic" style="font-size: 14px" ><span>&gt;</span>  Academic Program</a>
            </div>
        </div>
        
        <div class="footer">
            <p>&copy; Copyright <span style="color: white; font-weight: 600;">Enfant Cheri Study Center, Inc</span> All Rights Reserved</p>
            <p>Designed by ECSCI</p>
        </div>
    </div>
    <!-- Preloader -->
    <div id="preloader"></div>

    <script src="main.js"></script>
    <script src="../frontend/assets/js/main.js"></script>
</body>
</html>