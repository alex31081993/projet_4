<?php
session_start();
require "autoload/Autoload.php";
\autoload\Autoload::register();

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            $controller = new \controller\Frontend();
            $controller->listPosts();

        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $indexPost = new \controller\Frontend();
                $indexPost->post();

            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }

        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $indexAddComment = new \controller\Frontend();
                    $indexAddComment->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }

        } elseif ($_GET['action'] == 'supContent') {
            if (isset ($_SESSION['pseudo'])) {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $indexAddComment = new \controller\Backend();
                    $indexAddComment->deletePost();
                } else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            } else {
                throw new Exception('Vous n\'etes pas connecter');
            }

        } elseif ($_GET['action'] == 'updateContent') {
            if (isset ($_SESSION['pseudo'])) {
                $controller = new \controller\Backend();
                $controller->viewPostAdmin();
            } else {
                throw new Exception('Vous n\'etes pas connecter !');
            }

        } elseif ($_GET['action'] == 'updatePost') {
            if (isset ($_SESSION['pseudo'])) {
                if (!empty($_POST['title']) && !empty($_POST['content'])) {
                    $controller = new \controller\Backend();
                    $controller->updatePost($_POST['title'], $_POST['content']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Vous n\'etes pas connecter');
            }

        } elseif ($_GET['action'] == 'connectAdminView') {
            $controller = new \controller\Backend();
            $controller->viewAdminConnect();

        } elseif ($_GET['action'] == 'postAdminView'){
            if (!empty(htmlspecialchars($_POST['pseudo'])) and !empty(htmlspecialchars($_POST['pass']))) {
                $controller = new \controller\Backend();
                $controller->login();
            } else {
                throw new Exception('Impossilbe d\'afficher la page demander !');
            }

        } elseif ($_GET['action'] == 'deconexion') {
            $controller = new \controller\Backend();
            $controller->logOut();

        } elseif ($_GET['action'] == 'viewAddPost') {
            if (isset ($_SESSION['pseudo'])) {
                $controller = new \controller\Backend();
                $controller->viewAddPost();
            } else {
                throw new Exception('Vous etes pas autorisé a crée un post');
            }

            } elseif ($_GET['action'] == 'addPost') {
            if (isset ($_SESSION['pseudo'])) {
                if (!empty($_POST['title']) && !empty($_POST['content'])) {
                    $controller = new \controller\Backend();
                    $controller->addPost($_POST['id'], $_POST['title'], $_POST['content']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw  new  Exception('Vous n\'etes pas connecter !');
            }
        }
    } else {
        $indexListPosts = new \controller\Frontend();
        $indexListPosts->listposts();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}