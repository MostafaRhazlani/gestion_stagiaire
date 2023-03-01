<?php 
  require_once("../connexiondb/connexiondb.php");
  require_once("../les_functions/functions.php");

  if(isset($_POST['email'])) 
    $email = $_POST['email'];
  else 
    $email = "";


  $user = rechercher_user_par_email($email);

  if ($user != NULL) {
    $id = $user['iduser'];
    $requete = $pdo->prepare("update utilisateur set pwd = MD5('0000') where iduser = $id");
    $requete->execute();

    $to = $email;
    $object = "Intialisation de not de passe";
    $content = "Votre nouveau mot de passe 0000, veuillez le modifier à la prochine ouverture de session";
    $entes = "From : App Gestion stagiaire" . "\r\n" . "CC: gestionstagiaire2023@gmail.com";

    mail($to, $object, $content, $entes);
  } else {
    echo "Email incorrect";
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <?php include("../layout/_HEAD.php"); ?>
  <!-- title -->
  <title>intialiser votre mot de passe</title>
</head>

<body>
    <div class="container col-lg-6 col-lg-offset-3 col-md-6 margetop40">
      <div class="panel panel-primary ">
        <div class="panel-heading">Intialiser votre mot de passe</div>
        <div class="panel-body">
          <!-- form -->
          <form method="post" class="form">
            
            <!-- email -->
            <div class="form-group">
              <label for="email">email :</label>
              <input type="email" name="email" placeholder="email" class="form-control" id="email">
            </div>

            <button type="submit" class="btn btn-success">
              Intialiser le mot de passe
            </button>
          </form>
        </div>
      </div>
    </div>
</body>

</html>