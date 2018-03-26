<?php
session_start();
require "autoload/Autoload.php";
\autoload\Autoload::register();

$container = new \service\Container();
$controllerFrontEnd = $container->getControllerFrontend();
$controllerBackEnd = $container->getControllerBackend();

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            $controllerFrontEnd->listPosts();

        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $controllerFrontEnd->post();

            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }

        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $controllerFrontEnd->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }

        } elseif ($_GET['action'] == 'supContent') {
            if (isset ($_SESSION['pseudo'])) {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $controllerBackEnd->deletePost();
                } else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            } else {
                throw new Exception('Vous n\'etes pas connecter');
            }

        } elseif ($_GET['action'] == 'updateContent') {
            if (isset ($_SESSION['pseudo'])) {
                $controllerBackEnd->viewPostAdmin();
            } else {
                throw new Exception('Vous n\'etes pas connecter !');
            }

        } elseif ($_GET['action'] == 'updatePost') {
            if (isset ($_SESSION['pseudo'])) {
                if (!empty($_POST['title']) && !empty($_POST['chapeau']) && !empty($_POST['content'])) {
                    $controllerBackEnd->updatePost($_POST['title'], $_POST['chapeau'], $_POST['content']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Vous n\'etes pas connecter');
            }

        } elseif ($_GET['action'] == 'connectAdminView') {
            $controllerBackEnd->viewAdminConnect();

        } elseif ($_GET['action'] == 'postAdminView') {
            if (!empty(htmlspecialchars($_POST['pseudo'])) and !empty(htmlspecialchars($_POST['pass']))) {
                $controllerBackEnd->login();
            } else {
                throw new Exception('Impossilbe d\'afficher la page demander !');
            }

        } elseif ($_GET['action'] == 'logout') {
            $controllerBackEnd->logOut();

        } elseif ($_GET['action'] == 'viewAddPost') {
            if (isset ($_SESSION['pseudo'])) {
                $controllerBackEnd->viewAddPost();
            } else {
                throw new Exception('Vous etes pas autorisé a crée un post');
            }

        } elseif ($_GET['action'] == 'reportComment') {
            if (isset($_GET['id'])) {
                $controllerBackEnd->reportComment($_GET['id']);
            } else {
                throw new Exception('Aucun commentaire a signalé');
            }

        } elseif ($_GET['action'] == 'reportCommentVerified') {
            if (isset($_GET['id'])) {
                $controllerBackEnd->reportCommentVerified($_GET['id']);
            } else {
                throw new Exception('Aucun commentaire a signalé');
            }
        } elseif ($_GET['action'] == 'viewAdmin') {
            if (isset ($_SESSION['pseudo'])) {
                $controllerBackEnd->adminView();
            } else {
                throw new Exception('Vous n\'etes pas connecter !');
            }
        } elseif ($_GET['action'] == 'supComment') {
            if (isset ($_SESSION['pseudo'])) {
                $controllerBackEnd->deleteComment();
            } else {
                throw new Exception('vous n\'etes pas connecter !');
            }

        } elseif ($_GET['action'] == 'addPost') {
            if (isset ($_SESSION['pseudo'])) {
                if (!empty($_POST['title']) && !empty($_POST['chapeau']) && !empty($_POST['content'])) {
                    $controllerBackEnd->addPost($_POST['id'], $_POST['title'], $_POST['chapeau'], $_POST['content']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw  new  Exception('Vous n\'etes pas connecter !');
            }
        }
    } else {
        $controllerFrontEnd->listposts();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}