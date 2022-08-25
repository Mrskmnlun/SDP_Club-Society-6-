<?php 

include 'config.php';

session_start();
if (!isset($_SESSION['Login_ID'])) {
    header("Location: 2login.php");
  }

if (isset($_POST['submit'])) {
    $eName = $_POST['Name'];
    $eEmail = $_POST['Email'];
    $epassword = $_POST['password'];
    
    $sql =  "UPDATE users_database SET Name = '$eName', Email = '$eEmail', password = '$epassword'
                WHERE Login_ID = '$_SESSION[Login_ID]'";
	$stmt = mysqli_query($conn, $sql);
    if ($stmt) {
        echo "<script>alert('Profile updated!')</script>";
	}
	else {
		echo "<script>alert('Profile not updated!')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="9moviePP.css">
    <link rel="stylesheet" href="9movieP.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <title>Profile</title>
    
</head>

<body>
<!------------------------------ HEADER ------------------------------>
    <header> 
        <a href="4moviepage.php" class="brand">APU iSocial Club</a>

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
                            
                            $select = "SELECT * FROM users_database WHERE Login_ID='$_SESSION[Login_ID]'";
                            $run = mysqli_query($conn,$select);
                            $row_users_database = mysqli_fetch_array($run);
                                $id = $row_users_database['id'];
                                $Login_ID = $row_users_database['Login_ID'];
                                $Name = $row_users_database['Name'];
                                $Members_Club = $row_users_database['Members_Club'];
                                $Email = $row_users_database['Email'];
                                $password = $row_users_database['password'];
                                $user_Type = $row_users_database['user_Type'];
                            
                            ?>

			                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				                <h6 class="mb-2 text-primary">Profile Information</h6>
			                </div>

			                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				                <div class="form-group">
					                <label for="fullName">#</label>
					                <input type="text" class="form-control" id="fullName"  value="<?php echo $id;?>" readonly=readonly>
				                </div>
			                </div>
			 
			                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				                <div class="form-group">
					                <label for="phone">Login ID</label>
					                <input type="text" class="form-control" id="Login_ID" value="<?php echo $Login_ID;?>" readonly=readonly>
				                </div>
			                </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				                <div class="form-group">
					                <label for="eMail">Club</label>
					                <input type="email" class="form-control" id="eMail" value="<?php echo $Members_Club;?>" readonly=readonly>
				                </div>
			                </div>

			                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				                <div class="form-group">
					                <label for="zIp">User Type</label>
					                <input type="text" class="form-control" id="user_Type" value="<?php echo $user_Type;?>" readonly=readonly>
				                </div>
			                </div>

		                </div>

		                <div class="row gutters">

			                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				                <h6 class="mt-3 mb-2 text-primary">Account Information</h6>
			                </div>
            
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				            <div class="form-group">
					            <label for="Name">Name</label>
					            <input type="name" class="form-control" id="Name" value="<?php echo $Name;?>" name="Name" readonly>
				            </div>
			            </div>

			            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				            <div class="form-group">
					            <label for="Email">Email</label>
					            <input type="email" class="form-control" id="Email" value="<?php echo $Email;?>" name="Email" >
				            </div>
			            </div>
			 
			            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				            <div class="form-group">
					            <label for="password">Password</label>
					            <input type="text" class="form-control" id="password" value="<?php echo $password;?>" name="password" >
				            </div>
			            </div>

		            </div>
         
		            <div class="row gutters">
			            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				            <div class="text-right">
                            <div class="text-right">
							<a href="4moviepage.php" button type= "submit" name="back" class="btn btn-primary">Back to mainpage</button></a>
 					            <button type="submit" id="submit" class="btn btn-primary" value="submit" name="submit">Update</button>
				            </div>
                                 
				            </div>
			            </div>
		            </div>
         
	            </div>
            </div>
        </div>
    </div>
</div>
    </form>
    </body>
    </html>