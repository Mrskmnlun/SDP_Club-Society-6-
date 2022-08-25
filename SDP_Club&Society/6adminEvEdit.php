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
    <title>Edit Event</title>
    
</head>

<body>
<!------------------------------ HEADER ------------------------------>
    <header> 
        <a href="6admin.php" class="brand">APU iSocial Club</a>

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
					                <label for="fullName">#</label>
					                <input type="text" class="form-control" value="<?php echo $id;?>" readonly=readonly>
				                </div>
			                </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				                <div class="form-group">
					                <label for="zIp">Event ID</label>
					                <input type="text" class="form-control" value="<?php echo $event_id;?>" readonly=readonly>
				                </div>
			                </div>
			 
			                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				                <div class="form-group">
					                <label for="phone">Event Name</label>
					                <input type="textarea" class="form-control" value="<?php echo $event_name;?>" readonly=readonly>
				                </div>
			                </div>

                            <div class="input-group">
                            &nbsp;&nbsp;&nbsp;<label for="services">Status</label>&nbsp;&nbsp;&nbsp;
                                <br>
                                <select name="status" id="status" required>
                                    <option value="Pending">Pending</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Declined">Declined</option>
                                </select>
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
                    $estatus = $_POST['status'];
                     
                    
                    $update =  "UPDATE club_events SET status = '$estatus'
                            WHERE id='$edit_id'";
                    
                    $run_update = mysqli_query($conn,$update);
                    if ($run_update === true) {
                        echo "<script>alert('Information updated!')</script>";
                        echo "<script>window.location.href='6adminEv.php'</script>";
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