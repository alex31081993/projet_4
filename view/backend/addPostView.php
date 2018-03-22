<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h1>Ajouter un nouveau billet</h1>

                <form action="index.php?action=addPost" method="post">
                    <div>
                        <label for="title">titre</label><br/>
                        <input type="text" id="title" name="title"/>
                    </div>
                    <div>
                        <label for="chapeau">chapeau</label><br/>
                        <input type="text" id="chapeau" name="chapeau"/>
                    </div>
                    <div>
                        <label for="content">Contenue</label>
                        <textarea id="content" name="content"></textarea>
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