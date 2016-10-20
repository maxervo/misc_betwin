<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>BetWin</title>
    <meta charset="utf-8">
    <?php echo '<link href="' . WEBSITE_ROOT . 'vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">'; ?>
    <?php echo '<link rel="stylesheet" href="' . WEBSITE_ROOT . 'public/css/component/navbar.css">'; ?>
    <?php echo '<link rel="stylesheet" href="' . WEBSITE_ROOT . 'public/css/component/footer.css">'; ?>
    <?php echo '<link rel="stylesheet" href="' . WEBSITE_ROOT . 'public/css/register.css">'; ?>
  </head>

<body>

<?php  include_once(DIR_ROOT . 'app/view/component/navbar.php'); ?>

<div class="container">
   <div class="row">
      <div class="col-sm-5 why_inscription">
        <h2>  Pourquoi s'inscrire ? </h2>
        <p> L'inscription est nécessaire pour profiter des fonctionnalitées de BetWin. <br>
          Il faut obligatoirement avoir un compte pour pouvoir parier ! </p>

        <p> N'attendez plus ! C'est entièrement gratuit ! </p>
      </div>

     <div class="col-sm-7">
       <form id="register_form" class="form-horizontal"  method="post" action="#" autocomplete="on">
         <h2 id="inscription"> Inscription à BetClic</h2>
         <div class="form-group">
          <label class="control-label col-sm-2" for="firstnamesignup">Nom:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="firstnamesignup" required="required" name="firstnamesignup" placeholder="Nom">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="lastnamesignup">Prénom:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="lastnamesignup" required="required" name="lastnamesignup" placeholder="prénom">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="usernamesignup">Pseudo:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="usernamesignup" required="required" name="usernamesignup" placeholder="pseudo">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="passwordsignup">mot de passe:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="passwordsignup" required="required" name="passwordsignup" placeholder="6 charactères mini">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="passwordsignup_confirm">Confirmer mot de passe:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="passwordsignup_confirm" required="required" name="passwordsignup_confirm" placeholder="confirmation mot de passe">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="emailsignup">Email:</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="emailsignup"  name="emailsignup" required="required" placeholder="email">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="addresssignup">Votre Adresse: </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="addresssignup"  name="addresssignup"  placeholder="Adresse">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">Sexe:</label>
          <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="gender" value="male">Homme</label>
            <label class="radio-inline"><input type="radio" name="gender" value="female">Femme</label>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" name="submit" >Inscription</button>
          </div>
        </div>

      </form>
      <div id="register_form_log"> </div>
    </div>
  </div>
</div>

<?php include_once(DIR_ROOT . 'app/view/component/footer.php'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<?php echo '<script src="' . WEBSITE_ROOT . 'public/javascript/register.js"></script>'; ?>

</body>
</html>
