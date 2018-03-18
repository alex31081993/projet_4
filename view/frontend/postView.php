<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<?php
if (isset($_SESSION['pseudo'])) {
    echo '<p><a href="index.php?action=supContent&amp;id=' . $_GET['id'] . '">suprimer le post</a></p>';
    echo '<p><a href="index.php?action=updateContent&amp;id=' . $_GET['id'] . '">modifier le post</a></p>';
}
?>

<div class="news">
    <h3>
        <?= htmlspecialchars_decode($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars_decode($post['content'])) ?>
    </p>
</div>

<h2>Commentaires</h2>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php
while ($comment = $comments->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <?php
        if ($comment['report'] == 1) {
            echo '<p>Le commentaire est signalé';
        } else {
            echo '<a href="index.php?action=reportComment&amp;id=' .$comment['id'] . '">Signaler le commentaire !</a>';
        }
    ?>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
