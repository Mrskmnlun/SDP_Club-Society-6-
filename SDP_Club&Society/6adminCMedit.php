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

                            $select = "SELECT * FROM club_details WHERE id='$edit_id'";
                            $run = mysqli_query($conn,$select);
                            $row_club_details = mysqli_fetch_array($run);
                                $id = $row_club_details['id'];
                                $club_subtopic = $row_club_details['club_subtopic'];
                                $club_info = $row_club_details['club_info'];
                                $club_type = $row_club_details['club_type'];
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
					                <label for="zIp">Club Type</label>
					                <input type="text" class="form-control" value="<?php echo $club_type;?>" readonly=readonly>
				                </div>
			                </div>
			 
			                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				                <div class="form-group">
					                <label for="phone">Club Subtopic</label>
					                <input type="textarea" class="form-control" name="club_subtopic" value="<?php echo $club_subtopic;?>" >
				                </div>
			                </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				                <div class="form-group">
					                <label for="eMail">Club Information</label>
					                <input type="textarea" class="form-control" name="club_info" value="<?php echo $club_info;?>" >
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
                    $eclub_subtopic = $_POST['club_subtopic'];
                    $eclub_info = $_POST['club_info'];
                     
                    
                    $update =  "UPDATE club_details SET club_subtopic = '$eclub_subtopic', club_info = '$eclub_info'
                            WHERE id='$edit_id'";
                    
                    $run_update = mysqli_query($conn,$update);
                    if ($run_update === true) {
                        echo "<script>alert('Information updated!')</script>";
                        echo "<script>window.location.href='6adminCM.php'</script>";
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