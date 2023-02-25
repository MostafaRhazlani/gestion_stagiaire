<?php 
  require_once("../idontifier/idontifier.php");
?>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
        <a href="../index.php" class="navbar-brand">Gestion des stagiaires</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="../stagiaire/stagiaires.php">Les stagiaires</a></li>
      <li><a href="../filiere/filieres.php">Les filieres</a></li>
      <?php if($_SESSION['user']['role'] == 'ADMIN') { ?>
        <li><a href="../utilisateurs/utilisateur.php">Les utilisteurs</a></li>
      <?php } ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li>
        <a href="../profile/editerUtilisateur.php?id=<?php echo $_SESSION['user']['iduser'] ?>">
          <i class="glyphicon glyphicon-user"></i>&nbsp;<?php echo $_SESSION['user']['login']  ?>
        </a>
      </li>
      <li>
        <a href="../login/seDeconnecter.php">
          <i class="glyphicon glyphicon-log-out"></i>&nbsp;Se deconnecter
        </a>
      </li>
    </ul>
  </div>
</nav>
