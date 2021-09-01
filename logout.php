<?php
    //commencer la session
    session_start();

    //functions
    require ('functions.php');

    //déconnexion de l'utilisateur

    //vider les variables de sessions
    unset($_SESSION['Id_User_Connected']);
    unset($_SESSION['userID']);

    //fermer la connexion aux base de données 
    $db->__destruct();

    //rédiriger l'utilisateur à la page d'accueil 
    header('location: index.php');
?>
