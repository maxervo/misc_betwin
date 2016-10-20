<?php

function profile_money_alter($username, $money_amount) {
	global $db;

	$response = mysqli_query($db,"SELECT money AS result FROM users WHERE username='$username'");
	$money_current = mysqli_fetch_assoc($response)['result'];

	$query = 'UPDATE users' .
					 " SET money = " . ($money_current + $money_amount) .
					 " WHERE username='$username'";

  $response=mysqli_query($db,$query);		

	return $response;
}
