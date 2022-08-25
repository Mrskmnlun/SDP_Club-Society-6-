<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "isocial_apu_database";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Fails')</script>");
}

?>