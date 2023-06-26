<?php

require_once "Model/userModel.php";
require_once "Model/artModel.php";
require_once "Model/optionModel.php";
require_once "Model/typeModel.php";

$uri = $_SERVER["REQUEST_URI"];

if ($uri === "/inscription") 
{
    if (isset($_POST['btnEnvoi'])) {//btnEnvoi = name du bouton submit
        $messError = VerifEmpty();
        if (!$messError) {
        createUser($pdo);
        header('location:/connexion');
        }
    }
    require_once "Templates/Users/inscription&Profil.php";
}
/*elseif ($uri === "/") {
    if (isset($_POST['selectArt'])){
        require_once "Templates/Users/connexion.php";
    }
}*/
elseif ($uri === "/connexion") 
{
    if (isset($_POST['btnEnvoi'])) {
        connectUser($pdo);
        header('location:/');
    }
    require_once "Templates/Users/connexion.php";
}
elseif ($uri === "/profil") 
{
    if (isset($_POST['btnEnvoi'])) {
        session_destroy();
        header('location:/');
    }
    elseif (isset($_POST['btnModif'])) {
        $messError = VerifEmpty();
        if (!$messError){
            updateUser($pdo);
            updateSession($pdo);
            header('location:/profil');
        }
    }
    require_once "Templates/Users/inscription&Profil.php";
}
elseif ($uri === "/voirArt") {
    require_once "Templates/Arts/voirArt.php";
}
elseif ($uri === "/deleteProfil") {
    deleteAllArtsFromUser($pdo);
    deleteUser($pdo);
    session_destroy();
    header('location:/connexion');
}
elseif ($uri === "/createArt") {
    $options = selectAllOptions($pdo);
    $types = selectAllTypes($pdo);
    require_once "Templates/Arts/edithOrCreateArt.php";
}
elseif ($uri === "/createOption") {
    require_once "Templates/Options/createOption.php";
}
elseif ($uri === "/createType") {
    require_once "Templates/Options/createType.php";
}

function VerifEmpty()
{
    foreach ($_POST as $key => $value) {
        if (empty(str_replace(' ', '',$value))) {
            $messError[$key] = $key . " est vide";
        }
    }
    if (isset($messError)) {
        return $messError;
    }
    else{
        return false;
    }
}