<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$Login_ID = $Name = $Email = $Members_Club = $password = $confirm_password = "";
$Login_ID_err = $Name_err = $Email_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate ID
    if(empty(trim($_POST["Login_ID"]))){
        $Login_ID_err = "Please enter a Login ID.";
    } elseif(!preg_match('/^MM+[a-zA-Z0-9_]+$/', trim($_POST["Login_ID"]))){
        $Login_ID_err = "Student ID doest not exists.";
    } else{
        // Prepare a select statement
        $sql = "SELECT Login_ID FROM users_database WHERE Login_ID = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_Login_ID);
            
            // Set parameters
            $param_Login_ID = trim($_POST["Login_ID"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $Login_ID = trim($_POST["Login_ID"]);
                    // $Login_ID_err = "This Login ID is already taken.";
                    // echo "<script>alert('Login ID is taken')</script>";
                    

                } else{
                    // $Login_ID = trim($_POST["Login_ID"]);
                    echo "<script>alert('Login ID does not Exists')</script>";
                    
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }


    if(empty(trim($_POST["Email"]))){
        $Email_err = "Please enter a Email.";
    }
    else{
        // Prepare a select statement
        $sql = "SELECT Email FROM users_database WHERE Email = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_Email);
            
            // Set parameters
            $param_Email = trim($_POST["Email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $Email_err = "This Email is already taken.";
                    echo "<script>alert('Email is taken')</script>";
                } else{
                    $Email = trim($_POST["Email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    if(empty(trim($_POST["Name"]))){
        $Name_err = "Please enter a Name.";
    } else{
        // Prepare a select statement
        $sql = "SELECT Name FROM users_database WHERE Name = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_Name);
            
            // Set parameters
            $param_Name = trim($_POST["Name"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $Name_err = "This Name is already taken.";
                    echo "<script>alert('Name is taken')</script>";
                    

                } else{
                    $Name = trim($_POST["Name"]);
                    
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($Login_ID_err) && empty($Email_err) &&  empty($password_err) && empty($confirm_password_err) && empty($Name_err)){
        
        // Prepare an insert statement
        // $sql = "INSERT INTO users_database (Login_ID, Name, Members_Club, Email, password) VALUES (?, ?, ?, ?, ?)";
        $sql = "UPDATE users_database SET Name=?, Members_Club=?, Email=?, password=? WHERE Login_ID=?";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            // mysqli_stmt_bind_param($stmt, "sssss", $param_Login_ID, $param_Name, $param_Members_Club, $param_Email ,$param_password);
            mysqli_stmt_bind_param($stmt, "sssss", $param_Name, $param_Members_Club, $param_Email ,$param_password, $param_Login_ID);

            // Set parameters
            $param_password = $password; // Creates a password hash
            $param_Name = $_POST["Name"];
            $param_Members_Club = $_POST["Members_Club"];
            $param_Email = $Email;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                 
                // header("location: 2login.php");
                echo "<script>alert('Registration Successful!')</script>";
                $Login_ID = "";
                $password = ""; // Creates a password hash
                $confirm_password = "" ;
                $_POST["Name"] = "";
                $_POST["Members_Club"] = "";
                $Email = "";


            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Register Form</title>

</head>
<body>

	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>

			<div class="input-group">
            <input type="text" placeholder="Login ID" name="Login_ID" class="form-control <?php echo (!empty($Login_ID_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Login_ID; ?>">
                <span class="invalid-feedback"><?php echo $Login_ID_err; ?></span>
			</div>

			<div class="input-group">
			<input type="text" placeholder="Name" name="Name" class="form-control <?php echo (!empty($Name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Name; ?>">
                <span class="invalid-feedback"><?php echo $Name_err; ?></span>
			</div>

            <div class="input-group">
			<input type="text" placeholder="Email" name="Email" class="form-control <?php echo (!empty($Email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Email; ?>">
                <span class="invalid-feedback"><?php echo $Email_err; ?></span>
			</div>

            <div class="input-group">
				<label for="services">Select A Club (Note: Permanent choice)</label>
					<br>
					<select name="Members_Club" id="Members_Club" required>
						<option value="Astronomy">Astronomy</option>
						<option value="Culture">Culture</option>
                        <option value="Country">Country</option>
                        <option value="Movie">Movie</option>
					</select>
			</div>

			<div class="input-group">
            <input type="password" placeholder="Password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>

            <div class="input-group">
            <input type="password" placeholder="Confirm Password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
			</div>

			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>

			<p class="login-register-text">Have an account? <a href="2login.php">Login Here</a>.</p>
		</form>
	</div>

</body>
</html>