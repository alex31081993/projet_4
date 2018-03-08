<?php

require_once('model/PostManagerBackend.php');
require_once ('model/ConnectAdminManager.php');


class Backend
{
    public function addPost($id, $title, $content)
    {
        $postAdminManager = new  \projet4\Model\PostManagerBackend();

        $affectedLines = $postAdminManager->postContent($id, $title, $content);
        if ($affectedLines === false) {
            throw new \Exception('Impossible d\'ajouter le post !');
        } else {
            session_start();
            header('Location: index.php');
        }
    }

    public function viewPost()
    {
        require('view/backend/addPostView.php');
    }

    public function viewAdmin()
    {
        require ('view/backend/listPostsAdmin.php');
    }

    public function viewPostAdmin()
    {
        require ('view/backend/updatePostView.php');
    }

    public function viewAdminConnect()
    {
        require ('view/backend/connectAdminView.php');
    }

    public function login()
    {
        $ConnectAdminManager = new \projet4\Model\connectAdminManager();
        $affectedLines = $ConnectAdminManager->connectAdmin();
        if ($affectedLines === false) {
            throw new \Exception('Impossible de ce conecter !');
        } else {
            session_start();
            $_SESSION['pseudo'] = $_POST['pseudo'];
            require ('view/backend/addPostView.php');
       }
    }

    public function deletePost()
    {
        $postAdminManager = new \Projet4\Model\PostManagerBackend();
        $affectedLines1 = $postAdminManager->deleteContent();
        $affectedLines2 = $postAdminManager->deleteComments();
        if (($affectedLines1 === false) and ($affectedLines2 === false)) {
            throw new \Exception('Impossible de surpimer le post !');
        } else {
            header('Location: index.php');
        }
    }

    public function updatePost($title, $content)
    {
        $postAdminManager = new  \projet4\Model\PostManagerBackend();
        $affectedLines = $postAdminManager->updatePost($title, $content);
        if ($affectedLines === false) {
            throw new \Exception('Impossible d\'ajouter le post !');
        } else {
            header('Location: index.php');
        }
    }
}