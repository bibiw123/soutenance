<?php
    //Appel du fichier main_functions.php
    include 'functions/main-functions.php';

    //Ensuite, la variable $pages est initialisée en utilisant la fonction scandir() pour scanner le répertoire "pages/" 
    //et récupérer tous les noms de fichiers.

    $pages = scandir('pages/');
      /*Condition permettant de savoir si la page a bien été écrite pour que la page home.php s'affiche en passant par index.php
      utilisation de la superglobale $_GET afin de récuperer les pages dans un tableau. La condition permet d'afficher la page home.php ou si le user 
      saisi une mauvaise adresse de tomber sur la page d'erreur
      Si la page est vide, le user tombera automatiquement sur la page home.php */

    if(isset($_GET['page']) && !empty($_GET['page'])){
        if(in_array($_GET['page'].'.php',$pages)){
            $page = $_GET['page'];
        }else{
            $page = "error";
        }
    }else{
        $page = "home";
    }

    /*Fonction scandir() pour scanner le dossier "functions/" et récupérer tous les noms de fichiers dans un tableau.
      Vérification du nom du fichier associé à la page et qu'il existe dans le tableau $pages_functions.
      Si le nom de fichier existe, le fichier de fonction est inclus avec la fonction include.

      Cela permet de charger automatiquement les fonctions associées à la page lorsqu'elle est appelée et
      d'éviter de charger toutes les fonctions à chaque chargement de page, ce qui peut ralentir le site*/
    $pages_functions = scandir('functions/');
    if(in_array($page.'.func.php',$pages_functions)){
        include 'functions/'.$page.'.func.php';
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
        <!--Import css-->
        <link rel="stylesheet" href="css/styles.css">
        <title>Blog Marvel</title>
        <!--Optimiser pour Mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <!--Appel de la navbar-->
        <?php
            include "body/topbar.php";
        ?>
        <!--Appel de la page home.php de manière dynamique -->
        <div class="container">
            <?php
                include 'pages/'.$page.'.php';
            ?>
        </div>
        <?php
            include "body/footer.php";
        ?>

        <!--Importer jQuery avant materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <?php
            $pages_js = scandir('js/');
            if(in_array($page.'.func.js',$pages_js)){
                ?>
        <!--JavaScript à la fin du body -->
                    <script type="text/javascript" src="js/<?= $page ?>.func.js"></script>
                <?php
            }

        ?>

    </body>
</html>