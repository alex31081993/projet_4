<?php

namespace controller;




class Backend
{
    private $postManagerBackend;
    private $postManager;
    private $commentManager;
    private $connectAdminManager;

    public function __construct($postManagerBackend, $commentManager, $connectAdminManager, $postManager) {

        $this->postManagerBackend = $postManagerBackend;
        $this->commentManager = $commentManager;
        $this->connectAdminManager = $connectAdminManager;
        $this->postManager = $postManager;

    }

    public function addPost($id, $title, $chapeau, $content)
    {
        $affectedLines = $this->postManagerBackend->postContent($id, $title, $chapeau, $content);
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
        $post = $this->postManager->getPost($_GET['id']);
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
        $result = $this->connectAdminManager->getByPseudo($_POST['pseudo']);

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
        $affectedLines1 = $this->postManagerBackend->deleteContent($_GET['id']);
        $affectedLines2 = $this->postManagerBackend->deleteComments($_GET['id']);
        if (($affectedLines1 === false) and ($affectedLines2 === false)) {
            throw new \Exception('Impossible de surpimer le post !');
        } else {
            header('Location: index.php');
        }
    }

    public function deleteComment()
    {
        $deleteComment = $this->postManagerBackend->deleteComment($_GET['id']);
        if ($deleteComment === false) {
            throw new \Exception('impossible de suprimer le commentaire');
        } else {
            header('Location: index.php');
        }
    }

    public function updatePost($title, $chapeau, $content)
    {
        $affectedLines = $this->postManagerBackend->updatePost($title, $chapeau, $content, $_GET['id']);
        if ($affectedLines === false) {
            throw new \Exception('Impossible d\'ajouter le post !');
        } else {
            header('Location: index.php');
        }
    }

    public function reportComment($id)
    {
        $reportComment = $this->commentManager->reportComment($id);
        if ($reportComment === false ) {
            throw new \Exception('Impossible de signalé le post');
        } else {
            header('Location: index.php');
        }
    }

    public function reportCommentVerified($id)
    {
        $reportCommentVerified = $this->commentManager->reportCommentVerified($id);
        if ($reportCommentVerified === false ) {
            throw new \Exception('Impossible de signalé le post');
        } else {
            header('Location: index.php');
        }
    }

    public function adminView()
    {
        $commentsReport = $this->commentManager->getsCommentReport();
        if ($commentsReport === false) {
            throw new \Exception('impossible');
        } else {
            require ('view/backend/adminView.php');

        }
    }
}