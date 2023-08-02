//Fonction Parallax pour l'affichage de l'image
/*Fonction jQuery qui s'exécute lorsque le document (la page HTML) a été complètement chargé. 
  Garanti que le code contenu à l'intérieur de cette fonction sera exécuté une fois que tous les éléments de la page sont prêts à être manipulés.*/
$(document).ready(function(){
/*Application du plugin "parallax" à tous les éléments de la page qui ont la classe CSS "parallax". 
  Le plugin "parallax" est utilisé pour créer des effets de parallaxe sur ces éléments.
  Lorsque le plugin "parallax" est appliqué à un élément, il crée un effet de défilement différencié en fonction du défilement de la page. 
  Cela signifie que l'élément se déplacera à une vitesse différente par rapport au reste du contenu de la page lorsque 
  l'utilisateur fait défiler la page vers le haut ou vers le bas. 
  Cela donne un effet visuel attrayant et dynamique, souvent utilisé pour créer des arrière-plans animés et des éléments visuels qui réagissent au défilement.*/
    $('.parallax').parallax();

});