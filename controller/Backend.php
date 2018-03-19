<?php

namespace controller;


use model\CommentManager;
use model\ConnectAdminManager;
use model\PostManager;
use model\PostManagerBackend;

class Backend
{
    public function addPost($id, $title, $content)
    {
        $postAdminManager = new  PostManagerBackend();

        $affectedLines = $postAdminManager->postContent($id, $title, $content);
        if ($affectedLines === false) {
            throw new \Exception('Impossible d\'ajouter le post !');
        } else {
            session_start();
            header('Location: index.php');
        }
    }

    public function viewAddPost()
    {
        require('view/backend/addPostView.php');
    }

    public function viewPostAdmin()
    {
        $postManager = new PostManager();
        $post = $postManager->getPost($_GET['id']);
        if ($post === false) {
            throw new \Exception('Aucun billet à modifier');
        }
        require('view/backend/updatePostView.php');
    }

    public function viewAdminConnect()
    {
        require('view/backend/connectAdminView.php');
    }

    public function logOut()
    {
        $_SESSION = array();
        session_destroy();
        header('location: index.php');
    }

    public function login()
    {
        // 1. récupérer le mot de passe hashé depuis la base de données
        $connectAdminManager = new ConnectAdminManager();
        $result = $connectAdminManager->getByPseudo($_POST['pseudo']);

        if ($result) {

            if (password_verify($_POST['pass'], $result['pass'])) {

                session_start();
                $_SESSION['pseudo'] = $_POST['pseudo'];
                header('location: index.php');

            } else {

                header('location: index.php?action=connectAdminView&error=1');
            }

        } else {

            header('location: index.php?action=connectAdminView&error=1');
        }
    }

    public function deletePost()
    {
        $postAdminManager = new PostManagerBackend();
        $affectedLines1 = $postAdminManager->deleteContent($_GET['id']);
        $affectedLines2 = $postAdminManager->deleteComments($_GET['id']);
        if (($affectedLines1 === false) and ($affectedLines2 === false)) {
            throw new \Exception('Impossible de surpimer le post !');
        } else {
            header('Location: index.php');
        }
    }

    public function deleteComment()
    {
        $postManagerBackend = new PostManagerBackend();
        $deleteComment = $postManagerBackend->deleteComment($_GET['id']);
        if ($deleteComment === false) {
            throw new \Exception('impossible de suprimer le commentaire');
        } else {
            header('Location: index.php');
        }
    }

    public function updatePost($title, $content)
    {
        $postAdminManager = new  PostManagerBackend();
        $affectedLines = $postAdminManager->updatePost($title, $content, $_GET['id']);
        if ($affectedLines === false) {
            throw new \Exception('Impossible d\'ajouter le post !');
        } else {
            header('Location: index.php');
        }
    }

    public function reportComment($id)
    {
        $commentManger = new CommentManager();
        $reportComment = $commentManger->reportComment($id);
        if ($reportComment === false ) {
            throw new \Exception('Impossible de signalé le post');
        } else {
            header('Location: index.php');
        }
    }

    public function adminView()
    {
        $comments = new CommentManager();
        $commentsReport = $comments->getsCommentReport();
        if ($commentsReport === false) {
            throw new \Exception('impossible');
        } else {
            require ('view/backend/adminView.php');

        }
    }
}