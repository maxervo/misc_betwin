<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Betwin - Profil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <?php echo '<link rel="stylesheet" href="' . WEBSITE_ROOT . 'public/css/component/navbar.css">'; ?>
    <?php echo '<link rel="stylesheet" href="' . WEBSITE_ROOT . 'public/css/component/footer.css">'; ?>
    <?php echo '<link rel="stylesheet" href="' . WEBSITE_ROOT . 'public/css/profile.css">'; ?>

  </head>
  <body>

    <?php  include_once(DIR_ROOT . 'app/view/component/navbar.php'); ?>

    <div class="container">

        <?php
        //User is logged in
        if($authenticated) {
        ?>

        <h2>Profil</h2>
        <?php echo '<img src="' . $profile_picture_path . '" class="img-thumbnail" alt="Profile Picture" height="200" width="200">'; ?>

        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#status">Statut</a></li>
          <li><a data-toggle="tab" href="#informations">Informations</a></li>
          <li><a data-toggle="tab" href="#notifications">Notifications</a></li>
        </ul>

        <div class="tab-content">

          <div id="status" class="tab-pane fade in active">

            <div id="money" class="row">
              <div class="col-sm-12">
                <div class="clearfix">
                  <div id="money_data" class="pull-left">
                    <h3>Argent</h3>
                    <p>
                      Argent disponible : <span id="money_current"> <?php echo $profile_data['money'] ?> € </span>
                    </p>
                  </div>
                  <input type="button" id="money_form_show" class="btn btn-success" value="Recharger">
                </div>
                <form id="money_form" class="hidden" action="profile.php" method="post">
                  <label for="money_amount">Montant: </label> <input type="number" id="money_amount" class="form-control" name="money_amount" placeholder="Montant d'argent à transférer"> <br>
                  <input type="submit" class="btn btn-success" value="Confirmer">
                  <input type="button" id="money_form_cancel" class="btn btn-danger" value="Annuler"> <br>
                </form>
                <div id="money_form_log"> </div>
              </div>
            </div>

            <div id="history" class="row">
              <div class="col-sm-12">
                <h3>Historique</h3>
                <?php  include_once(DIR_ROOT . 'app/view/profile_history.php'); ?>
              </div>
            </div>

          </div>

          <div id="informations" class="tab-pane fade">
            <div class="row">
              <div class="col-sm-12">
                  <h3>Mes informations personnelles</h3>
                  <br>
              </div>
            </div>
            <div id="info" class="row">
              <div class="col-sm-6">
                <div class="clearfix">
                  <div id="info_data" class="pull-left">
                    <p>Nom d'utilisateur : <?php echo $profile_data['username'] ?> </p>
                    <p>Prénom : <?php echo $profile_data['firstname'] ?> </p>
                    <p>Nom de famille : <?php echo $profile_data['lastname'] ?> </p>
                    <p>Adresse : <?php echo $profile_data['address'] ?> </p>
                    <p>Email : <?php echo $profile_data['email'] ?> </p>
                  </div>
                  <input type="button" id="info_form_show" class="btn btn-primary" value="Modifier">
                </div>
                <form id="info_form" class="hidden" action="profile.php" method="post">
                  <label for="new_firstname">Prénom: </label> <input type="text" id="new_firstname" class="form-control" name="new_firstname" placeholder="Nouveau prénom"> <br>
                  <label for="new_lastname">Nom de famille: </label> <input type="text" id="new_lastname" class="form-control" name="new_lastname" placeholder="Nouveau nom de famille"> <br>
                  <label for="new_address">Adresse: </label> <input type="text" id="new_address" class="form-control" name="new_address" placeholder="Nouvelle adresse"> <br>
                  <label for="new_email">Email: </label> <input type="email" id="new_email" class="form-control" name="new_email" placeholder="Nouvel email"> <br>
                  <input type="submit" class="btn btn-primary" value="Confirmer">
                  <input type="button" id="info_form_cancel" class="btn btn-danger" value="Annuler"> <br>
                </form>
                <div id="info_form_log"> </div>
              </div>
            </div>
            <br>
            <div id="info_password" class="row">
              <div class="col-sm-6">
                <div class="head clearfix">
                  <p id="info_password_data" class="pull-left">Mot de passe</p>
                  <input type="button" id="info_password_form_show" class="btn btn-primary" value="Modifier">
                </div>
                <form id="info_password_form" class="hidden" action="profile.php" method="post">
                  <div>
                    <label for="old_password">Mot de passe actuel: </label> <input type="password" id="old_password" class="form-control" name="old_password" placeholder="Mot de passe actuel"> <hr>
                  </div>
                  <div>
                    <label for="new_password">Nouveau mot de passe: </label> <input type="password" id="new_password" class="form-control" name="new_password" placeholder="Nouveau mot de passe"> <br>
                    <label for="new_password_control">A nouveau: </label> <input type="password" id="new_password_control" class="form-control" name="new_password_control" placeholder="Retapez le mot de passe"> <br>
                  </div>
                  <input type="submit" class="btn btn-primary" value="Confirmer">
                  <input type="button" id="info_password_form_cancel" class="btn btn-danger" value="Annuler"> <br>
                </form>
                <div id="info_password_form_log"> </div>
              </div>
            </div>
          </div>

          <div id="notifications" class="tab-pane fade">
            <h3>Notifications</h3>
            <p>Aucune notifications pour le moment</p>
          </div>

        <?php }

        //User not logged in
         else {
           echo
           '<p> Vous n\'êtes pas connecté! Accédez à la page de connection ici : </p>
            <a href="' . WEBSITE_ROOT . 'public/login.php' . '">Betwin Login</a>';
        }
        ?>

      </div>
    </div>

      <?php include_once(DIR_ROOT . 'app/view/component/footer.php'); ?>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <?php echo '<script src="' . WEBSITE_ROOT . 'public/javascript/profile.js"></script>'; ?>

  </body>
</html>
