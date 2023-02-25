<?php
    require_once("../idontifier/idontifier.php");
    require_once('../connexiondb/connexiondb.php');

    $idS = isset($_GET['idS']) ? $_GET['idS'] : 0;

    $requeteS = "select * from stagiaire where idStagiaires = $idS";
    $resultatS = $pdo->query($requeteS);
    $stagiaire = $resultatS->fetch();

    $nomS = $stagiaire['nom'];
    $prenom = $stagiaire['prenom']; 
    $civilite = $stagiaire['civilite'];
    $idFiliere = $stagiaire['idFiliere'];
    $nomPhoto = $stagiaire['photo'];

    $requeteF = "select * from filiere";
    $resultatF = $pdo->query($requeteF);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php include("../layout/_HEAD.php"); ?>


    <title>Edition d'une stagiaire</title>
</head>

<body>
    <?php include("../menu/menu.php"); ?>

    <div class="container">
        <div class="panel panel-primary margetop">
            <div class="panel-heading">Edition du stagiaire</div>
            <div class="panel-body">
                <!-- form -->
                <form action="updateStagiaire.php" method="post" class="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>id du stagiaire : <?php echo $idS ?></label>
                        <input type="hidden" name="idS" class="form-control" value="<?php echo $idS ?>">
                    </div>
                    <!-- nom -->
                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" name="nom" placeholder="Nom" class="form-control" id="nom" value="<?php echo $nomS ?>">
                    </div>
                    <!-- prenom -->
                    <div class="form-group">
                        <label for="prenom">prenom :</label>
                        <input type="text" name="prenom" placeholder="prenom" class="form-control" id="prenom" value="<?php echo $prenom ?>">
                    </div>
                    <!-- civilite -->
                    <div class="form-group">
                        <label for="civilite">Civilite</label>
                        <div class="radio">
                            <label><input type="radio" name="civilite" value="F" <?php if ($civilite == "F") echo 'checked'?>> F </label><br/>
                            <label><input type="radio" name="civilite" value="M" <?php if ($civilite == "M") echo 'checked'?>> M </label>
                        </div>
                    </div>
                    <!-- filiere -->
                    <div class="form-group">
                        <label for="idFiliere">Filière :</label>
                        <select name="idFiliere" class="form-control" id="idFiliere">
                           <?php while ($filiere=$resultatF->fetch()) { ?>
                                <option value="<?php echo $filiere['idFiliere'] ?>">
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