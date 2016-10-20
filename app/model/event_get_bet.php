<?php

function event_get_bet($event_id) {
	global $db;
  $response=mysqli_query($db,"SELECT id_users, betting_money, odds, which_team FROM bets WHERE id_events='$event_id'");

  return $response; //possible : several rows
}
