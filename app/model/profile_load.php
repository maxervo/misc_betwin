<?php
function profile_load($username) {
  global $db;

  $response = mysqli_query( $db, "SELECT * FROM users WHERE username='$username'" );
  $row = mysqli_fetch_assoc($response);

  return $row;         //Unique row since username unique, possible to do everything with user id to gain flexibility regarding username (possible to change username...etc) but OK design chosen: username unique and permament
}
