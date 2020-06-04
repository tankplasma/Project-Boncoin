<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Resume - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/resume.min.css" rel="stylesheet">
    <?php $pdo = new PDO("mysql:host=localhost;dbname=bdd_projet","root","",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)); ?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <span class="d-block d-lg-none">Clarence Taylor</span>
      <span class="d-none d-lg-block">
        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/profile.jpg" alt="">
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="login.php">login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="admin.php">admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.php">retour</a>
        </li>
        <li class="nav-item">
        </li>
      </ul>
    </div>
  </nav>
  <h2>ajouter une table</h2>
<form method="post">
  <div class="form-group">
    <label for="formGroupExampleInput">nom de l'entrprise</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" name ="nom_entreprise">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">nom du job</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input" name ="nom_job">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">date de l'emplois</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input" name ="date_emplois">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "description"></textarea>
  </div>
  <button type ="submit">ajouter</button>
    <?php if(isset($_POST["nom_entreprise"])) {
            $pdo->exec("INSERT INTO tab_xp (nom_emplois, nom_entreprise, periode_mois, description ) VALUES ('$_POST[nom_entreprise]', '$_POST[nom_job]', '$_POST[date_emplois]' , '$_POST[description]' )");
        } ?>
      <h3>toutes les tables</h3>
    <?php $experiences = $pdo->query ("SELECT * FROM tab_xp ");
        while ($experience = $experiences->fetch(PDO::FETCH_OBJ)) { ?>
    <p><?php echo $experience->ID_xp . "." . $experience->nom_entreprise . " " . $experience->nom_emplois; } ?></p>
    </form>
    <h2>delete une tables</h2>
    <form method="post">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">numero a eliminer</label>
            <input class="form-control" id="exampleFormControlTextarea1" name = "delete_table"></input>
        </div>
        <button type ="submit">delete</button>
            <?php if(isset($_POST["delete_table"])) {?>
        <?php $pdo->exec("DELETE FROM tab_xp WHERE ID_xp = '$_POST[delete_table]'"); } ?>
    </form>
    
</body>
</html>