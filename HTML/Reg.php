<?php 


	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "uber";

	$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


	if (isset($_POST['submit'])) {

		//echo "Successfully connected to the database";
	

		$username = mysqli_real_escape_string($conn, $_POST['Uname']);
		$first = mysqli_real_escape_string($conn, $_POST['fname']);
		$last = mysqli_real_escape_string($conn, $_POST['lname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$passwordConf = mysqli_real_escape_string($conn, $_POST['passwordConf']);
		$phone = mysqli_real_escape_string($conn, $_POST['cellNo']);
		$gender = mysqli_real_escape_string($conn, $_POST['gender']);
	

		//Error handlers

		//Checks for empty fields

	if (empty($username) || empty($first) || empty($last) || empty($email) || empty($password) || empty($passwordConf) || empty($phone)) {

			 header("Location: Reg.php?=empty");
			
			exit();

			//Checks if whether data enter in firstname and last name is valid

		} elseif (!preg_match("/^[a-zA-Z]*$/",$first) || !preg_match("/^[a-zA-Z]*$/",$last)) {

				 header("Location: Reg.php=invalid_firstname_or_lastname");
				
				
				exit();

			
			
				//Validates email
			} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

					 header("Location: Reg.php?=invalid_email");
					exit(); 
				
					// checks if usename exist already exists in the database
							$sql = "SELECT * FROM uber_riders WHERE username='$username'";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);

				} elseif ($resultCheck > 0) {
							// checks if usename exist already exists in the database
							$sql = "SELECT * FROM uber_riders WHERE username='$username'";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);

								header("Location: Reg.php?=username_taken");
								exit(); 
						
						
						// checks whether 2 passwords match
					} elseif($_POST['password'] != $_POST['passwordConf']) {
							header("Location: Reg.php?=Passwords_don't_match");
							exit();
					
							// checks whether data entered is numeric 		
						} elseif (!is_numeric($phone)) {

								header("Location: Reg.php?=phone_number_is_invalid");
								exit();

								//validates the length of the integers entered
							} elseif (strlen($phone) != 9) {
									 header("Location: Reg.php?=phone_number_is_too_long_or_short");
									exit();
								
								
								} else{
										//hashes the passwords
										$hashedPwrd = md5($password);
										$hashedPass = md5($passwordConf);
										$sql1 = "INSERT INTO uber_riders (username, f_name, l_name, email_address, password, confirm_password, phone, gender) VALUES ('$username', '$first', '$last', '$email', '$hashedPwrd', '$hashedPass', '$phone', '$gender');";
										//connects to the database
										 mysqli_query($conn, $sql1);
										 header("Location: Main-auth.php");
										 exit();
									}
								
								
	} else {
		header("Refresh:0");
		exit();
	}


 ?>











