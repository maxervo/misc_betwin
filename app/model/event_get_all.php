<?php

function event_get_all() {
	global $db;
  $response=mysqli_query($db,"SELECT * FROM events");

  return $response;

}
