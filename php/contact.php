<?php 

define('NOM','Yoshi');

$stringOne = 'mon email est dfgndfhgdhon ';
$stringTwo = 'mario@gmail.com';

//echo $stringOne.$stringTwo

//echo "le ninja crie\"waaaah\" "; ici le "\" annule le guillemet qui le suit et donc le prend pas en compte et evite d'avoir une erreur dans la page 
// echo $stringOne[5]

//echo strlen($stringOne);
//echo strtoupper($stringOne); convertie le $ en majuscule
//echo strtolower($stringOne); pareil en minuscule
//echo str_replace('m','w', $stringOne); remplace un composant par exemple ici tous les en m par un w danq le $ voulu


//nombre 2 types : float et integers

//$radius = 25;
//$pi =3.14; le nombre decimal est un float et le nombre premier est un integer

// operarion basique -,*,/,+,**<- puissance
//echo $pi*$radius**2;
//ordre d'operation PEMDAS
echo 2* (4+9)/3;

//increment et drcrementy operators
 //echo $radius++; ce deuxiement + est un increment operateur et ajoute +1 au radius mais ne s'applique pas ici doirectement
 //echo $radius; il s'appliquera à pzrtire d'ici et donnera ainsi 26 et pareil avec les-- qui sera un decrement operators

 //shorthands operztor
 //$age = 20;

 //$age += 10; operation rapide à laquelle on ajoute +10 et donc si on demande marche aussi avec les *,-,etc
 //echo $age; il va donner 30

 //nombre fonction

 //echo floor ($pi); va prendre un nombre ou un float et va le ramener a l'integer le plus porche vers le bas par exemple ici $pi = 3.14 va etre ramener à 3 il va etre  floored
//echo seil($pi); pareil mais vers le haut
//echo pi(); va nous donner la valeur pi qui est encré dans la langue et pas la valeur de celle que l'on a crer plus haut 

//arrays sont les differente variable créer dans une seul variable

//indexed array
// $peopleOne = ['shaun', 'pekin', 'ryu'] on utilise les parenthhese carré pour indiqueé que c'est une array
// echo $peopleOne[1]; idem que pour quand on cherchait les lettres dans les string on doit mettre [] puis un chiffre dedans pour pour savoir de quel variable on parle ici le zero (0) represente la personne à la premiere place
// $peopleTwo = array ('ken', 'chun'); autre facon de creer une array
// echo $peopleTwo[1];
//$ages = [20,30,40,50];
//print_r($ages); fonction qui veut dire print readable il va mtn donner une version lisible de cette array
//$ages[1] = 25; si on veut changer la valeur de la position 1
// $ages[] = 60; si on veut ajouter une donnée à l'array
//array_push($ages, 70); une autre maniere d'ajouter une valeur
//

//associative array ici on creer des clés quand on crer des arrays

//$ninjasOne = ['shaun' => 'noir', 'mario' => 'orange', 'luigi' => 'brown']; lafleche pointe la valeur que la clé aura ici shaun (la clé) aura comme valeur noir (la valeur)
// echo $ninjasOne ['mario'];
//$ninjasOne['toad'] = 'pink'; pour ajouter une clé
//echo count($ninjasOne); pour compter les valeurs




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div> <?php echo NOM; ?> </div>


</body>
</html>