<?php

session_start();

//Getting input via POST method
$input_set = isset($_POST['username']) && isset($_POST['password']);
if($input_set) {
  $_SESSION['username'] = mysqli_real_escape_string($db, $_POST['username']);
  $_SESSION['password'] = mysqli_real_escape_string($db, $_POST['password']);

  include_once(DIR_ROOT . 'app/model/login_check.php');
  $login_response = login_check($_SESSION['username'], $_SESSION['password']);
}

//Authentication Success
if ($input_set && $login_response) {                        //OK Short Circuit Conditions: Lazy Evaluation
  $_SESSION['valid'] = true;
  //Close Database
  include_once(DIR_ROOT . 'app/model/db_close.php');

  //Redirection
  header('Location: '. WEBSITE_ROOT . 'public/index.php');  //OK done before any output of HTML
  exit();
}

//Authentication Failure
else if ($input_set && !$login_response) {
  $_SESSION['valid'] = false;
  include_once(DIR_ROOT . 'app/view/login.php');
  session_destroy();  //Reset all
}

//Not Authenticated Yet OR Already Authenticated         
else
{
  include_once(DIR_ROOT . 'app/view/login.php');
}
