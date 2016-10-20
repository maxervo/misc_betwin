<?php
function event_extract_odds($event_id, $team_id) {
  global $db;

  $odds_init_format = 'odds' . $team_id . '_init';
  $bettors_format = 'bettors' . $team_id;

  $response = mysqli_query( $db, "SELECT * FROM events WHERE id='$event_id'" );
  $row = mysqli_fetch_assoc($response);

  include_once(DIR_ROOT . 'app/model/event_calc_odds.php');
  $odds_extracted = event_calc_odds($row["$odds_init_format"], $row["$bettors_format"], $row["bettors1"] + $row["bettors2"]);

  return $odds_extracted;
}
