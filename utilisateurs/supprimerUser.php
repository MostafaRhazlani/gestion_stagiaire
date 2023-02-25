<?php 
    session_start();
    if(isset($_SESSION['user'])) {
        require_once('../connexiondb/connexiondb.php');

        $idUser = isset($_GET['idUser']) ? $_GET['idUser'] : 0;


            $requete = "delete from utilisateur where iduser=?";
            $params = array($idUser);
            $resultat = $pdo->prepare($requete);
            $resultat->execute($params);

        header('location:utilisateur.php');
    } else {
        header('location:../login/login.php');
      }

?>