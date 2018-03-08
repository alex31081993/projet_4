<?php session_start();
?>

// Suppression des variables de session et de la session
<?php $title = 'Mon blog'; ?>

<?php
session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();
?>

<?php ob_start(); ?>
    <h1>Espace Administration</h1>
    <form  action="index.php?action=postAdminView" method="post">
        <div>
            <label for="pseudo">pseudo</label><br />
            <input type="text" id="pseudo" name="pseudo" />
        </div>
        <div>
            <label for="pass">Mot De Passe</label>
            <input type="password" id="pass" name="pass"/>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>