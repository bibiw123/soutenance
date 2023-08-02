<?php
//Fonction pour mettre à jour le mot de passe de l'utilisateur administrateur actuellement connecté dans la base de données.
function update_password($password){
    global $db;
    $p = [
        'password'  =>  sha1($password),
        'session'   =>  $_SESSION['admin']
    ];
    /*Requête SQL pour mettre à jour le mot de passe dans la table "admins" de la base de données. 
      La clause WHERE est basée sur l'adresse e-mail de l'utilisateur administrateur actuellement connecté, stockée dans $_SESSION['admin'].*/
    $sql = "UPDATE admins SET password = :password WHERE email=:session";
    $req = $db->prepare($sql);
    $req->execute($p);

}