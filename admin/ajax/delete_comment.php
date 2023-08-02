<?php
/* Opération DELETE dans la base de données pour supprimer un commentaire en fonction de l'ID fourni
via une requête POST
Requête de suppression (DELETE) dans la table "comments" de la base de données.
Elle supprime le commentaire dont l'ID correspond à la valeur fournie via la requête POST.*/

require "../../functions/main-functions.php";
$db->exec("DELETE FROM comments WHERE id = {$_POST['id']}");