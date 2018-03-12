<?php

namespace controller;


class Backend
{
    public function addPost($id, $title, $content)
    {
        $postAdminManager = new  \model\PostManagerBackend();

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

    public function viewPostAdmin()
    {
        require ('view/backend/updatePostView.php');
    }

    public function viewAdminConnect()
    {
        require ('view/backend/connectAdminView.php');
    }

    public function logOut()
    {
        header('location: index.php');
    }

    public function login()
    {
        // 1. récupérer le mot de passe hashé depuis la base de données
        $connectAdminManager = new \model\ConnectAdminManager();
        $resultat = $connectAdminManager->getByPseudo($_POST['pseudo']);

        if ($resultat) {

            if(password_verify($_POST['pass'], $resultat['pass'])) {

                session_start();
                $_SESSION['pseudo'] = $_POST['pseudo'];
                header('location: index.php');

            } else {

                header('location: index.php?action=connectAdminView&error=1');
            }

        } else {

            header('location: index.php?action=connectAdminView&error=1');
        }

        /*$ConnectAdminManager = new \projet4\Model\connectAdminManager();
        $affectedLines = $ConnectAdminManager->connectAdmin();
        if ($affectedLines === false) {
            throw new \Exception('Impossible de ce conecter !');
        } else {
            session_start();
            $_SESSION['pseudo'] = $_POST['pseudo'];
            require ('view/backend/addPostView.php');
       }*/
    }

    public function deletePost()
    {
        $postAdminManager = new \model\PostManagerBackend();
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
        $postAdminManager = new  \model\PostManagerBackend();
        $affectedLines = $postAdminManager->updatePost($title, $content);
        if ($affectedLines === false) {
            throw new \Exception('Impossible d\'ajouter le post !');
        } else {
            header('Location: index.php');
        }
    }
}