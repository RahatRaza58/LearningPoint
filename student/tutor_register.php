<?php
include("includes/config.php");

// Define variables and set them to empty values initially
$name = $email = $pass = $c_pass = $image = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data and perform basic validation
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST["email"]);
    $pass = htmlspecialchars($_POST["pass"]);
    $c_pass = htmlspecialchars($_POST["c_pass"]);

    // Handle image upload separately using $_FILES array
    // Ensure the form field name matches the input name attribute
    if ($_FILES["image"]["error"] === 0) {
        $image = $_FILES["image"]["name"];
        $target_dir = "uploads/"; // Specify the upload directory
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // File uploaded successfully
        } else {
            $error = "Sorry, there was an error uploading your file.";
        }
    } else {
        $error = "Error uploading image.";
    }

    // Check for empty fields
    if (empty($name) || empty($email) || empty($pass) || empty($c_pass) || empty($image)) {
        $error = "All fields are required.";
    } else {
        // Hash the password for security
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

        // Prepare and execute the SQL query
        $insert_query = "INSERT INTO teacher (name, email, pass, c_pass, image) VALUES ('$name', '$email', '$hashed_pass', '$c_pass', '$image')";

        if ($con->query($insert_query) === TRUE) {
            echo "New record created successfully";
        } else {
            $error = "Error: " . $insert_query . "<br>" . $con->error;
        }
    }
}
?>

<!-- Your HTML content goes here -->














<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tutor register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="assets/css/stylee.css">

</head>
<body>

<header class="header">
   
   <section class="flex">

      <a href="home.html" class="logo">Learning Point</a>

      <form action="search.html" method="post" class="search-form">
         <input type="text" name="search_box" required placeholder="search courses..." maxlength="100">
         <button type="submit" class="fas fa-search"></button>
      </form>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>

      <div class="profile">
         <img src="images/pic-1.jpg" class="image" alt="">
         <h3 class="name">shaikh anas</h3>
         <p class="role">studen</p>
         <a href="profile.html" class="btn">view profile</a>
         <div class="flex-btn">
            <a href="login.html" class="option-btn">login</a>
            <a href="register.html" class="option-btn">register</a>
         </div>
      </div>

   </section>

</header>   

<div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
      <img src="images/pic-1.jpg" class="image" alt="">
      <h3 class="name">shaikh anas</h3>
      <p class="role">studen</p>
      <a href="profile.html" class="btn">view profile</a>
   </div>

   <nav class="navbar">
      <a href="home.html"><i class="fas fa-home"></i><span>home</span></a>
      <a href="about.html"><i class="fas fa-question"></i><span>about</span></a>
      <a href="courses.html"><i class="fas fa-graduation-cap"></i><span>courses</span></a>
      <a href="teachers.html"><i class="fas fa-chalkboard-user"></i><span>teachers</span></a>
      <a href="contact.html"><i class="fas fa-headset"></i><span>contact us</span></a>
   </nav>

</div>

<section class="form-container">

   <form action="teacher_profile.php" method="post" enctype="multipart/form-data">
      <h3>register now</h3>
      <p>your name <span>*</span></p>
      <input type="text" name="name" placeholder="enter your name" required maxlength="50" class="box">
      <p>your email <span>*</span></p>
      <input type="email" name="email" placeholder="enter your email" required maxlength="50" class="box">
      <p>your password <span>*</span></p>
      <input type="password" name="pass" placeholder="enter your password" required maxlength="20" class="box">
      <p>confirm password <span>*</span></p>
      <input type="password" name="c_pass" placeholder="confirm your password" required maxlength="20" class="box">
      <p>select profile <span>*</span></p>
      <input type="file" accept="image/*" required class="box">
      <input type="submit" value="register new" name="submit" class="btn">
   </form>

</section>















<footer class="footer">

   &copy; copyright @ 2023 by <span>LTP</span> | all rights reserved!

</footer>

<!-- custom js file link  -->
<script src="assets/js/script.js"></script>

   
</body>
</html>