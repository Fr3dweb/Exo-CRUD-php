<?php

function fecthUserWithMail(PDO $db, string $mail){
    $sth = $db->prepare('SELECT user.id AS uid, user.name, user.mail, 
       user.password, user.media_id FROM user WHERE mail = :mail');
    $sth->bindParam(':mail', $mail);
    $sth->execute();
    return $sth->fetch(PDO::FETCH_ASSOC);
}

function fetchAllUsers(PDO $db)
{
    $sth = $db->prepare('SELECT user.id AS uid, user.name, user.mail, user.password, user.media_id,
                media.id AS mid, media.title, media.creator, media.type_id, 
                type.id AS tid, type.name AS tyname
                FROM user
                LEFT JOIN media ON user.media_id = media.id 
                LEFT JOIN type ON media.type_id = type.id');
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function insertUser(PDO $db, string $pseudo, string $mail, string $password)
{
    if ($pseudo != null && $mail != null && $password != null) {
        $sth = $db->prepare("INSERT INTO user (name, mail, password) 
            VALUES (:name, :mail, :password)");
        $sth->bindParam(':name', $pseudo);
        $sth->bindParam(':mail', $mail);
        $sth->bindParam(':password', $password);
        $sth->execute();
        addMessage('success', 'User enregistrer !');
    } else {
        addMessage('danger', 'Erreur lors de enregistrement !');
    }
}
