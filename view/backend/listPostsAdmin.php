<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>

    <h1>Espace Administration</h1>
    <a href="index.php?action=addContent">Ajouter un billet</a>
<?php
while ($data = $posts->fetch())
{
    ?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
    <?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>