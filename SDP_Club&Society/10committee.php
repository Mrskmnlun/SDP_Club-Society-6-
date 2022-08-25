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
  <title>Committee Page</title>
  <link rel="stylesheet" href="swiper-bundle.min.css">
  <link rel="stylesheet" href="guestpg.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>

  <header>
    <div class="nav-bar">
      <a href="10committee.php" class="logo">APU iSocial Club</a>
      <div class="navigation">
        <div class="nav-items">
          <i class="uil uil-times nav-close-btn"></i>
          <a href="10committee.php"><i class="uil uil-estate"></i> Home</a>
          <a href="10committeeEv.php"><i class="uil uil-browser"></i> Events</a>
          <a href="10committeeG.php"><i class="uil uil-comment-alt-message"></i> Members</a>
          <a href="10committeeFe.php"><i class="uil uil-user"></i> Feedbacks</a>
          <a href="10committeeRe.php"><i class="uil uil-user"></i> Report</a>
          <a href="10committeeP.php"><i class="uil uil-user"></i> Profile</a>
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
          <img src="images/events.jpg" alt="">
          <div class="text-content">
          <h2 class="title"> <?php echo "<h1>Welcome " . $_SESSION['Name'] . "</h1>"; ?> </h2>
            <h2 class="title">Events <span>Management</span></h2>
            <p>This page is for viewing the event details, and send to admin for approval.</p>
            <a href="10committeeEv.php">
            <button class="read-btn">Click Here <i class="uil uil-arrow-right"></i></button></a>
          </div>
        </div>
        <div class="swiper-slide dark-layer">
          <img src="images/members.jpg" alt="">
          <div class="text-content">
            <h2 class="title">Members <span>Registration</span></h2>
            <p>This is to view members event registration</p>
            <a href="10committeeG.php">
            <button class="read-btn">Click Here <i class="uil uil-arrow-right"></i></button></a>
          </div>
        </div>
        <div class="swiper-slide dark-layer">
          <img src="images/feedbacks.jpg" alt="">
          <div class="text-content">
            <h2 class="title">Feedbacks <span>Management</span></h2>
            <p>This is the page to let committee to reply the feedbacks from members.</p>
            <a href="10committeeFe.php">
            <button class="read-btn">Click Here <i class="uil uil-arrow-right"></i></button></a>
          </div>
        </div>
        <div class="swiper-slide dark-layer">
          <img src="images/report.jpg" alt="">
          <div class="text-content">
            <h2 class="title">Report <span>Management</span></h2>
            <p>This page is for generating report for finalization of overall activities and records.</p>
            <a href="10committeeRe.php">
            <button class="read-btn">Click Here <i class="uil uil-arrow-right"></i></button></a>
          </div>
        </div>
        <div class="swiper-slide">
          <img src="images/viewprofile.jpg" alt="">
          <div class="text-content">
            <h2 class="title">View <span>Profile</span></h2>
            <p>This is the page to view your profile.</p>
            <a href="10committeeP.php">
            <button class="read-btn">Click Here <i class="uil uil-arrow-right"></i></button></a>
          </div>
        </div>
      </div>
    </div>
    
    <div class="bg-slider-thumbs">
      <div class="swiper-wrapper thumbs-container">
        <img src="images/events.jpg" class="swiper-slide" alt="">
        <img src="images/members.jpg" class="swiper-slide" alt="">
        <img src="images/feedbacks.jpg" class="swiper-slide" alt="">
        <img src="images/report.jpg" class="swiper-slide" alt="">
        <img src="images/viewprofile.jpg" class="swiper-slide" alt="">
      </div>
    </div>
  </section>

 

  <script src="swiper-bundle.min.js"></script>
  <script src="main.js"></script>

</body>
</html>