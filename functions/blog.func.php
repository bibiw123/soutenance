<?php
/* Fonction get_posts() effectue une requête sur une base de données
 pour récupérer toutes les lignes de la table posts qui ont la colonne posted définie 
 à '1'pour représenter des publications et les trie par date décroissante.
Les lignes résultat sont ensuite stockées dans un tableau $results qui est renvoyé en tant que résultat de la fonction. */
function get_posts(){
/* Cette ligne déclare la variable $db comme une variable globale. Cela signifie que la variable $db est définie en dehors de la fonction
 et est accessible à l'intérieur de la fonction.*/
    global $db;

    $req = $db->query("SELECT * FROM posts WHERE posted='1' ORDER BY date DESC");

    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;


}