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
            $controllerFrontEnd->post();


        } elseif ($_GET['action'] == 'addComment') {
            $controllerFrontEnd->addComment($_GET['id'], $_POST['author'], $_POST['comment']);


        } elseif ($_GET['action'] == 'supContent') {
            $controllerBackEnd->deletePost();


        } elseif ($_GET['action'] == 'updateContent') {
            $controllerBackEnd->viewPostAdmin();


        } elseif ($_GET['action'] == 'updatePost') {
            $controllerBackEnd->updatePost($_POST['title'], $_POST['chapeau'], $_POST['content']);


        } elseif ($_GET['action'] == 'connectAdminView') {
            $controllerBackEnd->viewAdminConnect();

        } elseif ($_GET['action'] == 'postAdminView') {
            $controllerBackEnd->login();


        } elseif ($_GET['action'] == 'logout') {
            $controllerBackEnd->logOut();

        } elseif ($_GET['action'] == 'viewAddPost') {
            $controllerBackEnd->viewAddPost();


        } elseif ($_GET['action'] == 'reportComment') {
            $controllerBackEnd->reportComment($_GET['id']);


        } elseif ($_GET['action'] == 'reportCommentVerified') {
            $controllerBackEnd->reportCommentVerified($_GET['id']);


        } elseif ($_GET['action'] == 'viewAdmin') {
            $controllerBackEnd->adminView();


        } elseif ($_GET['action'] == 'supComment') {
            $controllerBackEnd->deleteComment();


        } elseif ($_GET['action'] == 'addPost') {
            $controllerBackEnd->addPost($_POST['id'], $_POST['title'], $_POST['chapeau'], $_POST['content']);
        }
    } else {
        $controllerFrontEnd->listposts();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}