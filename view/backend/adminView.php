<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <h1>Administration des commentaires !</h1>
            <p><a href="index.php">Retour à la liste des billets</a></p>


            <?php
            while ($comment = $commentsReport->fetch()) {
                ?>
                <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?>
                </p>
                <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                <?php
                echo '<p><a href="index.php?action=supComment&amp;id=' . $comment['id'] . '" target="_blank"> <input type="button" value="suprimer" class="btn btn-primary" id="sendMessageButton"></a></p>';
                echo '<p><a href="index.php?action=reportCommentVerified&amp;id=' . $comment['id'] . '" target="_blank"> <input type="button" value="modéré" class="btn btn-primary" id="sendMessageButton"></a></p><hr>';

                ?>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
