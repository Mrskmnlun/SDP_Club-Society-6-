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
    <link rel="stylesheet" href="8cultureEvP.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
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
                <a href="2logout.php">Log Out </a>
            </div>
        </div>

    </header>


    <form>
    <h2>View Events Participated for <?php echo $_SESSION['Name']; ?></h2>
    <hr>
    <br>
    <table id="customers">
    <tr>
            <th>Event Name</th>
            <th>Status</th>
        </tr>

        <?php   
        $select = "SELECT * FROM club_events_registration WHERE Name = '$_SESSION[Name]'";
        $run = mysqli_query($conn,$select);
        
        while($row_club_events_registration = mysqli_fetch_array($run)) {
            $event_name = $row_club_events_registration['event_name'];
            $status =$row_club_events_registration['status'];
            
        ?>
       


        <tr>
            <td> <?php echo $event_name; ?> </td>    
            <td> <?php echo $status; ?> </td>          
            
        <?php } ?>


        </tr>
    </table>

    

  <script src="swiper-bundle.min.js"></script>
  <script src="main.js"></script>
    </body>
    </html>