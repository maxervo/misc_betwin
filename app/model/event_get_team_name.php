<?php
function event_get_team_name($event_id, $team_id) {
  global $db;

  $team_format = 'team' . $team_id;

  $response = mysqli_query( $db, "SELECT $team_format AS result FROM events WHERE id='$event_id'" );
  $row = mysqli_fetch_assoc($response);

  return $row['result'];         //team name obtained from id
}
