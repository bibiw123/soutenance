<?php
    //Page d'affichage d'un article et de modification
    /*Condition qui s'assure que les utilisateurs ont défini un mot de passe avant d'accéder à certaines parties de l'application. 
    S'il est détecté qu'un utilisateur n'a pas encore de mot de passe, il sera redirigé vers une page spécifique pour effectuer cette action.*/
    if(admin()!=1){
        header("Location:index.php?page=dashboard");
    }

    /*Récuperation des détails d'un article (post) en utilisant la fonction get_post().
      Si la fonction renvoie false, cela signifie qu'aucun article n'a été trouvé avec l'identifiant spécifié (peut-être parce que l'ID de l'article n'existe pas dans la base de données).
      Dans ce cas, le code redirige l'utilisateur vers la page d'erreur.*/
    $post = get_post();
    if($post == false){
        header("Location:index.php?page=error");
    }

?>

</div>
    <div class="parallax-container">
        <div class="parallax">
            <img src="../img/posts/<?= $post->image ?>" alt="<?= $post->title ?>"/>
        </div>
    </div>
<div class="container">

    <?php

        if(isset($_POST['submit'])){
            $title = htmlspecialchars(trim($_POST['title']));
            $content = htmlspecialchars(trim($_POST['content']));
            $posted = isset($_POST['public']) ? "1" : "0";
            $errors = [];

            if(empty($title) || empty($content)){
                $errors['empty'] = "Veuillez remplir tous les champs";
            }

            if(!empty($errors)){
                ?>
                <div class="card red">
                    <div class="card-content white-text">
                        <?php
                        foreach($errors as $error){
                            echo $error."<br/>";
                        }
                        ?>
                    </div>
                </div>
                <?php
            }else{
                edit($title,$content,$posted,$_GET['id']);
                ?>
                    
                    <script>
                        /*Code qui redirige l'utilisateur vers une autre page, en utilisant la méthode window.location.replace(). 
                          Il redirige spécifiquement vers la page "index.php?page=post&id=" en incluant l'ID de l'article ($_GET['id']) dans l'URL pour la variable id.
                          Par exemple, si l'ID de l'article est 123, l'URL finale sera "index.php?page=post&id=123".
                          Cette redirection est généralement utilisée après certaines actions de traitement, comme l'ajout ou la modification d'un article,
                          pour rediriger l'utilisateur vers la page de détails de cet article après avoir effectué l'action. 
                          Cela permet à l'utilisateur de voir immédiatement le résultat de l'action effectuée.*/
                        window.location.replace("index.php?page=post&id=<?= $_GET['id'] ?>");
                    </script>
                <?php
            }


        }


    ?>


    <form method="post">
        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="title" id="title" value="<?= $post->title ?>"/>
                <label for="title">Titre de l'article</label>
            </div>
            <div class="input-field col s12">
                <textarea id="content" name="content" class="materialize-textarea"><?= $post->content ?></textarea>
                <label for="content">Contenu de l'article</label>
            </div>

            <div class="col s6">
                <p>Public</p>
                <div class="switch">
                    <label>
                        Non
                        <input type="checkbox" name="public" <?php echo ($post->posted == "1")?"checked" : "" ?>/>
                        <span class="lever"></span>
                        Oui
                    </label>
                </div>
            </div>

            <div class="col s6 right-align">
                <br/><br/>
                <button type="submit" class="btn" name="submit">Modifier l'article</button>

            </div>


        </div>



    </form>