<?php

function selectAllMessages($pdo, $tchatId){
    try{
        $query = "Select * from messages where tchatId = :tchatId";
        $selectAllMessages = $pdo->prepare($query);
        $selectAllMessages->execute([
            'tchatId'=> $tchatId
        ]);
        $messages = $selectAllMessages -> fetchAll();
        return $messages;
    }catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}
function addMessage($pdo, $messageDate, $messageHeure, $tchatId, $userId){

    try{
        $query = "Insert into messages (messageText, messageDate, messageHeure, tchatId, userId) values (:messageText, :messageDate, :messageHeure, :tchatId, :userId)";
        $addMessage = $pdo->prepare($query);
        $addMessage->execute([
            'messageText' => $_POST['message'],
            'messageDate' => $messageDate,
            'messageHeure' => $messageHeure,
            'tchatId' => $tchatId,
            'userId' => $userId
        ]);
    }catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}