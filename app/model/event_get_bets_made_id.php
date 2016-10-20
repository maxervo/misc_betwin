<?php

function event_get_bets_made_id($id_user) {
	global $db;
  $response=mysqli_query($db,"SELECT id_events FROM bets WHERE id_users='$id_user'");

  $id_events_array = [];
  while( $row = mysqli_fetch_assoc($response) ) {
    $id_events_array[] = $row['id_events'];
  }

  return $id_events_array;   // Not adequate to use fetch_all because PHP installation varies according to servers, need mysqlnd to have fetch_all with mysqli

}
