<?php $title = 'Mon blog'; ?>


<?php ob_start(); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-preview">


                    <?php
                    foreach ($posts as $post) {
                        ?>
                        <a href="index.php?action=post&amp;id=<?= $post['id'] ?>">
                            <h2 class="post-title">
                                <?= htmlspecialchars_decode($post['title']) ?>
                            </h2>
                            <h3 class="post-subtitle">
                                <?= nl2br(htmlspecialchars_decode($post['chapeau'])) ?>
                            </h3>
                        </a>
                        <p class="post-meta">Posté par
                            <a href="#">Jean Forteroche</a>
                            <?= $post['creation_date_fr'] ?></p>

                        <hr>
                        <?php
                    }
                    ?>
                </div>
                <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
                </div>
            </div>
        </div>
    </div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>