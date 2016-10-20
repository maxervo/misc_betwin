<nav class="navbar navbar-inverse  ">
 <div class="container">
   <div class="navbar-header">
     <a class="navbar-brand" href="./index.php">Betwin</a>
   </div>
   <ul class="nav navbar-nav">
     <?php echo '<li><a href="' . WEBSITE_ROOT .'public/index.php">Accueil</a></li>'; ?>
     <?php if ( isset($_SESSION['valid']) && $_SESSION['valid'] ) {
        echo '<li><a href="' . WEBSITE_ROOT .'public/profile.php">Profil</a></li>';
        }
     ?>
     <?php echo '<li><a href="' . WEBSITE_ROOT .'public/event.php">Paris sportifs</a></li>'; ?>
     <?php echo '<li><a href="' . WEBSITE_ROOT .'public/help.php">Aide</a></li>'; ?>
     <?php echo '<li><a href="' . WEBSITE_ROOT .'public/about.php">À propos</a></li>'; ?>
   </ul>
   <ul class="nav navbar-nav navbar-right">
     <?php
      if ( isset($_SESSION['valid']) && $_SESSION['valid'] ) {
        echo '<li><a class="authenticated" href="' . WEBSITE_ROOT .'public/profile.php"><span class="glyphicon glyphicon-user"></span> '.$_SESSION['username'].'</a></li>';
        echo '<li><a href="' . WEBSITE_ROOT .'public/logout.php"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>';
      }
      else {
        echo '<li><a href="' . WEBSITE_ROOT .'public/register.php"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>';
        echo '<li><a href="' . WEBSITE_ROOT .'public/login.php"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>';
      }
      ?>
   </ul>
 </div>
</nav>
