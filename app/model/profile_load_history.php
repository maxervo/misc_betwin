<?php
function profile_load_history($user_id) {
  global $db;

  $response = mysqli_query( $db, "SELECT * FROM bets WHERE id_users='$user_id'" );

  return $response;         //Beware : there may be several rows
}
