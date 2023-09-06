<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$age = $_POST['age'];
	$currentRole = $_POST['currentRole'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into form(Name, email, age, currentRole) values(?, ?, ?, ?)");
		$stmt->bind_param("ssis", $name, $email, $age, $currentRole);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfull...";
		$stmt->close();
		$conn->close();
	}
?>