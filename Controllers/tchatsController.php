<?php

require_once "Model/tchatModel.php";
require_once "Model/messageModel.php";

if ($uri === "/tchat") 
{
    $users = selectAllUsersSaufConnect($pdo);
    $tchats = selectAllGrpTchats($pdo, 'groupe');
    if(isset($_POST['btnEnvoie'])) {
        addTchat($pdo, 'groupe');
        $tchatId = $pdo->lastInsertId();
        for ($i=0; $i < count($_POST['users']); $i++) { 
            $userId = count($_POST['users'])[$i];
            addUsersTchat($pdo, $tchatId, $userId);
        }
        header('location:/voirMessages?tchatId=' . $_GET['tchatId']);
    }
    require_once "Templates/Tchats/tchat.php";
}
elseif(isset($_GET["userId"]) && $uri === "/voirMessages?userId=" . $_GET["userId"]/*|| $uri === "/voirMessages?tchatId=" . $_GET['tchatId']*/){
    $tchat = verifTchatBinaire($pdo, $_GET['userId']);
    if (empty($tchat)) {
        addTchat($pdo, 'binaire');
        $tchatId = $pdo->lastInsertId();//affiche la derniere Id créée A quoi ca sert de vouloir la dernière id 
        addUsersTchat($pdo, $tchatId, $_GET['userId']);
        addUsersTchat($pdo, $tchatId, $_SESSION['user']->userId);
    }else {
        $messages = selectAllMessages($pdo, $tchat->tchatId);
    }
    if(isset($_POST['btnEnvoi'])) {
        $messError = VerifEmpty();
        if (!$messError){
            $messageDate = date('d-m-y');
            $messageHeure = date('h:i:s');
        addMessage($pdo, $messageDate, $messageHeure, $tchat->tchatId, $_SESSION['user']->userId);
            header('location:/voirMessages?userId=' . $_GET['userId']);
        }
    }   
    require_once "Templates/Tchats/message.php";
}
elseif(isset($_GET['tchatId']) && $uri === "/voirMessages?tchatId=" . $_GET['tchatId']) {
    $tchat = verifTchatGrp($pdo, $_GET['tchatId']);
    if (!empty($messages)) {
        $messages = selectAllMessages($pdo, $tchat->tchatId);
    }
    if(isset($_POST['btnEnvoi'])) {
        $messError = VerifEmpty();
        if (!$messError){
            $messageDate = date('d-m-y');
            $messageHeure = date('h:i:s');
            addMessage($pdo, $messageDate, $messageHeure, $tchat->tchatId, $_SESSION['user']->userId);// ?? Qu'est ce que ca change de mettre $tchat->tchatId ou $_GET['tchatId']
        }
    }
    require_once "Templates/Tchats/message.php";
}
