<?php
//Commencer la session
session_start();
//Démarre la temporisation de sortie
ob_start();
// include header
include ('header.php');
?>

<?php

    /*  inclure les produits dans le panier s'il n'est pas vide */
        count($product->getData('cart')) ? include ('Template/_cart-template.php') :  include ('Template/notFound/_cart_notFound.php');
    /*  inclure les produits dans le panier s'il n'est pas vide */

    /*  inclure les produits de la liste wishliste s'il n'est pas vide  */
        count($product->getData('wishlist')) ? include ('Template/_wishilist_template.php') :  include ('Template/notFound/_wishlist_notFound.php');
    /*  inclure les produits de la liste wishliste s'il n'est pas vide  */


    /*  inclure la section top sale */
        include ('Template/_new-phones.php');
    /*  inclure la section top sale */

?>

<?php
// include footer
include ('footer.php');
?>