<?php
    /*En résumé, ce code est utilisé pour déconnecter l'administrateur actuellement connecté en supprimant la variable de session associée à son adresse e-mail, 
     puis redirige l'utilisateur vers la page d'accueil du site après la déconnexion. Cela permet à l'administrateur de se déconnecter proprement et de revenir à la page d'accueil après la déconnexion.*/
    unset($_SESSION['admin']);
    header("Location:../");