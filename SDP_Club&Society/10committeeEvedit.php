<?php 

include 'config.php';

session_start();
 

 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="6adminCMedit.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <title>Edit Club</title>
    
</head>

<body>
<!------------------------------ HEADER ------------------------------>
    <header> 
        <a href="10committee.php" class="brand">APU iSocial Club</a>

        <div class="menu-btn"></div>

        <!-- <div class="navigation">
            <div class="navigation-items">
                <a href="4astronomypage.php">Home</a>
                <a href="5astronomyEv.php">Events</a>
                <a href="5astronomyFe.php">Contact Us</a>
                <a href="#">Profile</a>
                <a href="2logout.php">Log Out </a>
            </div>
        </div> -->

    </header>
<!------------------------------ HEADER ------------------------------>
    <form method="POST"> 
        <div class="container">
            <div class="row gutters">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
 
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
	                <div class="card-body">
		                <div class="row gutters">

                            <?php 
                            $conn = mysqli_connect('localhost','root','','isocial_apu_database');
                            if(isset($_GET['edit'])) {
                                $edit_id = $_GET['edit'];

                            $select = "SELECT * FROM club_events WHERE id='$edit_id'";
                            $run = mysqli_query($conn,$select);
                            $row_club_events = mysqli_fetch_array($run);

                                $id = $row_club_events['id'];
                                $event_id = $row_club_events['event_id'];
                                $event_name = $row_club_events['event_name'];
                                $event_details = $row_club_events['event_details'];
                                $event_type = $row_club_events['event_type'];
                                $event_date = $row_club_events['event_date'];
                                $event_deadline = $row_club_events['event_deadline'];
                                $event_time = $row_club_events['event_time'];
                                $status = $row_club_events['status'];

                            }
                            ?>
                            <form method="POST">

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <h6 class="mb-2 text-primary">Edit Information</h6>
</div>

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="phone">ID</label>
        <input type="textarea" class="form-control" name="event_id" value="<?php echo $id;?>" readonly=readonly>
    </div>
</div>

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="phone">Event ID</label>
        <input type="textarea" class="form-control" name="event_id" value="<?php echo $event_id;?>">
    </div>
</div>

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="phone">Event Name</label>
        <input type="textarea" class="form-control" maxlength="55" name="event_name" value="<?php echo $event_name;?>" >
    </div>
</div>

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="phone">Event Details</label>
        <input type="textarea" class="form-control" name="event_details" value="<?php echo $event_details;?>" >
    </div>
</div>

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="phone">Club</label>
        <input type="textarea" class="form-control" name="event_type" value="<?php echo $event_type;?>" readonly=readonly >
    </div>
</div>

<div class="input-group">
&nbsp;&nbsp;&nbsp;<label for="services">Select A Club to change</label>&nbsp;&nbsp;&nbsp;
    <br>
    <select name="event_type" id="event_type" required>
        <option value="<?php echo $event_type;?>"></option>
        <option value="Astronomy">Astronomy</option>
        <option value="Culture">Culture</option>
        <option value="Country">Country</option>
        <option value="Movie">Movie</option>
    </select>
</div>  

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="phone">Event Date</label>
        <input type="date" class="form-control" name="event_date" value="<?php echo $event_date;?>"  >
    </div>
</div>

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="eMail">Event Deadline</label>
        <input type="date" class="form-control" name="event_deadline" value="<?php echo $event_deadline;?>"  >
    </div>
</div>

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="eMail">Event Time</label>
        <input type="time" class="form-control" name="event_time" value="<?php echo $event_time;?>">
    </div>
</div>

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
        <label for="eMail">Status</label>
        <input type="text" class="form-control" name="status" value="<?php echo $status;?>" readonly=readonly>
    </div>
</div>

</div>

<div class="row gutters">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="text-right">
<div class="text-right">
     <button type="submit" id="submit" class="btn btn-primary" value="submit" name="submit">Update</button>
</div>
     
</div>
</div>
</div>
</form>
                    
                <?php
                $conn = mysqli_connect('localhost','root','','isocial_apu_database');

                if (isset($_POST['submit'])) {
                    $eevent_id = $_POST['event_id'];
                    $eevent_name = $_POST['event_name'];
                    $eevent_details = $_POST['event_details'];
                    $eevent_type = $_POST['event_type'];
                    $eevent_date = $_POST['event_date'];
                    $eevent_deadline = $_POST['event_deadline'];
                    $eevent_time = $_POST['event_time'];
                    
                     
                    
                    $update =  "UPDATE club_events SET event_id = '$eevent_id', event_name = '$eevent_name',
                    event_details ='$eevent_details', event_type='$eevent_type', event_date='$eevent_date', 
                    event_deadline='$eevent_deadline', event_time='$eevent_time'
                    WHERE id='$edit_id'";
                    
                    $run_update = mysqli_query($conn,$update);
                    if ($run_update === true) {
                        echo "<script>alert('Information updated!')</script>";
                        echo "<script>window.location.href='10committeeEv.php'</script>";
                    }
                    else {
                        echo "<script>alert('Information not updated!')</script>";
                    }
                }
                ?>

                
	            </div>
            </div>
        </div>
    </div>
</div>
    </form>
    </body>
    </html>