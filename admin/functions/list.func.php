<?php
/*Fonction permettant de récupérer tous les articles de la table Posts et de les afficher en ordre descendant et de 
les afficher dans un tableau. Le plus récent des articles apparait en premier */
function get_posts(){

    global $db;

    $req = $db->query("SELECT * FROM posts ORDER BY date DESC");

    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;


}