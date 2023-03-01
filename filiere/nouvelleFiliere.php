<?php
    require_once("../idontifier/idontifier.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php include("../layout/_HEAD.php"); ?>


    <title>nouvelle Filiere</title>
</head>

<body>
    <?php include("../menu/menu.php"); ?>
    <div class="container">
        <div class="panel panel-primary margetop80">
            <div class="panel-heading">Veuillez saisir les donnés de la nouvelle filière</div>
            <div class="panel-body">
                <!-- form -->
                <form action="insertFilieres.php" method="post" class="form">
                    
                    <div class="form-group">
                        <label for="filiere">Nom do la filière :</label>
                        <input type="text" name="nomF" placeholder="Nom do la filière" class="form-control" id="filiere">
                    </div>
                    <div class="form-group">
                        <label for="niveau">Niveau :</label>
                        <select name="niveau" class="form-control" id="niveau">
                            <option value="m">Master</option>
                            <option value="l">Licence</option>
                            <option value="ts" selected>Technicine spécialisé</option>
                            <option value="t">Technicine</option>
                            <option value="q">Qualification</option>
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