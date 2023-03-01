<?php
  require_once("../idontifier/idontifier.php");
  require_once('../connexiondb/connexiondb.php');

  $login = isset($_GET['login']) ? $_GET['login'] : "";
  $size = isset($_GET['size']) ? $_GET['size'] : 3;
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $offset = ($page-1) * $size;

  $requeteUser = "select * from utilisateur where login like '%$login%'
              limit $size
              offset $offset";
  $requeteCount = "select count(*) countUser from utilisateur";
  
  $resultatUser = $pdo->query($requeteUser);
  $resultatCount = $pdo->query($requeteCount);
  $tabCount = $resultatCount->fetch();
  $nbrUser = $tabCount['countUser'];

  $reste = $nbrUser % $size;

  if ($reste === 0) {
    $nbrPage = $nbrUser / $size;
  } else {
    $nbrPage = floor($nbrUser / $size) +1;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!-- style -->
  <?php include("../layout/_HEAD.php"); ?>

  <!-- title -->
  <title>Gestion des utilisateur</title>
</head>
<body>
  <!-- get page menu.php -->
  <?php include("../menu/menu.php"); ?>

  <div class="container">
    <div class="panel panel-success margetop80">
      <div class="panel-heading">rechercher des utilisateur</div>
      <div class="panel-body">
        <!-- form -->
        <form action="utilisateur.php" method="get" class="form-inline">
          <label ></label>
          <div class="form-group">
            <input type="text" name="login" placeholder="login" value="<?php echo $login; ?>" class="form-control">
          </div> 
          <button type="submit" class="btn btn-success">
            <span class="glyphicon glyphicon-search"></span>
            Chercher...
          </button>
        </form>
      </div>
    </div>

    <!-- head the table -->
    <div class="panel panel-primary">
      <div class="panel-heading">liste des utilisateur (<?php echo $nbrUser ?>) utilisateurs</div>
      <div class="panel-body">
        <table class="table table-striped table-bordered">
          <!-- thead -->
          <thead>
            <tr>
              <th>login </th>
              <th>Email </th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <!-- tbody -->
          <tbody>
            <?php while ($user = $resultatUser->fetch()) { ?>
              <tr class="<?php echo $user['etat']== 1 ? "success" : "danger"  ?>">
                <td> <?php echo $user['login'] ?> </td>
                <td> <?php echo $user['email'] ?> </td>
                <td> <?php echo $user['role'] ?> </td>
                <td>
                  <a href="editerUser.php?idUser=<?php echo $user['iduser'] ?>">
                    <span class="glyphicon glyphicon-edit"></span>
                  </a>
                  &nbsp;
                  <a onclick="return confirm('Etes vous sur do vouloir supprimer le cet utilisateurs')" 
                      href="supprimerUser.php?idUser=<?php echo $user['iduser'] ?>">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                  &nbsp;&nbsp;
                  <a href="activerUser.php?idUser=<?php echo $user['iduser'] ?>&etat=<?php echo $user['etat'] ?>">
                    <?php
                      if ( $user['etat']== 1) {
                        echo "<span class='glyphicon glyphicon-remove'></span>";
                      } else {
                        echo "<span class='glyphicon glyphicon-ok'></span>";
                      }
                    ?>
                  </a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <!-- buttons -->
        <div>
        <?php if ($nbrPage > 1) { ?>
          <ul class="pagination">
              <?php for($i = 1; $i <= $nbrPage; $i++) {  ?>
                <li class="<?php if($i == $page) echo 'active' ?>">
                  <a href="utilisateur.php?page=<?php echo $i; ?>&login=<?php echo $login ?>">
                  <?php echo $i;?>
                  </a>
                </li>
              <?php } ?>
            </ul> 
        <?php } ?>  
        </div>
      </div>
    </div>
  </div>
</body>
</html>

