<?php
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $indexPost = new Frontend();
                $frontPost = $indexPost->post();
                
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $indexAddComment = new Frontend();
                    $frontAddComment = $indexAddComment->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
    }
    else {
        
        
        $indexListPosts = new Frontend(); // Création d'un objet
        $frontListPosts = $indexListPosts->listposts(); // Appel d'une fonction de cet obje
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
