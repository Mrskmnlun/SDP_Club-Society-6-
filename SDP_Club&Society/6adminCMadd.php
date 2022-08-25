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
    <title>Add Club Details</title>
    
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


                            <form method="POST">

			                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				                <h6 class="mb-2 text-primary">Add Information</h6>
			                </div>


                            <div class="input-group">
                            &nbsp;&nbsp;&nbsp;<label for="services">Select A Club</label>&nbsp;&nbsp;&nbsp;
                                <br>
                                <select name="club_type" id="club_type" required>
                                    <option value="Astronomy">Astronomy</option>
                                    <option value="Culture">Culture</option>
                                    <option value="Country">Country</option>
                                    <option value="Movie">Movie</option>
                                </select>
                            </div>  
			 
			                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				                <div class="form-group">
					                <label for="phone">Club Subtopic</label>
					                <input type="textarea" class="form-control" name="club_subtopic" value="" >
				                </div>
			                </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				                <div class="form-group">
					                <label for="eMail">Club Information</label>
					                <input type="textarea" class="form-control" name="club_info" value="" >
				                </div>
			                </div>

		                </div>

		            <div class="row gutters">
			            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				            <div class="text-right">
                            <div class="text-right">
							<a href="6adminCM.php" button type= "submit" name="back" class="btn btn-primary">Back to Club Management</button></a>
 					            <button type="submit" id="submit" class="btn btn-primary" value="submit" name="submit">Add</button>
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
                    $eclub_type = $_POST['club_type'];
                    
                    $update =  "INSERT INTO club_details (club_subtopic,club_info,club_type) VALUES ('$eclub_subtopic','$eclub_info','$eclub_type')";
                    
                    $run_update = mysqli_query($conn,$update);
                    if ($run_update === true) {
                        echo "<script>alert('Information Added!')</script>";
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