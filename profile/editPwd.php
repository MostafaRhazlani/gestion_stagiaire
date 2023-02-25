<?php
  session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <?php include("../layout/_HEAD.php"); ?>
  <link rel="stylesheet" href="../css/styleEditPwd.css">
  <script src="../js/jquery-git.js"></script>
  <script src="../js/monjs.js"></script>
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
        <div class="panel-heading">Changement de mot de passe</div>
        <div class="panel-body">
          <h3>Compte : <span><?php echo $_SESSION['user']['login'] ?></span></h3>
          <!-- form -->
          <form action="updatePwd.php" method="post" class="form">
            <!-- login -->
            <div class="form-group">
              <input type="password" name="oldPwd" placeholder="Taper votre Ancien Mot de passe" class="form-control oldPwd" id="login">
              <span class="glyphicon glyphicon-eye-open show_old_pwd"></span>
            </div>
            <!-- mot de passe -->
            <div class="form-group">
              <input type="password" name="newPwd" placeholder="Taper votre Nouveau Mot de passe" class="form-control newPwd" id="pwd">
              <span class="glyphicon glyphicon-eye-open show_new_pwd"></span>            
            </div>

            <button type="submit" class="btn btn-primary">
              Enregistrer
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>