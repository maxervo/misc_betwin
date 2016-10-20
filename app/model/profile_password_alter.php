<?php

function profile_password_alter($username, $new_password) {
	global $db;

	$new_hash = hash('sha256', $new_password);

	$query = 'UPDATE users' .
					 " SET password ='$new_hash'" .
					 " WHERE username='$username'";

  $response=mysqli_query($db,$query);

	return $response;
}
