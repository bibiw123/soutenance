<?php
/* Fonction qui récupère les détails d'un article spécifique à partir de la base de données. 
   Elle utilise une requête SQL pour sélectionner les informations de l'article avec l'ID spécifié dans $_GET['id'].
   La fonction retourne un objet contenant les détails de l'article, tels que l'ID, le titre, l'image, le contenu, la date de publication et 
   le nom de l'auteur.*/
function get_post(){
    global $db;

    $req = $db->query("
        SELECT  posts.id,
                posts.title,
                posts.image,
                posts.content,
                posts.date,
                admins.name
        FROM posts
        JOIN admins
        ON posts.writer = admins.email
        WHERE posts.id='{$_GET['id']}'
        AND posts.posted = '1'
    ");

    $result = $req->fetchObject();
    return $result;

}

/*Fonction  qui est utilisée pour ajouter un commentaire à un article spécifique. 
  Les paramètres $name, $email et $comment représentent respectivement le nom de l'auteur du commentaire, son adresse e-mail et le contenu du commentaire.
  La fonction insère ensuite le commentaire dans la table "comments" de la base de données en utilisant une requête SQL.*/
function comment($name,$email,$comment){

    global $db;

    $c = array(
        'name'      => $name,
        'email'     => $email,
        'comment'   => $comment,
        'post_id'   => $_GET["id"]

    );

    $sql = "INSERT INTO comments(name,email,comment,post_id,date) VALUES(:name, :email, :comment, :post_id, NOW())";
    $req = $db->prepare($sql);
    $req->execute($c);

}
/*Fonction qui récupère tous les commentaires associés à un article spécifique à partir de la base de données.
 Elle utilise une requête SQL pour sélectionner tous les commentaires ayant l'ID de l'article spécifié dans $_GET['id']. 
 Les commentaires sont triés par date de manière décroissante (du plus récent au plus ancien), 
 puis la fonction retourne un tableau contenant tous les commentaires sous forme d'objets.*/
function get_comments(){

    global $db;
    $req = $db->query("SELECT * FROM comments WHERE post_id = '{$_GET['id']}' ORDER BY date DESC");
    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;


}