<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Betwin - Accueil</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <?php echo '<link href="' . WEBSITE_ROOT . 'vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">'; ?>
    <?php echo '<link rel="stylesheet" href="' . WEBSITE_ROOT . 'public/css/component/navbar.css">'; ?>
    <?php echo '<link rel="stylesheet" href="' . WEBSITE_ROOT . 'public/css/component/footer.css">'; ?>
    <?php echo '<link rel="stylesheet" href="' . WEBSITE_ROOT . 'public/css/index.css">'; ?>
  </head>

  <body>

  <?php include_once(DIR_ROOT . 'app/view/component/navbar.php'); ?>

  <div id="hero" class="container-fluid bg-1 text-center">
      <h1>BetWin</h1>
      <h3>Le meilleur site de simulation de paris sportifs ! </h3>
  </div>

<!-- Beginning of the Carousel -->
    <h2 id="text_carousel">Les avis sur BetWin !</h2>
    <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">

      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner" role="listbox">
        <div class="item active">
        <h4>"Surement le meilleur site de paris aujourd'hui, nous avons beaucoup de travail pour rattraper notre retard"<br><span style="font-style:normal;">CEO de Beetclic.fr</span></h4>
        </div>
        <div class="item">
          <h4>"BetWin est un modèle pour tout les sites de paris sportifs, design sobre et élégant, nous nous inspirons d'ailleurs de leur site!"<br><span style="font-style:normal;">CEO de Winamax</span></h4>
        </div>
        <div class="item">
          <h4>"John Snow a ressuscité pour pouvoir parier sur BetWin"<br><span style="font-style:normal;"> Melissandre alias la sorcière rousse</span></h4>
        </div>
      </div>

      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
<!-- End of the Carousel -->

    <div class="container-fluid bg-2 text-center">
    <h3 >Pourquoi utiliser BetWin ?</h3>
      <div class="row">
          <div class="col-sm-4">
             <p class=text>Simple d'utilisation <br> et ergonomique</p>
             <span class="glyphicon glyphicon-heart logo"></span>
          </div>
          <div class="col-sm-4">
            <p class=text>Inscription gratuite <br> et rapide</p>
            <span class="glyphicon glyphicon-flash logo"></span>
          </div>
          <div class="col-sm-4">
            <p class=text>Les plus grands matchs de sport <br> sont disponibles!</p>
            <span class="glyphicon glyphicon-bullhorn logo"></span>
          </div>
      </div>
    </div>

   <div class="container-fluid bg-3 ">
       <div class="row">
          <div class="col-sm-8">
                 <h3>Un site sécurisé et éthique</h3>
                 <p>Vos informations personnelles sensibles comme vos mots de passe et vos coordonnées bancaires sont cryptées.  <br> Nous n'utiliseront jamais à des fins économiques vos informations personnelles. </p>
          </div>
          <div class="col-sm-4">
                <span class="glyphicon glyphicon-cog "></span>
          </div>
      </div>
    </div>

    <?php include_once(DIR_ROOT . 'app/view/component/footer.php'); ?>

  </body>
</html>
