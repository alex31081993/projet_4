<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <h1>Mon super blog !</h1>
    <p>Derniers billets du bloge :</p>

    <form  action="index.php?action=updatePost&amp;id=<?= $_GET['id'] ?>" method="post">
        <div>
            <label for="title">titre</label><br />
            <input type="text" id="title" name="title" value="<?= $post['title'] ?>" />
        </div>
        <div>
            <label for="content">Contenue</label>
            <textarea id="content" name="content"><?= $post['content'] ?></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>