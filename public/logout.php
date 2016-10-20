<?php
  //Config Details
  include_once('../app/config/constant.php');

  //Connection to Database : creation of global db
  include_once(DIR_ROOT . 'app/model/db_connect.php');

  //Webpage through controller
  include_once(DIR_ROOT . 'app/controller/logout.php');

  //Close Database
  include_once(DIR_ROOT . 'app/model/db_close.php');
