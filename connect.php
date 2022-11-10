<?php
	$IDNumber = $_POST['IDNumber'];
	$FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$MiddleName = $_POST['MiddleName'];
	$EmailID = $_POST['EmailID'];
	$MobileNumber = $_POST['MobileNumber'];
    $Gender = $_POST['Gender'];
	$user_dob = $_POST['user_dob'];
	$address = $_POST['address'];
	$ZipCode = $_POST['ZipCode'];
	$Country = $_POST['Country'];
	$course = $_POST['course'];
	$other = $_POST['other'];

	// Database connection
	$conn = new mysqli('localhost','root','','student');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(IDNumber, FirstName, LastName, MiddleName, EmailID, MobileNumber, Gender, user_dob, address, ZipCode, Country, course, other) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssssssssssi", $IDNumber, $FirstName, $LastName, $MiddleName, $EmailID, $MobileNumber, $Gender, $user_dob, $address, $ZipCode, $Country, $course, $other);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successful...";
                $msg = 'Created Successfully!';
		$stmt->close();
		$conn->close();
	}
?>