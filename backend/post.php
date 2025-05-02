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
    <link href="../frontend/assets/img/logo.png" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/14e875ec8f.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Raleway', sans-serif;
            overflow-x: hidden;
        }
        a {
            text-decoration: none;
            color: #04550A;
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
            background-color:#374a4c; 
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

        .post-body{
            font-size: 20px;
            text-align: justify;
        }

        .full-post-image.centered-image {
            display: block;
            margin: 20px auto;
            max-width: 100%;
            height: auto;
            width: 100%; /* Adjust as needed (e.g., 50%, 600px, etc.) */
            border-radius: 10px; /* Optional: adds smooth corners */
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

        .back-btn {
            margin-top: 40px;
            transition: color 0.3s ease;
        }

        .back-btn:hover {
            color: black;
            font-weight: 600;
        }

        .image-collage {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin-bottom: 20px;
        }

        .collage-image {
            width: calc(50.66% - 10px); /* 3 images per row with gap */
            height: auto;
            border-radius: 8px;
            object-fit: cover;
        }

        @media (max-width: 768px) {
            .collage-image {
                width: calc(50% - 10px); /* 2 per row on tablets */
            }
        }

        @media (max-width: 480px) {
            .collage-image {
                width: 100%; /* Stack on phones */
            }
        }

    </style>
</head>
<body>
    <header>
        <img src="../frontend/assets/img/logo.png" alt="">
        <a href="../frontend/index.html"><h2 class="title-ecsci">ENFANT CHERI STUDY CENTRE, INC.</h2></a>
        <a class="return" href="../frontend/index.html">Return to Home ><br></a>
    </header>

    <div class="container" style="margin-top: 40px; width: auto;">
        <a href="news.php" class="back-btn">← Back to News</a>
        
        <div class="full-post">
            <h1><?php echo htmlspecialchars($post['title']); ?></h1>
            <p class="news-meta">
                By <?php echo htmlspecialchars($post['author']); ?> on 
                <?php echo date("F j, Y", strtotime($post['date_posted'])); ?>
            </p>

            <?php if (!empty($post['image'])): ?>
    <div class="image-collage">
        <?php
            $images = explode(',', $post['image']); // Split the images
            foreach ($images as $img):
                $img = trim($img); // Remove any extra spaces
                if (!empty($img)): // Only display non-empty images
        ?>
            <img src="../uploads/<?php echo htmlspecialchars($img); ?>" alt="Post image" class="collage-image">
        <?php
                endif;
            endforeach;
        ?>
    </div>
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
                <a href="#" style="font-size: 14px" ><span>&gt;</span>  Academic Program</a>
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
</body>
</html>