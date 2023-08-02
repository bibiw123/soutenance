<?php
    /* Fichier regroupant toutes les requêtes necessaires pour toutes les pages, ce qui permet des modifications plus simples sur un seul fichier*/

    
    session_start();

    // Création de variables permettant de changer plus facilement les connexions
    $dbhost = 'localhost';
    $dbname = 'blog';
    $dbuser = 'root';
    $dbpswd = '';
    
    // Connexion à la base de données

    try{
        $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    }catch(PDOexception $e){
        die("Une erreur est survenue lors de la connexion à la base de données");
    }
    /*Fonction qui vérifie si l'administrateur actuellement connecté a le rôle d'administrateur (c'est-à-dire s'il est un administrateur) 
    en utilisant la variable de session $_SESSION['admin']. 
    Si la variable de session existe (l'administrateur est connecté), la fonction effectue une requête SQL pour vérifier si l'administrateur
     a un rôle "admin" dans la base de données. Si l'administrateur a le rôle d'administrateur, la fonction retourne 1, sinon elle retourne 0*/
function admin(){
    if(isset($_SESSION['admin'])){
        global $db;
        $a = [
            'email'     =>  $_SESSION['admin'],
            'role'      =>  'admin'
        ];

        $sql = "SELECT * FROM admins WHERE email=:email AND role=:role";
        $req = $db->prepare($sql);
        $req->execute($a);
        $exist = $req->rowCount($sql);

        return $exist;
    }else{
        return 0;
    }
}
/* Cette fonction vérifie si l'administrateur actuellement connecté n'a pas encore défini de mot de passe dans la base de données.
   Elle utilise la variable de session $_SESSION['admin'] pour récupérer l'adresse e-mail de l'administrateur connecté. 
   La fonction effectue ensuite une requête SQL pour vérifier si l'administrateur a un mot de passe vide dans la base de données.
   Si l'administrateur n'a pas encore défini de mot de passe, la fonction retourne 1, sinon elle retourne 0.*/
function hasnt_password(){
    global $db;

    $sql = "SELECT * FROM admins WHERE email = '{$_SESSION['admin']}' AND password = ''";
    $req = $db->prepare($sql);
    $req->execute();
    $exist = $req->rowCount($sql);
    return $exist;
}