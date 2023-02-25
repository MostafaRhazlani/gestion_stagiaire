<?php 
    require_once("../idontifier/idontifier.php");
    require_once('../connexiondb/connexiondb.php');

    $iduser = $_SESSION['user']['iduser'];
    $oldpwd = isset($_POST['oldPwd']) ? $_POST['oldPwd'] : "";
    $newpwd = isset($_POST['newPwd']) ? $_POST['newPwd'] : "";


    $requete = "select * from utilisateur where iduser=$iduser and pwd=MD5('$oldpwd')";
  
    $resultat = $pdo->prepare($requete);
    $resultat->execute();
    $msg = "";

    $interval = 3;
    $url = "../login/login.php";
    
    if ($resultat->fetch()) {
        $requete = "update utilisateur set pwd=MD5(?) where iduser=?";
        $params = array($newpwd, $iduser);
        $resultat = $pdo->prepare($requete);
        $resultat->execute($params);
        $msg = "<div class='alert alert-success'><strong>Félicitation!!</strong> Votre mot de passe est modifié avec succés</div>";
    } else {
        $msg = "<div class='alert alert-danger'><strong>Erreur!!</strong> L'ancien mot de passe est incorrect !!!</div>";
        $url= $_SERVER['HTTP_REFERER'];
    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Changement de mot de passe</title>
    <?php include("../layout/_HEAD.php"); ?>
</head>
<body>
    <div class="container">
        <?php
        echo $msg;
        header("refresh:$interval;url= $url");
        ?>
    </div>
    
</body>
</html>