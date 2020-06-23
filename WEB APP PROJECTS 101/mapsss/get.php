<!DOCTYPE html>
<html>
<head>
	
</head>
<body>

<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "uber";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT username, f_name, l_name FROM uber_riders";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "<br> id: ". $row["username"]. " - Name: ". $row["f_name"]. " " . $row["l_name"] . "<br>";
		    }
		} else {
		    echo "0 results";
		}

		$conn->close();
?>
</body>
</html>