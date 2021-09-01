
<?php
    //commencer la session 
    session_start();

    //Rédirection 
    //Empêcher l'utilisateur connecté à voir la page de connexion
    if(isset($_SESSION['Id_User_Connected'])){
        header('location: index.php');
        exit();
    }

    //header
    include ('header.php');

    //helper
    include "./database/helper.php";
    
    //objetnir les données de l'utilisateur dans un tableau
    $user = array();

    //vérifier si l'utilisateur s'est bien inscript
    //obtenir les données de l'utilisateur connecté
    if(isset($_SESSION['userID'])){
        $user = get_user_info($db->con, $_SESSION['userID']);
    }

    //Verifier la soumission du form de connexion et envoyer le formulaire en traitement
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require ('./database/login-process.php');
    }
?>

<!-- inscription -->
<section id="login-form">
    <div class="row m-0">
        <div class="col-lg-4 offset-lg-2">
            <div class="text-center pb-5">
                <h1 class="login-title text-dark">Login</h1>
                <p class="p-1 m-0 font-ubuntu text-black-50">Connectez-vous et profitez de fonctionnalités supplémentaires</p>
                <span class="font-ubuntu text-black-50">Créer un nouveau <a href="inscription.php">compte</a></span>
            </div>
            <div class="upload-profile-image d-flex justify-content-center pb-5">
                <div class="text-center">
                    <img src="<?php echo isset($user['profile_image']) ? $user['profile_image'] : './assets/profile/beard.png' ; ?>" style="width: 150px; height: 150px" class="img rounded-circle" alt="profile">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <form action="login.php" method="post" enctype="multipart/form-data" id="log-form">

                    <div class="form-row my-4">
                        <div class="col">
                            <input type="email" required name="email" id="email" class="form-control" placeholder="Adresse mail*">
                        </div>
                    </div>

                    <div class="form-row my-4">
                        <div class="col">
                            <input type="password" required name="password" id="password" class="form-control" placeholder="Mot-de-passe*">
                        </div>
                    </div>

                    <div class="submit-btn text-center my-5">
                        <button type="submit" class="btn btn-warning rounded-pill text-dark px-5">Login</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
<!-- #inscription -->

<?php

//le footer
include ('footer.php');
?>