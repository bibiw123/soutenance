<?php
/*Fonction de vérification de l'adresse e-mail fournie déjà associée à un compte administrateur dans la base de données. 
La fonction prend l'adresse e-mail en paramètre et effectue une requête SQL pour sélectionner tous les enregistrements dans la table admins
où l'adresse e-mail correspond à la valeur fournie. Les paramètres liés sont utilisés pour éviter les vulnérabilités d'injection SQL. 
La fonction retourne le nombre de lignes trouvées dans le résultat de la requête, qui sera 1 si l'adresse e-mail est déjà prise ou sinon 0.*/
function email_taken($email){
    global $db;
    $e = ['email'   =>  $email];
    $sql = "SELECT * FROM admins WHERE email = :email";
    $req = $db->prepare($sql);
    $req->execute($e);
    $free = $req->rowCount($sql);

    return $free;
}
/*Cette fonction génère un token aléatoire. 
Le token est généré en prenant une longueur spécifiée en paramètre et en utilisant la fonction str_shuffle() pour mélanger les caractères d'une chaîne. 
La fonction retourne le token résultant de la chaîne générée.*/
function token($length){
    $chars = "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN0123456789";
    return substr(str_shuffle(str_repeat($chars,$length)),0,$length);
}

/*Fonction qui récupère les informations de tous les administrateurs de la base de données. 
Elle effectue une requête sur la table admins et récupère toutes les colonnes pour chaque administrateur. 
Les résultats sont retournés sous forme d'un tableau d'objets contenant les informations de chaque administrateur.*/
function get_modos(){
    global $db;
    $req = $db->query("
        SELECT * FROM admins
    ");

    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }
    return $results;
}