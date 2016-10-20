<?php

  session_start();
  session_destroy();

  //Redirection
  header('Location: '. WEBSITE_ROOT . 'public/index.php');
  exit();
