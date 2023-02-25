<?php 
    require_once("../idontifier/idontifier.php");
    require_once('../connexiondb/connexiondb.php');

    $nomf = isset($_POST['nomF']) ? strtoupper($_POST['nomF']) : "";
    $niveau = isset($_POST['niveau']) ? strtoupper($_POST['niveau']) : "";

    $requete = "insert into filiere(nomFiliere,niveau) values(?,?)";
    $params = array($nomf, $niveau);
    $resultat = $pdo->prepare($requete);
    $resultat->execute($params);

    header('location:filieres.php');
?>