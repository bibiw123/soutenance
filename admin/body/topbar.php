<nav class="red darken-4">
    <div class="container">
        <div class="nav-wrapper">
        <a href="http://localhost/Blog/madness/index.php?page=home" class="brand-logo"><img src="../assets/logo-marvel.png" alt="Logo"height="60" width="260"></a>
            <?php
            /* Activation/désactivation du menu mobile, ainsi que des liens de navigation vers différentes pages.
            Certains liens de navigation supplémentaires sont affichés uniquement si l'utilisateur a le rôle d'administrateur.*/
            /*Condition vérifiant si la variable $page est différente de "login", "new", et "password". Cela signifie que le contenu de cette
             condition sera affiché uniquement lorsque la page actuelle n'est pas "login", "new" ou "password".*/
            if($page != 'login' && $page != 'new' && $page != 'password'){
                ?>
                    <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>

                    <ul class="right hide-on-med-and-down">
                        <li class="<?php echo ($page=="dashboard")?"active" : ""; ?>"><a href="index.php?page=dashboard"><i class="material-icons">dashboard</i></a></li>
                        <?php
                        /*Cette condition vérifie si la fonction admin() renvoie la valeur 1 (peut être un rôle d'administrateur) 
                        pour déterminer si certains éléments de navigation supplémentaires doivent être affichés.
                        Cette condition sera affiché uniquement pour les utilisateurs avec le rôle d'administrateur.*/
                        if(admin()==1){
                            ?>
                            <li class="<?php echo ($page=="write")?"active" : ""; ?>"><a href="index.php?page=write"><i class="material-icons">edit</i></a></li>
                            <li class="<?php echo ($page=="list")?"active" : ""; ?>"><a href="index.php?page=list"><i class="material-icons">view_list</i></a></li>
                            <li class="<?php echo ($page=="settings")?"active" : ""; ?>"><a href="index.php?page=settings"><i class="material-icons">settings</i></a></li>

                            <?php
                        }

                        ?>

                        <li><a href="../index.php?page=home">Quitter</a></li>
                        <li><a href="index.php?page=logout">Déconnexion</a></li>

                    </ul>

                    <ul class="side-nav" id="mobile-menu">
                        <li class="<?php echo ($page=="dashboard")?"active" : ""; ?>"><a href="index.php?page=dashboard">Tableau de bord</a></li>
                        <?php
                        if(admin()==1){
                            ?>
                                <li class="<?php echo ($page=="write")?"active" : ""; ?>"><a href="index.php?page=write">Publier un article</a></li>
                                <li class="<?php echo ($page=="list")?"active" : ""; ?>"><a href="index.php?page=list">Listing des articles</a></li>
                                <li class="<?php echo ($page=="settings")?"active" : ""; ?>"><a href="index.php?page=settings">Paramètres</a></li>
                            <?php
                        }

                        ?>
                        <li><a href="../index.php?page=home">Quitter</a></li>
                        <li><a href="index.php?page=logout">Déconnexion</a></li>

                    </ul>
                <?php
            }
            ?>
        </div>
    </div>
</nav>
