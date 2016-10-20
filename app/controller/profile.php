<?php

session_start();

//Checking if user logged in
if(isset($_SESSION['valid']) && $_SESSION['valid']) {
  $authenticated = True;

  //Money transfer
  if( isset($_POST['money_amount']) ) {
    $money_amount = mysqli_real_escape_string($db, $_POST['money_amount']);
    $password_check = true;         //possible to add password check
    $response_alteration = true;

    if($password_check) {
      include_once(DIR_ROOT . 'app/model/profile_money_alter.php');
      $response_alteration = profile_money_alter($_SESSION['username'], $money_amount);
    }

    //Output AJAX
    if ( $password_check && $response_alteration ) {
      include_once(DIR_ROOT . 'app/controller/component/json_response_format.php');
      echo json_response_format(true, false, false, false, false);
    }
    else {
      include_once(DIR_ROOT . 'app/controller/component/json_response_format.php');
      echo json_response_format(false, !$response_alteration, !$password_check, false, false);
    }
  }

  //Informations change
  else if ( isset($_POST['new_firstname']) ) {
    $new_firstname = mysqli_real_escape_string($db, $_POST['new_firstname']);
    $new_lastname = mysqli_real_escape_string($db, $_POST['new_lastname']);
    $new_address = mysqli_real_escape_string($db, $_POST['new_address']);
    $new_email = mysqli_real_escape_string($db, $_POST['new_email']);
    $password_check = true;         //possible to add a password check to modify informations
    $response_alteration = true;

    $format_check = (strlen($new_firstname) >= 2) || (strlen($new_lastname) >= 2);
    include_once(DIR_ROOT . 'app/model/register_email_check.php');
    $email_check=register_email_check($new_email);

    if ($format_check && $email_check && $password_check) {
      include_once(DIR_ROOT . 'app/model/profile_info_alter.php');
      $response_alteration = profile_info_alter($_SESSION['username'], $new_firstname, $new_lastname, $new_address, $new_email);
    }

    //Output AJAX
    if ( $format_check && $email_check && $password_check && $response_alteration ) {
      include_once(DIR_ROOT . 'app/controller/component/json_response_format.php');
      echo json_response_format(true, false, false, false, false);
    }
    else {
      include_once(DIR_ROOT . 'app/controller/component/json_response_format.php');
      echo json_response_format(false, !$format_check || !$response_alteration, !$password_check, false, !$email_check);
    }
  }

  //Informations password change
  else if ( isset($_POST['old_password']) && isset($_POST['new_password']) ) {
    $old_password = mysqli_real_escape_string($db, $_POST['old_password']);
    $new_password = mysqli_real_escape_string($db, $_POST['new_password']);

    include_once(DIR_ROOT . 'app/model/login_check.php');
    $password_check = login_check($_SESSION['username'], $old_password);
    $response_alteration = true;

    $format_check = (strlen($new_password) >= 6);

    if ($format_check && $password_check) {
      include_once(DIR_ROOT . 'app/model/profile_password_alter.php');
      $response_alteration = profile_password_alter($_SESSION['username'], $new_password);
    }

    //Output AJAX
    if ( $format_check && $password_check && $response_alteration ) {
      include_once(DIR_ROOT . 'app/controller/component/json_response_format.php');
      echo json_response_format(true, false, false, false, false);
    }
    else {
      include_once(DIR_ROOT . 'app/controller/component/json_response_format.php');
      echo json_response_format(false, !$format_check || !$response_alteration, !$password_check, false, false);
    }
  }

  //Page access
  else {
    //Load the profile data
    include_once(DIR_ROOT . 'app/model/profile_load.php');
    $profile_data = profile_load($_SESSION['username']);

    //Profile Picture Check
    $profile_picture_path = DIR_ROOT . 'public/assets/pictures/' . $profile_data['username'] . '.png';
    clearstatcache();   //to ensure cache clean for file_exists()
    if ( file_exists($profile_picture_path) ) {
      $profile_picture_path = WEBSITE_ROOT . 'public/assets/pictures/' . $profile_data['username'] . '.png';
    }
    else {
      $profile_picture_path = WEBSITE_ROOT . 'public/assets/pictures/default_' . $profile_data['gender'] . '.png';
    }

    //Load Bet History regarding this user
    include_once(DIR_ROOT . 'app/model/db_users_get_id.php');
    $user_id = db_users_get_id($_SESSION['username']);
    include_once(DIR_ROOT . 'app/model/profile_load_history.php');
    $history = profile_load_history($user_id);    //response structure: possible several rows

    include_once(DIR_ROOT . 'app/view/profile.php');
  }

}

else {
  $authenticated = False;
  include_once(DIR_ROOT . 'app/view/profile.php');
}
