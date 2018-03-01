<?php

require_once('model/PostManagerBackend.php');

class Backend
{
    public function addPost($title, $content)
    {
        $postAdminManager = new  \projet4\Model\PostManagerBackend();

        $affectedLines = $postAdminManager->postContent($title, $content);
        if ($affectedLines === false) {
            throw new \Exception('Impossible d\'ajouter le post !');
        } else {
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

    public function deletePost()
    {
        $postAdminManager = new \Projet4\Model\PostManagerBackend();
        $affectedLines = $postAdminManager->deleteContent();
        if ($affectedLines === false) {
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