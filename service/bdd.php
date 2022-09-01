<?php
// CONNECTER BDD
function connectBD($server, $user, $pass, $dbname): PDO
{
    $db = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}
