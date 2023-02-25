<?php 
    require_once("../idontifier/idontifier.php");
    require_once('../connexiondb/connexiondb.php');

    $idf = isset($_POST['idF']) ? $_POST['idF'] : 0;
    $nomf = isset($_POST['nomF']) ? strtoupper($_POST['nomF']) : "";
    $niveau = isset($_POST['niveau']) ? strtoupper($_POST['niveau']) : "";
    $page = isset($_POST['page']) ? $_POST['page'] : 1;

    $requete = "update filiere set nomFiliere=?, niveau=? where idFiliere=?";
    $params = array($nomf, $niveau, $idf);
    $resultat = $pdo->prepare($requete);
    $resultat->execute($params);

    header('location:filieres.php');
?>