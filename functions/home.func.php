<?php
    // Cette fonction permet de récupérer tous les articles stockés dans une base de données.
function get_posts(){
    /* Utilisation du mot clé "global" pour accéder à la variable $db
qui doit être définie en dehors de cette fonction et qui doit stocker la connexion à la base de données.*/  
    global $db;
    /* La requête est stocké dans la variable $req.
    Requête SQL permettant de récuperer les articles de la table posts,
    une jointure est faîte avec la table admmins pour afficher le user qui a écrit l'article.
    Les articles apparaissent en ordre décroissant et sont limités à 2 pour l'affichage */
    $req = $db->query("
        SELECT  posts.id,
                posts.title,
                posts.image,
                posts.date,
                posts.content,
                admins.name
        FROM posts
        JOIN admins
        ON posts.writer=admins.email
        WHERE posted='1'
        ORDER BY date DESC
        LIMIT 0,2

    ");
    /*La fonction stocke les résultats de la requête SQL dans un tableau $results.
    Elle utilise ensuite une boucle while pour parcourir chaque ligne de résultats renvoyée par la requête
    et stocke chaque ligne dans le tableau $results.*/
    $results = array();

    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }
    //La fonction renvoie le tableau $results qui contient tous les articles récupérés à partir de la base de données.
    return $results;

}