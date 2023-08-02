//fonctions pour manipuler le DOM et effectuer des requêtes AJAX.
//Cela limite le temps d’attente lorsqu’une ou plusieurs informations de notre page web doivent être mises à jour par un serveur.

/*Fonction jQuery qui s'exécute lorsque le document (la page HTML) a été complètement chargé. 
  Garanti que le code contenu à l'intérieur de cette fonction est exécuté une fois que tous les éléments de la page sont prêts à être manipulés.*/
$(document).ready(function(){
    /*Application du plugin "leanModal" à tous les éléments avec la classe CSS "modal-trigger".
      Le plugin "leanModal" est utilisé pour créer des modales (fenêtres contextuelles) dans une page Web.*/
    $('.modal-trigger').leanModal();
    /*Gestionnaire d'événements au clic sur tous les éléments ayant la classe CSS "see_comment". 
      Lorsqu'un élément est cliqué, la fonction sera exécutée.*/
    $(".see_comment").click(function(){
        //Cette ligne extrait la valeur de l'attribut "id" de l'élément sur lequel le clic a été effectué et la stocke dans la variable "id". 
        //Cela permet d'identifier l'élément spécifique qui a été cliqué.
        const id = $(this).attr("id");
        /*Rrequête AJAX de type POST. Elle envoie des données au serveur pour exécuter une action spécifique sans recharger la page.
          Dans ce cas, le fichier "see_comment.php" situé dans le dossier "ajax" est appelé, et la valeur de "id" est envoyée comme 
          données avec le nom de l'attribut "id". Le serveur exécutera une action en fonction de cette valeur.*/
        $.post('ajax/see_comment.php',{id:id},function(){
        /*Une fois que la requête AJAX est réussie (réponse du serveur), cette ligne de code est exécutée. 
          Elle cache l'élément avec l'ID "commentaire_"+id. En utilisant la valeur de "id", l'élément spécifique lié à l'action effectuée 
          (comme la suppression d'un commentaire) est caché, le masquant visuellement de la page. */    
            $("#commentaire_"+id).hide();
        });
    });
        //Même principe que la fonction précédente see_comment.
    $(".delete_comment").click(function(){
        const id = $(this).attr("id");
        $.post('ajax/delete_comment.php',{id:id},function(){
                $("#commentaire_"+id).hide();
        });
    });

});