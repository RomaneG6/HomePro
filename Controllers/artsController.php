<?php

require_once "Model/artModel.php";
require_once "Model/optionModel.php";
require_once "Model/typeModel.php";

$uri = $_SERVER["REQUEST_URI"];

if ($uri === "/index.php" || $uri === "/") {
    $arts = selectAllArts($pdo);
    require_once "Templates/Arts/accueil.php";
}
elseif ($uri === "/createArt") {
    if (isset($_POST['btnEnvoi'])) {
        createArt($pdo);
        $artId = $pdo->lastInsertId();
        for ($i=0; $i < count($_POST['options']); $i++) {
            $optionId = $_POST['options'][$i];
            addOptionsArt($pdo, $artId, $optionId);
        }
    }
    $options = selectAllOptions($pdo);
    $types = selectAllTypes($pdo);
    require_once "Templates/Arts/createArt.php";
}
elseif (isset($_GET["artId"]) && $uri === "/voirArt?artId=" . $_GET["artId"]) {
        $art = selectOneArt($pdo);        
        require_once "Templates/Arts/voirArt.php";
}