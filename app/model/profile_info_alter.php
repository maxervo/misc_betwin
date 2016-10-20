<?php

function profile_info_alter($username, $new_firstname, $new_lastname, $new_address, $new_email) {
	global $db;

	$query = 'UPDATE users' .
					 " SET firstname ='$new_firstname'," .
					 " lastname ='$new_lastname'," .
					 " address ='$new_address'," .
					 " email ='$new_email'" .
					 " WHERE username='$username'";

  $response=mysqli_query($db,$query);

	return $response;
}
