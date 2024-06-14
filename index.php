<?php

/*Par défaut, pour récupérer les données envoyées par un formulaire il faut utiliser 
la variable $_POST (car les données sont envoyées via la méthode POST). 
Dans le cas de la méthode GET, il faut utiliser la variable $_GET.
Mais lorsque l’on ajoute des inputs de type « file », les données sont stockées dans 
la variable $_FILES.*/

//var_dump($_POST);
//var_dump($_FILES);

//on crée les variables
if(isset($_FILES['file'])){
$tmpName = $_FILES['file']['tmp_name'];
$name = $_FILES['file']['name'];
$size = $_FILES['file']['size'];
$error = $_FILES['file']['error'];//laisser tel quel, ça affiche une erreur/PHP ne recoonaît pas l'index (ici "file") car il n'y a rien dans la variable $_FILES. L’index « file » n’existe donc pas. 
//pour corriger cette erreur, il faut vérifier si "file" existe
//Maintenant que l’on a stocké les valeurs qui nous intéresse on va pouvoir les manipuler.
}
?>
<!DOCTYPE html>
<html>
<head>
     <meta charset='utf-8'>
     <meta name='viewport' content='width=device-width, initial-scale=1'>

</head>

<!--CREATION D UN FORMULAIRE AVEC UN CHAMPS INPUT DE TYPE "FILE"-->
<body>
    <form action="index.php" method="POST" enctype="multipart/form-data"><!--pour soumettre un formulaire avec un type "file", 
        il faut rajouter l'attribut:enctype="multipart/form-data"-->
        <label for="file">Fichier</label>
        <input type="file" name="file">
        <button type="submit">Enregistrer</button>
    </form>
</body>

</html>
