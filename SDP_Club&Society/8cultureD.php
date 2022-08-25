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
    <link rel="stylesheet" href="8cultureD.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css%22%3E">
    <title>Club Details</title>

</head>
<body>
<!------------------------------ HEADER ------------------------------>
    <header> 
        <a href="4culturepage.php" class="brand">APU iSocial Club</a>

        <div class="menu-btn"></div>

        <div class="navigation">
            <div class="navigation-items">
                <a href="4culturepage.php">Home</a>
                <a href="8cultureEv.php">Events</a>
                <a href="8cultureFe.php">Contact Us</a>
                <a href="8cultureP.php">Profile</a>
                <a href="2logout.php">Log Out</a>
            </div>
        </div>

    </header>




    <section class="home">

        <div class="content active">
            <h1>Club's <span>Details</span></h1>
            <?php 
                $select = "SELECT * FROM club_details WHERE club_type = 'culture'";
                $run = mysqli_query($conn, $select);

                while($row_club_details = mysqli_fetch_array($run)) {
                    $id = $row_club_details['id'];
                    $club_subtopic = $row_club_details['club_subtopic'];
                    $club_info = $row_club_details['club_info'];
                    $club_type = $row_club_details['club_type'];

            ?>
            <h2> <?php echo $club_subtopic;?> </h2>
            <hr>
            <p> <?php echo$club_info;?> </p>
            <br>
            <?php } ?>

        </div>
    </section>