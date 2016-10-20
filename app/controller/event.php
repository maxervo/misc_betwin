<?php

session_start();

//Authenticated
if (isset($_SESSION['valid']) && $_SESSION['valid']) {
  $authenticated = true;

  //Event chosen and bet on a Team
  if ( isset($_POST['event_chosen_id']) ) {
    $response_alteration = true;    //by default at the beginning
    $enough_money = true;

    $event_chosen_id = mysqli_real_escape_string($db, $_POST['event_chosen_id']);     //Possible to do sql prepared statements, parametered queries -> rely on internal structure of database better, instead of relying on a function
    $team_chosen_id = mysqli_real_escape_string($db, $_POST['team_chosen_id']);
    $betting_money = mysqli_real_escape_string($db, $_POST['betting_money']);

    include_once(DIR_ROOT . 'app/model/db_users_get_id.php');
    $user_id = db_users_get_id($_SESSION['username']);

    include_once(DIR_ROOT . 'app/model/event_extract_odds.php');
    $odds = event_extract_odds($event_chosen_id, $team_chosen_id);

    include_once(DIR_ROOT . 'app/model/profile_load.php');
    $current_money = profile_load($_SESSION['username'])['money'];
    if ( $enough_money = ($betting_money <= $current_money) ) {
      include_once(DIR_ROOT . 'app/model/event_add_bet.php');
      $response_alteration = event_add_bet($user_id, $event_chosen_id, $betting_money, $odds, $team_chosen_id);
      include(DIR_ROOT . 'app/model/profile_money_alter.php');
      profile_money_alter($_SESSION['username'], (-1)*$betting_money);
    }

    //Output AJAX
    if ( $enough_money && $response_alteration ) {
      include_once(DIR_ROOT . 'app/controller/component/json_response_format.php');
      echo json_response_format(true, false, false, false, false);
    }
    else {
      include_once(DIR_ROOT . 'app/controller/component/json_response_format.php');
      echo json_response_format(false, !$response_alteration, false, !$enough_money, false);
    }
  }

  //Event Finish
  else if ( isset($_POST['event_finished_id']) ) {
    $event_finished_id = mysqli_real_escape_string($db, $_POST['event_finished_id']);

    $rand_choice=rand(1,2);
    include(DIR_ROOT . 'app/model/event_get_team_name.php');
    $winner_name = event_get_team_name($event_finished_id, ($rand_choice) );    //from team1 or team2
    include_once(DIR_ROOT . 'app/model/event_set_winner.php');
    $response_winner = event_set_winner($event_finished_id, $winner_name);
    include_once(DIR_ROOT . 'app/model/event_delete.php');
    $response_delete = event_delete($event_finished_id);

    include(DIR_ROOT . 'app/model/event_get_bet.php');
    $response = event_get_bet($event_finished_id);
    while( $bet_data = mysqli_fetch_assoc($response) ) {
      include(DIR_ROOT . 'app/model/db_users_get_username.php');
      $username = db_users_get_username($bet_data['id_users']);

      //Win & get money
      if( $bet_data['which_team'] == $winner_name) {
        include(DIR_ROOT . 'app/model/profile_money_alter.php');
        $response_money = profile_money_alter($username, $bet_data['betting_money']*$bet_data['odds']);
      }
    }
    mysqli_free_result($response);

    //Output AJAX
    $response_alteration = $response_winner && $response_delete;
    if ( $response_alteration ) {
      include_once(DIR_ROOT . 'app/controller/component/json_response_format.php');
      echo json_response_format(true, false, false, false, false);
    }
    else {
      include_once(DIR_ROOT . 'app/controller/component/json_response_format.php');
      echo json_response_format(false, !$response_alteration, false, false, false);
    }
  }

  //Page access
  else {
    include_once(DIR_ROOT . 'app/model/event_get_all.php');
    $events=event_get_all();

    include_once(DIR_ROOT . 'app/model/db_users_get_id.php');
    $user_id = db_users_get_id($_SESSION['username']);
    include_once(DIR_ROOT . 'app/model/event_get_bets_made_id.php');
    $bets_made = event_get_bets_made_id($user_id);

    include_once(DIR_ROOT . 'app/view/event.php');
  }
}

//Not Authenticated : limited features
else {
  $authenticated = false;

  include_once(DIR_ROOT . 'app/model/event_get_all.php');
  $events=event_get_all();

  include_once(DIR_ROOT . 'app/view/event.php');
}
