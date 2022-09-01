<?php

try {
    $db = connectBD('localhost', 'root', '', 'mediathequewf3');

    if (isset($_GET['action']) && $_GET['action'] != null
        && isset($_GET['type']) && $_GET['type'] != null) {
        $action = $_GET['action'];
        $type = $_GET['type'];

        if ($type == 'auth') {
            if ($action == 'connexion') {
                connexion($db);
            } elseif ($action == 'inscription') {
                inscription($db);
            } elseif ($action == 'deconnexion') {
                deconnexion();
            } else {
                header('Location: index.php');
            }
        } elseif ($type == 'media') {
            $title = (isset($_POST["title"]) && $_POST["title"] != "") ? $_POST["title"] : null;
            $creator = (isset($_POST["creator"]) && $_POST["creator"] != "") ? $_POST["creator"] : null;
            $type_id = (isset($_POST["type_id"]) && $_POST["type_id"] != "") ? $_POST["type_id"] : null;

            if ($action == 'ajout') {
                $types = fetchAllType($db);

                if($title != null && $type_id != null && $creator != null){
                    insertMedia($db, $title,$type_id, $creator);
                }
            } elseif ($action == 'liste') {

            } else {
                header('Location: index.php');
            }
        } else {
            header('Location: index.php');
        }
    }
} catch (PDOException $e) {
    var_dump($e);
}
