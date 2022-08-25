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
    <link rel="stylesheet" href="6adminEv.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <title>Profile </title>
    
</head>

<body>
<!------------------------------ HEADER ------------------------------>
    <header> 
        <a href="10committee.php" class="brand">APU iSocial Club</a>

        <div class="menu-btn"></div>

        <div class="navigation">
            <div class="navigation-items">
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

    </header>
<!------------------------------ HEADER ------------------------------>


    <h2>View Profile for <?php echo $_SESSION['Name']; ?></h2>
    <hr>
    <br>
            
    <table id="customers">
        <tr>

         
            <th>Login ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>

        </tr>
        <?php   
        $select = "SELECT * FROM users_database WHERE Name = '$_SESSION[Name]'";
        $run = mysqli_query($conn,$select);
        
        while($row_users_database = mysqli_fetch_array($run)) {
            $Login_ID = $row_users_database['Login_ID'];
            $Name = $row_users_database['Name'];
            $Email = $row_users_database['Email'];
            $password = $row_users_database['password'];
        ?>
        <tr>
        <td> <?php echo $Login_ID; ?> </td>
        <td> <?php echo $Name; ?> </td>
        <td> <?php echo $Email; ?> </td>
        <td> <?php echo $password; ?> </td>
        <?php } ?>
        </tr>
    </table>
    
    <script src="swiper-bundle.min.js"></script>
  <script src="main.js"></script>
    </body>
    </html>
