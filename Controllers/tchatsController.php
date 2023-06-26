<?php

require_once "Model/tchatModel.php";
require_once "Model/messageModel.php";

if ($uri === "/tchat") 
{
    $users = selectAllUsersSaufConnect($pdo);
    require_once "Templates/Tchats/tchat.php";
}
elseif($uri === "/voirMessages?userId=" . $_GET['userId']){
    $tchat = verifTchat($pdo, $_GET['userId']);
    var_dump('test');
    if (empty($tchat)) {
        addTchat($pdo, 'binaire');
        $tchatId = $pdo->lastInsertId();
        addUsersTchat($pdo, $tchatId, $_GET['userId']);
        addUsersTchat($pdo, $tchatId, $_SESSION['user']->userId);
    }else {
        $messages = selectAllMessages($pdo, $tchat->tchatId);   
    }
    if(isset($_POST['btnEnvoi'])) {
        $messageDate = date('d-m-y');
        $messageHeure = date('h:i:s');
        addMessage($pdo, $messageDate, $messageHeure);
    }
    require_once "Templates/Tchats/message.php";
}