<?php 
    require_once("../idontifier/idontifier.php");
    require_once('../connexiondb/connexiondb.php');

    $idS = isset($_POST['idS']) ? $_POST['idS'] : 0;
    $nomS = isset($_POST['nom']) ? strtoupper($_POST['nom']) : "";
    $prenom = isset($_POST['prenom']) ? strtoupper($_POST['prenom']) : "";
    $idFiliere = isset($_POST['idFiliere']) ? $_POST['idFiliere'] : 1;
    $civilite = isset($_POST['civilite']) ? $_POST['civilite'] : "";
    $nomPhoto = isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : "";
    $page = isset($_POST['page']) ? $_POST['page'] : 1;

    if(!empty($nomPhoto)) {
        $imageTemp = $_FILES['photo']['tmp_name'];
        move_uploaded_file($imageTemp, "../images/" . $nomPhoto);
    } else {
        $nomPhoto = "images.png";
    }
    
    if (!empty($nomPhoto)) {
        $requeteS = "update stagiaire set nom=?, prenom=?, idFiliere=?, civilite=?, photo=? where idStagiaires=?";
        $params = array($nomS, $prenom, $idFiliere, $civilite, $nomPhoto, $idS);
    } else {
        $requeteS = "update stagiaire set nom=?, prenom=?, idFiliere=?, civilite=? where idStagiaires=?";
        $params = array($nomS, $prenom, $idFiliere, $civilite, $idS);
    }
    
    $resultatS = $pdo->prepare($requeteS);
    $resultatS->execute($params);

    header('location:stagiaires.php');

?>