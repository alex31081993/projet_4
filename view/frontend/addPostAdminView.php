<?php ob_start(); ?>

<form  action="index.php?action=addPost" method="post">
    <div>
        <label for="content">Contenue</label>
        <textarea id="content" name="content"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>