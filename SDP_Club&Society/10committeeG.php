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
    <title>Members</title>
    
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


    <form>
    <input type="text" id="myInput" onkeyup="myFunction()" name="search" placeholder = "Type Event Names...">
            <br>
            <br>
            
    <table id="customers">
        <tr>

            <th>ID</th>
            <th>Event Name</th>
            <th>Login ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>Edit</th>

        </tr>

        <?php 
        if(isset($_GET['search'])) {
            $search = $_GET['search'];
            $sql = "SELECT * FROM club_events_registration WHERE event_name LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['event_name'] . "</td>";
                echo "<td>" . $row['Login_ID'] . "</td>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>";
                echo '<a href="10committeeGedit.php?edit='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip">Edit</a>';
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

</script>
    </body>
    </html>
