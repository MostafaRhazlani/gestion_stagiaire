<?php
    require_once("../idontifier/idontifier.php");
    require_once('../connexiondb/connexiondb.php');

    $idUser = isset($_GET['idUser']) ? $_GET['idUser'] : 0;

    $requeteUser = "select * from utilisateur where iduser = $idUser";
    $resultatUser = $pdo->query($requeteUser);
    $user = $resultatUser->fetch();

    $login = $user['login'];
    $email = $user['email']; 
    $role = strtoupper($user['role']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
      <?php include("../layout/_HEAD.php"); ?>


    <title>Edition d'une utilisateur</title>
</head>

<body>
    <?php include("../menu/menu.php"); ?>

    <div class="container">
        <div class="panel panel-primary margetop80">
            <div class="panel-heading">Edition de l'utilisateur</div>
            <div class="panel-body">
                <!-- form -->
                <form action="updateUser.php" method="post" class="form">
                    <div class="form-group">
                        <label for="idUser">id de l'utilisateur : <?php echo $idUser ?></label>
                        <input type="hidden" name="idUser" class="form-control" value="<?php echo $idUser ?>">
                    </div>
                    <!-- login -->
                    <div class="form-group">
                        <label for="login">login :</label>
                        <input type="text" name="login" placeholder="login" class="form-control" id="login" value="<?php echo $login ?>">
                    </div>
                    <!-- email -->
                    <div class="form-group">
                        <label for="email">email :</label>
                        <input type="text" name="email" placeholder="email" class="form-control" id="email" value="<?php echo $email ?>">
                    </div>
                    <!-- role -->
                    <div class="form-group">
                        <select name="role" class="form-control">
                            <option value="ADMIN" <?php if($role == "ADMIN") echo "selected" ?>>Administrateur</option>
                            <option value="VISITEUR" <?php if($role == "VISITEUR") echo "selected" ?>>Visiteur</option>
                        </select>
                    </div>
                    <!-- button submit -->
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-save"></span>
                        Enregistrer
                    </button>
                    &nbsp;&nbsp;
                    <!-- changer le mot de passe -->
                    <a href="../utilisateurs/editPwd.php?idUser=<?php echo $idUser ?>">Changer le mot de passe</a>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>