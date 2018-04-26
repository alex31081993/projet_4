<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <h1>Administration des commentaires !</h1>
            <p><a href="index.php">Retour à la liste des billets</a></p>


            <?php
            foreach ($comments as $comment) {
                ?>
                <p><strong><?= htmlspecialchars($comment->getAuthor()) ?></strong> le <?= $comment->getCommentDate() ?>
                </p>
                <p><?= nl2br(htmlspecialchars($comment->getComment())) ?></p>
                <?php
                echo '<p><a href="index.php?action=supComment&amp;id=' . $comment->getId() . '" target="_blank"> <input type="button" value="suprimer" class="btn btn-primary" id="sendMessageButton"></a></p>';
                echo '<p><a href="index.php?action=reportCommentVerified&amp;id=' . $comment->getId() . '" target="_blank"> <input type="button" value="modéré" class="btn btn-primary" id="sendMessageButton"></a></p><hr>';

                ?>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
