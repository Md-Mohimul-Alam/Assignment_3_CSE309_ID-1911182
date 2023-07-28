<?php
	$firstName = filter_input(INPUT_POST, 'firstName');
	$lastName = filter_input(INPUT_POST, 'lastName');
	$gender = filter_input(INPUT_POST, 'gender');
	$email = filter_input(INPUT_POST, 'email');
	$password = filter_input(INPUT_POST, 'password');
	$number = filter_input(INPUT_POST, 'number');
    $nid = filter_input(INPUT_POST, 'nid');
	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number, nid) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssii", $firstName, $lastName, $gender, $email, $password, $number, $nid);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>