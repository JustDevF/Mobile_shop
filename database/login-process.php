<?php

$error = array();

$email = validate_input_email($_POST['email']);
if (empty($email)){
    $error[] = "You forgot to enter your Email";
}

$password = validate_input_text($_POST['password']);
if (empty($password)){
    $error[] = "You forgot to enter your password";
}

if(empty($error)){
    // requête sql
    $query = "SELECT user_id, first_name, last_name, email_address, password, profile_image FROM user WHERE email_address=?";
    
    $q = mysqli_stmt_init($db->con);
    mysqli_stmt_prepare($q, $query);

    // lier les paramètres  
    mysqli_stmt_bind_param($q, 's', $email);
    //ex"cute la requete
    mysqli_stmt_execute($q);
    //obtenir les résultat de la requête
    $result = mysqli_stmt_get_result($q);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (!empty($row)){
        // vérifier le mot de passe
        if(password_verify($password, $row['password'])){
            //unitialiser une variable de session
            $_SESSION['Id_User_Connected'] = $row['user_id'];

            //rédiriger l'utilisateur
            header("location: index.php");
            exit();
        }
    }else{
        print "Vous n'êtes pas membre veuillez vous inscrire!";
        //
        //rédiriger l'utilisateur
        header("location: inscription.php");
        exit();
    }

}else{
    echo "Veuillez remplir l'e-mail et le mot de passe pour vous connecter!";
}


    