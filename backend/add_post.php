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

    $uploaded_images = [];

    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
        $image_name = $_FILES['images']['name'][$key];
        $target = "uploads/" . basename($image_name);

        if (move_uploaded_file($tmp_name, $target)) {
            $uploaded_images[] = $image_name;
        }
    }

    // Store the image names as a comma-separated string
    $image_list = implode(",", $uploaded_images);

    $sql = "INSERT INTO posts (title, author, date_posted, body, image, link) 
            VALUES ('$title', '$author', '$date_posted', '$body', '$image_list', '$link')";

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
    <link href="../frontend/assets/img/logo.png" rel="icon">
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
            <a class="return" href="dashboard.php">Back ><br></a>
        </header>

    <h2>Add New Post</h2>

    <div class="form-container">
        <form action="" method="POST" enctype="multipart/form-data">
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
                <input type="file" name="images[]" multiple id="image" accept="image/*">
            </div>

            <button type="submit" name="submit" class="submit-btn">Post</button>
        </form>
    </div>

</body>
</html>
