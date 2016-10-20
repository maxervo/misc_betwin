<?php

  include_once(DIR_ROOT . 'app/config/db_param.php');

  //Connection to database : create global $db
  $db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
