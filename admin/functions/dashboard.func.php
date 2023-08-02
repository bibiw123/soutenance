<?php
 /* Fonction qui prend en paramètre le nom d'une table de la base de données et vérifie le nombre d'enregistrements dans cette table. 
 La fonction utilise une variable globale $db, qui doit être une instance active d'une connexion à la base de données, 
 pour effectuer une requête SQL de type COUNT sur la table spécifiée.*/
function inTable($table){
    global $db;
    $query = $db->query("SELECT COUNT(id) FROM $table");
    return $nombre = $query->fetch();
}
/*Fonction qui prend en paramètre le nom d'une table de la base de données et un tableau associatif $colors. 
Elle vérifie si la table est présente dans le tableau $colors. 
Si la table est trouvée dans le tableau, la fonction renvoie la couleur associée à cette table. 
Sinon, elle renvoie la couleur "orange" par défaut. */
function getColor($table,$colors){
    if(isset($colors[$table])){
        return $colors[$table];
    }else{
        return "orange";
    }
}
/*Fonction qui récupère les commentaires non lus (comments.seen = '0') depuis la base de données.
Elle effectue une requête SQL JOIN entre la table comments et posts pour récupérer des informations supplémentaires sur l'article lié à chaque commentaire.*/
function get_comments(){
    global $db;

    $req = $db->query("
        SELECT  comments.id,
                comments.name,
                comments.email,
                comments.date,
                comments.post_id,
                comments.comment,
                posts.title
        FROM comments
        JOIN posts
        ON comments.post_id = posts.id
        WHERE comments.seen = '0'
        ORDER BY comments.date ASC
    ");

    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }
    return $results;
}
/*Cette fonction récupère les informations de l'utilisateur administrateur connecté 
en utilisant la session PHP ($_SESSION['admin']).*/
function get_user(){
    global $db;

    $req = $db->query("
        SELECT * FROM admins WHERE email='{$_SESSION['admin']}';
    ");

    $result = $req->fetchObject();
    return $result;
}