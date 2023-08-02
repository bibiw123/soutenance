<nav class="red darken-4">
    <div class="container">
        <div class="nav-wrapper">
            <a href="index.php?page=home" class="brand-logo"><img src="./assets/logo-marvel.png" alt="Logo"height="60" width="260"></a>

            <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down">
                <!--Condition ternaire de comparaison (? :) (plus propre sur une même ligne et qui permet d'accélérer la vitesse d’exécution du code)
                dans la liste qui permet de mettre en surbrillance les onglets dans la navbar grâce à la classe "active"
                de materialize.
                Si cette variable $page est égale à la page que je recherche alors le mode actif est activé, sinon le mode n'est pas actif
                (chaîne de caractère vide)-->
                <li class="<?php echo ($page=="home")?"active" : ""; ?>"><a href="index.php?page=home">Accueil</a></li>
                <li class="<?php echo ($page=="blog")?"active" : ""; ?>"><a href="index.php?page=blog">News</a></li>
                <li class="<?php echo ($page=="rumeurs")?"active" : ""; ?>"><a href="index.php?page=chronology">Chronologie</a></li>
                <li class="<?php echo ($page=="blog")?"active" : ""; ?>"><a href="admin/index.php?page=login">Connexion</a></li>
            </ul>
                <!-- Burger menu en responsive classe Materialize-->
            <ul class="side-nav" id="mobile-menu">
                <li class="<?php echo ($page=="home")?"active" : ""; ?>"><a href="index.php?page=home">Accueil</a></li>
                <li class="<?php echo ($page=="blog")?"active" : ""; ?>"><a href="index.php?page=blog">News</a></li>
                <li class="<?php echo ($page=="rumeurs")?"active" : ""; ?>"><a href="index.php?page=chronology">Chronologie</a></li>
                <li class="<?php echo ($page=="blog")?"active" : ""; ?>"><a href="admin/index.php?page=login">Connexion</a></li>
            </ul>

        </div>
    </div>
</nav>