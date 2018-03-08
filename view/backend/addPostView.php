<?php session_start() ?>
<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <h1>Espace Administration</h1>

    <form  action="index.php?action=addPost" method="post">
        <div>
            <label for="title">titre</label><br />
            <input type="text" id="title" name="title" />
        </div>
        <div>
            <label for="content">Contenue</label>
            <textarea id="content" name="content"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>