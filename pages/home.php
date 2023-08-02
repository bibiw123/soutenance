        <!--Création d'un petit lecteur Audio avec une icône play/pause
 L'attribut "autoplay" indique que la lecture de la chanson doit commencer automatiquement.
 Le code JavaScript suivant est utilisé pour contrôler la lecture et la pause de la chanson, ainsi que le changement de l'icône en conséquence
 La musique est automatiquement en pause au début pour laisser le choix à l'Utilisateur de démarrer ou non
 la fonction onclick permet avec un clic de démarrer la musique et de changer l'icone -->
        <div class="playSong">
    
    <img src="./assets/IcRoundPlayArrow.svg" id="icon">
</div>

<audio autoplay id="mySong">
  <source src="./assets/The-Avengers-Theme-Song.mp3" type="audio/mp3">
</audio>
<script>
let mySong = document.getElementById("mySong");
let icon = document.getElementById("icon");

icon.onclick= function(){
    if(mySong.paused){
          mySong.play();
          icon.src="./assets/IcRoundPause.svg";
    }
    else{
          mySong.pause();
          icon.src = "./assets/IcRoundVolumeOff.svg";
          

    }
    
}
</script>

<div class="row">
<?php
/*Appel et Stockage de la fonction get_posts (définie dans la page home.func.php) dans la variable $posts*/
$posts = get_posts();
/*Affichage de la partie de la vue qui affiche l'article.
Définition d'une boucle qui récupère les données de l'article à partir de la BDD, puis les affiche dans une card.
La carte contient des instructions PHP qui récupèrent les données de l'article à partir de l'objet $post et les affichent dans les balises HTML.
Ce qui permet d'afficher les données d'un article dans une carte stylisée.*/
foreach($posts as $post){
    ?>
        <div class="col l6 m6 s12">
            <div class="card">
                <div class="card-content"><!--Contenu de la carte-->
                    <h5 class="grey-text text-darken-2"><?= $post->title ?></h5>
                    <!--La fonction "strtotime" permet de convertir la date en format timestamp,
                     ce qui est nécessaire pour l'utiliser dans la fonction "date"et l'affichage de l'heure.-->
                    <h6 class="grey-text">Le <?= date("d/m/Y à H:i",strtotime($post->date)); ?> par <?= $post->name ?></h6>
                </div>
                <div class="card-image waves-effect waves-block waves-light">
                    <img src="img/posts/<?= $post->image ?>" class="activator" alt="<?= $post->title ?>" />
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text red darken-4"><i class="material-icons right">more_vert</i></span>
                    <p><a href="index.php?page=post&id=<?= $post->id ?>">Voir l'article complet</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4"><?= $post->title ?> <i class="material-icons right">close</i></span>
                    <!--La fonction substr permet de tronquer une chaîne de caractère en l'occurence le content de l'article, 
                    ce content sera compris entre 0 et 1000 caractère.
                    La fonction nl2br permet de convertir des sauts de lignes en saut de ligne HTML (<br />) -->
                    <p><?= substr(nl2br($post->content),0,1000); ?>...</p>
                </div>
            </div>
        </div>
    <?php
}

?>
</div>