 <?php
    require_once("../idontifier/idontifier.php");
    require_once('../connexiondb/connexiondb.php');


    $requeteF = "select * from filiere";
    $resultatF = $pdo->query($requeteF);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
      <?php include("../layout/_HEAD.php"); ?>


    <title>Nouveau d'un stagiaire</title>
</head>

<body>
    <?php include("../menu/menu.php"); ?>

    <div class="container">
        <div class="panel panel-primary margetop">
            <div class="panel-heading">Le infos du nouveau stagiaire</div>
            <div class="panel-body">
                <!-- form -->
                <form action="insertStagiaire.php" method="post" class="form" enctype="multipart/form-data">
                    <!-- nom -->
                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" name="nom" placeholder="Nom" class="form-control" id="nom">
                    </div>
                    <!-- prenom -->
                    <div class="form-group">
                        <label for="prenom">prenom :</label>
                        <input type="text" name="prenom" placeholder="prenom" class="form-control" id="prenom">
                    </div>
                    <!-- civilite -->
                    <div class="form-group">
                        <label for="civilite">Civilite</label>
                        <div class="radio">
                            <label><input type="radio" name="civilite" value="F" checked> F </label><br/>
                            <label><input type="radio" name="civilite" value="M"> M </label>
                        </div>
                    </div>
                    <!-- filiere -->
                    <div class="form-group">
                        <label for="idFiliere">Filière :</label>
                        <select name="idFiliere" class="form-control" id="idFiliere">
                           <?php while ($filiere=$resultatF->fetch()) { ?>
                                <option value="<?php echo $filiere['idFiliere'] ?>" >
                                    <?php echo $filiere['nomFiliere'] ?>
                                </option>
                           <?php } ?>
                        </select>
                    </div>  
                    <!-- get file -->
                    <div class="form-group">
                        <label>photo :</label>
                        <input type="file" name="photo">
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