<?php

function insertMedia(PDO $db, string $title, string $type_id, string $creator)
{
    if ($title != null && $type_id != null && $creator != null) {
        $sth = $db->prepare("INSERT INTO media (title, type_id, creator) 
            VALUES (:title, :type_id, :creator)");
        $sth->bindParam(':title', $title);
        $sth->bindParam(':type_id', $type_id);
        $sth->bindParam(':creator', $creator);
        $sth->execute();
        addMessage('success', 'Media enregistrer !');
    } else {
        addMessage('danger', 'Erreur lors de enregistrement !');
    }
}
