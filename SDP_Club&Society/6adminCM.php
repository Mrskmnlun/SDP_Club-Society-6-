<?php 

include 'config.php';

session_start();
if (!isset($_SESSION['Name'])) {
    header("Location: 2login.php");
  }

  
  if(isset($_GET['del'])) {
      $del_id = $_GET['del'];
  $delete = "DELETE FROM club_details WHERE id='$del_id'";
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
    <link rel="stylesheet" href="6adminCM.css">
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
    <input type="text" id="myInput" onkeyup="myFunction()" name="search" placeholder = "Type Astronomy/Country/Culture/Movie...">
            <br>
            <br>
            
    <table id="customers">
        <tr>

            <th>ID</th>
            <th>Club Subtopic</th>
            <th>Club Info</th>
            <th>Club Type</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>




        <?php 
        if(isset($_GET['search'])) {
            $search = $_GET['search'];
            $sql = "SELECT * FROM club_details WHERE club_type LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['club_subtopic'] . "</td>";
                echo "<td>" . $row['club_info'] . "</td>";
                echo "<td>" . $row['club_type'] . "</td>";
                echo "<td>";
                echo '<a href="6adminCMedit.php?edit='. $row['id'] .'">Edit</a>';
                echo "</td>";
                echo "<td>";
                echo '<a href="6adminCM.php?del='.$row['id'].'">Delete</a>';
                echo "</td>";
                echo "</tr>";
            }
        
        // $select = "SELECT * FROM club_details WHERE club_type = 'astronomy' ORDER BY id ASC";
        // $run = mysqli_query($conn,$select);
        // while($row_club_details = mysqli_fetch_array($run)) {
        //     $id = $row_club_details['id'];
        //     $club_subtopic = $row_club_details['club_subtopic'];
        //     $club_info = $row_club_details['club_info'];
        //     $club_type = $row_club_details['club_type'];
        
        ?>
        <tr>

            <?php } ?>
        </tr>
    </table>
    </form>
    <br>
    <a href="6adminCMadd.php">
    <button class="button">ADD New Club details</button></a>


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