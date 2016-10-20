<?php

function register_add_user($uname, $password, $fname, $lname, $address, $email, $gender) {
	global $db;

	$hash = hash('sha256', $password);;
	$sql ="INSERT INTO users ( username, password, firstname, lastname, address, email, gender)
                      VALUES ('$uname', '$hash', '$fname', '$lname', '$address', '$email', '$gender')";

    $query=mysqli_query($db,$sql);
		return $query;
}
