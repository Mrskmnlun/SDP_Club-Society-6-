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
    <link rel="stylesheet" href="7countryFe.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <title>Contact Us</title>
    
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
        <a href="10committee.php" class="brand">APU iSocial Club</a>

        <div class="menu-btn"></div>

        <div class="navigation">
            <div class="navigation-items">
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


<form>
    <h2>View Inquiry For members</h2>
    <hr>
    <br>
    <table id="customers">
        <tr>
            <th>id</th>
            <th>Login ID</th>
            <th>Name</th>
            <th>Feedback</th>
            <th>Reply</th>
            <th>Action</th>
        </tr>

        <?php   
        $select = "SELECT * FROM club_feedbacks ORDER BY id ASC";
        $run = mysqli_query($conn,$select);
        while($row_club_feedbacks = mysqli_fetch_array($run)) {
            $id = $row_club_feedbacks['id'];
            $Login_ID = $row_club_feedbacks['Login_ID'];
            $Name = $row_club_feedbacks['Name'];
            $Feedback = $row_club_feedbacks['Feedback'];
            $Reply = $row_club_feedbacks['Reply'];
        
        ?>
        <tr>
            <td><?php echo $id; ?></td>
            <td> <?php echo $Login_ID; ?> </td>
            <td> <?php echo $Name; ?> </td>
            <td> <?php echo $Feedback; ?> </td>
            <td> <?php echo $Reply; ?> </td>
            <td>
                <a href="10committeeFeR.php?edit=<?php echo $row_club_feedbacks['id']; ?>" class="edit_btn" >Reply</a>
            <?php } ?>
        </tr>
    </table>
    </form>


    </body>
    </html>
