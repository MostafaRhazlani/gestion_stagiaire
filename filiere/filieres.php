<?php
  require_once("../idontifier/idontifier.php");
  require_once('../connexiondb/connexiondb.php');

  $nomF = isset($_GET['nomF']) ? $_GET['nomF'] : "";
  $niveau = isset($_GET['niveau']) ? $_GET['niveau'] : "all";

  $size = isset($_GET['size']) ? $_GET['size'] : 6;
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $offset = ($page-1) * $size;

  if ($niveau == "all") {
    $requete = "select * from filiere 
                where nomFiliere like '%$nomF%'
                limit $size
                offset $offset";

    $requeteCount = "select count(*) countF from filiere
                     where nomFiliere like '%$nomF%'";
  } else {
    $requete = "select * from filiere
                where nomFiliere like '%$nomF%'
                and niveau='$niveau'
                limit $size
                offset $offset";
                
    $requeteCount = "select count(*) countF from filiere
                where nomFiliere like '%$nomF%'
                and niveau = '$niveau'";
  }

  
  $resultatF = $pdo->query($requete);
  
  $resultatCount = $pdo->query($requeteCount);
  $tabCount = $resultatCount->fetch();
  $nbrFiliere = $tabCount['countF'];

  $reste = $nbrFiliere % $size;
  
  if ($reste === 0) {
    $nbrPage = $nbrFiliere / $size;
  } else {
    $nbrPage = floor($nbrFiliere / $size) +1;
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!-- style -->
  <?php include("../layout/_HEAD.php"); ?>
  <!-- title -->
  <title>filieres</title>
  
</head>
<body>
    <!-- get page menu.php -->
    <?php include("../menu/menu.php"); ?>
  
    <div class="container">
      <div class="panel panel-success margetop">
        <div class="panel-heading">Rechercher des filières</div>
        <div class="panel-body">
          <!-- form -->
          <form action="filieres.php" method="get" class="form-inline">
            <div class="form-group">
              <input type="text" name="nomF" placeholder="Nom do la filière" value="<?php echo $nomF; ?>" class="form-control">
            </div>
            <label for="niveau">Niveau :</label>
            <select name="niveau" class="form-control" id="niveau"
                    onchange="this.form.submit()">
              <option value="all" <?php if($niveau === "all") echo "selected"?>>Tous les niveaux</option>
              <option value="m" <?php if($niveau === "m") echo "selected"?>>Master</option>
              <option value="l" <?php if($niveau === "l") echo "selected"?>>Licence</option>
              <option value="ts" <?php if($niveau === "ts") echo "selected"?>>Technicine spécialisé</option>
              <option value="t" <?php if($niveau === "t") echo "selected"?>>Technicine</option>
              <option value="q" <?php if($niveau === "q") echo "selected"?>>Qualification</option>
            </select>
            <button type="submit" class="btn btn-success">
              <span class="glyphicon glyphicon-search"></span>
              Chercher...
            </button>
            &nbsp; &nbsp;
            <?php if($_SESSION['user']['role'] == 'ADMIN') { ?>
              <a href="nouvelleFiliere.php">
                <span class="glyphicon glyphicon-plus"></span>
                Nouvelle filiére
              </a>
            <?php } ?>
          </form>
        </div>
      </div>

      <!-- table -->
      <div class="panel panel-primary">
        <div class="panel-heading">Liste des filières (<?php echo $nbrFiliere ?>) Filiére</div>
        <div class="panel-body">
          <table class="table table-striped table-bordered">
            <!-- thead -->
            <thead>
              <tr>
                <th>Id filière</th>
                <th>Nom filière</th>
                <th>Neveau</th>
                <?php if($_SESSION['user']['role'] == 'ADMIN') { ?>
                  <th>Actions</th>
                <?php } ?>
              </tr>
            </thead>
            <!-- tbody -->
            <tbody>
              <?php while ($filiere = $resultatF->fetch()) { 
                
                ?>
                <tr>
                  <td> <?php echo $filiere['idFiliere'] ?> </td>
                  <td> <?php echo $filiere['nomFiliere'] ?> </td>
                  <td> <?php echo $filiere['niveau'] ?> </td>
                  <?php if($_SESSION['user']['role'] == 'ADMIN') { ?>
                    <td>
                      <a href="editFiliere.php?idF=<?php echo $filiere['idFiliere'] ?>">
                        <span class="glyphicon glyphicon-edit"></span>
                      </a>
                      &nbsp;
                      <a onclick="return confirm('Etes vous sur do vouloir supprimer le filiére')" 
                        href="supprimerFiliere.php?idF=<?php echo $filiere['idFiliere'] ?>">
                        <span class="glyphicon glyphicon-trash"></span>
                      </a>
                    </td>
                  <?php } ?>
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
                  <a href="filieres.php?page=<?php echo $i; ?>&nomF=<?php echo $nomF ?>&niveau=<?php echo $niveau?>">
                  <?php echo $i; ?>
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

