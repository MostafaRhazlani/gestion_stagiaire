<?php 
    // require_once("../idontifier/idontifier.php");
    require_once('../connexiondb/connexiondb.php');
    require_once('../les_functions/functions.php');

    // echo rechercher_par_login('admin');
    // echo rechercher_par_email('mostafarhazlani@gmail.com');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $login = $_POST['login'];
        $pwd1 = $_POST['pwd1'];
        $pwd2 = $_POST['pwd2'];
        $email = $_POST['email'];

        $validationErrors = array();

        if (isset($login)) {
            $filtredLogin = filter_var($login, FILTER_SANITIZE_STRING);

            if(strlen($filtredLogin) < 4) {
                $validationErrors[] = "Erreur!!! Le login doit contenir au moin 4 caratérs ";
            }
        }

        if (isset($pwd1) && isset($pwd2)) {
            if(empty($pwd1)) {
                $validationErrors[] = "Erreur!!! Le mpt de passe etre vide";
            }

            if (md5($pwd1) !== md5($pwd2)) {
                $validationErrors[] = "Erreur!!! Les deux mot de passe no sont pas identiques";

            }
        }

        if (isset($email)) {
            $filtredEmail = filter_var($email, FILTER_SANITIZE_EMAIL);

            if($filtredEmail != true) {
                $validationErrors[] = "Erreur!!! Email non valid";
            }
        }        
    }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include("../layout/_HEAD.php"); ?>
    <title>Nouvel utilisateur</title>
</head>
<body>
    <div class="container col-lg-6 col-lg-offset-3 margetop60">
        <!-- titre -->
        <h1 class="text-center">Création d'un nouveu compte utilisateur</h1>

        <?php if (isset($validationErrors) && !empty($validationErrors)) {
                foreach ($validationErrors as $error) {
                    echo '<div class="alert alert-danger">' . $error . '</div>';
                }
            } 
        ?>

        <form action="" method="post" class="form">
            <!-- login -->
            <input type="text" 
                required="required" 
                title="Le login doit contenir au moins 4 caractéres..."
                name="login"
                placeholder="Taper votre nom d'utilisateur"
                autocomplete="off"
                class="form-control" >

            <!-- mot de passe -->
            <input type="password" 
                required="required" 
                minlength="3"
                title="Le Le Mot de passe  doit contenir au moins 3 caractéres..."
                name="pwd1"
                placeholder="Taper votre mot de passe"
                autocomplete="new-password"
                class="form-control" >

            <!-- confirmer mot de passe -->
            <input type="password" 
                required="required" 
                minlength="3"
                name="pwd2"
                placeholder="retaper votre mot de passe pour le confirmer"
                autocomplete="new-password"
                class="form-control" >

            <!-- email -->
            <input type="email" 
                required="required" 
                name="email"
                placeholder="Taper votre email"
                autocomplete="off"
                class="form-control">
            
            <!-- button -->
            <input type="submit" class="btn btn-primary"value="Enregistrer">
        </form>
    </div>
    
</body>
</html>