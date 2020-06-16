<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $pdo = new PDO("mysql:host=localhost;dbname=client","root","",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)); ?>
    <title>Document</title>
</head>
<?php
    require"header.php";
?>

<body>
<form method="post">
  <div class="form-group">
    <label for="formGroupExampleInput" class="annonce_font">date</label>
    <input type="text" class="input_annonce" class="form-control" id="formGroupExampleInput" placeholder="Example input" name ="date">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2" class="annonce_font">lieu</label>
    <input type="text"  class="input_annonce" class="form-control" id="formGroupExampleInput2" placeholder="Another input" name ="lieu">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2" class="annonce_font">prix</label>
    <input type="text"  class="input_annonce" class="form-control" id="formGroupExampleInput2" placeholder="Another input" name ="prix">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1" class="annonce_font">description</label>
    <textarea class="form-control"  class="input_annonce_desc" id="exampleFormControlTextarea1" rows="3" name = "description"></textarea>
  </div>
  <button type ="submit" class="input">ajouter</button>
    <?php if(isset($_POST["date_contrat"])) {
            $pdo->exec("INSERT INTO annonce (date_contrat, lieu_contrat, prix_contrat, description_contrat ) VALUES ('$_POST[date]', '$_POST[lieu]', '$_POST[prix]' , '$_POST[description]' )");
        } ?>
</form>
</body>
</html>