<?php
function register_email_check($email) {
  global $db;

  $response = mysqli_query( $db, "SELECT email FROM users WHERE email='$email'" );
  $result = (mysqli_num_rows($response)==0);

  return $result;
}
