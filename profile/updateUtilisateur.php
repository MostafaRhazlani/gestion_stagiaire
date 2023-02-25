<?php 
    require_once("../idontifier/idontifier.php");
    require_once('../connexiondb/connexiondb.php');

    $id = isset($_POST['id']) ? $_POST['id'] : 0;
    $login = isset($_POST['login']) ? strtolower($_POST['login']) : "";
    $email = isset($_POST['email']) ? strtolower($_POST['email']) : "";

    $requete = "update utilisateur set login=?, email=? where iduser=?";
    $params = array($login, $email, $id);
    $resultat = $pdo->prepare($requete);
    $resultat->execute($params);

    header('location:../login/login.php');
?>