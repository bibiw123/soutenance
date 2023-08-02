<?php 
/*Condition qui s'assure que les utilisateurs ont défini un mot de passe avant d'accéder à certaines parties de l'application. 
  S'il est détecté qu'un utilisateur n'a pas encore de mot de passe, il sera redirigé vers une page spécifique pour effectuer cette action.*/
if(admin()!=1){
    header("Location:index.php?page=dashboard");
}

/*Affichage des posts dans des cards à l'aide d'une boucle*/
$posts = get_posts();
foreach($posts as $post){
    ?>
    <div class="row">
        <div class="col s12">
            <h4><?= $post->title ?><?php echo ($post->posted == "0") ? "<i class='material-icons'>lock</i>" : "" ?></h4>

            <div class="row">
                <div class="col s12 m6 l8">
                    <?= substr(nl2br($post->content),0,1200) ?>...
                </div>
                <div class="col s12 m6 l4">
                    <img src="../img/posts/<?= $post->image ?>" class="materialboxed responsive-img" alt="<?= $post->title ?>"/>
                    <br/><br/>
                    <a class="btn waves-effect waves-light" href="index.php?page=post&id=<?= $post->id ?>">Lire l'article complet</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    
}