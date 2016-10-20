<?php
function event_delete($event_id) {
  global $db;
  $picture_1 = WEBSITE_ROOT . 'public/assets/pictures/event/'.$event_id.'_1';
  $picture_2 = WEBSITE_ROOT . 'public/assets/pictures/event/'.$event_id.'_2';

  $response = mysqli_query( $db, "DELETE FROM events WHERE id='$event_id' ");
  if(file_exists($picture_1) && file_exists($picture_2)) {
    unlink($picture_1);
    unlink($picture_2);
  }

  return $response;
}
