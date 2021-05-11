 <?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "school_system";

// Create connection
$con = mysqli_connect($servername, $username, $password,$db_name);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?> 