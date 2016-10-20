<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Betwin - A propos</title>
    <?php echo '<link href="' . WEBSITE_ROOT . 'vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">'; ?>
    <?php echo '<link rel="stylesheet" href="' . WEBSITE_ROOT . 'public/css/component/navbar.css">'; ?>
    <?php echo '<link rel="stylesheet" href="' . WEBSITE_ROOT . 'public/css/component/footer.css">'; ?>
    <?php echo '<link rel="stylesheet" href="' . WEBSITE_ROOT . 'public/css/about.css">'; ?>
  </head>
  <body>
    <?php  include_once(DIR_ROOT . 'app/view/component/navbar.php'); ?>

      <div class="container-fluid bg-1">
        <h2 class="who"> Qui sommes nous ? </h2>
        <p> Nous sommes 2 élèves ingénieurs à l'enseirb-matmeca de Bordeaux en filière télécommunication <br>
        Alardo Maxime et Gallot-Lavallée Louis. </p>
      </div>

      <div class="container-fluid bg-2">
        <h2 class="why"> Pourquoi ce site ? </h2>
        <p> Nous avons créé ce site pour le projet web du semestre 6 qui consiste à créer un site web de paris en ligne.
          <br> Voici le  <a href=http://rgiraud.vvv.enseirb-matmeca.fr/data/teaching/IT103/sujet_it103_2015_2016.pdf> lien du sujet </a></p>
      </div>

      <div class="container-fluid bg-3">
        <h2 class="contact">Contact</h2>
        <div class="row">
          <div class="col-sm-12">
            <p>N'hésitez pas à nous contacter ! nous répondrons le plus rapidement possible!</p>
            <p><span class="glyphicon glyphicon-map-marker"></span> Bordeaux, France</p>
            <p><span class="glyphicon glyphicon-envelope"></span> lgallotlava@enseirb-matmeca.fr ou malardo@enseirb-matmeca.fr</p>
          </div>
          </div>
      </div>

    <div id="googleMap" style="height:400px;width:100%;"></div>
    <!-- Google Maps -->
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <?php echo '<script src="' . WEBSITE_ROOT . 'public/javascript/about_map.js"></script>'; ?>

    <?php  include_once(DIR_ROOT . 'app/view/component/footer.php'); ?>

  </body>
</html>
