<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_POST['submit'])) {
    $Login_ID = $_POST['Login_ID'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users_database
            WHERE Login_ID='$Login_ID' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);

    if($row["user_Type"]==="admin") {
        header("location: 6admin.php");
		$_SESSION['Name'] = $row['Name'];
    $_SESSION["Login_ID"] = $id;
    }
    else if($row["user_Type"]==="committee") {
        header("location: 10committee.php");
		$_SESSION['Name'] = $row['Name'];
    $_SESSION["Login_ID"] = $Login_ID;
    }
    elseif($row["Members_Club" ]=== "Astronomy") {
        header("location: 4astronomypage.php");
        $_SESSION['Name'] = $row['Name'];
        $_SESSION["Login_ID"] = $Login_ID;
    }
    else if($row["Members_Club" ]=== "Culture") {
        header("location: 4culturepage.php");
		$_SESSION['Name'] = $row['Name'];
    $_SESSION["Login_ID"] = $Login_ID;
    }
    else if($row["Members_Club" ]=== "Country") {
        header("location: 4countrypage.php");
		$_SESSION['Name'] = $row['Name'];
    $_SESSION["Login_ID"] = $Login_ID;
    }
    else if($row["Members_Club" ]=== "Movie") {
        header("location: 4moviepage.php");
		$_SESSION['Name'] = $row['Name'];
    $_SESSION["Login_ID"] = $Login_ID;
    }
    else {
		echo "<script>alert('Wrong ID or Password')</script>";

    }
    
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Login Form - Midland Vista</title>
</head>
<body>

	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="text" placeholder="ID" name="Login_ID" value="<?php echo $Login_ID; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="2signup.php">Register Here</a>.</p>
		</form>
	</div>
</body>
</html>