<?php
//fonctions de valisations de données de formulaires


function validate_input_text($textValue){
    if (!empty($textValue)){
        $trim_text = trim($textValue);
        // remove illegal character
        $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_STRING);
        return $sanitize_str;
    }
    return '';
}

function validate_input_email($emailValue){
    if (!empty($emailValue)){
        $trim_text = trim($emailValue);
        // remove illegal character
        $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_EMAIL);
        return $sanitize_str;
    }
    return '';
}

// image de profil
function upload_profile($path, $file){
    $targetDir = $path;
    $default = "beard.png";

    //obtenir le nom du fichier
    $filename = basename($file['name']);
    $targetFilePath = $targetDir . $filename;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    If(!empty($filename)){
        // autoriser certains formats de fichiers
        $allowType = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if(in_array($fileType, $allowType)){
            // upload file to the server
            if(move_uploaded_file($file['tmp_name'], $targetFilePath)){
                return $targetFilePath;
            }
        }
    }

    // retourner l'image par défaut
    return $path . $default;
}


//obtenir des informations sur l'utilisateur
function get_user_info($con, $userID){
    $query = "SELECT first_name, last_name, email_address, profile_image FROM user WHERE user_id=?";
    $q = mysqli_stmt_init($con);

    mysqli_stmt_prepare($q, $query);

    //lier les paramètres
    mysqli_stmt_bind_param($q, 'i', $userID);

    // exécuter la requête
    mysqli_stmt_execute($q);
    $result = mysqli_stmt_get_result($q);

    $row = mysqli_fetch_array($result);
    return empty($row) ? false : $row;
}

















