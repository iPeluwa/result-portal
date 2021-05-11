<?php
include("connection.php")
$insert = "INSERT INTO `parents` (`id`,`name`,`email`,`password`) VALUES('','$name','$email','$password')";
$insert_query = mysqli_query($con,$insert);

?>