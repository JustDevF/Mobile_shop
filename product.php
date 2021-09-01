<?php
// include header

//commencer la session
session_start();

//header
include ('header.php');
?>

<?php

    /*  include products */
    include ('Template/_products.php');
    /*  include products */

    /*  include la section top sale  */
    include ('Template/_top-sale.php');
    /*  include la section top sale */

?>

<?php
// include footer
include ('footer.php');
?>