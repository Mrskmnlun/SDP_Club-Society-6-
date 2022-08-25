<?php 

include 'config.php';

session_start();
if (!isset($_SESSION['Name'])) {
    header("Location: 2login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="6adminCM.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <title>club</title>
    
</head>
<body>
<!------------------------------ HEADER ------------------------------>
    <header> 
        <a href="6admin.php" class="brand">APU iSocial Club</a>

        <div class="menu-btn"></div>

        <div class="navigation">
            <div class="navigation-items">
                <a href="6admin.php"><i class="uil uil-estate"></i> Home</a>
                <a href="6adminCM.php"><i class="uil uil-browser"></i> Club</a>
                <a href="6adminG.php"><i class="uil uil-comment-alt-message"></i> Member</a>
                <a href="6adminCO.php"><i class="uil uil-user"></i> Committee</a>
                <a href="6adminEv.php"><i class="uil uil-user"></i> Events</a>
                <a href="6adminR.php"><i class="uil uil-user"></i> Report</a>
                <a href="2logout.php"><i class="uil uil-sign-out-alt"></i> Log Out</a>
            </div>
        </div>

    </header>
<!------------------------------ HEADER ------------------------------>

