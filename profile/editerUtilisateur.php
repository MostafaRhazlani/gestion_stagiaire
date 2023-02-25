<?php
  require_once("../idontifier/idontifier.php");
  require_once('../connexiondb/connexiondb.php');

  $id = isset($_GET['id']) ? $_GET['id'] : 0;

  $requete = "select * from utilisateur where iduser = $id";
  $resultat = $pdo->query($requete);
  $utilisateur = $resultat->fetch();

  $login = $utilisateur['login'];
  $email = $utilisateur['email']; 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php include("../layout/_HEAD.php"); ?>


    <title>Edition d'un utilisateur</title>
</head>

<body>
    <?php include("../menu/menu.php"); ?>

    <div class="container">
        <div class="panel panel-primary margetop">
            <div class="panel-heading">Edition de l'utilisateur :</div>
            <div class="panel-body">
                <!-- form -->
                <form action="updateUtilisateur.php" method="post" class="form">
                    <div class="form-group">
                        <label>Id user : <?php echo $id ?></label>
                        <input type="hidden" name="id" class="form-control" value="<?php echo $id ?>">
                    </div>
                    <!-- login -->
                    <div class="form-group">
                        <label for="login">Login :</label>
                        <input type="text" name="login" placeholder="login" class="form-control" id="login" value="<?php echo $login ?>">
                    </div>
                    <!-- email -->
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="text" name="email" placeholder="email" class="form-control" id="email" value="<?php echo $email ?>">
                    </div>
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-save"></span>
                        Enregistrer
                    </button>
                    &nbsp;&nbsp;
                    <!-- changer le mot de passe -->
                    <a href="editPwd.php">Changer le mot de passe</a>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>