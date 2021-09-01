<?php
//helper
require ('helper.php');

//variable d'erreur
$error = array();

//valider les données du formulaire
$firstName = validate_input_text($_POST['firstName']);
if (empty($firstName)){
    $error[] = "You forgot to enter your first Name";
}

$lastName = validate_input_text($_POST['LastName']);
if (empty($lastName)){
    $error[] = "You forgot to enter your Last Name";
}

$email = validate_input_email($_POST['email']);
if (empty($email)){
    $error[] = "You forgot to enter your Email";
}

$password = validate_input_text($_POST['password']);
if (empty($password)){
    $error[] = "You forgot to enter your password";
}

$confirm_pwd = validate_input_text($_POST['confirm_pwd']);
if (empty($confirm_pwd)){
    $error[] = "You forgot to enter your Confirm Password";
}

$files = $_FILES['profileUpload'];
$profileImage = upload_profile('./assets/profile/', $files);


//verifier s'il n'y a pas d'erreur
if(empty($error)){
    //1. Vérifier si l'utilistaeur existe déja dans la base de données 

    // reuête sql 
    $query1 = "SELECT* FROM user WHERE email_address=?";
    
    $k = mysqli_stmt_init($db->con);
    mysqli_stmt_prepare($k, $query1);

    // lier les paramçtres
    mysqli_stmt_bind_param($k, 's', $email);
    //exécuter la requête
    mysqli_stmt_execute($k);
    //obtenir les résultats
    $result = mysqli_stmt_get_result($k);
    //récupérer les résultats dans un tableau assosiatif 
    $rows = mysqli_fetch_array($result, MYSQLI_ASSOC);

    //vérifier si l'email existe déja 
    if ($email !== $rows['email_address']){
        //2. Enregistre un nouvel utilisateur 
        
        $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

        // requête sql
        $query = "INSERT INTO user (user_id, first_name, last_name, email_address, password, profile_image, register_date )";
        $query .= "VALUES(' ', ?, ?, ?, ?, ?, NOW())";

        // init la requête préparée
        $q = mysqli_stmt_init($db->con);

        // requête sql préparée
        mysqli_stmt_prepare($q, $query);

        // lier les paramètres 
        mysqli_stmt_bind_param($q, 'sssss', $firstName, $lastName, $email, $hashed_pass, $profileImage);

        // exécuter la requête
        mysqli_stmt_execute($q);

        if(mysqli_stmt_affected_rows($q) == 1){

            //créer une variable de session
            $_SESSION['userID'] = mysqli_insert_id($db->con);
            //rédiriger 
            header('location: ../login.php');
            exit();
        }else{
            print "Erreur pendant l'inscription...!";
        }
        
    }else {
        //3. Regidiger l'utilisateur à la page de connexion
        header('location: login.php');
        exit("L'utilisateur existe déja");
    }


}else{
    echo 'Informations not valides';
}


















