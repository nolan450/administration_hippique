<?php

$text_random = 'Il sort de son lit, les yeux dans un brouillard londonien, avance jusqu\'à la salle de bain dont la baignoire a été remplie cinq minutes avant par l\'ordinateur de la maison, et va directement prendre un bain. Un bain moussant comme tous les matins. Un bain bien chaud. Et comme il est trop grand pour sa baignoire, ses pieds dépassent. Quelques minutes plus tard, il s’endort. Aucun risque de noyade.
C’est lui aussi qui était à la base du dernier processeur, le sphéro. Un processeur ayant une architecture en forme de sphère et capable de traiter les informations à une vitesse jamais atteinte. Tous les ordinateurs en étaient équipés. Le créateur officiel, le Dr. Stewart Davis, n’était bien sûr pas au courant de la présence de Prélude dans son projet. Prélude avait simplement suggéré légèrement au Dr. En modifiant légèrement ses documents.';



//36 premiers caractères de mon text_random
$text_36 = substr($text_random, 0, 36);
$text_49 = substr($text_random, 0, 49);
$text_72 = substr($text_random, 0, 72);
$text_85 = substr($text_random, 0, 85);
// generation de 1 Million d'empreinte avec les algorithmes MD5, SHA-1, SHA-256, SHA-512 des variables de type string de longueur 36, 49, 72, 85 caractères et calculer le temps de génération des empreintes
$array = array();
// en md5
function md5generate(string $text_random, &$array): void
{
    // début du temps d'éxecution
    $start = microtime(true);
    $i = 0;
    $text = $text_random;
    for($i = 0; $i < 1000000; $i++) {
        $text = md5($text_random);
    }
    $end = microtime(true);
    $array['md5'][(string)strlen($text_random)] = $end - $start;
    echo 'Temps d\'exécution pour md5 : ' . ($end - $start) . ' secondes';
    //passer à la ligne
    echo '  
';
}

function sha1generate(string $text_random, &$array) : void {
    // début du temps d'exécution
    $start = microtime(true);
    $i = 0;
    $text = $text_random;
    for($i = 0; $i < 1000000; $i++) {
        $text = sha1($text_random);
    }
    // fin du temps d'exécution
    $end = microtime(true);
    $array['md5'][(string)strlen($text_random)] = $end - $start;
    // affichage du temps d'exécution
    echo 'Temps d\'exécution pour sha1 : ' . ($end - $start) . ' secondes';
    echo '  
';

}

function sha256generate(string $text_random, &$array) : void {
    // début du temps d'exécution
    $start = microtime(true);
    $i = 0;
    $text = $text_random;
    for($i = 0; $i < 1000000; $i++) {
        $text = hash("sha256", $text_random);
    }
    // fin du temps d'exécution
    $end = microtime(true);
    $array['md5'][(string)strlen($text_random)] = $end - $start;
    // affichage du temps d'exécution
    echo 'Temps d\'exécution pour sha256 : ' . ($end - $start) . ' secondes';
    //passer à la ligne
    echo '  
';
}

function sha512generate(string $text_random, &$array) : void {
    // début du temps d'exécution
    $start = microtime(true);
    $i = 0;
    $text = $text_random;
    for($i = 0; $i < 1000000; $i++) {
        $text = hash("sha512", $text_random);
    }

    // fin du temps d'exécution
    $end = microtime(true);
    $array['md5'][(string)strlen($text_random)] = $end - $start;
    // affichage du temps d'exécution
    echo 'Temps d\'exécution pour sha512 : ' . ($end - $start) . ' secondes';
    //passer à la ligne
    echo '
';
}

echo '36 premiers caractères de mon text_random';
echo '
';
md5generate($text_36, $array);
sha1generate($text_36, $array);
sha256generate($text_36, $array);
sha512generate($text_36, $array);
echo '49 premiers caractères de mon text_random';
echo '
';
md5generate($text_49, $array);
sha1generate($text_49, $array);
sha256generate($text_49, $array);
sha512generate($text_49, $array);
echo '72 premiers caractères de mon text_random';
echo '
';
md5generate($text_72, $array);
sha1generate($text_72, $array);
sha256generate($text_72, $array);
sha512generate($text_72, $array);
echo '85 premiers caractères de mon text_random';
echo '
';
md5generate($text_85, $array);
sha1generate($text_85, $array);
sha256generate($text_85, $array);
sha512generate($text_85, $array);

print_r($array);

//
