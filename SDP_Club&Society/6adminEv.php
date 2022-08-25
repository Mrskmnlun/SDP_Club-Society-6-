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
    <title>Events</title>
    
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


    <form>
    <input type="text" id="myInput" onkeyup="myFunction()" name="search" placeholder = "Type Astronomy/Country/Culture/Movie...">
            <br>
            <br>
            
    <table id="customers">
        <tr>

            <th>ID</th>
            <th>Event ID</th>
            <th>Event Name</th>
            <th>Event Details</th>
            <th>Event Type</th>
            <th>Event Date</th>
            <th>Event Deadline</th>
            <th>Event Time</th>
            <th>Status</th>
            <th>Edit</th>
        </tr>

        <?php 
        if(isset($_GET['search'])) {
            $search = $_GET['search'];
            $sql = "SELECT * FROM club_events WHERE event_type LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['event_id'] . "</td>";
                echo "<td>" . $row['event_name'] . "</td>";
                echo "<td>" . $row['event_details'] . "</td>";
                echo "<td>" . $row['event_type'] . "</td>";
                echo "<td>" . $row['event_date'] . "</td>";
                echo "<td>" . $row['event_deadline'] . "</td>";
                echo "<td>" . $row['event_time'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>";
                echo '<a href="6adminEvEdit.php?edit='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip">Edit</a>';
                echo "</td>";
                echo "</tr>";
            }
        ?>
        <tr>

            <?php } ?>
        </tr>
    </table>
    </form>
    

    <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("customers");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
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

</script>
    </body>
    </html>
