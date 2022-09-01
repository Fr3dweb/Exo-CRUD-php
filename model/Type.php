<?php

function fetchAllType($db){
    $sth = $db->prepare('SELECT * FROM type');
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}
