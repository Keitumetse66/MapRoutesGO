<?php 


	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "uber";

	$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


	if (isset($_POST['submit'])) {

		//echo "Successfully connected to the database";
	
		$first = mysqli_real_escape_string($conn, $_POST['f-name']);
        $last = mysqli_real_escape_string($conn, $_POST['l-name']);
        $dob = mysqli_real_escape_string($conn, $_POST['dob']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$avatar = $mysqli->real_escape_string($conn, $_POST['avatar']);
		$phone = mysqli_real_escape_string($conn, $_POST['cellNo']);
        $permit = $mysqli->real_escape_string('image/'.$_FILES['avatar']['name']);
        

    }
?>