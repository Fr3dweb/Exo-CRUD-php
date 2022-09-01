<?php

function connexion($db)
{
    if (isset($_POST) && !empty($_POST)) {
        $mail = (isset($_POST["mail"]) && $_POST["mail"] != "") ? $_POST["mail"] : null;
        $mdp = (isset($_POST["mdp"]) && $_POST["mdp"] != "") ? $_POST["mdp"] : null;
        $cookie = (isset($_POST["cookie"]) && $_POST["cookie"] != "") ? $_POST["cookie"] : null;
        if ($mail != null && $mdp != null) {
            $user = fecthUserWithMail($db, $mail);
            if ($user != false) {
                if (password_verify($mdp, $user['password'])) {
                    $_SESSION["name"] = $user['name'];
                    $_SESSION["mail"] = $user['mail'];
                    if ($cookie == 'on') {
                        setcookie('name', $user['name'], time() + 3600 * 24 * 60); // 24 hours
                        setcookie('mail', $user['mail'], time() + 3600 * 24 * 60); //24 hours
                    } else {
                        setcookie('name', '', time() - 3600); // 1h
                        setcookie('mail', '', time() - 3600); // 1h
                    }
                    addMessage('success', "Vous etes connecté !");
                    header("Location: admin.php");
                }
            }
        }
    }
}

function inscription($db)
{
    if (isset($_POST) && !empty($_POST)) {
        $pseudo = (isset($_POST["pseudo"]) && $_POST["pseudo"] != "") ? $_POST["pseudo"] : null;
        $mail = (isset($_POST["mail"]) && $_POST["mail"] != "") ? $_POST["mail"] : null;
        $mail2 = (isset($_POST["mail2"]) && $_POST["mail2"] != "") ? $_POST["mail2"] : null;
        $mdp = (isset($_POST["mdp"]) && $_POST["mdp"] != "") ? $_POST["mdp"] : null;
        $mdp2 = (isset($_POST["mdp2"]) && $_POST["mdp2"] != "") ? $_POST["mdp2"] : null;
        if ($pseudo != null && $mail != null && $mail2 != null && $mdp != null && $mdp2 != null) {
            if ($mail == $mail2) {
                if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $mailExist = fecthUserWithMail($db, $mail);
                    if ($mailExist == false) {
                        if ($mdp == $mdp2) {
                            $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
                            insertUser($db, $pseudo, $mail, $mdpHash);
                        }
                    } else {
                        addMessage('danger', 'Adresse mail déjà utilisée !');
                    }
                }
            }
        }
    }
}

function deconnexion()
{
    $_SESSION = [];
    setcookie('pseudo', '', time() - 3600);
    setcookie('email', '', time() - 3600);
    session_destroy();
    header('Location: index.php');
}
