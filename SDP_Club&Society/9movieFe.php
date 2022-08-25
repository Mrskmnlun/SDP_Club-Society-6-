<?php 

include 'config.php';

session_start();
if (!isset($_SESSION['Name'])) {
    header("Location: 2login.php");
  }


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $Login_ID = $_POST["Login_ID"];
    $Name = $_POST["Name"];
    $Feedback = $_POST["Feedback"];
    
    $sql = "INSERT INTO club_feedbacks (Login_ID, Name, Feedback) VALUES ('$Login_ID', '$Name', '$Feedback')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>Feedback submitted successfully</script>";
        echo header("Location: 9movieFe.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="9movieFe.css">
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
<!------------------------------ HEADER ------------------------------>


<form>
    <h2>View Inquiry For<?php echo $_SESSION['Name']; ?></h2>
    <hr>
    <br>
    <table id="customers">
        <tr>

            
            <th>Feedback</th>
            <th>Reply</th>

        </tr>

        <?php   
        $select = "SELECT * FROM club_feedbacks WHERE Login_ID = '$_SESSION[Login_ID]' ORDER BY id ASC";
        $run = mysqli_query($conn,$select);
        while($row_club_feedbacks = mysqli_fetch_array($run)) {
            $Login_ID = $row_club_feedbacks['Login_ID'];
            $Name = $row_club_feedbacks['Name'];
            $Feedback = $row_club_feedbacks['Feedback'];
            $Reply = $row_club_feedbacks['Reply'];
        
        ?>
        <tr>
           
            <td> <?php echo $Feedback; ?> </td>
            <td> <?php echo $Reply; ?> </td>
 
            <?php } ?>
        </tr>
    </table>
    </form>
    <br>
    <button class="button" onclick="openLoginForm()">Send Feedback</button>
            <div class="popup-overlay"></div>
            <div class="popup">
            <div class="popup-close" onclick="closeLoginForm()">&times;</div>
            <div class="form">
            <form action="" method="POST">
                <div class="header">
                Event register
                </div>
                <div class="element">
                <label for="Login_ID">Login ID</label>
                <input type="text" id="Login_ID" name="Login_ID" value="<?php echo $_SESSION['Login_ID'] ?> "readonly="readonly">
                </div>
                <div class="element">
                <label for="Name">Name</label>
                <input type="text" id="Name" name ="Name" value="<?php echo $_SESSION['Name'] ?>" readonly="readonly">
                </div>
                <div class="element">
                <label for="Feedback">Feedback</label>
                <textarea cols="37" rows="10" id="Feedback" name ="Feedback"  maxlength="55" placeholder="  Send your message..." required></textarea>
                </div>
                <div class="element">
                <button type="submit" value="submit">Send</button>
                </div>
            </div>
            </div>

    <script>
function openLoginForm(){
  document.body.classList.add("showLoginForm");
}
function closeLoginForm(){
  document.body.classList.remove("showLoginForm");
}
</script>
    </body>
    </html>
