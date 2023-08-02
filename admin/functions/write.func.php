<?php
//Fonction d'ajout d'un post
/*Fonction d'ajout d'un nouvel article (post) à la base de données. 
  Les paramètres $title, $content et $posted contiennent le titre, le contenu et l'état de publication de l'article. 
  La fonction utilise la variable $_SESSION['admin'] pour récupérer l'adresse e-mail de l'utilisateur administrateur actuellement connecté, 
  qui sera associée à l'article comme auteur. Ensuite, un tableau $p est créé contenant les informations de l'article. 
  La requête SQL insère ces informations dans la table posts. La colonne "date" est définie à l'aide de la fonction NOW() pour enregistrer
  la date et l'heure actuelles. La fonction post() est utilisée pour créer de nouveaux articles dans la base de données.*/
function post($title,$content,$posted){
    global $db;

    $p = [
        'title'     =>  $title,
        'content'   =>  $content,
        'writer'    =>  $_SESSION['admin'],
        'posted'    =>  $posted

    ];

    $sql = "
      INSERT INTO posts(title,content,writer,date,posted)
      VALUES(:title,:content,:writer,NOW(),:posted)
    ";

    $req = $db->prepare($sql);
    $req->execute($p);

}
/*Fonction de gestion de téléchargement d'une image associée à un article.
  Les paramètres $tmp_name et $extension contiennent le nom temporaire du fichier image téléchargé et l'extension du fichier respectif. 
  La fonction utilise la fonction lastInsertId() de l'objet de connexion $db pour récupérer l'ID de l'article inséré dans la fonction post() précédente. 
  Cet ID sera utilisé pour nommer le fichier image en conséquence (par exemple, "25.jpg" si l'ID est 25 et l'extension est ".jpg"). 
  Ensuite, un tableau $i est créé avec l'ID de l'article et le nom du fichier image. 
  Une requête SQL est utilisée pour mettre à jour l'article dans la table posts avec le nom du fichier image. 
  La fonction move_uploaded_file() est utilisée pour déplacer le fichier image téléchargé vers le répertoire "../img/posts/" avec le nom approprié. 
  Enfin, la fonction redirige vers la page de l'article nouvellement créé en utilisant l'ID de l'article dans l'URL*/
function post_img($tmp_name, $extension){
    global $db;
    $id = $db->lastInsertId();
    $i = [
        'id'    =>  $id,
        'image' =>  $id.$extension      
    ];

    $sql = "UPDATE posts SET image = :image WHERE id = :id";
    $req = $db->prepare($sql);
    $req->execute($i);
    move_uploaded_file($tmp_name,"../img/posts/".$id.$extension);
    header("Location:index.php?page=post&id=".$id);
}