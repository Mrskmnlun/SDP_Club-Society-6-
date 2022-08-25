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
    <link rel="stylesheet" href="9movieFa.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <title>Club Facts</title>
    
</head>
<body>
<!------------------------------ HEADER ------------------------------>
    <header> 
        <a href="4moviepage.php" class="brand">APU iSocial Club</a>

        <div class="menu-btn"></div>

        <div class="navigation">
            <div class="navigation-items">
                <a href="4moviepage.php">Home</a>
                <a href="9movieEv.php">Events</a>
                <a href="9movieFe.php">Contact Us</a>
                <a href="9movieP.php">Profile</a>
                <a href="2logout.php">Log Out </a>
            </div>
        </div>

    </header>

    <section class="home">

<div class="content active">
    <h1>Facts</h1>
    <?php 
        $select = "SELECT * FROM fact_details WHERE fact_type = 'movie'";
        $run = mysqli_query($conn, $select);

        while($row_fact_details = mysqli_fetch_array($run)) {
            $id = $row_fact_details['id'];
            $facts_info = $row_fact_details['facts_info'];
            $fact_type = $row_fact_details['fact_type'];

    ?>
    <h2> <?php echo $facts_info;?> </h2>
    <?php } ?>

</div>
</section>