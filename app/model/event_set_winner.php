<?php

function event_set_winner($event_id, $team_win) {
	global $db;
  $query = 'UPDATE bets' .
					 " SET result ='$team_win'" .
					 " WHERE id_events='$event_id'";

  $response=mysqli_query($db,$query);

	return $response;
}
