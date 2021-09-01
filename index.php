<?php
    //commencer la session
    session_start();
    //démarre la temporisation de sortie
    ob_start();
    // include header
    include ('header.php');
?>

<?php

    /*  include banner area  */
        include ('Template/_banner-area.php');
    /*  include banner area  */

    /*  include la section top sale */
        include ('Template/_top-sale.php');
    /*  include la section top sale */

    /*  include la section special price   */
         include ('Template/_special-price.php');
    /*  include la section special price  */

    /*  include banner ads  */
        include ('Template/_banner-ads.php');
    /*  include banner ads  */

    /*  include la section new phones */
        include ('Template/_new-phones.php');
    /*  include la section new phones   */

    /*  include la section blog area  */
         include ('Template/_blogs.php');
    /*  include la section blog area  */

?>


<?php
// include footer
include ('footer.php');
?>