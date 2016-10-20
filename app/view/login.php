<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Betwin - Login</title>
    <?php echo '<link href="' . WEBSITE_ROOT . 'vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">'; ?>
    <?php echo '<link rel="stylesheet" href="' . WEBSITE_ROOT . 'public/css/component/navbar.css">'; ?>
    <?php echo '<link rel="stylesheet" href="' . WEBSITE_ROOT . 'public/css/component/footer.css">'; ?>
    <?php echo '<link rel="stylesheet" href="' . WEBSITE_ROOT . 'public/css/login.css">'; ?>
  </head>
  <body>
    <?php

    include_once(DIR_ROOT . 'app/view/component/navbar.php');

    //Error of Authentication
    if( isset($_SESSION['valid']) && !$_SESSION['valid'] )
    {
      echo
      '<p class="bg-danger login_log">Votre combinaison nom d\'utilisateur/mot de passe est incorrecte! Veuillez réessayer</p> <br>
      <a href="' . WEBSITE_ROOT . 'public/login.php' . '">Connection</a>';
    }

    //Already Authenticated
    else if(isset($_SESSION['valid']) && $_SESSION['valid'])
    {
      echo
      '<p class="bg-warning login_log">Vous êtes déjà connecté! Allez à l\'accueil :</p> <br>
       <a href="' . WEBSITE_ROOT . 'public/index.php' . '">BetWin Accueil</a>';
    }

    //Not Authenticated Yet
    else {
      echo '
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
              <form action="login.php" method="post">
                <div class="form-group input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input type="text" name="username" class="form-control" placeholder="Nom d\'utilisateur"/>
                </div>
                <div class="form-group input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input type="password" name="password" class="form-control" placeholder="Mot de passe"/>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-block" value="Connecter">
                </div>
              </form>
          </div>
        </div>
      </div>';
    }
    ?>

    <?php include_once(DIR_ROOT . 'app/view/component/footer.php'); ?>

  </body>
</html>
