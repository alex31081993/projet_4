<?php $title = 'Mon blog'; ?>


<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Derniers billets du bloge :</p>

<?php
if (isset($_SESSION['pseudo'])) {
    echo '<p><a href="index.php?action=deconexion">deconexion</a></p>';
    echo '<p><a href="index.php?action=viewAddPost">Ajouter un billet</a></p>';

} else {
    echo '<a href="index.php?action=connectAdminView">Conexion</a>';
}
?>

<?php
if (isset($_SESSION['pseudo']))
{
    echo 'Bonjour ' . $_SESSION['pseudo'];
}
?>

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

<?php require('template.php'); ?>