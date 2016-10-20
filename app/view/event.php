<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Betwin - Evenements</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <?php echo '<link rel="stylesheet" href="' . WEBSITE_ROOT . 'public/css/component/navbar.css">'; ?>
    <?php echo '<link rel="stylesheet" href="' . WEBSITE_ROOT . 'public/css/component/footer.css">'; ?>
    <?php echo '<link rel="stylesheet" href="' . WEBSITE_ROOT . 'public/css/event.css">'; ?>
  </head>
  <body>

    <?php include_once(DIR_ROOT . 'app/view/component/navbar.php'); ?>

    <div class="container">
    <?php
   //Events table contains some entries
   if (mysqli_num_rows($events) != 0) {
     while ($row = mysqli_fetch_assoc($events)) {
       $event_id=$row['id'];
       $sport=$row['sport'];
       $team1=$row['team1'];
       $odds1_init=$row['odds1_init'];
       $team2=$row['team2'];
       $odds2_init=$row['odds2_init'];
       $bettors1 = $row['bettors1'];
       $bettors2 = $row['bettors2'];

       //Odds extraction
       include_once(DIR_ROOT . 'app/model/event_calc_odds.php');
       $odds1 = event_calc_odds($odds1_init, $bettors1, $bettors1 + $bettors2);
       $odds2 = event_calc_odds($odds2_init, $bettors2, $bettors1 + $bettors2);

       //Configuration
       $event_active = $authenticated && !in_array($event_id, $bets_made);
       $event_activity = ($event_active ? '' : 'disabled');

       $team_picture_path = 'public/assets/pictures/event/';
       $team_picture_presence = file_exists(DIR_ROOT . $team_picture_path . $event_id . '_1.png') && file_exists(DIR_ROOT . $team_picture_path . $event_id . '_2.png');
       $team_picture_ = ( $team_picture_presence ? WEBSITE_ROOT . $team_picture_path.$event_id.'_' : WEBSITE_ROOT . $team_picture_path.'default_' );

       //Block
       ?>

          <div class="event_row">
            <div class="row">
              <div class="col-sm-12 event_header">
                <h2 class="match_name"><?php echo $team1.' vs '.$team2 ; ?> </h2>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 event_content">
                <form class="finish_form" action="event.php" method="post">
                  <?php echo '<input type="hidden" name="event_finished_id" value="'. $event_id .'">'; ?>
                  <input type="submit" class="btn btn-info" value="Terminer">
                </form>
                <div class="row">
                  <div class="col-sm-5">
                    <?php echo '<img src="' . $team_picture_.'1.png" class="team_img img-responsive" alt="Team 1">'; ?>
                  </div>

                  <div class="col-sm-2">
                    <?php echo '<img src="' . WEBSITE_ROOT . 'public/images/vs.png" class="vs_img img-responsive" alt="VERSUS">'; ?>
                  </div>

                  <div class="col-sm-5">
                    <?php echo '<img src="' . $team_picture_.'2.png" class="team_img img-responsive" alt="Team 2">'; ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-5">
                    <?php echo '<h6 class="team_info">' . $team1 .' cote '. $odds1 . '</h6>' ?>
                    <?php echo '<input type="button" class="btn btn-primary bet_form_show '.$event_activity.'" value="Parier pour '. $team1 .'">'; ?>
                    <form class="form-inline hidden bet_form" action="event.php" method="post">
                      <?php echo '<input type="hidden" name="event_chosen_id" value="'. $event_id .'">'; ?>
                      <input type="hidden" name="team_chosen_id" value="1">
                      <label >Montant:</label>
                      <div class="input-group col-sm-4">
                        <span class="input-group-addon">€</span>
                        <input type="number" class="form-control betting_money" name="betting_money" placeholder="Mise" >
                      </div>
                      <input type="submit" class="btn btn-success" value="Bet">
                    </form>
                  </div>
                  <div class="col-sm-2">
                  </div>
                  <div class="col-sm-5">
                    <?php echo '<h6 class="team_info">' . $team2 .' cote '. $odds2 . '</h6>' ?>
                    <?php echo '<input type="button" class="btn btn-primary bet_form_show '.$event_activity.'" value="Parier pour '. $team2 .'">'; ?>
                    <form class="form-inline hidden bet_form" action="event.php" method="post">
                      <?php echo '<input type="hidden" name="event_chosen_id" value="'. $event_id .'">'; ?>
                      <input type="hidden" name="team_chosen_id" value="2">
                      <label >Montant:</label>
                      <div class="input-group col-sm-4">
                        <span class="input-group-addon">€</span>
                        <input type="number" class="form-control betting_money" name="betting_money" placeholder="Mise">
                      </div>
                      <input type="submit" class="btn btn-success" value="Bet">
                    </form>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="bet_form_log"> </div>
                  </div>
                </div>
                <div class="spacer"></div>
              </div>
            </div>
        </div>
      <?php
    }
    mysqli_free_result($events);
  }

  //Events table is empty
  else {
    echo '<p> Pas d\'évenement en ce moment. Veuillez attendre et revenez vite pour des évènements de folie!</p>';
    mysqli_free_result($events);                                     //Good to do it or not?
  }
  ?>

  </div>

  <?php include_once(DIR_ROOT . 'app/view/component/footer.php');?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <?php echo '<script src="' . WEBSITE_ROOT . 'public/javascript/event.js"></script>'; ?>

  </body>
</html>
