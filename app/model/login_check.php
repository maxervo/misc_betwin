<?php
function login_check($username, $password) {
  global $db;
  $hash = hash('sha256', $password);

  $response = mysqli_query( $db, "SELECT EXISTS(SELECT * FROM users WHERE username='$username' AND password='$hash') AS result" );
  $row = mysqli_fetch_assoc($response);

  return $row['result'];         //True or False
}
