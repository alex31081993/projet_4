<?php
require('controller/Frontend.php');
require('controller/Backend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            $controller = new Frontend();
            $listPost = $controller->listPosts();

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
            session_start();
            if (isset ($_SESSION['pseudo'])) {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $indexAddComment = new Backend();
                    $frontAddComment = $indexAddComment->deletePost();
                } else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            } else {
                throw new Exception('pas Autorisé');
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
        } elseif ($_GET['action'] == 'connectAdminView') {
            $controller = new Backend();
            $viewConnect = $controller->viewAdminConnect();

        } elseif ($_GET['action'] == 'postAdminView') {
            if (!empty(htmlspecialchars($_POST['pseudo'])) and !empty(htmlspecialchars($_POST['pass']))) {
                $controller = new Backend();
                $connectOk = $controller->login();
            }
        } elseif ($_GET['action'] == 'addPost') {
            session_start();
            if (isset ($_SESSION['pseudo'])) {
                if (!empty($_POST['title']) && !empty($_POST['content'])) {
                    $controller = new Backend();
                    $frontAddContent = $controller->addPost($_POST['id'], $_POST['title'], $_POST['content']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw  new  Exception('nnnn');
            }
            }
    } else {
        $indexListPosts = new Frontend(); // Création d'un objet
        $frontListPosts = $indexListPosts->listposts(); // Appel d'une fonction de cet obje
    }
}
catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}