<?php
function db_users_get_id($username) {
  global $db;

  $response = mysqli_query( $db, "SELECT id AS result FROM users WHERE username='$username'" );
  $row = mysqli_fetch_assoc($response);

  return $row['result'];         //ID value
}
