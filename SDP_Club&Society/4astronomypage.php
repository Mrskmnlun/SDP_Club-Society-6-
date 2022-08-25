<?php 

include 'config.php';

session_start();

if (!isset($_SESSION['Name'])) {
    header("Location: 2login.php");
  }

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Astronomy Club</title>
  <link rel="stylesheet" href="swiper-bundle.min.css">
  <link rel="stylesheet" href="guestpg.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>

  <header>
    <div class="nav-bar">
      <a href="4astronomypage.php" class="logo">APU iSocial Club</a>
      <div class="navigation">
        <div class="nav-items">
          <i class="uil uil-times nav-close-btn"></i>
          <a href="4astronomypage.php"><i class="uil uil-estate"></i> Home</a>
          <a href="5astronomyEv.php"><i class="uil uil-browser"></i> Events</a>
          <a href="5astronomyFe.php"><i class="uil uil-comment-alt-message"></i> Contact Us</a>
          <a href="5astronomyP.php"><i class="uil uil-user"></i> Profile</a>
          <a href="2logout.php"><i class="uil uil-sign-out-alt"></i> Log Out</a>
        </div>
      </div>
      <i class="uil uil-apps nav-menu-btn"></i>
    </div>
  </header>
    
  <section class="home">
    <div class="media-icons">
      <a href="#"><i class="uil uil-facebook-f"></i></a>
      <a href="#"><i class="uil uil-instagram"></i></a>
      <a href="#"><i class="uil uil-twitter"></i></a>
    </div>

    <div class="swiper bg-slider">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="images/bigmoon.jpg" alt="">
          <div class="text-content">
          <h2 class="title"> <?php echo "<h1>Welcome " . $_SESSION['Name'] . "</h1>"; ?> </h2>
            <h2 class="title">Club <span>Details</span></h2>
            <p>We will learn about planets, stars, and the sun and moon.
               If you are also curious about space, beginner astronomy studies are a fun way to keep your curiosity flourishing!
                In a beginning astronomy club, you will learn about objects in space and their role in the universe.</p>
            <a href="5astronomyD.php">
            <button class="read-btn">Click Here <i class="uil uil-arrow-right"></i></button></a>
          </div>
        </div>
        <div class="swiper-slide dark-layer">
          <img src="images/stars.jpg" alt="">
          <div class="text-content">
            <h2 class="title">Events <span>Registration</span></h2>
            <p>Astronomy Club offers full-fledged events for virtual, hybrid & physical events delivering seamless and enriched experience for attendees.
               All you have to do is view the upcoming events that you are interested in and 
               our event registration system can deliver an efficient and swift process in registration management.
            </p>
            <a href="5astronomyEv.php">
            <button class="read-btn">Click Here <i class="uil uil-arrow-right"></i></button></a>
          </div>
        </div>
        <div class="swiper-slide dark-layer">
          <img src="images/bluegalaxy.jpg" alt="">
          <div class="text-content">
            <h2 class="title">Facts <span>Details</span></h2>
            <p>Want to know more about the club you have chosen? Especially learning more about the facts! Click the button below to learn more.
               Be prepared to get your mind blown!</p>
            <a href="5astronomyFa.php">
            <button class="read-btn">Click Here <i class="uil uil-arrow-right"></i></button></a>
          </div>
        </div>
        <div class="swiper-slide">
          <img src="images/smallmoon.jpg" alt="">
          <div class="text-content">
            <h2 class="title">Events <span>History</span></h2>
            <p>Click here to view all the events you have participated previously.
            And keep in touch to check the status of your registered events.
            And make sure to participate and enjoy as best as you can!</p>
            <a href="5astronomyEvP.php">
            <button class="read-btn">Click Here <i class="uil uil-arrow-right"></i></button></a>
          </div>
        </div>
      </div>
    </div>
    
    <div class="bg-slider-thumbs">
      <div class="swiper-wrapper thumbs-container">
        <img src="images/bigmoon.jpg" class="swiper-slide" alt="">
        <img src="images/stars.jpg" class="swiper-slide" alt="">
        <img src="images/bluegalaxy.jpg" class="swiper-slide" alt="">
        <img src="images/smallmoon.jpg" class="swiper-slide" alt="">
      </div>
    </div>
  </section>

 

  <script src="swiper-bundle.min.js"></script>
  <script src="main.js"></script>

</body>
</html>