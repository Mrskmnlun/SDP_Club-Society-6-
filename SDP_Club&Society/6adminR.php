<?php 

include 'config.php';

session_start();
if (!isset($_SESSION['Name'])) {
    header("Location: 2login.php");
  }

if(isset($_GET['del'])) {
    $del_id = $_GET['del'];
$delete = "DELETE FROM users_database WHERE id='$del_id'";
$run_delete = mysqli_query($conn, $delete);
    if($run_delete === true) {
      if($run_delete === true) {
        echo "<script>alert('Record Has Been Deleted.')</script>";
    }else {
        echo "<script>alert('Failed, Try Again.')</script>";
    }
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="6adminCO.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <title>club</title>
    
</head>
<style>
    .button {
    background-color: #4889da;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
  }
  select {
  width: 100%;
  padding: 16px 20px;
  border: black;
  border-radius: 4px;
  background-color: #f1f1f1;
}
</style>
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


    <form>

            
    <table id="customers">
        <tr>

            <th>Report Type</th>
            <th>Action</th>
        </tr>

        <tr>
            
            <td>Event Details Report</td>
            <td><a href="./fpdf184/event.php" class="button">View</a></td>
        </tr>
            <td>Account Details Report</td>
            <td><a href="./fpdf184/account.php" class="button">View</a></td>
        </tr>
            <td>Inquiry Details Report</td>
            <td><a href="./fpdf184/inquiry.php" class="button">View</a></td>
        </tr>
            <td>Event Participation Report</td>
            <td><a href="./fpdf184/clubdetails.php" class="button">View</a></td>
        </tr>
    </table>
    </form>

</script>
    </body>
    </html>
