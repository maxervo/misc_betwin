<?php
function db_users_get_username($user_id)
{
  global $db;

  $response = mysqli_query( $db, "SELECT username AS result FROM users WHERE id='$user_id'" );
  $row = mysqli_fetch_assoc($response);

  return $row['result'];         //Username
}
