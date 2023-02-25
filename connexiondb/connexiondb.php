<?php 
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=gestion_stage","root","");
    } catch(exception $e) {
        die('Erreur de conexion' . $e->getMessage());
    }
?>