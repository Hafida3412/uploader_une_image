<?php
//var_dump($_POST);
//var_dump($_FILES);
/*$GET https:://monsite.fr?parametre=test
$GET['parametre'];cette méthode est utilisée lorsqu'on récupère des données via URL*/

if(isset($_FILES['file'])){
    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $type = $_FILES['file']['type'];
   
    // "explode" signifie qu'elle découpe un tableaux en 2 éléments: ['gros plan chat', 'jpg']
    $tabExtension = explode('.', $name);
    //var_dump($tabExtension);
    $extension = strtolower(end($tabExtension));
    //var_dump($extension);

    //CREATION D UN TABLEAU DES EXTENSIONS AUTORISEES
    $extensionsAutorisees = ['jpg', 'jpeg', 'gif', 'png'];
    $tailleMax = 400000; //taille en bytes
    if(in_array($extension, $extensionsAutorisees) && $size <= $tailleMax && $error == 0){
        $uniqueName = uniqid('', true);
        //var_dump($uniqueName);
        $fileName = $uniqueName.'.'. $extension;
        
        move_uploaded_file($tmpName,'./upload/'.$fileName);
     
       
       
    }
    else{
        echo'Mauvaise extension ou taille trop importante ou erreur';
    }

}


?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset = 'utf-8'>
    </head>
    <body>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <label for="file">Fichier</label>
            <input type="file" name="file">
            <button type="submit">Enregistrer</button>

        </form>
    </body>

</html>