<?php 

include 'config.php';

session_start();
if (!isset($_SESSION['Name'])) {
    header("Location: 2login.php");
  }

if(isset($_POST['submit'])) {
    $Name = $_POST["Name"];
    $Login_ID = $_POST["Login_ID"];
    $event_name = $_POST["event_name"];

    $sql = "SELECT * FROM club_events_registration 
            WHERE Login_ID = '$Login_ID' AND event_name = '$event_name'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if (!$result->num_rows > 0) {
        $sql = "INSERT INTO club_events_registration (event_name, Login_ID, Name)
                VALUES ('$event_name', '$Login_ID', '$Name')";
        $result = mysqli_query($conn, $sql);
        if($result) {
            echo "<script>alert('Registration Completed.')</script>";


        } else {
          echo "<script>alert('Something went wrong')</script>";
        }
    } else {
      echo "<script>alert('You have already registered for this event.')</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="9movieEv.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <title>Event</title>
    
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
    <input type="text" id="myInput" onkeyup="myFunction()" name="search" placeholder = "Search Events Name">
            <br>
            <br>
            
    <table id="customers">
        <tr>

            <th>Event ID</th>
            <th>Event Name</th>
            <th>Event Details</th>
            <th>Event Date</th>
            <th>Event Time</th>

        </tr>

        <?php   
        $select = "SELECT * FROM club_events WHERE event_type = 'Movie' AND status ='Accepted' ORDER BY id ASC";
        $run = mysqli_query($conn,$select);
        while($row_club_events = mysqli_fetch_array($run)) {
            $id = $row_club_events['id'];
            $event_id = $row_club_events['event_id'];
            $event_name = $row_club_events['event_name'];
            $event_details = $row_club_events['event_details'];
            $event_date = $row_club_events['event_date'];
            $event_time = $row_club_events['event_time'];
        
        ?>
        <tr>
            <td> <?php echo $event_id; ?> </td>
            <td> <?php echo $event_name; ?> </td>
            <td> <?php echo $event_details; ?> </td>
            <td> <?php echo $event_date; ?> </td>
            <td> <?php echo $event_time; ?> </td>
 
            <?php } ?>
        </tr>
    </table>
    </form>
    <br>
    <button class="button" onclick="openLoginForm()">Register Event</button>
            <div class="popup-overlay"></div>
            <div class="popup">
            <div class="popup-close" onclick="closeLoginForm()">&times;</div>
            <div class="form">
            <form method="post">

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

                <div class="column is-10">
                  <label for="" class="labell">Select Event Name</label>
                      <div class="element"> 
                          <select class="input is-large" name="event_name" id="event_name"> 
                          <br>
                          <?php 
                          $conn=mysqli_connect("localhost", "root","","isocial_apu_database") or die ("Failed to connect with DB"); 
                          $query="SELECT * from club_events WHERE event_type='Movie' AND status ='Accepted'"; 
                          $result=mysqli_query($conn, $query); 
                          while ($row=mysqli_fetch_array($result)) {
                          ?>
                          <option value="<?php echo $row['event_name']; ?>"><?php echo $row['event_name']; ?></option> 
                          <?php } ?> 
                          </select> 
                      </div>
                </div>

                

                <div class="element">
                <button name="submit" type="submit" value="submit">Register</button>
                </div>

            </div>
            </div>

    <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("customers");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function openLoginForm(){
  document.body.classList.add("showLoginForm");
}
function closeLoginForm(){
  document.body.classList.remove("showLoginForm");
}
</script>
    </body>
    </html>