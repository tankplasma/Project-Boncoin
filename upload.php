<?php
if (isset($_POST['submit'])){
    $image = $IMAGE['mot_de_passe'];

    $imageName = $_IMAGE['mot_de_passe']['name'];
    $imageTmpName = $_IMAGE['mot_de_passe']['tmp_name'];
    $imageSize = $_IMAGE['mot_de_passe']['size'];
    $imageError = $_IMAGE['mot_de_passe']['error'];
    $imageType = $_IMAGE['mot_de_passe']['type'];

    $fileExt = explode('.','$imageName');
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png','pdf');

    if (in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 1000000){
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($imageTmpName, $fileDestination);
                header("Location: sign_up.php?uploadréussit")
            }
            else{
                echo "le fichier est trop gros"
            }
        }
        else{
            echo "tu ne peut pas upload ce fichier"
        }
    }
    else{
        echo "tu ne peut pas upload ce fichier"
    }
}