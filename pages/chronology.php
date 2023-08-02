<?php
//Page d'affichage des articles de la chronologie
$posts = get_posts();
foreach($posts as $post){
    ?>
    <br>
    
    <div class="row">
        <div class="col s12 m12 l12">
            <h4><?= $post->title ?></h4>
            <div class="row">
                
                <div class="col s12 m6 l8 ">
                    <br/><br/>
                    <?= substr(nl2br($post->summary),0,1200) ?>...
                </div>
                
                <div class="col s12 m6 l4">
                    <img src="img/posts/<?= $post->image ?>" class="materialboxed responsive-img" alt="<?= $post->title ?>"/>
                    
                </div>
            </div>
        </div>
    </div>

    <?php
}