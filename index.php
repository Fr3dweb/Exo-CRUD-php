<?php
include 'view/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <form method="post" action="index.php?action=inscription&type=auth">
                <div class="mb-3">
                    <h3>Inscription</h3>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="pseudo" placeholder="Pseudo">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="email" name="mail" placeholder="Email">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="email" name="mail2" placeholder="Email confirmation">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" name="mdp" placeholder="Password">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" name="mdp2" placeholder="Password confirmation">
                </div>
                <div class="mb-3">
                    <input class="btn btn-primary" type="submit" value="Inscription">
                </div>
            </form>
        </div>
        <div class="col-6">
            <form method="post" action="index.php?action=connexion&type=auth">
                <h3>Connexion</h3>
                <div class="mb-3">
                    <input class="form-control" type="email" name="mail" placeholder="Email">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" name="mdp" placeholder="Password">
                </div>
                <div class="mb-3">
                    <input class="form-check-input mx-3" type="checkbox" name="cookie">Rester connecter
                </div>
                <div class="mb-3">
                    <input class="btn btn-primary" type="submit" value="Connexion">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include 'view/footer.php';
?>
