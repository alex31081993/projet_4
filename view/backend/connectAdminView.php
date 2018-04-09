<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h1>Espace Administration</h1>
                <form action="index.php?action=postAdminView" method="post">

                    <?php

                    if (isset($_GET['error'])) {
                        echo "identifiants incorrects";
                    }

                    ?>

                    <div>
                        <label for="pseudo">pseudo</label><br/>
                        <input type="text" id="pseudo" name="pseudo"/>
                    </div>
                    <div>
                        <label for="pass">Mot De Passe</label><br/>
                        <input type="password" id="pass" name="pass"/>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" id="sendMessageButton"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>