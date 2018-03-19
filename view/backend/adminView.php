<?php ob_start(); ?>
<h1>Administration des commentaires !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>


<?php
while ($comment = $commentsReport->fetch())
{
    ?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
