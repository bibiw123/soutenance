<?php
/*Fonction qui récupère un article spécifique en fonction de l'ID passé dans la variable GET ($_GET['id']).
  Elle effectue une requête SQL JOIN entre les tables posts et admins pour récupérer des informations supplémentaires sur l'auteur de l'article.
  La requête récupère l'ID de l'article, le titre, l'image, la date de publication, le contenu, l'état de publication, et le nom de l'auteur.
  Le paramètre :postId est lié à la valeur de $postId, qui est la valeur de $_GET['id'] filtrée par le biais de bindParam(). 
  Cela empêche les attaques d'injection SQL car la valeur est correctement controlée et comparée par PDO. La requête est ensuite exécutée et le résultat est retourné sous forme d'objet*/
function get_post(){

    global $db;

    $postId = $_GET['id'];
    $sql = "SELECT  posts.id,
                    posts.title,
                    posts.image,
                    posts.date,
                    posts.content,
                    posts.posted,
                    admins.name
            FROM posts
            JOIN admins
            ON posts.writer = admins.email
            WHERE posts.id = :postId";

    $req = $db->prepare($sql);
    $req->bindParam(':postId', $postId, PDO::PARAM_INT);
    $req->execute();

    $result = $req->fetchObject();
    return $result;
}
//Fonction de modification d'un article
function edit($title,$content,$posted,$id){

    global $db;

    $e = [
        'title'     => $title,
        'content'   => $content,
        'posted'    => $posted,
        'id'        => $id
    ];

    $sql = "UPDATE posts SET title=:title, content=:content, date=NOW(), posted=:posted WHERE id=:id";
    $req = $db->prepare($sql);
    $req->execute($e);

}