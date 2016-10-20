<?php

function event_add_bet($user_id, $event_id, $betting_money, $odds, $which_team_id) {
	global $db;

	//Insert bet
	include_once(DIR_ROOT . 'app/model/event_get_team_name.php');
	$which_team = event_get_team_name($event_id, $which_team_id);

	$response_insert = mysqli_query($db,"INSERT INTO bets (id_users, id_events, betting_money, odds, which_team)
                  VALUES ('$user_id', '$event_id', '$betting_money', '$odds', '$which_team')"   );

	//Read number of bettors of team concerned
	$bettors_format = 'bettors' . $which_team_id;
	$response_read = mysqli_query($db,"SELECT $bettors_format AS result FROM events WHERE id='$event_id'");
	$bettors_old = mysqli_fetch_assoc($response_read)['result'];

	//Update number of bettors : ++
	$query_update = 'UPDATE events' .
					 			 	" SET $bettors_format = " . ($bettors_old + 1) .
					 		 	 	" WHERE id='$event_id'";
	$response_update=mysqli_query($db,$query_update);

	return $response_insert && $response_read && $response_update;
}
