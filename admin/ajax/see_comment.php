<?php
/* Opération UPDATE dans la base de données pour marquer un commentaire comme vu 
(seen='1') en fonction de l'ID fourni via une requête POST.
Requête de mise à jour (UPDATE) dans la table "comments" de la base de données.
Elle modifie la valeur de la colonne "seen" à 1 
pour le commentaire dont l'ID correspond à la valeur fournie via la requête POST.*/

require "../../functions/main-functions.php";

$db->exec("UPDATE comments SET seen='1' WHERE id='{$_POST['id']}'");