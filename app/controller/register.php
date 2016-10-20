<?php

  //Registration process
  if(isset($_POST["firstnamesignup"])) {
    $fname = mysqli_real_escape_string($db, $_POST["firstnamesignup"]);
    $lname = mysqli_real_escape_string($db, $_POST["lastnamesignup"]);
    $uname = mysqli_real_escape_string($db, $_POST["usernamesignup"]);
    $password = mysqli_real_escape_string($db, $_POST["passwordsignup"]);
    $password_confirm = mysqli_real_escape_string($db, $_POST["passwordsignup_confirm"]);
    $email = mysqli_real_escape_string($db, $_POST["emailsignup"]);
    $address = mysqli_real_escape_string($db, $_POST["addresssignup"]);
    $gender = mysqli_real_escape_string($db, $_POST["gender"]);

    $format_check = ($password == $password_confirm) && (strlen($password) >= 6) && (strlen($lname) >= 2) || (strlen($fname) >= 2) || (strlen($uname) >= 2);
    $response_registration = true;

    //Email check
    include_once(DIR_ROOT . 'app/model/register_email_check.php');
    $email_check=register_email_check($email);

    //Add new user
    if ($format_check && $email_check) {
    	include_once(DIR_ROOT . 'app/model/register_add_user.php');
      $response_registration=register_add_user($uname, $password, $fname, $lname, $address, $email, $gender);
    }

    //Output AJAX
    if ( $format_check && $email_check && $response_registration ) {
      include_once(DIR_ROOT . 'app/controller/component/json_response_format.php');
      echo json_response_format(true, false, false, false, false);
    }
    else {
      include_once(DIR_ROOT . 'app/controller/component/json_response_format.php');
      echo json_response_format(false, !$format_check || !$response_registration, false, false, !$email_check);
    }

}

//Page access
else {
  include_once(DIR_ROOT . 'app/view/register.php');
}
