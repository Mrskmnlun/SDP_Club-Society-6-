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
    <link rel="stylesheet" href="6adminCOedit.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <title>Edit Committee</title>
    
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

                            $select = "SELECT * FROM users_database WHERE id='$edit_id'";
                            $run = mysqli_query($conn,$select);
                            $row_users_database = mysqli_fetch_array($run);
                                $id = $row_users_database['id'];
                                $Login_ID = $row_users_database['Login_ID'];
                                $Name = $row_users_database['Name'];
                                $Email = $row_users_database['Email'];
                                $password = $row_users_database['password'];
                                $user_Type = $row_users_database['user_Type'];
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
					                <label for="zIp">Login ID</label>
					                <input type="text" class="form-control" name="Login_ID" value="<?php echo $Login_ID;?>" >
				                </div>
			                </div>
			 
			                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				                <div class="form-group">
					                <label for="phone">Name</label>
					                <input type="text" class="form-control" name="Name" value="<?php echo $Name;?>" >
				                </div>
			                </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				                <div class="form-group">
					                <label for="eMail">Email</label>
					                <input type="text" class="form-control" name="Email" value="<?php echo $Email;?>" >
				                </div>
			                </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				                <div class="form-group">
					                <label for="eMail">Password</label>
					                <input type="text" class="form-control" name="password" value="<?php echo $password;?>" >
				                </div>
			                </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				                <div class="form-group">
					                <label for="eMail">User Type</label>
					                <input type="text" class="form-control" value="<?php echo $user_Type;?>" readonly=readonly>
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
                    
                    $eLogin_ID = $_POST['Login_ID'];
                    $eName = $_POST['Name'];
                    $eEmail = $_POST['Email'];
                    $epassword = $_POST['password'];
                    
                    $update =  "UPDATE users_database SET Login_ID = '$eLogin_ID', Name = '$eName',
                                Email = '$eEmail', password = '$epassword'
                                WHERE id='$edit_id'";
                    
                    $run_update = mysqli_query($conn,$update);
                    if ($run_update === true) {
                        echo "<script>alert('Information updated!')</script>";
                        echo "<script>window.location.href='6adminCO.php'</script>";
                    }
                    else {
                        echo "<script>alert('Failed. Try Again!')</script>";
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