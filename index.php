<?php
require('controller/Frontend.php');
require('controller/Backend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $indexPost = new Frontend();
                $frontPost = $indexPost->post();

            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $indexAddComment = new Frontend();
                    $frontAddComment = $indexAddComment->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'supContent') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $indexAddComment = new Backend();
                $frontAddComment = $indexAddComment->deletePost();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'addPost') {
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                $controller = new Backend();
                $frontAddContent = $controller->addPost($_POST['title'], $_POST['content']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        } elseif ($_GET['action'] == 'addContent') {
            $controller = new Backend();
            $addContent = $controller->viewPost();
        } elseif ($_GET['action'] == 'updateContent') {
        $controller = new Backend();
        $addContent = $controller->viewPostAdmin();
    } elseif ($_GET['action'] == 'updatePost') {
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $controller = new Backend();
            $frontAddContent = $controller->updatePost($_POST['title'], $_POST['content']);
        } else {
            throw new Exception('Tous les champs ne sont pas remplis !');
        }
    }
} else {


    $indexListPosts = new Frontend(); // Création d'un objet
    $frontListPosts = $indexListPosts->listposts(); // Appel d'une fonction de cet obje
}
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
