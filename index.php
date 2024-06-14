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

//UPLOADER L IMAGE DANS UN DOSSIER

/*Il faut créer un dossier "upload" à la racine du projet
Il faut utiliser la fonction PHP "move_uploades_file". Cette fonction attend 2 paramètres:
le chemin du fichier que l’on veut uploader et le chemin vers lequel on souhaite l’uploader.
ex: move_uploaded_file(<< C:\Dev\wamp64\tmp\php84BB.tmp >>, <<./upload/image.jpg >>)
*/

/* - > on rajoute à la suite des variables: 
move_uploades_file($tmpName, './upload/'.$name);//L'IMAGE EST UPLOADEE*/

//GERER LES ERREURS

/*Pour le moment on peut uploader n'importe quel type de fichier*/

/*Vérification sur l'extension du fichier
on rajoute à la suite des variables:
*/
$tabExtension = explode('.', $name);
$extension = strtolower(end($tabExtension));/*la fonction strtolower met en minuscule une châine de caractère.
ça permet de ne pas avoir de problème de comparaison. Ce n'est pas un souci si qq met un fichier
avec une extension JPG, Jpg, jpG....

/*la fonction explode permets de découper une chaîne de caractère en plusieurs morceaux à partir d’un délimiteur.
ex: explode(« . » , « 10.25.65.20 ») permet de découper la chaîne de caractère à chaque fois qu’il y a un « . ». 
On obtient alors le tableau [« 10 », « 25 », « 65 », « 20 »].

On fait pareil pour le nom de notre fichier: explode(« . » , « image.jpg »)
ça donne un tableau avec 2 éléments, comme ceci [« image », « jpg »]. 
Il faut donc récupérer le dernier élément de ce tableau avec la fonction end().*/

//VERIFICATION DE L EXTENSION

/*On rajoute à la suite:*/

//TABLEAU DES EXTENSIONS QUE L ON ACCEPTE
$extensions = ['jpg', 'png', 'jpeg', 'gif'];

/*On s'assure que l’extension du fichier envoyé se trouve bien dans ce tableau grâce 
à la fonction in_array. Sinon on affiche un message d'erreur*/
if(in_array($extension, $extensions)){
    move_uploades_file($tmpName, './upload/'.$name)
}
else{
    echo "Mauvaise exteniosn";
}
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
