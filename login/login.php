<?php 
  session_start();
   
  if(isset($_SESSION['erreurLogin']))
    $erruerLogin = $_SESSION['erreurLogin'];
  else {
    $erruerLogin = "";
  }
  session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <?php include("../layout/_HEAD.php"); ?>
  <!-- title -->
  <title>Se connecter</title>
</head>
<style>
  .vertical {
    width: 100%;
    height: 700px;
    display: flex;
    align-items: center;
  }
</style>

<body>
  <div class="vertical">
    <div class="container col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 ">
      <div class="panel panel-primary ">
        <div class="panel-heading">Se connecter</div>
        <div class="panel-body">
          <!-- form -->
          <form action="seConnecter.php" method="post" class="form">
            <?php if (!empty($erruerLogin)) { ?>
            <!-- alert -->
            <div class="alert alert-danger">
              <?php echo $erruerLogin ?>
            </div>
            <?php } ?>
            <!-- login -->
            <div class="form-group">
              <label for="login">Login :</label>
              <input type="text" name="login" placeholder="login" class="form-control" id="login">
            </div>
            <!-- mot de passe -->
            <div class="form-group">
              <label for="pwd">Mot de passe :</label>
              <input type="password" name="pwd" placeholder="Mot de passe" class="form-control" id="pwd">
            </div>

            <button type="submit" class="btn btn-success">
              <span class="glyphicon glyphicon-log-in"></span>
              Se connecter
            </button>
            <br>
            <br>
            <div>
              <a href="intialiserPwd.php">
                Mot de passe Oublié
              </a>
              &nbsp;&nbsp;&nbsp;
              <a href="nouvelUtilisateur.php">
                Créer un compte
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>