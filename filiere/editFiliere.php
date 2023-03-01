<?php
    require_once("../idontifier/idontifier.php");
    require_once('../connexiondb/connexiondb.php');

    $idf = isset($_GET['idF']) ? $_GET['idF'] : 0;
    $requete = "select * from filiere where idFiliere = $idf";
    $resultat = $pdo->query($requete);
    $filiere = $resultat->fetch();
    $nomf = $filiere['nomFiliere'];

    $niveau = $filiere['niveau'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php include("../layout/_HEAD.php"); ?>


    <title>Edition d'une filière</title>
</head>

<body>
    <?php include("../menu/menu.php"); ?>
    <div class="container">
        <div class="panel panel-primary margetop80">
            <div class="panel-heading">Edition de la filière</div>
            <div class="panel-body">
                <!-- form -->
                <form action="updateFiliere.php" method="post" class="form">
                    <div class="form-group">
                        <label for="id_filiere">id de la filière : <?php echo $idf ?></label>
                        <input type="hidden" name="idF" class="form-control" value="<?php echo $idf ?>" id="id_filiere">
                    </div>

                    <div class="form-group">
                        <label for="filiere">Nom do la filière :</label>
                        <input type="text" name="nomF" placeholder="Nom do la filière" class="form-control" id="filiere">
                    </div>
                    <div class="form-group">
                        <label for="niveauu">Niveau :</label>
                        <select name="niveau" class="form-control" id="niveauu">
                            <option value="m" <?php if($niveau == "m")  echo "selected"; ?>>Master</option>
                            <option value="l" <?php if($niveau == "l")  echo "selected"; ?>>Licence</option>
                            <option value="ts" <?php if($niveau == "ts")  echo "selected"; ?>>Technicine spécialisé</option>
                            <option value="t" <?php if($niveau == "t")  echo "selected"; ?>>Technicine</option>
                            <option value="q" <?php if($niveau == "q")  echo "selected"; ?>>Qualification</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-save"></span>
                        Enregistrer
                    </button>
                </form>
            </div>
        </div>
    </div>
    </div>

</body>

</html>