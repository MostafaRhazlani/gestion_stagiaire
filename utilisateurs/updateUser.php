<?php 
    require_once("../idontifier/idontifier.php");
    require_once('../connexiondb/connexiondb.php');

    $idUser = isset($_POST['idUser']) ? $_POST['idUser'] : 0;
    $login = isset($_POST['login']) ? strtolower($_POST['login']) : "";
    $email = isset($_POST['email']) ? strtolower($_POST['email']) : "";
    $role = isset($_POST['role']) ? strtoupper($_POST['role']) : "";


    $requete = "update utilisateur set login=?, email=?, role=? where iduser=?";
    $params = array($login, $email, $role, $idUser);
  
    $resultat = $pdo->prepare($requete);
    $resultat->execute($params);
    

    header('location:utilisateur.php');

?>