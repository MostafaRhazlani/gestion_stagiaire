<?php
  require_once("../idontifier/idontifier.php");
  $message = isset($_GET['message']) ? $_GET['message'] : "Erruer";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <?php include("../layout/_HEAD.php"); ?>


  <title>Alerte</title>
</head>
<body>
  <?php include("../menu/menu.php"); ?>

  <div class="container">
    <div class="panel panel-danger margetop">
      <div class="panel-heading">Erreur:</div>
      <div class="panel-body">
        <h4><?php echo $message ?></h4>
        <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Retour >>></a>
      </div>
    </div>
  </div>

</body>
</html>