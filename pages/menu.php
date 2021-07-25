<nav class="navbar navbar-inverse navbar-fixed-top">

 <div class="container-fluid"><!-- container-fluid:pour que la page s'adapte toujours à l'écran-->
<div class="navbar-header">
<a href="afficherUniversite.php" class="navbar-brand"><span class="glyphicon glyphicon-home"></span> </a>
<!-- ../index.php:pour afficher directement le contenu de l'application une fois on mentionne "localhost/Inventaire" ce n'est pas la peine de passer par les dossiers-->
</div>
<ul class="nav navbar-nav">
<!--
<li><a href="immobilisations.php">Immobilisations</a></li>-->
<!--<li><a href="localisation.php">Localisations</a></li>-->


<?php if ($_SESSION['user']['Role']=='ADMIN') {?>
<li><a href="universites.php">Salle</a></li>
<li><a href="etudiant.php"> clients</a></li>
<li><a href="utilisateurs.php">Utilisateurs</a></li>
<?php } ?>
</ul>

<ul class="nav navbar-nav navbar-right">

<li>
<a href="modifierUser.php?IdU=<?php echo $_SESSION['user']['IdUser'] ?>">
<i class="glyphicon glyphicon-user"></i>
<?php echo ' '.$_SESSION['user']['Login']?>
</a>
</li>
<li><a href="seDeconnecter.php">Se Déconnecter <span class="glyphicon glyphicon-log-out"></span></a></li>

</ul>
</div>
</nav>