<?php

//Page de login admin.
//Fonction qui prend deux paramètres : $email qui correspond à l'adresse e-mail de l'utilisateur administrateur à vérifier 
//et $password qui correspond au mot de passe de l'utilisateur administrateur.
function is_admin($email,$password)
{
    /*La variable $db est une instance active de la connexion à la base de données,
     créée à partir d'une bibliothèque de base de données PDO (PHP Data Objects) */
    global $db;
    /*Création d'un tableau $a contenant les informations de l'utilisateur à vérifier.
     Le mot de passe est traité avec la fonction sha1() pour le hachage*/
    $a = [
        'email'     =>  $email,
        'password'  =>  sha1($password)
    ];
    /*Requête SQL préparée avec des paramètres liés. 
    Cela permet d'éviter les vulnérabilités d'injection SQL en traitant les valeurs du tableau $a de manière sécurisée.*/
    $sql = "SELECT * FROM admins WHERE email = :email AND password = :password";
    $req = $db->prepare($sql);
    $req->execute($a);
    /*La méthode rowCount() retourne le nombre de lignes retournées par la requête SQL.
     Si un utilisateur administrateur correspondant est trouvé dans la base de données, $exist aura la valeur de 1
     sinon, il aura la valeur de 0.*/
    $exist = $req->rowCount($sql);
    //La fonction retourne la valeur $exist qui indique si l'utilisateur administrateur existe dans la base de données (1) ou non (0).
    return $exist;
}
