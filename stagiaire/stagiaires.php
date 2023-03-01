<?php
  require_once("../idontifier/idontifier.php");
  require_once('../connexiondb/connexiondb.php');

  $nomPrenom = isset($_GET['nomPrenom']) ? $_GET['nomPrenom'] : "";
  $idfiliere = isset($_GET['idfiliere']) ? $_GET['idfiliere'] : 0;

  $size = isset($_GET['size']) ? $_GET['size'] : 3;
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $offset = ($page-1) * $size;

  $requeteFiliere = "select * from filiere";

  if ($idfiliere == 0) {
    $requeteStagiaire = "select idStagiaires,nom,prenom,nomFiliere,photo,civilite 
              from filiere as f, stagiaire as s
              where f.idFiliere = s.idFiliere
              and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%') 
              order by idStagiaires asc
              limit $size
              offset $offset";

    $requeteCount = "select count(*) countS from stagiaire
                     where nom like '%$nomPrenom%' or prenom like '%$nomPrenom%'";
  } else {
    $requeteStagiaire = "select idStagiaires,nom,prenom,nomFiliere,photo,civilite 
              from filiere as f,stagiaire as s
              where f.idFiliere = s.idFiliere
              and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
              and f.idFiliere = $idfiliere
              limit $size
              offset $offset";

  $requeteCount = "select count(*) countS from stagiaire
            where (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
            and idFiliere = $idfiliere";
  }
  
  
  $resultatFiliere = $pdo->query($requeteFiliere);
  $resultatStagiaire = $pdo->query($requeteStagiaire);
  $resultatCount = $pdo->query($requeteCount);
  
  $tabCount = $resultatCount->fetch();
  $nbrStagiaire = $tabCount['countS'];


  $reste = $nbrStagiaire % $size;
  
  if ($reste === 0) {
    $nbrPage = $nbrStagiaire / $size;
  } else {
    $nbrPage = floor($nbrStagiaire / $size) +1;
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!-- style -->
    <?php include("../layout/_HEAD.php"); ?>
  <!-- title -->
  <title>Stagiaire</title>
</head>
<body>
  <!-- get page menu.php -->
  <?php include("../menu/menu.php"); ?>

  <div class="container">
    <div class="panel panel-success margetop80">
      <div class="panel-heading">rechercher des stagiaire</div>
      <div class="panel-body">
        <!-- form -->
        <form action="stagiaires.php" method="get" class="form-inline">
          <label ></label>
          <div class="form-group">
            <input type="text" name="nomPrenom" placeholder="Nom et prénom" value="<?php echo $nomPrenom; ?>" class="form-control">
          </div> 
          <label for="idfiliere">Filière :</label>
          <select name="idfiliere" class="form-control" id="idfiliere" onchange="this.form.submit()">
            <option value=0 >Touts les filière</option>
            <?php while ($filiere = $resultatFiliere->fetch()) { ?>
              <option value="<?php echo $filiere['idFiliere'] ?>" <?php if($filiere['idFiliere'] == $idfiliere) echo "selected"  ?>><?php echo $filiere['nomFiliere'] ?></option>
            <?php } ?>
          </select>
          <button type="submit" class="btn btn-success">
            <span class="glyphicon glyphicon-search"></span>
            Chercher...
          </button>
          &nbsp; &nbsp;
          <?php if($_SESSION['user']['role'] == 'ADMIN') { ?>
            <a href="nouveauStagiaire.php">
              <span class="glyphicon glyphicon-plus"></span>
              Nouveau Stagiaire
            </a>
          <?php } ?>
        </form>
      </div>
    </div>

    <!-- head the table -->
    <div class="panel panel-primary">
      <div class="panel-heading">Liste des stagiaire (<?php echo $nbrStagiaire ?>) Stagiaire</div>
      <div class="panel-body">
        <table class="table table-striped table-bordered">
          <!-- thead -->
          <thead>
            <tr>
              <th>Id stagiaire</th>
              <th>Nom </th>
              <th>Prénom </th>
              <th>filière</th>
              <th>photo</th>
              <?php if($_SESSION['user']['role'] == 'ADMIN') { ?>
                <th>Actions</th>
              <?php } ?>
            </tr>
          </thead>
          <!-- tbody -->
          <tbody>
            <?php while ($stagiaire = $resultatStagiaire->fetch()) { ?>
              <tr>
                <td> <?php echo $stagiaire['idStagiaires'] ?> </td>
                <td> <?php echo $stagiaire['nom'] ?> </td>
                <td> <?php echo $stagiaire['prenom'] ?> </td>
                <td> <?php echo $stagiaire['nomFiliere'] ?> </td>
                <td> 
                  <img  src="../images/<?php echo $stagiaire['photo'] ?>"
                  width="50px" height="50px" class="img-circle">
                </td>
                <?php if($_SESSION['user']['role'] == 'ADMIN') { ?>
                  <td>
                    <a href="editStagiaire.php?idS=<?php echo $stagiaire['idStagiaires'] ?>">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    &nbsp;
                    <a onclick="return confirm('Etes vous sur do vouloir supprimer le stagiaire')" 
                        href="supprimerStagiaire.php?idS=<?php echo $stagiaire['idStagiaires'] ?>">
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
          <ul class="pagination">
            <?php for($i = 1; $i <= $nbrPage; $i++) {  ?>
              <li class="<?php if($i == $page) echo 'active' ?>">
                <a href="stagiaires.php?page=<?php echo $i; ?>&nomPrenom=<?php echo $nomPrenom ?>&idfiliere=<?php echo $idfiliere?>">
                <?php echo $i; ?>
                </a>
              </li>
            <?php } ?>
          </ul>   
        </div>
      </div>
    </div>
  </div>
</body>
</html>

